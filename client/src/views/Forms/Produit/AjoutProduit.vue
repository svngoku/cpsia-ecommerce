<template>
    <div>
        <h2>Ajout d'un produit</h2>
        <div class="container">
            <div class="form-row">
                <FormulateInput
                    label-class="form-group"
                    type="text"
                    label="Quel est le titre de l'article?"
                    v-model="produit.titre"
                    name="titre"
                    validation="required|max:11"
                    error-behavior="live"
                />
                <br />
                <FormulateInput
                    type="text"
                    label="Description de votre produit"
                    v-model="produit.description"
                    name="description"
                />

                 <FormulateInput
                    type="number"
                    label="Prix du produit"
                    v-model="produit.prix"
                    name="prix"
                />

                <FormulateInput 
                    type="select"
                    name="category"
                    :options="{1: 'FRUITS & LÉGUME BIO'}"
                    error-behavior="live"
                />


            </div>
            
        </div>
         <FormulateInput
            label="Categorie produit ?"
            type="select"
            name="category"
            :options="{nebraska: 'Nebraska', ohiost: 'Ohio St.', michigan: 'Michigan'}"
            value="nebraska"
            error-behavior="live"
            validation="required|matches:nebraska"
            validation-name="Team name"
        />


        <pre class="code" v-text="produit"></pre>
    </div>
</template>

<script>
    import axios from "axios";
    import moment from "moment";

    export default {
        name: "ajoutProduit",
        props: ["options"],
        data() {
            return {
                date: null,
                selectedElement: 0,
                message: "",
                produit: {
                    titre: "",
                    description : "",
                    prix:"",
                    created_at: moment(Date.now()).format("YYYY-MM-DD hh:mm:ss"),
                    category_id: "",
                    img_produit: ""
                }
            }
        },
        mounted() {
            console.log("mounted")
        },
        methods: {
             addProduit() {
                axios
                .post(`http://localhost:8000/api/services/produits/create.php`, this.produit)
                .then((result) => {
                    console.log(result.data)
                    return this.$router.push({name: 'About'})
                }).catch((err) => console.error(err))
                .finally(() => this.message = false)
            }
        }

    }
</script>

<style>
    ul {
        list-style: none;
    }
</style>