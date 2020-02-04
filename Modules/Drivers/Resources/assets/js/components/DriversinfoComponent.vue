<template>
    <div>
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>+{{allDriversSize}}</h3>

                        <p><i class="fas fa-cog fa-spin px-2 text-light" v-show="loading"></i>
                            {{ local[lang+".leads"]["alldrivers"] }}
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-checkmark"></i>
                    </div>

                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>+{{motorDriversSize}}</h3>

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
                <div class="small-box bg-dark text-light">
                    <div class="inner">
                        <h3>+{{taxiDriversSize}}</h3>

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
                <div class="small-box bg-warning">
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
                allDriversSize:0,
                motorDriversSize:0,
                taxiDriversSize:0,
                local: CONFIG.LANG,
                keywords: null,
                errors: [],

            };
        },
        created() {
            this.getDriversSize();
            this.getMotorsSize();
            this.getTaxiSize();

        },

        methods: {
            getDriversSize() {
                this.loading = true;
                const query=CONFIG.DB.collection('users');
                query.where('vehicle_type','in',[0,1]).onSnapshot(snap => {
                    this.allDriversSize=snap.size;
                    this.loading = false;
                });

            },
            getMotorsSize() {
                this.loading = true;
                const query=CONFIG.DB.collection('users');
                query.where('vehicle_type','==',0).onSnapshot(snap => {
                    this.motorDriversSize=snap.size;
                    this.loading = false;
                });

            },
            getTaxiSize() {
                this.loading = true;
                const query=CONFIG.DB.collection('users');
                query.where('vehicle_type','==',1).onSnapshot(snap => {
                    this.taxiDriversSize=snap.size;
                    this.loading = false;
                });

            },

        }
    };
</script>

<style scoped>
</style>
