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
// $data = json_decode(file_get_contents("php://input"));
$produit->id = isset($_GET["id"]) ? $_GET["id"] : die();

if($produit->delete($_GET["id"])) {
    http_response_code(200);
    echo json_encode(array("message" => "Le produit a été supprimé."));
} else {
    http_response_code(404);
    echo json_encode(array("message" => "Le produit n'existe pas."));
}



