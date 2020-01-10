<template>
    <div>
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>+{{orders.done}} <small>| {{orders.doneSum}}£</small> </h3>

                        <p><i class="fas fa-cog fa-spin px-2 text-light" v-show="loading"></i>
                            {{ local[lang+".orders"]["completedorders"] }}
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
                        <h3>+{{orders.progress}}</h3>

                        <p><i class="fas fa-cog fa-spin px-2 text-light" v-show="loading"></i>
                            {{ local[lang+".orders"]["now"] }}
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
                        <h3>+{{orders.canceledByUser}} <small>| <a :title="local[lang+'.orders']['canceledbyapp']">{{orders.canceledByApp}}</a></small></h3>

                        <p><i class="fas fa-cog fa-spin px-2 text-light" v-show="loading"></i>
                            {{ local[lang+".orders"]["canceledbycustomer"] }}<br>

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
                        <h3>+{{orders.bounce}}</h3>

                        <p><i class="fas fa-cog fa-spin px-2 text-light" v-show="loading"></i>
                            {{ local[lang+".orders"]["bounce"] }}
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
        name: "OrdersStaticsComponent",
        props: ["auth","lang"],
        data() {
            return {
                path: CONFIG.PATH,
                loading: false,
                orders: {
                    "progress": 0,
                    "done": 0,
                    "orders": 0,
                    "canceledByUser": 0,
                    "canceledByApp": 0,
                    "bounce": 0,
                    "doneSum": 0
                },
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
                        " https://us-central1-marasieltotil.cloudfunctions.net/ordersStatics "
                    )
                    .then(res => {
                        this.orders = res.data;
                        this.loading = false;
                    });
            },

        }
    };
</script>

<style scoped>
</style>
