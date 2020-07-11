<?php 

class clients extends \projet_global {
    use genos;
    public $id;
    public $nom;
    public $prenom;
    public $email;
    public $created_at;

    public function __construct()
    {
        parent::__construct();
        $this->id= 0;
        $this->nom = "";
        $this->prenom = "";
        $this->email = "";
        $this->created_at = null;
    }

    public static function GetListe(){
        $clients = new clients;
        $query = "SELECT * FROM clients ORDER BY id";
        $champs = array("id","nom", "prenom", "email","created_at");
        $res = $clients->StructList($query,$champs);
        return $res;
    }

    public static function addClient() {
        $message = "";
        // $nom = trim($_POST["nom"]);
        // $prenom = trim($_POST["prenom"]);
        // $email = trim($_POST["email"]);
        $datasList = array();
        if(isset($_POST['submit'])) {
            if(!empty($_POST["nom"] && !empty($_POST["prenom"]) && !empty($_POST["email"]))) {
                $client = new clients;
                $client->Set("nom",$_POST["nom"]);
                $client->Set("prenom",$_POST["prenom"]);
                $client->Set("email",$_POST["email"]);
                $fn = $client->Get("nom");
                var_dump($fn);
            } else {
                $message = "Certaines valeurs ne sont pas définies";
            }
        } else {
            $message = "Les champs doivent contenir des infos valides";
        }
        echo $message;
        ?>
            <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-6 pb-5">
                <form action="<?php echo htmlentities($_SERVER["PHP_SELF"]) ?>" method="POST">
                    <div class="card rounded-0">
                        <div class="card-header p-0 border-bottom-0">
                        <div class="bg-brey text-white text-center py-2">
                            <p class="m-0">Informations sur le client</p>
                        </div>
                        </div>
                        <div class="card-body  bg-all p-3">
                        <div class="form-group">
                            <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fa fa-user text-info animated fadeInLeft"></i></div>
                            </div>
                            <input type="text" class="form-control" id="nom" name="nom" value="<?php $nom ?>" placeholder="nom" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fa fa-user text-info animated fadeInLeft"></i></div>
                            </div>
                            <input type="text" class="form-control" id="prenom" name="prenom" value="<?php $prenom ?>" placeholder="Prenom" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fa fa-envelope text-info animated fadeInLeft"></i></div>
                            </div>
                            <input type="email" class="form-control" id="email" value="<?php $email ?>" name="email" placeholder="Email" required>
                            </div>
                        <div class="text-center">
                            <button type="reset" class="btn btn-secondary">Annuler</button>
                            <button type="submit" class="btn btn-success">Ajouter</button>
                        </div>
                        </div>
            
                    </div>
                    </form>
                </div>
                </div>
            </div>
        <?php
    }

    public static function Datagrid(){ 
        $clients = new clients;
        $listes = $clients->GetListe();
	?>
		<section class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Prenom &amp; Nom</th>
						<th>Email</th>
						<th>Modifier</th>
						<th>Supprimer</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($listes as $key => $ligne) { ?>
						<tr>
							<td><?php echo $ligne["id"]; ?></td>
							<td><?php echo $ligne["nom"]; ?> <?php echo strtoupper($ligne["prenom"]); ?></td>
							<td><?php echo $ligne["email"]; ?></td>
							<td><button class="btn btn-warning">Modifier</button></td>
							<td><button class="btn btn-danger">Suppression</button></td>
						</tr>
					<?php } ?>
					
				</tbody>
			</table>
		</section>
	<?php }



    public function find($id) {
        $client = new self;
        $bind = array("id" => $id);
        $req = "SELECT * FROM client WHERE id= :id";
        $champs = array("id","email");
        $res = $client->StructList($req, $champs, $bind);
        $client->id = reset($res)['id'];
        $client->email = reset($res)['email'];
        return $client;
    }

    // public  function update($id) 
    // {
        
    // }

    // public static function delete($id) {
    //     $p = new self;
    //     $req = "DELETE FROM clients WHERE id = $id ";
    //     $p->Sql($req);
    // }

    
}