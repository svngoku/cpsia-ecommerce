<?php 

class produits {
    use genos;

    protected $conn;
    private $table_name= "produits";
    public $id;
    public $titre;
    public $description;
    public $prix = 0.00;
    public $category_id;
    public $category_name;
    public $created_at;
    public $img_produit;
    public $quantity= 0;
    public $prix_total = 0;
    public $stock = 0;

    public function __construct(){
        // 
    }

    public static function getAll() {
        $p = new self;
        $req = "SELECT
        c.nom as category_name, p.id, p.titre, p.description, p.prix, p.category_id, p.created_at, p.img_produit
        FROM produits p
            LEFT JOIN
                categories c
                ON p.category_id = c.id
            ORDER BY p.created_at DESC
        ";
        $champs = array("id","titre", "description", "prix", "category_name", "img_produit");
        $res = $p->StructList($req,$champs,"json");
        return $res;
    }


    public static function create() { 
        $produit = new self;
        // $produit->titre = $_POST["titre"];
        // $produit->description = $_POST["description"];
    }


    public static function find($id) {
        $produit = new self;
        $query = "
            SELECT 
                c.nom as category_name, p.id, p.titre, p.description, p.prix, p.category_id, p.created_at, p.img_produit 
            FROM
               produits  p
                LEFT JOIN categories c 
                    ON p.category_id = c.id
            WHERE p.id = ".$id."
        ";
        $champs = array("id","titre", "description", "prix", "category_name", "img_produit", "created_at");
        $res = $produit->StructList($query,$champs,array("id"=>$id),"json");
        return $res;
    }

    public static function delete($id) {
        $p = new self;
        $req = "DELETE FROM produits WHERE id = $id ";
        $p->Sql($req);
    }

    public function __destruct() {
        $this->conn = null;
    }

}