<?php
require_once (File::build_path(array ("model","Model.php")));
require_once (File::build_path(array ("model","ModelJeuVideo.php")));
require_once (File::build_path(array ("model","ModelAnecdote.php")));
require_once (File::build_path(array ("lib","Util.php")));
require_once (File::build_path(array ("lib","Security.php")));
class ControllerJeu {

	protected static $object='jeu';

    public static function readAll() {
			$tab_jv = ModelJeuVideo::selectAll();
			foreach ($tab_jv as $key => $jv) {
				if($jv->get('valide')==0){
					unset($tab_jv[$key]);
				}
			}
			$view=array("view", static::$object, "list.php");
			$pagetitle='Liste des jeux';
			require (File::build_path(array ("view","view.php")));
    }

		public static function read() {
			$idJeu = $_GET['idJeu'];
			$jv = ModelJeuVideo::select($idJeu);
			if($jv==false){
					$view=array("view", static::$object, "errorJeu.php");
					$pagetitle='Jeu vidéo non trouvé';
				require(File::build_path(array ("view","view.php")));
			}else{
				$nomJeu=htmlspecialchars($jv->get('nomJeu'));
				$descriptifJeu=$jv->get('descriptifJeu');
				$categorieJeu=htmlspecialchars($jv->get('categorieJeu'));
				$image="./image/jeu/".$jv->get('image');
					if(Session::is_admin()){
						$modif = '
			        <a href="index.php?controller=Jeu&action=update&idJeu='.$idJeu.'" class="table-link" data-toggle="tooltip" data-placement="right" title="Modifier le jeu">
			           <span class="fa-stack">
			               <i class="fa fa-square fa-stack-2x"></i>
			               <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
			           </span>
			        </a>
			        <a href="index.php?controller=Jeu&action=delete&idJeu='.$idJeu.'" class="bouton-danger" data-toggle="tooltip" data-placement="right" title="Supprimer ce jeu">
			             <span class="fa-stack">
			                 <i class="fa fa-square fa-stack-2x"></i>
			                 <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
			             </span>
			        </a>';
					}else{$modif= "";}

				$view=array("view", static::$object, "detail.php");
				$pagetitle=$jv->get('nomJeu');
				require(File::build_path(array ("view","view.php")));
			}
    }

		public static function create(){
			if(Session::is_admin()){
				if(Conf::getDebug()){
					$postOrGet='GET';
				}else{
					$postOrGet='POST';
				}
				$view=array("view", static::$object, "create.php");
				$pagetitle='Ajouter un jeu';
				require(File::build_path(array ("view","view.php")));
			}else{
				$view = array("view", "accueil", "accueil.php");
				$pagetitle='Accueil';
				require(File::build_path(array ("view","view.php")));
			}
		}

		public static function created(){
			if(Session::is_admin()){
				if(Util::myGet('valide')==NULL){
					$valide=0;
				}else{
					$valide=Util::myGet('valide');
				}
				$up=static::upload();
				if($up[1]==''){
					$image=$up[0];
				}else{
					$view=array("view", "composant", "errorUpload.php");
					$pagetitle='Erreur upload image';
					require(File::build_path(array ("view","view.php")));
					die();
				}
				if(ModelJeuVideo::save(array(
							"nomJeu"=>Util::myGet('nomJeu'),
							"descriptifJeu"=>Util::myGet('descriptif'),
							"categorieJeu"=>Util::myGet('categorie'),
							"image"=>$image,
							"valide"=>$valide,
					))){
					$tab_jv = ModelJeuVideo::selectAll();
					foreach ($tab_jv as $key => $jv) {
						if($jv->get('valide')==0){
							unset($tab_jv[$key]);
						}
					}
					$view = array("view", static::$object, "created.php");
					$pagetitle = 'Jeu créé';
					require(File::build_path(array ("view","view.php")));
				}else{
					$tab_u = ModelJeuVideo::selectAll();
					$view=array("view", static::$object, "errorSave.php");
					$pagetitle='Jeu non sauvegardée';
					require(File::build_path(array ("view","view.php")));
				}
			}else{
				$view = array("view", "accueil", "accueil.php");
				$pagetitle='Accueil';
				require(File::build_path(array ("view","view.php")));
			}
		}

		public static function update(){
			if(Session::is_admin()){
				$res=ModelJeuVideo::select(Util::myGet('idJeu'));
				if($res!=false){
					$nomJeu=htmlspecialchars($res->get('nomJeu'));
					$categorieJeu=htmlspecialchars($res->get('categorieJeu'));
					$descriptif=htmlspecialchars($res->get('descriptifJeu'));
					$idJeu=$res->get('idJeu');
					$valide='';
					if($res->get('valide')==1){
						$valide='checked';
					}
					$view=array("view", static::$object, "update.php");
					$pagetitle='Modifier un jeu';
					require(File::build_path(array ("view","view.php")));
				}else{
					$view=array("view", static::$object, "errorSelect.php");
					$pagetitle='Erreur select';
					require(File::build_path(array ("view","view.php")));
				}
			}else{
				$view = array("view", "accueil", "accueil.php");
				$pagetitle='Accueil';
				require(File::build_path(array ("view","view.php")));
			}
		}

