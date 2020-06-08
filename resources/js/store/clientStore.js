import Vue from 'vue'
import Vuex from 'vuex';


Vue.use(Vuex);

const fetchApi = async function (url,options = {}  ) {
    let response =  await fetch(url,{
            credentials : 'same-origin',
            headers : {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN' : document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept' : 'application/json',
                'Content-Type' : 'application/json',
            },
            ...options


        },

    );
    if (response.ok){
        return response.json();
    }else{
        let error = await  response.json();
        throw  new Error(error.message);
    }
};

/*
{
    1:{
        id : 1,
        nom : 'GADE'
        Prenom : 'raoul',
        solde : '15.000',
        identifiant :' Ae645454eegeg'

    }
}

 */


export default new Vuex.Store({
    strict: true,
    state: {
        portefeuille: {},
        systemeInformations: {},
        investissements: {},
        investActif : 0,
        nb_simultane : 0 ,
        min: 0,
        max: 0
    },
    mutations: {
        addPortefeuille: function (state, {portefeuille}) {
            let obj = {};
            obj = portefeuille;
            state.portefeuille = obj;
        },
        addSystemeInformation: function (state, {informations}) {

            informations.forEach(function (value) {
                if (value['group'] == 'intervalle_invest') {
                    state.min = value.param1
                    state.max = value.param2
                }else if (value['group'] == 'Nb_Invest_simultane'){
                    state.nb_simultane= value.param1
                }
            });
            state.systemeInformations = informations

        },
        getAllInvestissements: function (state, {investissements}) {

            state.investissements = investissements ;
            state.investActif = investissements.length;

        },
        addInvestissements : function (state, {investissement}) {
            state.investissements.push(investissement)
            state.investActif++;
        },
        addSolde : function (state, {solde}) {
            state.portefeuille.solde = solde
        }
    },
    getters: {
        portefeuilleSolde: function (state) {

            let solde = state.portefeuille.solde;


            return state.portefeuille.solde
        },
        portefeuilleIdentifiant: function (state) {
            return state.portefeuille.identifiant
        },
        getTransactions: function (state) {
            return state.portefeuille.transactions
        },
        getSytemeinformations: function (state) {
            return state.systemeInformations;
        },
        getSystemeInformationNbJr: function (state) {

            let systeme = state.systemeInformations

        },
        getInvestissements: function (state) {
            return state.investissements;
        },
        getMin: function (state) {
            return state.min
        },
        getMax: function (state) {
            return state.max
        },
        getNb_simultane : function(state){
            return state.nb_simultane

        },
        getInvestActif : function (state) {
            return state.investActif
        }


    },

    actions: {
        loadPortefeuille: async function (context) {
            let resp = await fetchApi('/api/MyPortefeuille');
            context.commit('addPortefeuille', {portefeuille: resp.portefeuille})
        },
        loadSystemeInformations: async function (context) {
            let resp = await fetchApi('/api/getSystemeInformations');
            context.commit('addSystemeInformation', {informations: resp.informations})
        },
        loadInvestissements: async function (context) {
            let resp = await fetchApi('/api/getInvestissement');
            // console.log(resp.investissements)
            context.commit('getAllInvestissements', {investissements: resp.investissements})
        },
         async storeInvestissement(context , sommes){
             let response =   await fetchApi('/api/storeSommes',{

                 method : 'POST',
                 body   : JSON.stringify({
                'sommes' : sommes
                 })

             })

             context.commit('addInvestissements', {investissement: response.investissement})
             context.commit('addSolde', {solde: response.solde})

         }
    }
})
