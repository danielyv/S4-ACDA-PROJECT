<?php

require_once (File::build_path(array ("model","Model.php")));
require_once (File::build_path(array ("lib","Util.php")));

class ControllerFooter {

    protected static $object='footer';

    public static function faq(){
      $view = array("view", static::$object, "faq.php");
      $pagetitle='Foire Aux Questions';

      require(File::build_path(array ("view","view.php")));
    }

      public static function politique(){
        $view = array("view", static::$object, "politiqueconfi.php");
        $pagetitle='Politique de Confidentialité';

        require(File::build_path(array ("view","view.php")));
      }

      public static function contact(){
        $view = array("view", static::$object, "contact.php");
        $pagetitle='Contact';

        require(File::build_path(array ("view","view.php")));
      }

      public static function charte(){
        $view = array("view", static::$object, "charte.php");
        $pagetitle='Charte';

        require(File::build_path(array ("view","view.php")));
      }

      public static function credits(){
        $view = array("view", static::$object, "credits.php");
        $pagetitle='Crédits';

        require(File::build_path(array ("view","view.php")));
      }

      public static function conditions_util(){
        $view = array("view", static::$object, "conditions_util.php");
        $pagetitle='Condition d\'utilisation';

        require(File::build_path(array ("view","view.php")));
      }
}
 ?>
