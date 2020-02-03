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
                        <th></th>
                        <th>{{ local[lang+".leads"]["name"] }}</th>
                        <th>{{ local[lang+".leads"]["email"] }}</th>
                        <th>{{ local[lang+".leads"]["mobile"] }}</th>
                        <th>{{ local[lang+".leads"]["details"] }}</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(driver, index) in drivers" :key="driver.userID">
                        <td><img :src="driver.profilePictureURL" class="rounded-circle" width="42"></td>
                        <td>{{driver.firstName}} {{driver.lastName}}</td>
                        <td>{{driver.email}}</td>
                        <td>{{driver.phone}}</td>
                        <td >
                            <b>{{ local[lang+".leads"]["vtype"] }}:</b> {{(driver.vehicle_type==0)?local[lang+".leads"]["vtypelist"][1]:local[lang+".leads"]["vtypelist"][0]}}
                            <br>

                            <span v-show="details">
                                <b>{{ local[lang+".leads"]["carmodel"] }}:</b> {{driver.vehicle_brand}}
                            </span>
                            <div>
                                <a href="#" @click="details=!details">...</a>
                            </div>
                        </td>
                        <td>+++</td>
                    </tr>
                    </tbody>
                </table>
                <hr />
                <div class="p-2">

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import CONFIG from "../../../../../../resources/js/app";

    export default {
        name: "ActiveComponent",
        props: ["auth", "lang","acl"],
        data() {
            return {
                path: CONFIG.PATH,
                loading: false,
                details:false,
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
                    //this.search();
                }
            }
        },
        methods: {
            getResults() {

                this.loading = true;

                axios
                    .post(
                        "https://us-central1-marasieltotil.cloudfunctions.net/getAllDrivers"
                    )
                    .then(res => {
                        this.drivers = res.data;
                        console.log(res.data[0].drivePos._latitude);
                        this.loading = false;
                    });
            },
            search(page) {
                this.loading = true;
                if (typeof page === "undefined") {
                    page = 1;
                }
                /*axios
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
                    });*/
            },


            clearFields() {
                //this.user.name = this.user.email =this.user.domain= this.user.password = null;
            }
        }
    };
</script>

<style scoped>
</style>
