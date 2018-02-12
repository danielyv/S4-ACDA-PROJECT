<?php
require_once (File::build_path(array ("model","Model.php")));
require_once (File::build_path(array ("model","ModelUtilisateur.php")));
require_once (File::build_path(array ("model","ModelAnecdote.php")));
require_once (File::build_path(array ("lib","Util.php")));
require_once (File::build_path(array ("lib","Security.php")));
class ControllerUtilisateur {

	protected static $object='utilisateur';

    public static function connect() {
        $view=array("view", static::$object, "connect.php");
        $pagetitle='Connexion';
        require (File::build_path(array ("view","view.php")));
    }

    public static function connected(){
    	if($_GET['login']=='' || $_GET['mdp']==''){
	    	$view=array("view", static::$object, "erreurConnect.php");
		    $pagetitle='Erreur connexion';
		    require (File::build_path(array ("view","view.php")));
	    	}else if(ModelUtilisateur::checkPassword($_GET['login'],Security::chiffrer($_GET['mdp']))){
						$u=ModelUtilisateur::select($_GET['login']);
						if($u->get('nonce')==NULL){
			    		$_SESSION['login'] = $_GET['login'];
			    		if($u->get('admin')==1){
			    			$_SESSION['admin'] = true;
			    		}else{
			    			$_SESSION['admin'] = false;
			    		}
							$login = $_GET['login'];
							$login=htmlspecialchars($u->get('login'));
							$pseudo=htmlspecialchars($u->get('pseudo'));
							$mail=htmlspecialchars($u->get('email'));
							$sexe=htmlspecialchars($u->get('sexe'));
							$profession=htmlspecialchars($u->get('profession'));
							$urlLogin=rawurlencode($u->get('login'));
							$tab_a=ModelAnecdote::selectUser($login);
							$up = "";
							if(Session::is_user($login) || Session::is_admin($login)){
								$up = '<a href="?controller=utilisateur&action=update&login='.$urlLogin.'">Cliquer ici pour mettre à jour votre profil</a> <br>  <a href="?controller=utilisateur&action=delete&login='.$urlLogin.'">Cliquer ici pour supprimer votre profil</a>';
							}
			    		$view=array("view", static::$object, "connected.php");
			        $pagetitle='Connexion réussie';
			       	require (File::build_path(array ("view","view.php")));
						}else{
							$view=array("view", static::$object, "errorNonce.php");
					    $pagetitle='Email non validé';
					    require (File::build_path(array ("view","view.php")));
						}
   			}else{
	   			$view=array("view", static::$object, "erreurConnect.php");
			    $pagetitle='Erreur connexion';
			    require (File::build_path(array ("view","view.php")));
   			}
    }

    public static function deconnect(){
    	session_destroy();
      header('Location:index.php');
    }

		public static function validate(){
			$u=ModelUtilisateur::select($_GET['login']);
			if($u!=false && $u->get('nonce')==$_GET['nonce']){
				if(ModelUtilisateur::update(array(
						"login" => $_GET['login'],
						"nonce" => NULL,
					))){
						$view=array("view", static::$object, "validate.php");
						$pagetitle='Email validé';
						require (File::build_path(array ("view","view.php")));
					}else{
						$view=array("view", static::$object, "errorUpdate.php");
						$pagetitle='Utilisateur non maj';
						require(File::build_path(array ("view","view.php")));
					}
			}else{
				$view=array("view", static::$object, "errorValidate.php");
				$pagetitle='Erreur validation email';
				require(File::build_path(array ("view","view.php")));
			}
		}

    public static function readAll() {
			if(isset($_SESSION['login']) && Session::is_admin($_SESSION['login'])){
        $tab_u = ModelUtilisateur::selectAll();
        $view=array("view", static::$object, "list.php");
        $pagetitle='Liste des Utilisateurs';
        require (File::build_path(array ("view","view.php")));
			}else{
				 header('Location:index.php');
			}
    }
     public static function read() {
        $login = $_GET['login'];
        $u = ModelUtilisateur::select($login);
        if($u==false){
            $view=array("view", static::$object, "errorUser.php");
            $pagetitle='Utilisateur non trouvé';
        	require(File::build_path(array ("view","view.php")));
        }else{
						$login=htmlspecialchars($u->get('login'));
						$pseudo=htmlspecialchars($u->get('pseudo'));
						$mail=htmlspecialchars($u->get('email'));
						$sexe=htmlspecialchars($u->get('sexe'));
						$profession=htmlspecialchars($u->get('profession'));
						$urlLogin=rawurlencode($u->get('login'));
						$tab_a=ModelAnecdote::selectUser($login);
            $view=array("view", static::$object, "detail.php");
            $pagetitle='Détail d\'un Utilisateur';
    	    	require(File::build_path(array ("view","view.php")));
 				}
    }

