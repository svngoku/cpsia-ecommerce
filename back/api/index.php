<?php

include("./config/config-genos.php");
include("./config/config-views.php");
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode( '/', $uri );

$cas = $_GET["cas"];
if(isset($_GET["cas"]) && $_GET["cas"] == 1){
    Cas($cas);  
    header("Location: index.php");
}



?>
<html lang="en">
<?php Head("Accueil Application"); ?>
  <body>
    <?php Menu(); ?>
	
	<section class="container">
		<div class="row">
			<div class="col mt-5">
				<div class="jumbotron">
				  <h1 class="display-4">Tuto PHP &amp; Bootstrap</h1>
				  <p class="lead">Gestion de bon commande avec Genos</p>
				</div>
			</div>
		</div>
	</section>

    <?php Js(); ?>
  </body>

</html>
