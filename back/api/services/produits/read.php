<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once("../../config/database.php");
include_once("../../class/Produit.php");
  
// instantiate database and product object
$database = new Database();
// initialize object
$produit = new Produit();

$produitsArr = $produit->read();
$num = $produitsArr->rowCount();;
  
if($num > 0){

    $liste_produit = array();
    $liste_produit["produits"]= array();
  
    while ($row = $produitsArr->fetch(PDO::FETCH_ASSOC)){
        extract($row);  
        $produit = array(
            "id" => $id,
            "titre" => $titre,
            "description" => html_entity_decode($description),
            "prix" => $prix,
            "created_at" => $created_at,
            "category_id" => $category_id,
            "category_name" => $category_name,
            "img_produit" => $img_produit
        );
        array_push($liste_produit["produits"], $produit);
    }
    http_response_code(200);
    // JSONify la liste des produits
    echo json_encode($liste_produit);
} else {
    # 404 Not found
    http_response_code(404);
    echo json_encode(
        array("message" => "Aucun produit trouvé !! . ")
    );
}