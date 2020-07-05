<?php

class categories {  
    use genos;
    public $id;
    public $nom;
    public $description;
    public $created_at;
  
    public function __construct(){
    }
  
    public static function read(){
        $categorie = new self;
        $req = "SELECT * FROM categories
            ORDER BY nom;
        ";
        $champs = array("id","nom", "description");
        $res = $categorie->StructList($req,$champs,"json");
        return $res;
    }

    public static function create() { 
    }

    public static function find($id) {
    }

    public static function delete($id) {
        
    }
}