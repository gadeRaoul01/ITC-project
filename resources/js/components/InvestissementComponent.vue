<template>
    <div class="col-sm-6">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-fw ti-pencil"></i> Investissemet N° : <span class="text-primary "> <b> {{investissement.identifiant }}</b></span>
                </h3>
                <span class="pull-right">

                                <i class="fa fa-fw ti-angle-up clickable"></i>

                            </span>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12">
                        <address>
                            <h5 class="pull-left col-sm-8">
                                <strong>Montant investi : <span
                                    class="text-primary "> {{ investissement.montant}}</span> </strong>
                            </h5>
                            <h5 class="pull-right col-sm-4">
                                <strong>Taux : <span class="text-primary "> {{ investissement.taux}}</span> %</strong>
                            </h5><br/>
                            <h5 class="pull-left col-sm-7">
                                <strong>Durée : <span class="text-primary "> {{ investissement.nb_jr}}</span> Jour(s)
                                    ouvré </strong>
                            </h5>
                            <h5 class="pull-right col-sm-5">
                                <strong>Bénefice : <span class="text-primary "> {{ getBenefice()}}</span>
                                </strong>
                            </h5><br/>
                            <h4 class="pull-right col-sm-5">
                                <strong>Total : <span class="text-primary "> {{ getTotal()}}</span>
                                </strong>
                            </h4><br/>
                        </address>

                    </div>
                    <div class="col-sm-12">
                        <address>
                        <h5 class=" col-sm-4">
                            <strong>Progression :
                            </strong>
                        </h5>
                            <h5 class=" col-sm-8">

                                <b-progress :value="getProgress.progress" variant="danger" :max="max" :striped="animate" :animated="animate" show-progress ></b-progress>

                            </h5><br/>
                        </address>
                        <h5 class=" col-sm-6">
                            <strong>Jour éffectué(s) : <span class="text-primary ">{{investissement.nb_jr_fait}}</span>
                            </strong>
                        </h5>
                        <h5 class=" col-sm-6">
                            <strong>Jour restant(s) :<span class="text-primary "> {{getJoursRestant}}</span>
                            </strong>
                        </h5>
                        <address>

                        </address>
                    </div>

                </div>
            </div>
            <div class="panel-footer">
                rasta
            </div>
        </div>
    </div>
</template>

<script>
    import 'bootstrap-vue/dist/bootstrap-vue.css'

    export default {

        name: "InvestissementComponent",
        computed: {
            getProgress(){

                let nb_jr_fait = parseInt(this.investissement.nb_jr_fait)
                let nb_jr = parseInt(this.investissement.nb_jr)
               let progress=  parseInt( (nb_jr_fait/nb_jr) *100)
                let classe = 'secondary'

                if (progress <20){
                    classe = 'secondary'
                } else if (progress <=20 &&   progress < 60){
                    classe = 'primary'
                }else if (progress <=60 &&   progress < 99){
                    classe = 'info'
                }else if (progress == 100){
                    classe = 'success'
                }

                return {'classe' : classe , 'progress' :progress};
            },

            getJoursRestant(){
               return  parseInt(this.investissement.nb_jr) - parseInt(this.investissement.nb_jr_fait)

            }
        },
        data() {
            return {
                value: 0,
                max: 100,
                animate : true,
            }
        },

        props: {
            investissement: {},
        },

        methods: {


            getBenefice() {
                let somme, taux, benefice
                somme = parseInt(this.investissement.montant)
                taux = parseInt(this.investissement.taux)
                benefice = parseInt((somme * taux) / 100)

                return benefice
            },
            getTotal() {
                let somme, taux, total
                somme = parseInt(this.investissement.montant)
                taux = parseInt(this.investissement.taux)
                total = somme + (parseInt((somme * taux) / 100))

                return total
            },

        }
    }
</script>

<style scoped>

</style>
