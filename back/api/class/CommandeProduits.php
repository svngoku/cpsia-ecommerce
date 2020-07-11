<?php 

class commande_produits extends projet_global {
    public $id;
    public $id_produit;
    public $id_commande;
    public $quantite;
    public $prix_unitaire;

    public function __construct() {
        $this->id = 0;
        $this->quantite = 0;
        $this->id_produit = 0;
        $this->id_commande = 0;
        $this->prix_unitaire = '';
    }

}