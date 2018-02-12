<?php
require_once (File::build_path(array ("model","Model.php")));
require_once (File::build_path(array ("model","ModelAnecdote.php")));
require_once (File::build_path(array ("model","ModelJeuVideo.php")));
require_once (File::build_path(array ("model","ModelReactionAnec.php")));
require_once (File::build_path(array ("lib","Util.php")));
require_once (File::build_path(array ("lib","Security.php")));
class ControllerAnecdote {

	protected static $object='anecdote';

	public static function readAll(){
			$tab_a=array();
			$nomJeu=Util::myget('jeu');
			$idAnecdote=Util::myGet('idAnecdote');
			$jeu=ModelJeuVideo::selectNom($nomJeu);
			if($jeu==false || empty($nomJeu))	$idJeu=NULL;
			else $idJeu=$jeu->get('idJeu');
			if(!empty($idAnecdote)){
				$tab_a=ModelAnecdote::selectAll('date', $idJeu, 0, $idAnecdote);
			}elseif(Util::myget('trie')=='titre') {
				$tab_a=ModelAnecdote::selectAll('titre', $idJeu);
			}elseif (Util::myget('trie')=='reaction') {
				$tab_a=ModelAnecdote::selectTop($idJeu);
			}elseif (Util::myget('trie')=='aleatoire') {
				$tab_a=array(ModelAnecdote::getAleatoire());
			}elseif (Util::myget('trie')=='date'){
				$tab_a=ModelAnecdote::selectAll('date', $idJeu);
			}
			$view=array("view", static::$object, "list.php");
			$pagetitle='Anecdotes';
			require (File::build_path(array ("view","view.php")));
		}

		public static function readBrouillon(){
			if(isset($_SESSION['login'])){
				$tab_a=ModelAnecdote::selectBrouillon($_SESSION['login']);
				$view=array("view", static::$object, "listBrouillon.php");
				$pagetitle='Liste brouillon';
				require(File::build_path(array ("view","view.php")));
			}else{
				$view = array("view", 'accueil', "accueil.php");
				$pagetitle='Accueil';
				require(File::build_path(array ("view","view.php")));
			}
		}

  public static function create(){
			if(isset($_SESSION['login'])){
				if(Conf::getDebug()){
					$postOrGet='GET';
				}else{
					$postOrGet='POST';
				}
				$view=array("view", static::$object, "create.php");;
				$pagetitle='Ajouter une anecdote';
				require(File::build_path(array ("view","view.php")));
			}else{
				$view = array("view", 'accueil', "accueil.php");
				$pagetitle='Accueil';
				require(File::build_path(array ("view","view.php")));
			}
    }

//Fonction permettant d'enregistrer une anecdote dans la BD
  public static function created(){
			if(isset($_SESSION['login'])){ //Si le user les connecté
				$jeu=ModelJeuVideo::selectNom(Util::myGet('jeu'));//Selection du jeu
				// entré par l'utilisateur si il existe
				$publie=0;
				if($jeu==false){//Si il n'exsite pas alors
					if(!ModelJeuVideo::save(array(//On enregistre un nouveau jeu dans la
						//base de donnée, jeu non valide
								"nomJeu"=>Util::myGet('jeu'),
								"valide"=>0,
						))){
							//Affichage page d'erreur si enregistrement fail
							$view=array("view", static::$object, "errorSave.php");
							$pagetitle='Jeu non sauvegardé';
							require(File::build_path(array ("view","view.php")));
							die();
						}else{
							//On selectionne le jeu qui vient d'être crée
							$jeu=ModelJeuVideo::selectNom(Util::myGet('jeu'));
						}
						//Si l'utilisateur a rentré un jeu valide alors on respecte
						//son choix de soit publier l'anecdote, soit la mettre dans les brouillons
				}elseif ($jeu->get('valide')==1){
					$publie=Util::myGet('publie');
				}//Sinon on garde publie à 0 et donc on enregistre son jeu dans les brouillons
				$idJeu=$jeu->get('idJeu');//Selection de l'id du jeu
				$id=uniqid();//Génération de l'ID de l'anecdote
				if(ModelAnecdote::save(array(//Enregistrement de l'anecdote
							"idAnecdote"=>$id,
							"titre"=>Util::myGet('titre'),
							"texte"=>Util::myGet('texte'),
							"categorie"=>Util::myGet('categorie'),
							"idJeu" => $idJeu,
							"idLogin"=>$_SESSION['login'],
							"publie" => $publie,
							"joie"=>Util::myGet('joie'),
							"peur"=>Util::myGet('peur'),
							"colere"=>Util::myGet('colere'),
							"degout"=>Util::myGet('degout'),
							"tristesse"=>Util::myGet('tristesse'),
							"surprise"=>Util::myGet('surprise'),
					))==false){
						//Affichage page erreur enregistrement
					$tab_u = ModelAnecdote::selectAll();
					$view=array("view", static::$object, "errorSave.php");;
					$pagetitle='Anecdote non sauvegardée';
					require(File::build_path(array ("view","view.php")));
				}elseif(Util::myGet('publie')==0){
					//Affichage page si enregistré dnas les brouillons
					header("Location: index.php?controller=anecdote&action=readBrouillon");
				}elseif($jeu->get('valide')==0){
					//Affichage page si jeu non validé donc on ne peux pas publier
					$tab_a=ModelAnecdote::selectBrouillon($_SESSION['login']);
					$view=array("view", static::$object, "nonPublie.php");
					$pagetitle='Anecdote non publiée';
					require(File::build_path(array ("view","view.php")));
				}else{
					//Affichage de l'anecdote si publié
					header("Location: index.php?controller=anecdote&action=readAll&idAnecdote=$id");
				}
			}else{
				//Si l'utilisateur n'est pas connecté retour à la page d'accueil
				header('Location: index.php');
			}
    }

