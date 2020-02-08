<template>
    <div>
        <div class="card card-primary card-outline">
            <div class="card-header">

                <i class="fas fa-cog fa-spin px-2 text-primary" v-show="loading"></i>

                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        <input
                            type="text"
                            name="table_search"
                            v-model="keywords"
                            class="form-control float-right"
                            :placeholder=" local[lang+'.users']['search'] "
                        />

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-0 table-responsive">
                <table class="table table-striped table-hover table-head-fixed">
                    <thead>
                    <tr>
                        <th>
                            <span class="badge badge-info">+{{drivers.total}}</span>
                        </th>
                        <th></th>
                        <th>{{ local[lang+".leads"]["fname"] }}</th>
                        <th>{{ local[lang+".leads"]["lname"] }}</th>
                        <th>{{ local[lang+".leads"]["email"] }}</th>
                        <th>{{ local[lang+".leads"]["mobile"] }}</th>
                        <th>{{ local[lang+".leads"]["city"] }}</th>
                        <th>{{ local[lang+".leads"]["country"] }}</th>
                        <th>{{ local[lang+".leads"]["vtype"] }}</th>
                        <th>{{ local[lang+".leads"]["carmodel"] }}</th>
                        <th>{{ local[lang+".leads"]["plateno"] }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(driver, index) in drivers.data" :key="driver.id">
                        <td width="15%">
                            <button type="button"  @click="active(index,driver)"  :class="'btn btn-sm '+((driver.active==1)?'btn-success':'btn-warning')+' approveBtn text-light'"  :disabled="(driver.active==1)?true:false">

                                {{ local[lang+".leads"]["approve"] }}

                            </button>

                        </td>
                        <td><img :src="driver.avatar" class="rounded-circle" width="42"></td>
                        <td>
                            {{ driver.fname }}
                        </td>
                        <td>{{driver.lname}}</td>
                        <td>{{driver.email}}</td>
                        <td>{{driver.phone}}</td>
                        <td>{{driver.city}}</td>
                        <td>{{driver.country}}</td>
                        <td>{{(driver.vtype=='0')?local[lang+".leads"]["vtypelist"][0]:local[lang+".leads"]["vtypelist"][0]
                            }}</td>
                        <td>{{driver.vmodel}}</td>
                        <td>{{driver.plateno}}</td>
                    </tr>
                    </tbody>
                </table>
                <hr />
                <div class="p-2">
                    <pagination :data="Object.assign({},drivers)" @pagination-change-page="getResults"></pagination>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import CONFIG from "../../../../../../resources/js/app";
    function randomStr(length) {
        var result           = '';
        var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        var charactersLength = characters.length;
        for ( var i = 0; i < length; i++ ) {
            result += characters.charAt(Math.floor(Math.random() * charactersLength));
        }
        return result;
    }
    export default {
        name: "SheetComponent",
        props: ["auth", "lang","roles","acl"],
        data() {
            return {
                path: CONFIG.PATH,
                loading: false,
                drivers: [],
                local: CONFIG.LANG,
                keywords: null,
                errors: [],

            };
        },
        created() {
            this.getResults();

        },
        watch: {
            keywords(after, before) {
                if (this.keywords.length > 2 || this.keywords.length === 0) {
                    this.search();
                }
            }
        },
        methods: {
            getResults(page = 1) {
                this.loading = true;
                if (typeof page === "undefined") {
                    page = 1;
                }
                axios
                    .get(
                        CONFIG.API_URL +
                        "drivers/apigate/sheet?page=" +
                        page +
                        "&api_token=" +
                        this.auth.api_token
                    )
                    .then(res => {
                        this.drivers = res.data;
                        this.loading = false;
                    });
            },
            search(page) {
                this.loading = true;
                if (typeof page === "undefined") {
                    page = 1;
                }
                axios
                    .get(
                        CONFIG.API_URL +
                        "drivers/apigate/search/drivers?page=" +
                        page +
                        "&keywords=" +
                        this.keywords +
                        "&api_token=" +
                        this.auth.api_token
                    )
                    .then(res => {
                        this.drivers = res.data;
                        this.loading = false;
                    });
            },

            active(index,driver){
                this.loading = true;
                this.drivers.data[index].active=1;

                const data={
                    hash:driver.hash,
                    email:driver.email,
                    phone:driver.phone,
                    password:'secret+9314',
                    fname:driver.fname,
                    lname:driver.lname,
                    vmodel:driver.vmodel,
                    vtype:driver.vtype,
                    profile_URL:driver.avatar,
                    country:driver.country,

                }

                //const query=CONFIG.DB.collection('feeds');
                axios
                    .get(
                        CONFIG.API_URL + "drivers/apigate/set/"+ driver.id+ "/approved?api_token=" + this.auth.api_token
                    )
                    .then((res) => {
                      if(res.data==1){
                          const auth=CONFIG.dbAuth.createUserWithEmailAndPassword({
                              uid: driver.hash,
                              email: driver.email,
                              emailVerified: false,
                              password: 'secret+9314',
                              displayName: driver.fname + ' ' + driver.lname,
                              disabled: false
                          });

                          const query=CONFIG.DB.collection('users')
                          .doc(driver.hash)
                          .set({
                              'appIdentifier':'flutter-onboarding',
                              'email': driver.email,
                              'firstName': driver.fname,
                              'lastName': driver.lname,
                              'gender': '0',
                              'phone': parseInt(driver.phone),
                              'profilePictureURL': driver.avatar,
                              'userID': driver.hash,
                              'vehicle_brand': driver.vmodel,
                              'vehicle_type': parseInt(driver.vtype),
                              'country': driver.country
                          });
                          toastr["success"]('Driver has been activated','ok');
                          this.loading = false;
                      }else{
                          console.log('unexpected error!!!');
                          this.loading = false;
                      }

                    })
                    .catch(error => {
                        this.loading = false;
                        console.log(error);
                    });


            },

            clearFields() {
                //this.user.name = this.user.email =this.user.domain= this.user.password = null;
            }
        }
    };
</script>

<style scoped>
</style>
