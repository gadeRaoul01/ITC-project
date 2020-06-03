import Vue from 'vue'
import Vuex from 'vuex';


Vue.use(Vuex);

const get = async function (url) {
    let response = await fetch(url, {
        credentials: 'same-origin',
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    });

    if (response.ok) {
        return response.json()
    } else {
        let error = await response.json();
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
        portefeuille: {}
    },
    mutations: {
        addPortefeuille: function (state, {portefeuille}) {
            let obj = {};
            obj = portefeuille;
            state.portefeuille = obj ;
        }
    },
    getters : {
        portefeuilleSolde : function (state) {

            let solde = state.portefeuille.solde;


           return state.portefeuille.solde
        },
        portefeuilleIdentifiant : function (state) {
           return state.portefeuille.identifiant
        },
        getTransactions : function (state) {
            return state.portefeuille.transactions
        }
    },

    actions: {
        loadPortefeuille: async function (context) {
            let resp = await get('/api/MyPortefeuille');
            context.commit('addPortefeuille', {portefeuille: resp.portefeuille})
        }
    }
})
