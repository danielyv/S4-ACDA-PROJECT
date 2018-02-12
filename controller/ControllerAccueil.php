<?php
require_once (File::build_path(array ("lib","Util.php")));
class ControllerAccueil {

    protected static $object='accueil';

    public static function readAll(){
        $view = array("view", static::$object, "accueil.php");
        $pagetitle='Accueil';
        $imgPath=File::build_path(array("image", "accueil", "banniere.png"));
        $text="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris hendrerit, arcu quis varius molestie, tellus diam pellentesque augue, in lacinia quam nisl ac neque. Phasellus volutpat molestie leo in ornare. Cras scelerisque volutpat odio quis dapibus. Duis interdum quam non arcu efficitur, eget tincidunt nibh dignissim. Nulla tincidunt enim massa.";
        $banner="
        <div class=\"contain \"</div>
          <div class=\"card card-img mb-3 banner border-bottom-0 border-primary\">
            <img class=\"card-img hover-img\" src=\"./image/accueil/banniere.png\" alt=\"Recueil d'expérience vidéoludique\">
            <div class=\"hover-title h1 btn-dark\">Recueil d'expérience vidéoludique</div>
            <div class=\"middle-text\">
              <div class=\"hover-text \">$text</div>
            </div>
          </div>
        </div>";
        //ModelAnecdote::fatalerror();
        $recentes=ModelAnecdote::getPlusRecentes();
        $top=ModelAnecdote::getTop();
        $alea=ModelAnecdote::getAleatoire();
        require(File::build_path(array ("view","view.php")));
    }
}
?>
