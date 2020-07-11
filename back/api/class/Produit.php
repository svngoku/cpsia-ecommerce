<?php 

class produits  extends projet_global {
    use genos;
    private $table_name= "produits";
    public $id;
    public $titre;
    public $description;
    public $prix;
    public $category_id;
    public $category_name;
    public $created_at;
    public $img_produit;
    public $stock;

    public function __construct(){
        parent::__construct();
        $this->id = 0;
        $this->titre = "";
        $this->description = "";
        $this->prix = 0.00;
        $this->category_id = 0;
        $this->created_at = date('Y-m-d H:i:s');
        $this->stock = 0;
        $this->img_produit = "";
    }

    public static function getAll() {
        $p = new self;
        $req = "SELECT
        c.nom as category_name, p.id, p.titre, p.description, p.prix, p.category_id, p.created_at, p.img_produit, p.stock
        FROM produits p
            LEFT JOIN
                categories c
                ON p.category_id = c.id
            ORDER BY p.created_at DESC
        ";
        $champs = array("id","titre", "description", "prix", "category_name", "img_produit", "stock");
        $res = $p->StructList($req,$champs);
        return $res;
    }

    public static function add() {
        $produit = new produits;
        $categories = new categories();
        $listesCateg = $categories->read();
        $fields = array();
        if(isset($_POST['submit']) && $_SERVER["REQUEST_METHOD"] === "POST" ) {
            $titre = htmlentities($_POST["titre"]);
            $description = htmlspecialchars($_POST["description"]);
            $prix = htmlspecialchars($_POST["prix"]);
            $category_id = htmlentities($_POST["category_id"]);
            $stock = htmlspecialchars($_POST["stock"]);
            $fields($titre, $description, $prix,$category_id ,$stock);
            // $produit->LoadArray($fields);
    
            // $produit->Add();
        }
        ?>
            <div>
            <a href="javascript:history.go(-1)"><button class="btn btn-info btn-sm"> Retour</button></a>
                <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
                            <div class="form">
                                <div class="form-group">
                                    <?php var_dump($fields); ?>
                                </div>
                                <div class="form-group">
                                    <label for="">Titre produit</label>
                                    <input type="text" name="titre" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="Description">Description produit</label>
                                    <textarea name="description" class="form-control" required >
                                    </textarea>
                                </div>
                               <div class="form-group">
                                    <label for="Description">Catégories produit</label>
                                    <select name="category_id" class="custom-select" id="inputGroupSelect01">
                                        <option selected>Chosissez la catégorie du produit</option>
                                        <?php foreach ($listesCateg as $key => $ligne) { ?>
                                            <option value="<?php echo $ligne["id"] ?>"><?php echo $ligne["nom"] ?></option>
                                        <?php } ?>
                                    </select>
                               </div>
                                <div class="form-group">
                                    <label for="">Prix produit</label>
                                    <input type="number" name="prix" class="form-control" required >
                                </div>
                                <div class="form-group">
                                    <label for="">Stock</label>
                                    <input type="number" name="stock" class="form-control" required>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupFileAddon01">Charger</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" name="img_produit" id="img_produit" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                        <label class="custom-file-label" for="inputGroupFile01">Image pour votre produit</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Ajouter</button>
                                    <button type="reset" class="btn btn-warning" data-dismiss="modal">Annuler</button>
                                </div>
                            </div>
                            </div>
                    </form>

            </div>
        <?php
    }

    public static function DataGrid() {
        $produits = new produits;
        $listes = $produits->getAll();
        ?>
        <?php AddComponent(); ?>
		<section class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
                        <th>Titre </th>
						<th>Catégorie</th>
						<th>Description</th>
						<th>Prix</th>
						<th>Stock</th>
						<th>Modifier</th>
						<th>Supprimer</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($listes as $key => $ligne) { ?>
						<tr>
							<td><?php echo $ligne["titre"]; ?></td>
                            <td><?php echo $ligne["category_name"]; ?></td>
							<td><?php echo $ligne["description"]; ?></td>
							<td><?php echo $ligne["prix"]; ?> €</td>
                            <td><?php echo $ligne["stock"]; ?></td>
							<td>
                                <a href="?cas=update&id=<?php echo $ligne["id"] ?>"><button class="btn btn-warning" >Modifier</button></a></td>
							<td>
                            <a href="?cas=delete&id=<?php echo $ligne["id"] ?>"><button class="btn btn-danger" onclick="confirm('Voulez vous vraiment supprimer l\'élement ?')" >Suppression</button></td>
						</tr>
					<?php } ?>
					
				</tbody>
			</table>
		</section>
	<?php 

    }

    public static function edit() {
        $produit = new produits;
        $produit->id = $_GET["id"];
        $produit->Load();

        ?>
            <div>
            <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
                            <div class="form">
                                <div class="form-group">
                                    <img src="<?php echo $produit->img_produit ?>" alt="" width="200" height="200" class="rounded mx-auto d-block" >
                                </div>
                                <div class="form-group">
                                    <label for="">Titre produit</label>
                                    <input type="text" class="form-control" value="<?php echo $produit->titre ?>">
                                </div>
                                <div class="form-group">
                                <label for="">Description produit</label>
                                <textarea class="form-control" required >
                                    <?php echo $produit->description ?>
                                </textarea>
                                <div class="form-group">
                                    <label for="">Prix produit</label>
                                    <input type="number" class="form-control" value="<?php echo $produit->prix ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Stock</label>
                                    <input type="number" class="form-control" value="<?php echo $produit->stock ?>">
                                </div>

                                <div class="form-group">
                                        <button type="submit" class="btn btn-success">Mettre à jour</button>
                                        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                    </div>
                                </div>
                            </div>
                        </form>
            </div>
        <?php
    }

    public function find($id) {
        $produit = new self;
        $query = "
            SELECT 
                c.nom as category_name, p.id, p.titre, p.description, p.prix, p.category_id, p.created_at, p.img_produit 
            FROM
               produits  p
                LEFT JOIN categories c 
                    ON p.category_id = c.id
            WHERE p.id = ".$id."
        ";
        $champs = array("id","titre", "description", "prix", "category_name", "img_produit", "created_at");
        $res = $produit->StructList($query,$champs,array("id"=>$id),"json");
        return $res;
    }

    public function Delete() {
        try {
            if(isset($_GET["cas"]) && $_GET["cas"] === "delete" && isset($_GET["id"])){
                $this->id = $_GET['id'];
                $p = new self;
                $req = "DELETE FROM produits WHERE id = $this->id ";
                $p->Sql($req);
                echo "Element supprimé";
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

}