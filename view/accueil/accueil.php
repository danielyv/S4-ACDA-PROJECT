<div class="AnecdoteAcc">
  <h2 class="text-success">Une anecdote aléatoire :</h2>
  <?php
    $a=$alea;
    require File::build_path(array("view", "anecdote", "anecdote.php"));
  ?>
</div>

<div class="AnecdoteAcc">
  <h2 class="text-primary">Les plus récentes :</h2>
    <?php foreach ($recentes as $a){
      require File::build_path(array("view", "anecdote", "anecdote.php"));
    } ?>
</div>
<div class="AnecdoteAcc" id="AnecDernier"> <!--la flemme de refaire du css pour afficher la même chose avec un id différent! -->
  <h2 class="text-danger">TOP des anecdotes :</h2>
    <?php foreach ($top as $a){
      require File::build_path(array("view", "anecdote", "anecdote.php"));
    } ?>
</div>


<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="ReportForm">
        <fieldset>
          <div class="modal-header">
            <legend class="text-primary">Signalement d'une anecdote</legend>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <input hidden name="controller" value="anecdote"></input>
            <input hidden name="action" value="reported"></input>
            <input type='hidden' name='idAnec'  value='<?php echo $idAnecdote; ?>'>
            <div class="form-group">
              <label class="col-lg-2 control-label" for="typeReport">Type :</label>
              <select name="type" id="typeReport" required>
                <option value="Vide" selected>Anecdote Vide</option>
                <option value="ContenuOff">Contenu Offensant</option>
                <option value="Spoil">Spoil</option>
                <option value="Lorem">Lorem ipsum</option>
              </select>
            </div>
            <div class="form-group">
              <label class="col-lg-2 control-label" id="titre_popup_signalement" for="Explic">Explications :<img id="i_popup_sign" data-toggle="tooltip" data-placement="right" title="Attention vous ne pouvez pas faire de retour à la ligne ! En appuyant sur entrée vous allez valider votre signalement." src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjE2cHgiIGhlaWdodD0iMTZweCIgdmlld0JveD0iMCAwIDI4LjYyMSAyOC42MjEiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDI4LjYyMSAyOC42MjE7IiB4bWw6c3BhY2U9InByZXNlcnZlIj4KPGc+Cgk8cGF0aCBkPSJNMTQuMzExLDBjLTYuOTA0LDAtMTIuNSw1LjU5Ni0xMi41LDEyLjVjMCw0LjcyMywyLjYxOCw4LjgyOCw2LjQ4LDEwLjk1NWwtMC4xNDcsNS4xNjZsNS44OTgtMy42MzUgICBDMTQuMTMxLDI0Ljk4OCwxNC4yMiwyNSwxNC4zMTEsMjVjNi45MDQsMCwxMi41LTUuNTk2LDEyLjUtMTIuNUMyNi44MTEsNS41OTYsMjEuMjE1LDAsMTQuMzExLDB6IE0xNS45MDMsMTkuNzg0aC0zLjIwM1Y5LjQ3NCAgIGgzLjIwM1YxOS43ODR6IE0xNC4yOCw4LjIxMWMtMS4wMTMsMC0xLjY4Ny0wLjcxOC0xLjY2NS0xLjYwNGMtMC4wMjEtMC45MjcsMC42NTItMS42MjQsMS42ODYtMS42MjQgICBjMS4wMzMsMCwxLjY4OSwwLjY5NywxLjcxLDEuNjI0QzE2LjAxLDcuNDkzLDE1LjMzMiw4LjIxMSwxNC4yOCw4LjIxMXoiIGZpbGw9IiMyZDgyZTIiLz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K" />
              </label>
              <input class="form-control connect" id="Explic" type="text" name="explications" placeholder="Pas obligatoire">
            </div>
          </div>
        </fieldset>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
          <button type="submit" class="btn btn-success">Accepter</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php
  if(isset($_SESSION['login']) && Session::is_admin($_SESSION['login'])){ ?>
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
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
            <button type="button" class="btn btn-primary delconf">Confirmer</button>
          </div>
        </div>
      </div>
    </div>
<?php } ?>
