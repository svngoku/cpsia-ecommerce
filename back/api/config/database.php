<?php
class Database{
    protected $host = "localhost";
    protected $db_name = "cpsiaEcommerce";
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

    public function getOne($sql,$datas=NULL){
        $prep = $this->requete($sql,$datas);
        return  $prep->fetch();
      }

    public function database_exec($sql,$datas=NULL){
        return $this->requete($sql,$datas);
    }
    
}
?>