  	public static function create(){
			$admin='';
			if(isset($_SESSION['login']) && Session::is_admin($_SESSION['login'])){
				$admin='<div class="form-group">
		      <label class="col-lg-2 control-label">Administrateur</label>
		        <input type="checkbox" class="form-check-input" name="admin" value="1">
		    </div>';
			}
			if(Conf::getDebug()){
				$postOrGet='GET';
			}else{
				$postOrGet='POST';
			}
      		$view=array("view", static::$object, "create.php");
      		$pagetitle='Inscription';
    			require(File::build_path(array ("view","view.php")));
    }

    public static function created(){
    		$login=Util::myGet('login');
				if(filter_var(Util::myGet('email'),FILTER_VALIDATE_EMAIL)==false){
					$view = array("view", static::$object, "errorEmail.php");
					$pagetitle = 'Erreur Email';
					require(File::build_path(array ("view","view.php")));
				}
        if(Util::myGet('mdp')!=Util::myGet('confMdp')){
					$view = array("view", static::$object, "connect.php"); /*errorMdp.php*/
	        $pagetitle = 'Erreur mot de passe';
	        require(File::build_path(array ("view","view.php")));
        }else{
					if(isset($_SESSION['login']) && Session::is_admin($_SESSION['login'])){
						$admin=Util::myGet('admin');
					}else{
						$admin='0';
					}
					$nonce=Security::generateRandomHex();
		    	if(ModelUtilisateur::save(array(
		            "login"=>$login,
		            "mdp"=>Security::chiffrer(Util::myGet('mdp')),
								"pseudo"=>Util::myGet('pseudo'),
		            "email"=>Util::myGet('email'),
		            "admin"=>$admin,
								"nonce"=>$nonce,
		            "sexe"=>Util::myGet('sexe'),
								"profession"=>Util::myGet('profession'),
		       ))==false){
						$tab_u = ModelUtilisateur::selectAll();
						if(Conf::getDebug()){
							$postOrGet='GET';
						}else{
							$postOrGet='POST';
						}
						$admin='';
						if(isset($_SESSION['login']) && Session::is_admin($_SESSION['login'])){
							$admin='<div class="form-group">
					      <label class="col-lg-2 control-label">Administrateur</label>
					        <input type="checkbox" class="form-check-input" name="admin" value="1">
					    </div>';
						}
		        $view=array("view", static::$object, "errorSave.php");
		        $pagetitle='Inscription';
		    		require(File::build_path(array ("view","view.php")));
		    	}else{
						$mail='Mail de validation de REV, Cliquez ici pour valider votre compte : https://webinfo.iutmontp.univ-montp2.fr/~phunvongm/videoludique/?controller=utilisateur&action=validate&login='.$login.'&nonce='.$nonce.'"';
						if(mail(Util::myGet('email'),"Validation de votre compte REV",$mail)){
							$tab_u = ModelUtilisateur::selectAll();
			        $view = array("view", static::$object, "created.php");
			        $pagetitle = 'Utilisateur créé';
			        require(File::build_path(array ("view","view.php")));
						}else{
							$view = array("view", static::$object, "errorSendEmail.php");
							$pagetitle = 'Erreur envoi email';
							require(File::build_path(array ("view","view.php")));
						}
		  		}
		  	}
    }

