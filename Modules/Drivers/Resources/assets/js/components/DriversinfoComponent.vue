<template>
    <div>
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>+{{drivers[0]}}</h3>

                        <p><i class="fas fa-cog fa-spin px-2 text-light" v-show="loading"></i>
                            {{ local[lang+".leads"]["alldrivers"] }}
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>

                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>+{{drivers[1]}}</h3>

                        <p><i class="fas fa-cog fa-spin px-2 text-light" v-show="loading"></i>
                            {{ local[lang+".leads"]["motor"] }}
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning text-light">
                    <div class="inner">
                        <h3>+{{drivers[2]}}</h3>

                        <p><i class="fas fa-cog fa-spin px-2 text-light" v-show="loading"></i>
                            {{ local[lang+".leads"]["taxi"] }}
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>+{{pencount}}</h3>

                        <p><i class="fas fa-cog fa-spin px-2 text-light" v-show="loading"></i>
                            {{ local[lang+".leads"]["pending"] }}
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
    </div>
</template>

<script>
    import CONFIG from "../../../../../../resources/js/app";

    export default {
        name: "DriversStaticsComponent",
        props: ["pencount","auth","lang"],
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

        methods: {
            getResults() {
                this.loading = true;

                axios
                    .post(
                        " https://us-central1-marasieltotil.cloudfunctions.net/driversStatics "
                    )
                    .then(res => {
                        this.drivers = res.data;
                        this.loading = false;
                    });
            },

        }
    };
</script>

<style scoped>
</style>
