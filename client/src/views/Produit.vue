<template>
    <div>
        <div v-for="(p,i) in produit" :key="i">
            {{ p.titre }}
        </div>
    </div>
</template>
<script>
    import axios from "axios";
    import moment from "moment";

    export default {
        name: "Produit",
        data() {
            return {
                produit: []
            }
        },
        created() {
            try {
                const response = await axios.get(`http://localhost:8000/api?cas=getProduit&id=${this.$route.params.id}`)
                this.produit = response.data
            } catch (e) {
                this.errors.push(e)
            }
        }
    }
</script>