<template>
  <div class="container">
    <h1>Produits page</h1>
    <div class="row">
      <div class="col-sm-6" v-for="(produit,i) in produits" :key="i">
      <br />
        <div class="card">
          <p>{{ produit.category_name.toUpperCase() }}</p>
          <img class="responsive-image" v-bind:src='produit.img_produit' height="400" width="auto" />
          <div class="card-body">
            <router-link :to="{ name: 'produit', params: { id: produit.id}}" >
              <h5 class="card-title">{{ produit.titre }}</h5>
            </router-link>
            <p class="card-text">{{ produit.description }}</p>
            <p class="card-text">Prix: {{ Number(produit.prix).toFixed(2)  }} €</p>
            <a href="#" class="btn btn-warning">🛒</a>
            <br />
            <br />
             <b-btn v-b-toggle.collapse1 variant="warning">Toggle Collapse</b-btn>
          </div>
        </div>
      </div>
    </div>       
  </div>
</template>


<script>
import axios from "axios";

export default {
  props: ["produit"],
  data() {
    return {
      produits: []
    }
  },
  async created(){
    await axios
      .get('http://localhost:8000/api?cas=listeProduits')
      .then(response => (this.produits = response.data))
  }
}
</script>
