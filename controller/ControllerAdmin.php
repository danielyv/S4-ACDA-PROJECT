<?php
require_once (File::build_path(array ("model","Model.php")));
require_once (File::build_path(array ("lib","Util.php")));
require_once (File::build_path(array ("lib","Security.php")));

class ControllerAdmin {

	protected static $object='admin';



    public static function readAll() {
			if(isset($_SESSION['login']) && Session::is_admin($_SESSION['login'])){

        $view=array("view", static::$object, "list.php");
        $pagetitle='Panneau d\'administration';
        require (File::build_path(array ("view","view.php")));
			}else{
				 header('Location:index.php');
			}
    }




}
?>
