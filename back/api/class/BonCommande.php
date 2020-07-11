<?php
class bon_commande extends \projet_global{
    use genos;
    public $id;
    public $client_id;
    public $prix_total;
    public $created_at;

    public function __construct(){
        parent::__construct();
        $this->id = 0;
        $this->client_id = 0;
        $this->prix_total = 0;
        $this->created_at = date("Y-m-d H:i:s");
    }

    public static function addBonCommande() {
        $produits = produits::getAll();
    }

    public static function GetCommandeByClient($id_client) {
        $bon_c = new self;
        $bind = array("id_client" => $id_client);
        $query = "SELECT * FROM bon_commande WHERE client_id = $id_client";
        $champs = array("id");
        $res = $bon_c->StructList($query, $champs, $bind);
        $bon_c->id = reset($res)['id'];
        return $bon_c;
    }

    public static function ShowCommande() {
        $bon_c = new self;
        $query = "SELECT * FROM bon_commande ORDER BY id";
        $fields = array("id", "created_at", "client_id", "prix_total");
        $datas = $bon_c->StructList($query, $fields);
        return $datas;

    }

    public static function read() {
        $bonCommande = new self;
        $query = "SELECT *,  c.nom as client_name, c.prenom  as client_prenom FROM bon_commande b  
            LEFT JOIN clients c
            ON b.client_id = b.id";
        $champs = array("id","client_id","client_name", "client_prenom", "created_at", "prix_total");
        $res = $bonCommande->StructList($query,$champs);
        return $res;
    }


    public static function DataGrid() {
        $bon_c = new bon_commande;
        $listes = $bon_c->read();

        ?>
		<section class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Nom &amp; prenom client</th>
						<th>Prix total</th>
						<th>Modifier</th>
						<th>Supprimer</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($listes as $key => $ligne) { ?>
						<tr>
                            <td><?php echo $ligne["id"]; ?></td>
                            <td><?php echo $ligne["client_name"]; ?> <?php echo $ligne["client_prenom"]; ?></td>
							<td><?php echo $ligne["prix_total"]; ?> €</td>
							<td><button class="btn btn-warning">Modifier</button></td>
							<td><button class="btn btn-danger">Suppression</button></td>
						</tr>
					<?php } ?>
					
				</tbody>
			</table>
		</section>
	<?php }

    public static function find($id) {
        //
    }

    public static function delete($id) {
        
    }

}