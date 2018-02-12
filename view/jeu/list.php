<form class="form-inline my-2 my-lg-2">
  🔍<input class="form-control mr-sm-2" type="text" id="jeu_trie" placeholder="Rechercher" autocomplete="off">
</form>
<div class="listeJeu">
<?php
foreach ($tab_jv as $jv){
    $nomJeu=htmlspecialchars($jv->get('nomJeu'));
    $descriptifJeu=$jv->get('descriptifJeu');
    $categorieJeu=htmlspecialchars($jv->get('categorieJeu'));
    $idJeu=rawurlencode($jv->get('idJeu'));
    $image="./image/jeu/".$jv->get('image');
    ?>
    <a class="lienJeu" href="?controller=jeu&action=read&idJeu=<?php echo $idJeu; ?>">
      <div class="jeu">
        <div class='imageJeu'><img src="<?php echo $image; ?>" alt="<?php echo $nomJeu; ?>" height=100 width=100></div>
        <div class='texteJeu titreJeu'><?php echo $nomJeu; ?></div>
        <div class='texteJeu'><?php echo $categorieJeu; ?></div>
      </div>
    </a>
<?php } ?>
</div>
