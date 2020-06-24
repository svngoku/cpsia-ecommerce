<?php 

define("URL_HOME", "http://localhost:9000/");
define("PARAM_hote", "127.0.0.1");
define("PARAM_port", "3306");
define("PARAM_nom_bd", "cpsiaEcommerce");
define("PARAM_utilisateur", "root");
define("PARAM_mot_passe", "root");

$pdo = new PDO("mysql:host=" . PARAM_hote . "; dbname=" . PARAM_nom_bd, PARAM_utilisateur, PARAM_mot_passe);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

