<table class="table table-bordered table-hover">
  <thead class="thead-light">
    <tr>
      <th scope="col">Login</th>
      <th scope="col">Type de signalement</th>
      <th scope="col">Descriptif du signalement</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($tab_detail as $key): ?>
    <tr>
      <td class="text-primary"><?php echo $key['idLogin'] ?></td>
      <td><?php echo $key['typeSignalAnec'] ?></td>
      <td><?php echo $key['descriptifSignalAnec'] ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<a class="btn btn-secondary" href="index.php?controller=anecdote&action=readAllReport">Retour à la liste des signalements</a>
<a class="btn btn-primary" href='?controller=anecdote&action=readAll&idAnecdote=<?php echo Util::myGet("idAnecdote") ?>' role="button">Voir l'anecdote</a>
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Supprimer le(s) signalement(s)</button>
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ModalDelete">Supprimer l'anecdote</button>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form id="filtre" method="get" action="index.php">
      <div class="modal-content">
        <div class="modal-header">
          <legend>Supprimer les signalements</legend>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input hidden name="controller" value="anecdote"></input>
          <input hidden name="action" value="deleteReport"></input>
          <input hidden name="idAnec" value='<?php echo $idAnecdote; ?>'></input>
          <div class="alert alert-danger" role="alert">
            Cette action supprimera tous les signalements liés à cette anecdote.
            Ceci est irréversible, êtes-vous sûr(e) de vouloir supprimer ces signalements ?
          </div>
        </div>
        <div class="modal-footer">
          <a class="btn btn-primary" href='?controller=anecdote&action=readAll&idAnecdote=<?php echo Util::myGet("idAnecdote") ?>' role="button">Voir l'anecdote</a>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Non</button>
          <button type="submit" class="btn btn-success">Oui</button>
        </div>
      </div>
    </form>
  </div>
</div>
<div class="modal fade" id="ModalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form id="filtre" method="get" action="index.php">
      <div class="modal-content">
        <div class="modal-header">
          <legend>Supprimer l'anecdote</legend>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input hidden name="controller" value="anecdote"></input>
          <input hidden name="action" value="delete"></input>
          <input hidden name="idAnec" value='<?php echo Util::myGet("idAnecdote"); ?>'></input>
          <div class="alert alert-danger" role="alert">
            Cette action supprimera l'anecdote liée aux signalements de cette page.
            Ceci est irréversible, êtes-vous sûr(e) de vouloir supprimer cette anecdote ?
          </div>
        </div>
        <div class="modal-footer">
          <a class="btn btn-primary" href='?controller=anecdote&action=readAll&idAnecdote=<?php echo Util::myGet("idAnecdote") ?>' role="button">Voir l'anecdote</a>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Non</button>
          <button type="submit" class="btn btn-success">Oui</button>
        </div>
      </div>
    </form>
  </div>
</div>
