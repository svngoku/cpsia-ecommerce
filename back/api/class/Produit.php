<?php 
class Produit extends Database {
    protected $conn;
    private $table_name= "produits";

    public $id;
    public $titre;
    public $description;
    public $prix = 0.00;
    public $category_id;
    public $created_at;
    public $img_produit;

    public function __construct(){
        parent::__construct();
    }

    public function read() {
        $req = "SELECT
        c.nom as category_name, p.id, p.titre, p.description, p.prix, p.category_id, p.created_at, p.img_produit
        FROM
            " . $this->table_name . " p
            LEFT JOIN
                categories c
                ON p.category_id = c.id
            ORDER BY p.created_at DESC
        ";
		$res = $this->conn->query($req);
        $res->execute();
        return $res;
    }

    public function create() { 
        $this->insert($this->table_name);
        return true;
    }


    public function find($id) {
        $query = "
            SELECT 
                c.nom as category_name, p.id, p.titre, p.description, p.prix, p.category_id, p.created_at, p.img_produit 
            FROM
                ". $this->table_name ."  p
                LEFT JOIN categories c 
                    ON p.category_id = c.id
            WHERE p.id = ".$id."
        ";

        try {
            $query = $this->conn->query($query);
            $ligne = $query->fetch(PDO::FETCH_ASSOC);
            // var_dump($ligne);
            return json_encode($ligne);
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }    
    }

    public function __destruct() {
        $this->conn = null;
    }

}