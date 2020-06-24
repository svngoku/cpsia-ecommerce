<template>
  <div class="container">
    <h1>Produits page</h1>
    <div class="row">
      <div class="col-sm-6" v-for="(produit,i) in produits" :key="i">
      <br />
        <div class="card">
          <img class="responsive-image" v-bind:src='produit.img_produit' height="400" width="auto" />
          <div class="card-body">
            <h5 class="card-title">{{ produit.titre }}</h5>
            <p class="card-text">{{ produit.description }}</p>
            <p class="card-text">Prix: {{ produit.prix  }} €</p>
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
import axios from "axios"
export default {
  props: ["produit"],
  data() {
    return {
      produits: []
    }
  },
  async created(){
    await axios
      .get('http://localhost:8000/api/services/produits/read.php')
      .then(response => (this.produits = response.data.produits))
  },
  // methods: {
  //   showByID: function(id) {
  //     id = this.articles.id
  //     axios.get(`http://localhost:8000/api/services/produits/read.php/${id}`).then(response => (this.produit = response.data))
  //   }
  // },
  
}
</script>
