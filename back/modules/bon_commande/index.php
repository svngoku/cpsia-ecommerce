<?php
    include("../../api/config/config-genos.php");
    $bonCommande = new bon_commande;
    $modalMessage = "Basic modal";
    // $datas = $bonCommande->getAttributs();

    // var_dump($datas);
?>

<html lang="en">
<?php Head("Gestion des bons de commande"); ?>
  <body>
    <?php Menu(); ?>
    <?php Modal($modalMessage, $label="staticBackdrop"); ?>
	<section class="container">
    <div class="row">
			<article class="col mt-5">
				<h1>Gestion des bons de commandes <small>Liste</small></h1>
				<hr>
				<p>
					<a href="./add.php" class="btn btn-primary">Ajouter</a>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
                        Launch static backdrop modal
                    </button>
				</p>
				<?php bon_commande::Datagrid(); ?>
			</article>
		</div>
	</section>

    <?php Js(); ?>
  </body>

</html>