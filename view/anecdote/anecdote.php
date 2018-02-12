<?php
$idAnecdote=rawurlencode($a->get('idAnecdote'));
$titre=htmlspecialchars($a->get('titre'));
$texte=$a->get('texte');
$categorie=htmlspecialchars($a->get('categorie'));
$joie=htmlspecialchars($a->get('joie'));
$peur=htmlspecialchars($a->get('peur'));
$colere=htmlspecialchars($a->get('colere'));
$degout=htmlspecialchars($a->get('degout'));
$tristesse=htmlspecialchars($a->get('tristesse'));
$surprise=htmlspecialchars($a->get('surprise'));
$idJeu=rawurlencode($a->get('idJeu'));
$idLogin=rawurlencode($a->get('idLogin'));
$nomJeu=htmlspecialchars(ModelJeuVideo::getNameById($idJeu));
$nomUtilisateur=htmlspecialchars(ModelUtilisateur::getNameByLogin($idLogin));
$typeReac=-1;

$nbLike=htmlspecialchars($a->get('nbLike'));
$nbLove=htmlspecialchars($a->get('nbLove'));
$nbJpp=htmlspecialchars($a->get('nbJpp'));
$nbOh=htmlspecialchars($a->get('nbOh'));
$nbSad=htmlspecialchars($a->get('nbSad'));
$nbGrr=htmlspecialchars($a->get('nbGrr'));

if(isset($_SESSION['login'])){
  $res=ModelReactionAnec::select(array("idLogin" => $_SESSION['login'],
  "idAnecReac" => $idAnecdote));
  if($res!=false){
    $login=$_SESSION['login'];
    $typeReac=$res->get('typeReacAnec');
  }
}
?>

