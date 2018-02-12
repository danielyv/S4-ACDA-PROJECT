<?php
require_once (File::build_path(array ("model","Model.php")));
require_once (File::build_path(array ("model","ModelRapport.php")));
require_once (File::build_path(array ("lib","Util.php")));
require_once (File::build_path(array ("lib","Security.php")));

class ControllerRapport {

  protected static $object='rapport';

  public static function readAll(){
    if(isset($_SESSION['login']) && Session::is_admin($_SESSION['login'])){
      if(Conf::getDebug()){
        $postOrGet='GET';
      }else{
        $postOrGet='POST';
      }
      $view = array("view", "rapport", "option.php");
      $pagetitle='Choix du rapport';
      require(File::build_path(array ("view", "view.php")));

    }else{
      $view = array("view", "accueil", "accueil.php");
      $pagetitle='Accueil';
      require(File::build_path(array ("view","view.php")));
    }
  }

  public static function genererRapport(){
    if(isset($_SESSION['login']) && Session::is_admin($_SESSION['login'])){
      $dateI=Util::myGet('date_deb');
      $dateF=Util::myGet('date_fin');
      $categorieAnecdote=Util::myGet('categorie');
      $jeu=Util::myGet('jeu');
      $joie=Util::myGet('joie');
      $peur=Util::myGet('peur');
      $colere=Util::myGet('colere');
      $degout=Util::myGet('degout');
      $tristesse=Util::myGet('tristesse');
      $surprise=Util::myGet('surprise');

      if($jeu!=''){
        $jeu=(ModelJeuVideo::selectNom($jeu))->get('idJeu');
      }
      $path='./rapport/';
      $file_name='rapport.csv';
      $file_path=$path.$file_name;
      unlink($file_path);
      $fp=fopen($file_path,'a');
      $list=ModelRapport::selectAll($dateI,$dateF,$categorieAnecdote,$jeu,$joie, $peur, $colere, $degout, $tristesse, $surprise);
      foreach ($list as $fields) {
          fputcsv($fp, $fields);
      }
      fclose($fp);
      if (file_exists($file_path)) {
          header('Content-Description: File Transfer');
          header('Content-Type: application/octet-stream');
          header('Content-Disposition: attachment; filename="'.basename($file_path).'"');
          header('Expires: 0');
          header('Cache-Control: must-revalidate');
          header('Pragma: public');
          header('Content-Length: ' . filesize($file_path));
          readfile($file_path);
          exit;
      }

    }else{
      $view = array("view", "accueil", "accueil.php");
      $pagetitle='Accueil';
      require(File::build_path(array ("view","view.php")));
    }
  }
}
?>
