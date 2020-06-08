<template>
    <div class="row">

        <div class="col-sm-12">

            <div class="panel filterable">
                <div class="panel-heading clearfix">
                    <h3 class="panel-title pull-left m-t-6">
                        <i class="ti-info"> </i> Informations
                    </h3>

                    <div class="pull-right ">
                        <i class="fa fa-fw ti-angle-up clickable"></i>
                        <i class="fa fa-fw ti-close removepanel clickable"></i>
                    </div>
                </div>
                <div class="panel-body">
                    <div v-for="config in getSytemeinformations" class="col-md-6 col-sm-12 col-xs-12 invoice_bg">
                        <address v-if="config['group'] ==  'intervalle_invest'">
                            <h6>
                                <strong>{{config['description']}}: Min <span
                                    class="text-primary"> {{ config['param1']}} </span>{{ config['param4']}}
                                    <span> - </span>Max <span class="text-primary"> {{ config['param2']}} </span>{{
                                    config['param4']}} </strong> <br/>
                            </h6>
                        </address>
                        <address v-else="config['group'] !=  'intervalle_invest'">
                            <h6>
                                <strong>{{config['description']}}: <span
                                    class="text-primary"> {{ config['param1']}} </span>{{ config['param4']}}
                                    <span></span> </strong> <br/>
                            </h6>
                        </address>
                    </div>
                    <!--                    <div class="col-md-6 col-sm-12 col-xs-12 invoice_bg text-left">-->
                    <!--                        <div>-->

                    <!--                            <address>-->
                    <!--                                <strong>Nombre d'investissement simultané :  <span class="text-primary">{{ portefeuilleSolde}}</span> </strong>  <br/>-->
                    <!--                            </address>-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                    <!--                    <div class="col-md-6 col-sm-12 col-xs-12 invoice_bg text-left">-->
                    <!--                        <div>-->

                    <!--                            <address>-->
                    <!--                                <strong> Nombre de jour d'investissement :  <span class="text-primary">{{ getSystemeInformationNbJr}}</span>  Jour(s)</strong>  <br/>-->
                    <!--                            </address>-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                    <!--                    <div class="col-md-6 col-sm-12 col-xs-12 invoice_bg text-left">-->
                    <!--                        <div>-->

                    <!--                            <address>-->
                    <!--                                <strong> Intervalle d'investissement : Min  <span class="text-primary" ></span>  - Max <span class="text-primary">{{ portefeuilleSolde}}</span> </strong>  <br/>-->
                    <!--                            </address>-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    import {mapGetters} from 'vuex'

    export default {
        name: "SystemeinformationComponent",

        computed: {
            ...mapGetters(['getSytemeinformations', 'portefeuilleSolde', 'getSystemeInformationNbJr'])


        },
        mounted() {
            this.$store.dispatch('loadSystemeInformations')

        }
    }
</script>

<style scoped>
    .blue {

    }

</style>
