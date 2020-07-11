<?php
class projet_global{
    // use genos;
    public $id;

	public function __construct(){}

	public function load(){
		$class = get_class($this);
		if(!$this->id > 0)
			throw new Exception("Veuillez renseigner un id", 1);

		$res = $this->getOne($this->id);
		$attributs = array_keys(get_object_vars($this));
		foreach ($res as $key => $value) {
			$existe = in_array($key, $attributs);
			if($existe) $this->$key = $value;
		}
		return $this;
	}

	public function loadPost(){
		$class = get_class($this);
		$attributs = array_keys(get_object_vars($this));
		foreach ($_POST as $key => $value) {
			$existe = in_array($key, $attributs);
			if($existe) $this->$key = $value;
		}
		return $this;
	}

	public function getAttributs(){
		$tabRes = array();
		$attributs = array_keys(get_object_vars($this));
		foreach ($attributs as $key => $value) {
			if($value != "id") $tabRes[] = $value;
		}
		return $tabRes;
	}

	// public function add(){
	// 	$class = get_class($this);
	// 	$attributs = $this->getAttributs();
	// 	var_dump($attributs);
	// 	$champs = implode(",", $attributs);
	// 	$champsBind = array_map(function($elem){
	// 		return ":".$elem;
	// 	}, $attributs);

	// 	$champsBind = implode(",", $champsBind);
	// 	$req = "INSERT INTO $class ($champs) VALUES ($champsBind) ";
	// 	$prep = $this->pdo->prepare($req);

	// 	$tabVal = array();
	// 	foreach ($attributs as $key => $value) {
	// 		$tabVal[$value] = $this->$value;
	// 	}
	// 	// var_dump($tabVal);
	// 	$res = $prep->execute($tabVal);
		
	// }

}
