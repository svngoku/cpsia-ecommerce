import Vue from "vue";
import VueRouter from "vue-router";
import Home from "../views/Home.vue";
import Categories from "../views/Categories.vue";
import addProduit from "../views/Forms/Produit/AjoutProduit.vue";

Vue.use(VueRouter);

const routes = [
  {
    path: "/",
    name: "Home",
    component: Home
  },
  {
    path: "/about",
    name: "About",
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () =>
      import(/* webpackChunkName: "about" */ "../views/About.vue")
  },
  {
    path: '/produit/:id', 
    name: "produit",
    component: () => import('../views/Produit.vue')
  },
  {
    path: "/add",
    name: "ajoutProduit",
    component: addProduit
  },
  {
    path: "/categories",
    name: "Categories",
    component: Categories
  },
  
];

const router = new VueRouter({
  mode: "history",
  base: process.env.BASE_URL,
  routes
});

export default router;
