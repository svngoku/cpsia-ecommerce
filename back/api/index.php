<?php
// header("Access-Control-Allow-Origin: *");
// header("Content-Type: application/json; charset=UTF-8");
// header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
// header("Access-Control-Max-Age: 3600");
// header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include("./config/config-genos.php");

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode( '/', $uri );


$cas = $_GET["cas"];

switch($cas){
    case "listeClients":
        echo clients::GetListe();
    break;
    
    case "addClient":
        echo clients::addClient();
    break;

    case "listeProduits":
        echo produits::getAll();
    break;

    case "getProduit":
        $id = $_GET["id"];
        echo produits::find($id);
    break;

    case "deleteProduit":
        $id = $_GET["id"];
        echo produits::delete($id);
    break;

    case "getCategories":
        echo categories::read();
    break;

    case "getBonCommande":
        echo bon_commande::read();
    break;

    // case "getCategories":
    //     echo categories::read();
    // break;

    // case "getCategories":
    //     echo categories::read();
    // break;
}