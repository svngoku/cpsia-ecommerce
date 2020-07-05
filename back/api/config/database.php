<?php
class Database{
    public $host = "localhost";
    private $db_name = "cpsiaEcommerce";
    private $username = "root";
    private $password = "root";
    protected $conn;
  
    // get the database connection
    public function __construct(){
  
        $this->conn = null;
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $exception){
            echo "Error de connexion: " . $exception->getMessage();
        }
        return $this->conn;
    }

    public function getAttributs(){
		$tabRes = array();
		$attributs = array_keys(get_object_vars($this));
		foreach ($attributs as $key => $value) {
            if($value != "id" && $value != "conn" && $value != "host" 
                && $value != "db_name" && $value != "username" && $value != "password"
            ) $tabRes[] = $value;
		}
		return $tabRes;
	}
    

    public function requete($requete,$datas=NULL) { 
        try{
          $prepare = $this->conn->prepare($requete); 
          $prepare->execute($datas);
          return $prepare;
        }catch(Exception $e){
          // en cas d'erreur :
          print_r(array('ERROR'=>" Erreur ! ".$e->getMessage(),'SQL'=> $requete, 'datas'=>$datas));
          exit();
        }
    }
    
    
    public function getAll($sql,$datas=NULL){
        $prep = $this->requete($sql,$datas);
        return $prep->fetchAll();
    }


    public function insert($table_name) {
        $attributs = $this->getAttributs();
        $champs = implode(",", $attributs);
		$champsBind = array_map(function($elem){
			return ":".$elem;
        }, $attributs);
        
        $champsBind = implode(",", $champsBind);
        // Envoie vers base de données
		$req = "INSERT INTO ".$table_name." ($champs) VALUES ($champsBind) ";
		$prep = $this->conn->prepare($req);
		$tabVal = array();
		foreach ($attributs as $key => $value) {
			$tabVal[$value] = $this->$value;
		}
        $res = $prep->execute($tabVal);
        return $res;
    }

    public function delete($id) {
        $class = get_called_class();
        $query = "DELETE FROM ". $class ." WHERE id = ".$id;
        $this->conn->query($query) === true ? true : false;
    }

    public function getOne($id){
		$class = get_called_class();

		$query = "SELECT * FROM $class WHERE id = $id";
		try {
            $query = $this->conn->query($query);
            $ligne = $query->fetch(PDO::FETCH_ASSOC);
            return json_encode($ligne);
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }   
      }

    
}
?>