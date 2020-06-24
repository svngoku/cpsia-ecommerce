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
        $attributs = $this->getAttributs();
        $champs = implode(",", $attributs);
		$champsBind = array_map(function($elem){
			return ":".$elem;
        }, $attributs);
        
        $champsBind = implode(",", $champsBind);
		$req = "INSERT INTO ".$this->table_name." ($champs) VALUES ($champsBind) ";
		$prep = $this->conn->prepare($req);
       # strip_tags() tente de retourner la chaîne str après avoir supprimé tous les octets nuls, toutes les balises PHP et HTML du code
		$tabVal = array();
		foreach ($attributs as $key => $value) {
			$tabVal[$value] = $this->$value;
		}
		// var_dump($tabVal);
        $res = $prep->execute($tabVal);
    }

    function getProduitById($id)
    {
        $query = "SELECT * FROM " . $this->table_name . " 
            WHERE id =:id 
            ORDER BY titre ASC
        ";
        $datas = array(':id' => $id);         
        $result = $this->getOne($query,$datas);
        return $result;
    }

    public function __destruct() {
        $this->conn = null;
    }

}