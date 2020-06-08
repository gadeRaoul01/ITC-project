<template>
    <div class="pull-right">
        <button class="btn btn-sm-12 btn-success" v-if="getInvestActif< getNb_simultane" @click="modalShow"><i
            class="fa fa-fw ti-plus"></i> Nouvel investissement
        </button>


        <div class="modal fade " id="modal-form-addTaux" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <form class="form-horizontal" @submit.prevent="post()">

                        <div class="modal-header "
                             style="background-color: #6699cc;border-top-left-radius: inherit;border-top-right-radius: inherit">
                            <h4 id="myModalLabel" style="color: white">Nouvel investissement {{sommeAInvestir }}</h4>
                        </div>
                        <div class="modal-body ">

                            <div class="form-body">
                                <div class="form-group m-t-10">
                                    <label for="sommes" class="col-md-3 control-label">
                                        Sommes
                                    </label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-fw ti-pencil"></i>
                                    </span>
                                            <input type="number" v-model="sommeAInvestir" @keyup="message" :min="getMin"
                                                   :max="getMax" required class="form-control" id="sommes"
                                                   name="sommes">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <h6 v-if="parseInt(sommeAInvestir) > parseInt(portefeuilleSolde)" class="text-danger">
                            Impossible d'ivestir une somme superieur au solde de votre portefeuille</h6>
                        <div class="modal-footer">

                            <button type="submit" class="btn btn-primary"
                                    v-if="(parseInt(sommeAInvestir) <= parseInt(portefeuilleSolde) ) && (parseInt(sommeAInvestir)>= getMin && parseInt(sommeAInvestir) <= getMax) ">
                                Investir
                            </button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>

</template>

<script>
    // import 'bootstrap/dist/css/bootstrap.css'
    import {mapGetters} from 'vuex'

    export default {
        name: "BtnaddComponent",
        data() {
            return {
                sommeAInvestir: 0,
                messageText: ''
            }
        },
        computed: {
            ...mapGetters(['getMin', 'getMax', 'portefeuilleSolde','getNb_simultane','getInvestActif'])
        },
        methods: {
            modalShow() {

                $('#modal-form-addTaux').modal('show');
            },
            post() {
                this.$store.dispatch('storeInvestissement', this.sommeAInvestir)
                $('#modal-form-addTaux form').trigger("reset");
                $('#modal-form-addTaux').modal('hide');
                this.sommeAInvestir =0;
            },
            message() {
                this.messageText = 'Vous ne pouvez pas investir cette somme '
            }
        }

    }
</script>

<style scoped>

</style>
