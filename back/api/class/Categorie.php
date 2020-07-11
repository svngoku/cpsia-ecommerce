<?php

class categories extends projet_global {  
    use genos;
    public $id;
    public $nom;
    public $description;
    public $created_at;
  
    public function __construct(){
        parent::__construct();
        $this->nom = "";
        $this->description = "";
    }
  
    public static function read(){
        $categorie = new categories;
        $req = "SELECT * FROM categories
            ORDER BY id;
        ";
        $champs = array("id","nom", "description");
        $res = $categorie->StructList($req,$champs);
        return $res;
    }

    public static function Datagrid(){ 
        $categorie = new categories;
        $listes = $categorie->read();
	?>
		<section class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Titre / Nom </th>
						<th>Description</th>
						<th>Modifier</th>
						<th>Supprimer</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($listes as $key => $ligne) { ?>
						<tr>
							<td><?php echo $ligne["id"]; ?></td>
							<td><?php echo $ligne["nom"]; ?></td>
							<td><?php echo $ligne["description"]; ?></td>
							<td><button class="btn btn-warning">Modifier</button></td>
							<td><button class="btn btn-danger">Suppression</button></td>
						</tr>
					<?php } ?>
					
				</tbody>
			</table>
		</section>
	<?php }


    public static function create() {
        
    }
}