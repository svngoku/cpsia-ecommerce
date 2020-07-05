<template>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                <th scope="col"></th>
                <th scope="col">Nom</th>
                <th scope="col">Description</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(categorie, i) in categories" :key="i">
                    <th scope="row">{{ i + 1 }}</th>
                    <td>{{ categorie.nom}}</td>
                    <td>{{ categorie.description}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>


<script>
import axios from "axios";

export default {
    name: "Categories",
        data() {
            return {
                categories: []
            }
        },
    async created() {
            try {
                const response = await axios.get(`http://localhost:8000/api?cas=getCategories`)
                this.categories = response.data
            } catch (e) {
                this.errors.push(e)
            }
        }
}
</script>