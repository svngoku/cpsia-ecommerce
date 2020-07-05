<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

include_once("../../config/database.php");
include_once("../../class/Produit.php");
  
// instantiate database and product object
$database = new Database();
$produit = new Produit();
$produit->id = isset($_GET["id"]) ? $_GET["id"] : die();

$produitJSONify = $produit->find($_GET["id"]);

if($produit->id !== 0) {
    http_response_code(200);
    echo $produitJSONify;

} else {
    http_response_code(404);
    echo json_encode(array("message" => "Le produit n'existe pas."));
}



