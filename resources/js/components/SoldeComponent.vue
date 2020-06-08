<template>
    <div class="pull-right">
        <h5 class="col-sm-12">
            <span class="pull-right">  Identifiant : <span class="blue"> {{portefeuilleIdentifiant?portefeuilleIdentifiant  : 0 }} </span></span>
        </h5>
        <h5 class="col-sm-12">
            <span class="pull-right">  Solde : <span
                class="blue"> {{ portefeuilleSolde ? portefeuilleSolde : 0 }} </span></span>
        </h5>
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
               let  value=String(v) ;
                let long = value.length;
                let str =  '';
                let st = ''
                for (let i = long ; i>=0 ; i++){
                    st = '.'+value.charAt(i-2)+value.charAt(i-1)+value.charAt(i)
                    i = i-3

                    str  = st+str

                    st = ''
                }
               return value.charAt(long-1)            }
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
