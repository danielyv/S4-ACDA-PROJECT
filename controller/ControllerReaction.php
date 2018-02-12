<?php
require_once (File::build_path(array ("model","Model.php")));
require_once (File::build_path(array ("model","ModelReactionAnec.php")));
require_once (File::build_path(array ("model","ModelAnecdote.php")));
require_once (File::build_path(array ("lib","Util.php")));
require_once (File::build_path(array ("lib","Security.php")));
class ControllerReaction {

	protected static $object='reaction';

//Fonction permettant d'ajouter une réaction à une anecdote
		public static function addReact(){
			if(isset($_SESSION['login'])){//On peut ajouté une réaction que en étant connecté
				//On regarde si l'utilisateur avait déjà mis une réaction pour cette anecdote
				$res=ModelReactionAnec::select(array("idLogin" => $_SESSION['login'],
				"idAnecReac" => $_POST['idAnecdote']));
				if($res!=false){//Si il y en avait déjà une
					ModelReactionAnec::delete(array("idLogin" => $_SESSION['login'],//On la supprime
					"idAnecReac" => $_POST['idAnecdote']));
					//On décrémente le compteur de réaction de 1
					self::addNbReact($res->get('typeReacAnec'),$_POST['idAnecdote'],-1);
					//Si la réaction est différente que celle qui était déjà là alors
					if($res->get('typeReacAnec')!=$_POST['valeur']){
						ModelReactionAnec::save(array(//On enregistre la nouvelle réaction
							"idLogin" => $_SESSION['login'],
							"idAnecReac" => $_POST['idAnecdote'],
							"typeReacAnec" => $_POST['valeur'],
						));
						//On incrémente le compteur de réaction
						self::addNbReact($_POST['valeur'],$_POST['idAnecdote'],1);
						print "true";//On renvoie true au Javascript
					}
				}else{//Si c'est la première réaction qu'il ajoute à l'anecdote alors
					ModelReactionAnec::save(array(//On l'enregistre
						"idLogin" => $_SESSION['login'],
						"idAnecReac" => $_POST['idAnecdote'],
						"typeReacAnec" => $_POST['valeur'],
					));
					//On incrémente le compteur de réaction
					self::addNbReact($_POST['valeur'],$_POST['idAnecdote'],1);
					print "true";//On renvoie true au Javascript
				}
			}
		}

		private static function addNbReact($reac, $idAnecdote, $value){
			if($reac==0){
				ModelAnecdote::addNbReact($idAnecdote,'nbLike',$value);
			}elseif($reac==1){
				ModelAnecdote::addNbReact($idAnecdote,'nbLove',$value);
			}elseif($reac==2){
				ModelAnecdote::addNbReact($idAnecdote,'nbJpp',$value);
			}elseif($reac==3){
				ModelAnecdote::addNbReact($idAnecdote,'nbOh',$value);
			}elseif($reac==4){
				ModelAnecdote::addNbReact($idAnecdote,'nbSad',$value);
			}elseif($reac==5){
				ModelAnecdote::addNbReact($idAnecdote,'nbGrr',$value);
			}
		}
}
?>
