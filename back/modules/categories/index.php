<?php 
include("../../api/config/config-genos.php");

$categorie = new categories;

if(isset($_GET["cas"]) && $_GET["cas"] == 1){
    $categorie->loadPost()->create();
    header("Location: index.php");
}

?>

<html lang="en">
<?php Head("Gestion des catégories"); ?>
  <body>
    <?php Menu(); ?>
	<section class="container">
    <div class="row">
			<article class="col mt-5">
				<h1>Gestion des catégories <small>Liste</small></h1>
				<hr>
				<p>
					<a href="./add.php" class="btn btn-primary">Ajouter</a>
				</p>
				<?php categories::Datagrid(); ?>
			</article>
		</div>
	</section>

    <?php Js(); ?>
  </body>

</html>