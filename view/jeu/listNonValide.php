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
    $image="./image/jeu/".$jv->get('image');?>

    <div class="jeu">
      <a href="?controller=jeu&action=update&idJeu=<?php echo $idJeu;?>" ><div class="valideJeu"></div></a>
      <a href="" data-toggle="modal" data-target="#modalJeu"><div class="delJeu"></div></a>
      <div class='imageJeu'><img src="<?php echo $image;?>" alt="<?php echo $nomJeu;?>" height=100 width=100></div>
      <div class='texteJeu titreJeu'><?php echo $nomJeu; ?></div>
      <div class='texteJeu'><?php echo $categorieJeu; ?></div>
    </div>

<?php }?>
</div>

<div class="modal fade" id="modalJeu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmer la suppression</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Êtes-vous sûr(e) de vouloir supprimer le jeu proposé ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <a href="?controller=jeu&action=delete&idJeu=<?php echo $idJeu;?>"><button type="button" class="btn btn-primary">Confirmer</button></a>  
      </div>
    </div>
  </div>
</div>
