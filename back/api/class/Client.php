<?php 

class clients {
    use genos;
    protected $conn;
    public $table_name = "clients";
    public $id;
    public $nom;
    public $prenom;
    public $email;
    public $created_at;

    public function __construct()
    {
        $this->id= 0;
        $this->nom = "";
        $this->prenom = "";
        $this->email = "";
    }

    public static function GetListe(){
        $p = new self;
        $q = "SELECT * FROM clients ORDER BY nom";
        $champs = array("id","nom", "prenom", "email");
        $res = $p->StructList($q,$champs,"json");
        return $res;
    }

    public static function addClient() {
        $p = new self;
        $p->Set( "nom" , "John" );
        $p->Set( "prenom" , "Doe" );
        // $p->Set( "birth" , "22-10-1981" );
        $p->Add();
    }


    public static function find($id) {

    }

    public static function update($id) {
        
    }

    public static function delete($id) {
        $p = new self;
        $req = "DELETE FROM clients WHERE id = $id ";
        $p->Sql($req);
    }

    
}