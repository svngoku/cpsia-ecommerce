import Vue from "vue";
import App from "./App.vue";
import router from "./router";
import BootstrapVue from 'bootstrap-vue';
import VueFormulate from '@braid/vue-formulate';

// Use lib
Vue.use(VueFormulate, {
  classes: {
    wrapper: "form-group col-md-6",
    label: "col-sm-2 col-form-label",
    input: "form-control",
    error: "alert alert-danger",
    help: "form-text text-muted"
  }  
})
Vue.use(require("vue-moment"));
Vue.use(BootstrapVue)
Vue.config.productionTip = false;

new Vue({
  router,
  render: h => h(App)
}).$mount("#app");