		public static function updated(){
			if(Session::is_admin()){
				if(Util::myGet('valide')==NULL){
					$valide=0;
				}else{
					$valide=Util::myGet('valide');
				}
				$up=static::upload();
				if($up[1]==''){
					$image=$up[0];
				}else{
					$view=array("view", "composant", "errorUpload.php");
					$pagetitle='Erreur upload image';
					require(File::build_path(array ("view","view.php")));
					die();
				}
				if(ModelJeuVideo::update(array(
							"idJeu" =>Util::myGet('idJeu'),
							"nomJeu"=>Util::myGet('nomJeu'),
							"descriptifJeu"=>Util::myGet('descriptif'),
							"categorieJeu"=>Util::myGet('categorie'),
							"image"=>$image,
							"valide"=>$valide,
					))){
					$tab_jv = ModelJeuVideo::selectAll();
					foreach ($tab_jv as $key => $jv) {
						if($jv->get('valide')==0){
							unset($tab_jv[$key]);
						}
					}
					$view = array("view", static::$object, "created.php");
					$pagetitle = 'Jeu modifé';
					require(File::build_path(array ("view","view.php")));
				}else{
					$tab_u = ModelJeuVideo::selectAll();
					$view=array("view", static::$object, "errorSave.php");
					$pagetitle='Jeu non modifié';
					require(File::build_path(array ("view","view.php")));
				}
			}else{
				$view = array("view", "accueil", "accueil.php");
				$pagetitle='Accueil';
				require(File::build_path(array ("view","view.php")));
			}
		}

		public static function delete(){
			if(Session::is_admin()){
				$idJeu = Util::myGet('idJeu');
				ModelAnecdote::updateJeu($idJeu);
	    	if (ModelJeuVideo::delete($idJeu)) {
					$tab_jv = ModelJeuVideo::selectAll();
					foreach ($tab_jv as $key => $jv) {
						if($jv->get('valide')==1 || $jv->get('idJeu')==1){
							unset($tab_jv[$key]);
						}
					}
	        $view = array("view", static::$object, "listNonValide.php");
	        $pagetitle = 'Jeu supprimé';
	        require (File::build_path(array ("view","view.php")));
	    	} else {
	        $view=array("view", static::$object, "erreurDelete.php");
	        $pagetitle='Erreur suppression';
	    		require (File::build_path(array ("view","view.php")));
	    	}
			}else{
				$view = array("view", "accueil", "accueil.php");
				$pagetitle='Accueil';
				require(File::build_path(array ("view","view.php")));
			}
		}

		public static function readValide(){
			$tab_jv = ModelJeuVideo::selectAll();
			foreach ($tab_jv as $key => $jv) {
				if($jv->get('valide')==1 || $jv->get('idJeu')==1){
					unset($tab_jv[$key]);
				}
			}
			$view=array("view", static::$object, "listNonValide.php");
			$pagetitle='Liste des jeux non validé';
			require (File::build_path(array ("view","view.php")));
		}

		public static function autocomplete(){
			if(!empty($_POST["keyword"])){
				$res=ModelJeuVideo::autocomplete($_POST["keyword"]);
				require(File::build_path(array ("view","jeu","autocomplete.php")));
			}
		}

		public static function upload(){
      if(isset($_SESSION['login']) && Session::is_admin($_SESSION['login'])){
				if(empty($_POST['image'])){
					return array('gameDefault.jpg','');
				}
        $maxwidth=720;
        $maxheight=720;
        $maxsize=10000000;
        $erreur='';
        $image='';
        if (isset($_FILES['image']) && $_FILES['image']['error'] > 0){
            $erreur= "Erreur lors du transfert";
        }else if ($_FILES['image']['size'] > $maxsize){
           $erreur= "Le fichier est trop gros";
        }else{
            $extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
            $extension_upload = strtolower(  substr(  strrchr($_FILES['image']['name'], '.')  ,1)  );
            if (!in_array($extension_upload,$extensions_valides) ){
                $erreur= "L'extention du fichier est mauvaise";
            }else {
                $image_sizes = getimagesize($_FILES['image']['tmp_name']);
                if ($image_sizes[0] > $maxwidth OR $image_sizes[1] > $maxheight){
                    $erreur= "Image trop grande";
                }else{
                    $image="{$_POST['nomJeu']}.{$extension_upload}";
                    $nom = "image/jeu/$image";
                    $resultat = move_uploaded_file($_FILES['image']['tmp_name'],$nom);
                    if (!$resultat){
                        $erreur="Transfert échoué :(";
                    }else{
                        return array($image,$erreur);
                    }
                }
            }
				}
			}else{
						$view = array("view","accueil", "accueil.php");
						$pagetitle='Accueil';
						require(File::build_path(array ("view","view.php")));
					}
    }
}
?>
