<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once("../../config/database.php");
include_once("../../class/Produit.php");
  
// instantiate database and product object
$database = new Database();
// initialization de la classe produit
$produit = new Produit();
// recupérer les données POST
$data = json_decode(file_get_contents("php://input"));

if(
    !empty($data->titre) &&
    !empty($data->description) &&
    !empty($data->prix) &&
    !empty($data->category_id)  &&
    !empty($data->created_at)
) {
    $produit->titre = $data->titre;
    $produit->description = $data->description;
    $produit->prix = $data->prix;
    $produit->category_id = $data->category_id;
    $produit->created_at = date('Y-m-d H:i:s');
    $produit->img_produit = $data->img_produit;

    if($produit->create()) {
        http_response_code(201);
        echo json_encode(array(
            "message" => "Le produit a été bien créer"
        ));
    } else {
        http_response_code(503);
        echo json_encode(array("message" => "Impossible de créer le produit."));
    }
} else {
    http_response_code(400);
    echo json_encode(array("message" => "Impossible de créer un produit. Les données sont incomplètes"));
}