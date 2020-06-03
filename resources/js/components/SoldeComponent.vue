<template>
    <div>
        <h4 class="col-sm-8">
            <span class="pull-right">  Identifiant : <span class="blue"> {{portefeuilleIdentifiant?portefeuilleIdentifiant  : 0 }} </span></span>
        </h4>
        <h4 class="col-sm-8">
            <span class="pull-right">  Solde : <span
                class="blue"> {{ portefeuilleSolde | stringToMoney   }} </span></span>
        </h4>
    </div>


</template>

<script>
    import {mapGetters} from 'vuex';
    // import  Store from '../store/clientStore'

    export default {
        name: "SoldeComponent",

        computed: {
            ...mapGetters(['portefeuilleSolde', 'portefeuilleIdentifiant'])
        },
        filters: {
            stringToMoney: function (v) {
                let array = v.split('')
                // array = array.reverse();
                let string = ''
                let i = array.length - 1
                while (i >= 0) {
                    let stri = ''
                    if (array[i]) {
                        stri = array[i]
                    }
                    if (array[i-1]){
                        stri +=array[i - 1]
                    }
                    if (array[i-2]){
                        stri += array[i - 2] +'.'
                    }

                    string += stri

                    stri = ''
                    i = i - 3;
                }

                return array.reverse()
            }
        },
        mounted() {
            this.$store.dispatch('loadPortefeuille')

        }
    }
</script>

<style scoped>
    .blue {
        color: #0000ff;
    }
</style>
