<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $pagetitle; ?></title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/monCss.css">
        <link rel="stylesheet" href="css/profilCSS.css">
        <link rel="stylesheet" href="./ckeditor/plugins/spoiler/css/spoiler.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        <script src="./js/monJs.js"></script>
        <script src="./mui-0.9.35/js/mui.min.js"></script>
        <script src="./ckeditor/ckeditor.js"></script>
        <script src="./ckeditor/plugins/spoiler/js/spoiler.js"></script>
    </head>
    <body>
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="?">REV</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation" style="">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="?">Accueil </a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="?controller=anecdote&action=note" id="id_anecdote">Anecdotes <span class="caret"></span></a>
              <div class="dropdown-menu" aria-labelledby="id_anecdote">
                <?php if(isset($_SESSION['login'])){
                  echo '<a class="dropdown-item" href="?controller=anecdote&action=create">Poster une anecdote</a>
                  <div class="dropdown-divider"></div>';
                }?>
                <a class="dropdown-item" href="?controller=anecdote&action=readAll&trie=reaction">Les mieux notées</a>
                <a class="dropdown-item" href="?controller=anecdote&action=readAll&trie=date">Les plus récentes</a>
                <a class="dropdown-item" href="?controller=anecdote&action=readAll&trie=aleatoire">Anecdote aléatoire</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?controller=jeu">Jeux</a>
            </li>
          </ul>
          <ul class="navbar-nav my-2 my-lg-0">
            <?php
            if(isset($_SESSION['login'])&& Session::is_admin($_SESSION['login'])){
              echo '<li class="nav-item">
                      <a class="nav-link" href="index.php?controller=admin">Panneau d\'administration</a>
                    </li>';
                  }
            if(isset($_SESSION['login'])){
              echo '<li class="nav-item"><a href="index.php?controller=utilisateur&action=read&login='.$_SESSION['login'].'" class="nav-link">Mon profil</a></li>';
              echo '<li class="nav-item"><a href="index.php?controller=utilisateur&action=deconnect" class="nav-link">Deconnexion</a></li>';
            }else{
              echo '<li class="nav-item"><a href="index.php?controller=utilisateur&action=connect" class="nav-link">Connexion</a></li>
                    <li class="nav-item"><a href="index.php?controller=utilisateur&action=create" class="nav-link">Inscription</a></li>';
            }
            ?>
          </ul>
        </div>
      </nav>
      <?php //enlever le if plus-tard;
      if(isset($banner)){
        echo $banner;
      }
       ?>
      <div class="container">
<?php
$filepath = File::build_path($view);
require $filepath;
?>
    </div>
    <footer>
      <!-- <div>Politique de confidentialité</div>
      <div>Conditions d'utilisation</div>
      <div>Contact</div>
      <div>FAQ</div>
      <div>Charte d'utilisation</div>
      <div>Crédits</div>
      <div>Icons made by <a href="http://www.freepik.com" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>
      https://cdn4.iconfinder.com/
      <div>Copyright © Antoine Chollet 2018 </div> -->
      <div>
        <a href="?controller=footer&action=politique">Politique de confidentialité</a> |
        <a href="?controller=footer&action=conditions_util">Conditions d'utilisation</a> |
        <a href="?controller=footer&action=contact">Contact</a> |
        <a href="?controller=footer&action=faq">FAQ</a> |
        <a href="?controller=footer&action=charte">Charte d'utilisation</a> |
        <a href="?controller=footer&action=credits">Crédits</a>
      </div>
      <div>Copyright © Antoine Chollet 2018 </div>
    </footer>
  </body>
</html>