    public static function update(){
    	if(!isset($_SESSION['login'])){
    			$view=array("view", static::$object, "connect.php");
	      	$pagetitle='Connexion';
	      	require(File::build_path(array ("view","view.php")));
	    }else if(!Session::is_admin($_SESSION['login']) && !Session::is_user(Util::myGet('login'))){
	    	header('Location:index.php');
	    }else{
	        $login=Util::myGet('login');
	        $Utilisateur = ModelUtilisateur::select($login);
	        if($Utilisateur==false){
	            $view=array("view", static::$object, "errorUser.php");
	            $pagetitle='Utilisateur non trouvé';
	            require(File::build_path(array ("view","view.php")));
	        }else{
							$admin='';
							if(Session::is_admin($_SESSION['login'])){
								$checked='';
								if($Utilisateur->get('admin')==1){
									$checked='checked';
								}
								$admin='<div class="form-group">
						      <label class="col-lg-2 control-label">Administrateur</label>
						        <input type="checkbox" class="form-check-input" name="admin" value="1" '.$checked.'>
						    </div>';
							}
							if(Conf::getDebug()){
								$postOrGet='GET';
							}else{
								$postOrGet='POST';
							}
	            $view=array("view", static::$object, "update.php");
	            $pagetitle='Formulaire maj Utilisateur';
	            require(File::build_path(array ("view","view.php")));
	        }
    	}
    }

    public static function updated(){
    	if(!isset($_SESSION['login'])){
    			$view=array("view", static::$object, "connect.php");
	        $pagetitle='Connexion';
	        require(File::build_path(array ("view","view.php")));
	    }else if(!Session::is_admin($_SESSION['login']) && !Session::is_user(Util::myGet('login'))){
	    	header('Location:index.php');
	    }else{
					if(filter_var(Util::myGet('email'),FILTER_VALIDATE_EMAIL)==false){
						$view = array("view", static::$object, "errorEmail.php");
						$pagetitle = 'Erreur Email';
						require(File::build_path(array ("view","view.php")));
					}
					$login=Util::myGet('login');
					if(!is_null(Util::myGet('admin'))){
						$admin=Util::myGet('admin');
					}else{
						$admin='0';
					}
	        if(ModelUtilisateur::select($login)){
	            $res=ModelUtilisateur::update(array(
								"login"=>$login,
								"mdp"=>Security::chiffrer(Util::myGet('mdp')),
								"pseudo"=>Util::myGet('pseudo'),
								"email"=>Util::myGet('email'),
								"admin"=>$admin,
								"sexe"=>Util::myGet('sexe'),
								"profession"=>Util::myGet('profession'),
	                ));
	            if($res){
									$login = $_GET['login'];
									$u = ModelUtilisateur::select($login);
									$login=htmlspecialchars($login);
									$urlLogin=rawurlencode($u->get('login'));
									$up = "";
									if(Session::is_user($login) || Session::is_admin($login)){
										$up = '<a href="?controller=utilisateur&action=update&login='.$urlLogin.'">Cliquer ici pour mettre à jour votre profil</a> <br>  <a href="?controller=utilisateur&action=delete&login='.$urlLogin.'">Cliquer ici pour supprimer votre profil</a>';
									}
	                $view = array("view", static::$object, "updated.php");
	                $pagetitle = 'Utilisateur mis à jour';
	                require(File::build_path(array ("view","view.php")));
	            }else{
	                $view=array("view", static::$object, "errorUpdate.php");
	                $pagetitle='Utilisateur non maj';
	                require(File::build_path(array ("view","view.php")));
	            }
	        }else{
	            $view=array("view", static::$object, "errorUser.php");
	            $pagetitle='Utilisateur non trouvé';
	            require(File::build_path(array ("view","view.php")));
	        }
	    }
    }

    public static function delete(){
    	if(!isset($_SESSION['login'])){
    		$view=array("view", static::$object, "connect.php");
	      $pagetitle='Connexion';
	      require(File::build_path(array ("view","view.php")));
	    }else if(!Session::is_admin() && !Session::is_user(Util::myGet('login'))){
	    	header('Location:index.php');
	    }else{
	    	$login = Util::myGet('login');
	    	if (ModelUtilisateur::delete($login)) {
					if(Session::is_user($login))self::deconnect();
	        $tab_u = ModelUtilisateur::selectAll();
	        $view = array("view", static::$object, "deleted.php");
	        $pagetitle = 'Utilisateur supprimé';
	        require (File::build_path(array ("view","view.php")));
	    	}else{
	        $view=array("view", static::$object, "erreurDelete.php");
	        $pagetitle='Erreur suppression';
	    		require (File::build_path(array ("view","view.php")));
	    	}
	    }
    }
}
?>
