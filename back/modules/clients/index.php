<?php 
include("../../api/config/config-genos.php");
$client = new clients;

?>

<html lang="en">
<?php Head("Gestion des clients"); ?>
  <body>
    <?php Menu(); ?>
	<section class="container">
    <div class="row">
			<article class="col mt-5">
				<h1>Gestion des clients <small>Liste</small></h1>
				<hr>
				<p>
					<a href="?cas=1" class="btn btn-primary">Ajouter</a>
				</p>
				<?php isset($_GET["cas"])  ? clients::addClient() : clients::Datagrid(); ?>
			</article>
		</div>
	</section>

    <?php Js(); ?>
  </body>

</html>