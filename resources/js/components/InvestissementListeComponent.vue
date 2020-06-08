<template>
    <div>
        <span v-for="investissement in getInvestissements">
        <InvestissementComponent  :investissement="investissement"></InvestissementComponent>
   </span>
    </div>
</template>

<script>
    import InvestissementComponent from "./InvestissementComponent";
    import {mapGetters} from 'vuex'

    export default {
        name: "InvestissementListeComponent",
        computed: {
            ...mapGetters(['getInvestissements'])
        },
        components: {
            InvestissementComponent,
        },
        mounted() {
            this.$store.dispatch('loadInvestissements')

        }
    }
</script>

<style scoped>

</style>
