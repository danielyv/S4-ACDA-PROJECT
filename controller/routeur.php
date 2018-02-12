<?php
require_once (File::build_path(array ("controller","ControllerUtilisateur.php")));
require_once (File::build_path(array ("controller","ControllerAnecdote.php")));
require_once (File::build_path(array ("controller","ControllerAccueil.php")));
require_once (File::build_path(array ("controller","ControllerJeu.php")));
require_once (File::build_path(array ("controller","ControllerAdmin.php")));
require_once (File::build_path(array ("controller","ControllerReaction.php")));
require_once (File::build_path(array ("controller","ControllerRapport.php")));
require_once (File::build_path(array ("controller","ControllerFooter.php")));
require_once (File::build_path(array ("controller","Controller.php")));

$controller_default="accueil";
if(!is_null(Util::myGet('controller'))){
	$controller_class = 'Controller'.ucfirst(Util::myGet('controller'));
}else{
	$controller_class = 'Controller'.ucfirst($controller_default);
}
if(class_exists($controller_class)){
	if(!is_null(Util::myGet('action'))){
		$action = Util::myGet('action');    // recupère l'action passée dans l'URL
	}else{
		$action = 'readAll';
	}
	if(in_array($action, get_class_methods($controller_class))){
		$controller_class::$action();
	}else{
		Controller::error();
	}
}else{
	Controller::error();
}
?>