<div id="<?php echo $idAnecdote; ?>" class="anecdote">
  <div class='anecdotePrincipale'>
      <div class='anecdoteTitre'><h2><?php echo $titre; ?></h2></div>
      <div class='anecdoteInfosSupp'>
        <h3 id="h3anec">Ecrit par : <a id="linkJeu" href="?controller=utilisateur&action=read&login=<?php echo $idLogin; ?>"><?php echo $nomUtilisateur; ?></a></h3>
        <div class='anecdoteInfoJeu'><h3><a id="linkJeu" href="./index.php?controller=jeu&action=read&idJeu=<?php echo $idJeu; ?>"><?php echo $nomJeu; ?></a></h3></div>
      </div>
      <div class='anecdoteTexte'><?php echo $texte; ?></div>
      <div class='anecdoteBas'>
        <button id="<?php echo $idAnecdote."0"; ?>" class="reaction mui-btn mui-btn mui-btn--fab <?php if($typeReac==0) echo 'selected';?>" onclick="addReact('<?php echo $idAnecdote; ?>',0)" data-toggle="tooltip" data-placement="bottom" title="<?php echo $nbLike ?>" ><img src="./image/anecdote/emotions/like.png" alt="J'aime"> </button>
        <button id="<?php echo $idAnecdote."1"; ?>" class="reaction mui-btn mui-btn mui-btn--fab <?php if($typeReac==1) echo 'selected';?>" onclick="addReact('<?php echo $idAnecdote; ?>',1)" data-toggle="tooltip" data-placement="bottom" title="<?php echo $nbLove ?>" ><img src="./image/anecdote/emotions/adore.png" alt="J'adore"></button>
        <button id="<?php echo $idAnecdote."2"; ?>" class="reaction mui-btn mui-btn mui-btn--fab <?php if($typeReac==2) echo 'selected';?>" onclick="addReact('<?php echo $idAnecdote; ?>',2)" data-toggle="tooltip" data-placement="bottom" title="<?php echo $nbJpp ?>"><img src="./image/anecdote/emotions/rire.png" alt="Ahah"></button>
        <button id="<?php echo $idAnecdote."3"; ?>" class="reaction mui-btn mui-btn mui-btn--fab <?php if($typeReac==3) echo 'selected';?>" onclick="addReact('<?php echo $idAnecdote; ?>',3)" data-toggle="tooltip" data-placement="bottom" title="<?php echo $nbOh ?>"><img src="./image/anecdote/emotions/surpris.png" alt="Ah !"></button>
        <button id="<?php echo $idAnecdote."4"; ?>" class="reaction mui-btn mui-btn mui-btn--fab <?php if($typeReac==4) echo 'selected';?>" onclick="addReact('<?php echo $idAnecdote; ?>',4)" data-toggle="tooltip" data-placement="bottom" title="<?php echo $nbSad ?>"><img src="./image/anecdote/emotions/triste.png" alt="Sniff"></button>
        <button id="<?php echo $idAnecdote."5"; ?>" class="reaction mui-btn mui-btn mui-btn--fab <?php if($typeReac==5) echo 'selected';?>" onclick="addReact('<?php echo $idAnecdote; ?>',5)" data-toggle="tooltip" data-placement="bottom" title="<?php echo $nbGrr?>"><img src="./image/anecdote/emotions/colere.png" alt="Rrh"></button>
        <button class="readMore" onclick="readMore('<?php echo $idAnecdote; ?>')" data-toggle="tooltip" data-placement="bottom" title="Lire la suite"><img src="./image/anecdote/readMore.png" alt="Lire la suite" width=20px></button>
        <button class="readMore" type="button" title="Partager" data-toggle="modal" data-target="#modalShare<?php echo $idAnecdote; ?>"><img src="./image/anecdote/share.png" alt="Partager" width=20px></button>

        <div class="modal fade" id="modalShare<?php echo $idAnecdote; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Partager l'anecdote</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body mx-auto">
                <div id="share-buttons">

                  <!-- Email -->
                  <a href="mailto:?Subject=Simple Découvrez%20cette%20anecdote%20sur%20les%20jeux%20vidéo https%3A%2F%2Fwebinfo.iutmontp.univ-montp2.fr%2F%7Ephunvongm%2Fvideoludique%2Findex.php%3Fcontroller%3Danecdote%26action%3DreadAll%26idAnecdote%3D<?php echo $idAnecdote;?>">
                      <img src="https://simplesharebuttons.com/images/somacro/email.png" alt="Email" />
                  </a>

                  <!-- Facebook -->
                  <a href="http://www.facebook.com/sharer.php?u=https%3A%2F%2Fwebinfo.iutmontp.univ-montp2.fr%2F%7Ephunvongm%2Fvideoludique%2Findex.php%3Fcontroller%3Danecdote%26action%3DreadAll%26idAnecdote%3D<?php echo $idAnecdote;?>" target="_blank">
                      <img src="https://simplesharebuttons.com/images/somacro/facebook.png" alt="Facebook" />
                  </a>

                  <!-- Google+ -->
                  <a href="https://plus.google.com/share?url=https://webinfo.iutmontp.univ-montp2.fr/~phunvongm/videoludique/index.php?controller=anecdote&action=readAll&idAnecdote=<?php echo $idAnecdote;?>" target="_blank">
                      <img src="https://simplesharebuttons.com/images/somacro/google.png" alt="Google" />
                  </a>

                  <!-- Reddit -->
                  <a href="http://reddit.com/submit?url=https%3A%2F%2Fwebinfo.iutmontp.univ-montp2.fr%2F%7Ephunvongm%2Fvideoludique%2Findex.php%3Fcontroller%3Danecdote%26action%3DreadAll%26idAnecdote%3D<?php echo $idAnecdote;?>&amp;title=Découvre cette anecdote sur les jeux vidéo" target="_blank">
                      <img src="https://simplesharebuttons.com/images/somacro/reddit.png" alt="Reddit" />
                  </a>

                  <!-- Twitter -->
                  <a href="https://twitter.com/share?url=https%3A%2F%2Fwebinfo.iutmontp.univ-montp2.fr%2F%7Ephunvongm%2Fvideoludique%2Findex.php%3Fcontroller%3Danecdote%26action%3DreadAll%26idAnecdote%3D<?php echo $idAnecdote;?>;text=Découvrez%20cette%20anecdote%20sur%20les%20jeux%20vidéo&amp;hashtags=REV" target="_blank">
                      <img src="https://simplesharebuttons.com/images/somacro/twitter.png" alt="Twitter" />
                  </a>

                </div>
              </div>
            </div>
          </div>
        </div>

        <?php
        if(isset($_SESSION['login'])){ ?>
          <button class="btn btn-danger btn-sm" type="button" data-toggle="modal" data-target="#myModal" onclick="getidAnec('<?php echo $idAnecdote; ?>')" > Signaler</button>
        <?php }
        if(isset($_SESSION['login'])&& Session::is_admin($_SESSION['login'])){ ?>
          <a class="btn btn-secondary btn-sm" href='index.php?controller=anecdote&action=update&idAnecdote=<?php echo $idAnecdote; ?>' role="button">Modifier</a>
          <button class="btn btn-warning btn-sm" type="button" data-toggle="modal" data-target="#modalAnecdote" onclick="prepDelete('<?php echo $idAnecdote; ?>')" >Supprimer</button>
        <?php }  ?>
      </div>
  </div>
  <div class='anecdoteSecondaire'>
    <div class='anecdoteEmotion'>
      Joie :
      <div class="progress">
         <div class="progress-bar" id="jauge_joie" role="progressbar" style="width: <?php echo $joie; ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
      Peur :
      <div class="progress">
        <div class="progress-bar" id="jauge_peur" role="progressbar" style="width: <?php echo $peur; ?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
      Colère :
      <div class="progress">
        <div class="progress-bar" id="jauge_colere" role="progressbar" style="width: <?php echo $colere; ?>%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
      Dégout :
      <div class="progress">
        <div class="progress-bar" id="jauge_degout" role="progressbar" style="width: <?php echo $degout; ?>%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
      Tristesse :
      <div class="progress">
        <div class="progress-bar" id="jauge_tristesse" role="progressbar" style="width: <?php echo $tristesse; ?>%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
      Surprise :
      <div class="progress">
        <div class="progress-bar" id="jauge_surprise" role="progressbar" style="width: <?php echo $surprise; ?>%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
    </div>
  </div>
</div>
