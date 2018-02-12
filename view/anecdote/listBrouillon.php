<h2> Brouillons </h2>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Titre</th>
      <th scope="col">Modifier</th>
      <th scope="col">Supprimer</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($tab_a as $key => $a) {
      $titre=htmlspecialchars($a->get('titre'));
      $idAnecdote=rawurlencode($a->get('idAnecdote'));
      ?>
      <tr>
        <th scope="row"><?php echo $titre; ?></th>
        <td><a href="index.php?controller=anecdote&action=update&idAnecdote=<?php echo $idAnecdote?>">Modifier</a></td>
        <td><a href="" data-toggle="modal" data-target="#modalAnecdote">Supprimer</a></td>
      </tr>
    <?php } ?>
  </tbody>
</table>

<div class="modal fade" id="modalAnecdote" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmer la suppression</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Êtes vous sur de vouloir supprimer l'anecdote ? Une fois supprimé toutes les données seront supprimée</p>
      </div>
      <div class="modal-footer">
        <a href="index.php?controller=anecdote&action=delete&idAnecdote=<?php echo $idAnecdote?>"><button type="button" class="btn btn-primary">Confirmer</button></a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
      </div>
    </div>
  </div>
</div>
