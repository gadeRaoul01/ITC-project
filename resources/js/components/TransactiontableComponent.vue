<template>
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">
                <i class="fa fa-fw ti-exchange-vertical"></i> Liste de mes transactions
            </h3>
            <span class="pull-right">
                <a type="button" class="btn btn-default  btn-sm"><b><i class=" ti-arrow-up text-success"> </i> Dépot</b>
</b>                        </a>
                <a type="button" class="btn btn-default btn-sm"><b><i
                    class=" ti-arrow-down  text-danger"> </i> Retrait</b>
                        </a>

                            </span>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table class="table table-bordered " :onload="chargeTable()" id="transactionsTable">
                            <thead>
                            <tr class="filters">
                                <th>N°</th>
                                <th>Mon numéro</th>
                                <th>Montant</th>
                                <th>Type</th>
                                <th>Numéro de compte</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            <!--                            <tr v-for="transaction in getTransactions">-->

                            <!--                                <td>-->
                            <!--                                    {{transaction.numeroTransaction}}-->
                            <!--                                </td>-->
                            <!--                                <td>-->
                            <!--                                    {{transaction.transactionMontant}}-->
                            <!--                                </td>-->
                            <!--                                <td>-->
                            <!--                                    {{transaction.typeLibelle}}-->
                            <!--                                </td>-->
                            <!--                                <td>-->
                            <!--                                    {{transaction.numeroCompte}}-->
                            <!--                                </td>-->
                            <!--                            </tr>-->

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapGetters} from 'vuex';

    export default {
        name: "TransactiontableComponent",
        computed: {
            getTransactions() {


                // return this.$store.getters.getTransactions;


            },

        },
        mounted() {

        },

        methods: {
            chargeTable() {
                $('#transactionsTable').DataTable({
                    "responsive": true,
                    'data': this.$store.getters.getTransactions,
                    "columns": [
                        {data: 'transactionIdentifiant', name: 'transactionIdentifiant'},
                        {data: 'numeroTransaction', name: 'numeroTransaction'},
                        {data: "transactionMontant", name: 'transactionMontant'},

                        {
                            data: function jsRenderCOL(data, type, row, meta) {
                                var dataRender;
                                if (data['typeLibelle'] == "depot") {
                                    dataRender = "<label>Depot <i  class='fa fa-fw ti-arrow-up text-success' ></i> </label>";
                                } else if (data['typeLibelle'] == "retrait") {
                                    dataRender = "<label>Retrait <i  class='fa fa-fw ti-arrow-down text-danger' ></i> </label>";
                                }
                                return dataRender;
                            },

                        },
                        {data: "numeroCompte", name: 'numeroCompte'},
                        {
                            data: function (data, type, row, meta) {
                                return ' <a  >\n' +
                                    '                <i class="fa fa-fw ti-eye text-primary actions_icon" title="Détail"></i>\n' +
                                    '             </a>\n'
                            }
                        }
                    ]
                })
                ;
            }
        }

    }


</script>

<style scoped>

</style>
