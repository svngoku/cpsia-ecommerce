<?php
include("../../api/config/config-genos.php");
$produits = new produits;
?>

<html lang="en">
<?php Head("Gestion des produits"); ?>
  <body>
    <?php Menu(); ?>
	<section class="container">
    <div class="row">
			<article class="col mt-5">
				<h1>Gestion des produits <small>Liste</small></h1>
				<hr>
				<p>
					<?php 
						if(!isset($_GET["cas"])) {
							produits::DataGrid();
						} else {
							if($_GET["cas"] === "add")  {
								produits::add();
							} else if($_GET["cas"] === "update" && !empty($_GET["id"])) {
								produits::edit();
							} else if($_GET["cas"] === "delete" && !empty($_GET["id"])) {
								$produits->Delete();
							}
						}
					
					?>
				</p>
			</article>
		</div>
	</section>

    <?php Js(); ?>
  </body>

</html>