  public static function update(){
  		$idAnecdote=Util::myGet('idAnecdote');
  		$a=ModelAnecdote::select($idAnecdote);
  		$user=$a->get('idLogin');
  		$publie=$a->get('publie');
		if (Session::is_admin() || (Session::is_user($user) && $publie==0)) {
			if(Conf::getDebug()){
				$postOrGet='GET';
			}else{
				$postOrGet='POST';
			}
			$titre=htmlspecialchars($a->get('titre'));
			$texte=htmlspecialchars($a->get('texte'));
			$categorie=htmlspecialchars($a->get('categorie'));
			$jeuRes=ModelJeuVideo::select($a->get('idJeu'));
			$jeu=htmlspecialchars($jeuRes->get('nomJeu'));
			$joie=htmlspecialchars($a->get('joie'));
			$colere=htmlspecialchars($a->get('colere'));
			$peur=htmlspecialchars($a->get('peur'));
			$tristesse=htmlspecialchars($a->get('tristesse'));
			$degout=htmlspecialchars($a->get('degout'));
			$surprise=htmlspecialchars($a->get('surprise'));
			$view = array("view", static::$object, "update.php");
			$pagetitle = 'Modification brouillon';
			require File::build_path(array("view", "view.php"));
		}else {
			$view = array("view", "accueil", "accueil.php");
			$pagetitle = 'Accueil';
			require File::build_path(array('view', 'view.php'));
		}
  }

  public static function updated(){
			$idAnecdote=Util::myGet('idAnecdote');
			$a=ModelAnecdote::select($idAnecdote);
			$user=$a->get('idLogin');
			$publie=$a->get('publie');
			if (Session::is_admin() || (Session::is_user($user) && $publie==0)) {
				$bool=false;
				$jeu=ModelJeuVideo::selectNom(Util::myGet('jeu'));
				$publie=0;
				if($jeu==false){
					if(!ModelJeuVideo::save(array(
								"nomJeu"=>Util::myGet('jeu'),
								"valide"=>0,
						))){
							$view=array("view", static::$object, "errorSave.php");
							$pagetitle='Jeu non sauvegardé';
							require(File::build_path(array ("view","view.php")));
							die();
						}else{
							$bool=true;
							$jeu=ModelJeuVideo::selectNom(Util::myGet('jeu'));
						}
				}elseif ($jeu->get('valide')==1){
					$publie=Util::myGet('publie');
				}
				$idJeu='';
				if(!is_bool($jeu)){
					$idJeu=$jeu->get('idJeu');
				}
				$id=Util::myGet('idAnecdote');
				$values = array(
	        'idAnecdote' => $id ,
	        'titre' => Util::myGet('titre'),
	        'texte' => Util::myGet('texte'),
	        'categorie' => Util::myGet('categorie'),
	        'idJeu' => $idJeu,
	        'publie' => $publie,
	        'joie' => Util::myGet('joie'),
	        'peur' => Util::myGet('peur'),
	        'colere' => Util::myGet('colere'),
	        'degout' => Util::myGet('degout'),
	        'tristesse' => Util::myGet('tristesse'),
	        'surprise' => Util::myGet('surprise'),
	      );
				if(ModelAnecdote::update($values)==false){
					$tab_u = ModelAnecdote::selectAll();
					$view=array("view", static::$object, "errorSave.php");;
					$pagetitle='Anecdote non sauvegardée';
					require(File::build_path(array ("view","view.php")));
				}elseif(Util::myGet('publie')==0){
					header("Location: index.php?controller=anecdote&action=readBrouillon");
				}elseif($bool==true || $jeu->get('valide')==0){
					$tab_a=ModelAnecdote::selectBrouillon($_SESSION['login']);
					$view=array("view", static::$object, "nonPublie.php");
					$pagetitle='Anecdote non publiée';
					require(File::build_path(array ("view","view.php")));
				}elseif($bool==false){
					header("Location: index.php?controller=anecdote&action=readAll&idAnecdote=$id");
				}
	  }else{
			header('Location: index.php');
		}
	}

