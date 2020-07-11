<?php
include("./api/config/config-genos.php");
?>
<html lang="en">
<?php Head("Accueil Application"); ?>
  <body>
    <?php Menu(); ?>
	
	<section class="container">
		<div class="row">
			<div class="col mt-5">
				<div class="jumbotron">
				  <h1 class="display-4">Tableau de bord</h1>
				  <p class="lead">Gestion de bon commande avec Genos</p>
				</div>
			</div>
		</div>
	</section>

    <?php Js(); ?>
  </body>

</html>
