<template>
    <div>
         <b-sidebar id="sidebar-1" title="Sidebar" shadow>
            <div class="px-3 py-2">
                <p>
                Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis
                in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.
                </p> 
                <b-img src="https://picsum.photos/500/500/?image=54" fluid thumbnail></b-img>
            </div>
        </b-sidebar>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">RADIAN</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <router-link class="nav-link" to="/">Acceuil</router-link>
                        <span class="sr-only">(current)</span>
                    </li>
                    <li class="nav-item">
                       
                    </li>
                    <li class="nav-item">
                         <router-link class="nav-link" to="/about">Produits</router-link>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Clients</a>
                    </li>

                     <li class="nav-item">
                        <a class="nav-link" href="/categories" tabindex="-1" aria-disabled="true">Categories</a>
                    </li>

                     <li class="nav-item">
                        <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Bon de commandes</a>
                    </li>

                    <!-- <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form> -->
                </ul>
            </div>
            </nav>
    </div>
</template>

<script>

export default {
  name: "Navbar"
};
</script>