  public static function delete(){
		$a=ModelAnecdote::select(Util::myGet('idAnecdote'));
		if(Session::is_admin($_SESSION['login']) || Session::is_user($a->get('idLogin'))){
			ModelAnecdote::delete(Util::myGet('idAnecdote'));
			$tab_a=ModelAnecdote::selectBrouillon($_SESSION['login']);
			$view = array("view", static::$object, "listBrouillon.php");
			$pagetitle = 'Brouillons';
			require File::build_path(array('view', 'view.php'));
		}else{
			header('Location: index.php');
		}
  }

	public static function report(){
			$idAnecdote=Util::myGet("");
			$view = array("view", static::$object, "report.php");
			$pagetitle = 'signalement';
			require File::build_path(array('view', 'view.php'));//erreur a faire
	}

	public static function reported(){ //idLogin, idAnecSignal, typeSignalAnec, descriptifSignalAnec
			if(!isset($_SESSION['login'])){
				$view=array('view', 'error.php');
				$pagetitle="erreur";
				require File::build_path(array('view', 'view.php'));
			}else{
				if(ModelAnecdote::dejaSignale($_SESSION['login'], Util::myGet('idAnec'))){
					echo "Vous avez déjà signalé cette anecdote";
				}else {
					$values= array(
						'user' => $_SESSION['login'] ,
						'anec' => Util::myGet('idAnec'),
						'type' => Util::myGet('type') ,
						'descAnec' => Util::myGet('explications') ,
					);
					//Util::aff($values);
					ModelAnecdote::signalerAnec($values);
					echo "Anecdote signalée avec succès";
				}

			}
	}

	public static function readAllReport(){
		if(Session::is_admin()){
			$tab_report=ModelAnecdote::getAllReport();
			for ($i=0; $i < count($tab_report); $i++) {
				$title=ModelAnecdote::getTitleById($tab_report[$i]['idAnecSignal']);
				$tab_report[$i]['title']=$title[0]['titre'];
			}
			$view=array('view', 'report', 'list.php');
			$pagetitle="Tous les signalements";
			require File::build_path(array('view', 'view.php'));
		}else{
			header('Location: index.php');
		}
	}

	public static function readOneReport(){
		if(Session::is_admin()){
			$idAnecdote=Util::myGet("idAnecdote");
			$tab_detail=ModelAnecdote::getReportById($idAnecdote);
			$view=array('view', 'report', 'detail.php');
			$pagetitle="Detail d'un signalement";
			require File::build_path(array('view', 'view.php'));
		}else{
			header('Location: index.php');
		}
	}

	public static function deleteReport(){
		if(Session::is_admin()){
			$idAnec=Util::myGet("idAnec");
			ModelAnecdote::deleteReportById($idAnec);
			$view=array('view', 'report', 'deleted.php');
			$pagetitle="Signalement supprimé";
			require File::build_path(array('view', 'view.php'));
		}else{
			header('Location: index.php');
		}
	}

	public static function infiniteScroll(){
			$offset=intval($_POST["offset"]);
			$trie=Util::myget('trie');
			$nomJeu=Util::myget('jeu');
			$jeu=ModelJeuVideo::selectNom($nomJeu);
			if($jeu!=false) $idJeu=$jeu->get('idJeu');
			else $idJeu=NULL;
			$tab_a=array();
			if($trie=='titre') {
				$tab_a=ModelAnecdote::selectAll('titre',$idJeu, $offset);
			}elseif ($trie=='reaction') {
				$tab_a=ModelAnecdote::selectTop($idJeu,$offset);
			}elseif ($trie=='nbmots') {
				$tab_a=ModelAnecdote::selectAll('nbmots', $idJeu, $offset);
			}elseif ($trie=='date'){
				$tab_a=ModelAnecdote::selectAll('date', $idJeu, $offset);
			}
			foreach ($tab_a as $a){
			    require(File::build_path(array ("view","anecdote","anecdote.php")));
			}
	}
}
?>
