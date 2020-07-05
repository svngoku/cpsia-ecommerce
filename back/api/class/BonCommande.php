<?php 

class bon_commande {
    use genos;
    public $id;
    public $client_id;
    public $client_name;
    public $created_at;
    public $prix_total;

    public function __construct(){
        $this->id = 0;
        $this->client_id = 0;
    }

    public static function create() {
        //
    }

    public static function read() {
        $bonCommande = new self;
        $query = "SELECT *,  c.nom as client_name FROM bon_commande b  
            LEFT JOIN clients c
            ON b.client_id = b.id";
        $champs = array("id","client_id","client_name", "created_at", "prix_total");
        $res = $bonCommande->StructList($query,$champs,"json");
        return $res;
    }

    public static function find($id) {
        //
    }

    public static function delete($id) {
        //
    }

}