<form method="POST" action="index.php" id="form_id" enctype="multipart/form-data" class="col-md-10">
  <fieldset>
    <legend>Modifier un jeu :</legend>
    <div class="form-group">
    <input type='hidden' name='action' value='updated'>
    <input type='hidden' name='controller' value='jeu'>
    <input type='hidden' name='idJeu' value='<?php echo $idJeu; ?>'>
    <div class="form-group">
      <label class="col-lg-2 control-label" for="nomJeu_id">Nom du jeu</label>
      <input class="form-control connect" id="nomJeu_id" type="text" name="nomJeu" placeholder="Ex : Firewatch" value="<?php echo $nomJeu; ?>" required>
    </div>
    <div class="form-group">
      <label class="col-lg-2 control-label" for="categorie_id">Catégorie</label>
      <input class="form-control connect" id="categorie_id" type="text" name="categorie" placeholder="Ex : RPG" value="<?php echo $categorieJeu; ?>" required>
    </div>
    <div class="form-group">
      <label class="col-lg-2 control-label">Jeu validé </label>
      <input type="checkbox" class="form-check-input" name="valide" value="1" <?php echo $valide; ?>>
    </div>
    <div class="form-group">
      <label for="image_id" class="col-lg-9 control-label">Image(réupload obligatoire à chaques modifications)
        <img class="detailUpload" data-toggle="tooltip" data-placement="top" title="Max size : 720px*720px. Formats supprotés : .jpg .jpeg .gif .png"  src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjE2cHgiIGhlaWdodD0iMTZweCIgdmlld0JveD0iMCAwIDQzOC41MzMgNDM4LjUzMyIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNDM4LjUzMyA0MzguNTMzOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+CjxnPgoJPHBhdGggZD0iTTQwOS4xMzMsMTA5LjIwM2MtMTkuNjA4LTMzLjU5Mi00Ni4yMDUtNjAuMTg5LTc5Ljc5OC03OS43OTZDMjk1LjczNiw5LjgwMSwyNTkuMDU4LDAsMjE5LjI3MywwICAgYy0zOS43ODEsMC03Ni40Nyw5LjgwMS0xMTAuMDYzLDI5LjQwN2MtMzMuNTk1LDE5LjYwNC02MC4xOTIsNDYuMjAxLTc5LjgsNzkuNzk2QzkuODAxLDE0Mi44LDAsMTc5LjQ4OSwwLDIxOS4yNjcgICBjMCwzOS43OCw5LjgwNCw3Ni40NjMsMjkuNDA3LDExMC4wNjJjMTkuNjA3LDMzLjU5Miw0Ni4yMDQsNjAuMTg5LDc5Ljc5OSw3OS43OThjMzMuNTk3LDE5LjYwNSw3MC4yODMsMjkuNDA3LDExMC4wNjMsMjkuNDA3ICAgczc2LjQ3LTkuODAyLDExMC4wNjUtMjkuNDA3YzMzLjU5My0xOS42MDIsNjAuMTg5LTQ2LjIwNiw3OS43OTUtNzkuNzk4YzE5LjYwMy0zMy41OTYsMjkuNDAzLTcwLjI4NCwyOS40MDMtMTEwLjA2MiAgIEM0MzguNTMzLDE3OS40ODUsNDI4LjczMiwxNDIuNzk1LDQwOS4xMzMsMTA5LjIwM3ogTTE4Mi43MjcsNTQuODEzYzAtMi42NjYsMC44NTUtNC44NTMsMi41Ny02LjU2NSAgIGMxLjcxMi0xLjcxMSwzLjkwMy0yLjU3LDYuNTY3LTIuNTdoNTQuODJjMi42NjIsMCw0Ljg1MywwLjg1OSw2LjU2MSwyLjU3YzEuNzExLDEuNzEyLDIuNTczLDMuODk5LDIuNTczLDYuNTY1djQ1LjY4MiAgIGMwLDIuNjY0LTAuODYyLDQuODU0LTIuNTczLDYuNTY0Yy0xLjcwOCwxLjcxMi0zLjg5OCwyLjU2OC02LjU2MSwyLjU2OGgtNTQuODJjLTIuNjY0LDAtNC44NTQtMC44NTYtNi41NjctMi41NjggICBjLTEuNzE1LTEuNzA5LTIuNTctMy45LTIuNTctNi41NjRWNTQuODEzeiBNMjkyLjM1OSwzNTYuMzA5YzAsMi42NjItMC44NjMsNC44NTMtMi41Nyw2LjU2MWMtMS43MDQsMS43MTQtMy44OTUsMi41Ny02LjU2MywyLjU3ICAgSDE1NS4zMTdjLTIuNjY3LDAtNC44NTQtMC44NTYtNi41NjctMi41N2MtMS43MTItMS43MDgtMi41NjgtMy44OTgtMi41NjgtNi41NjR2LTQ1LjY4MmMwLTIuNjcsMC44NTYtNC44NTMsMi41NjgtNi41NjcgICBjMS43MTMtMS43MDgsMy45MDMtMi41Nyw2LjU2Ny0yLjU3aDI3LjQxdi05MS4zNThoLTI3LjQxYy0yLjY2NywwLTQuODUzLTAuODU1LTYuNTY3LTIuNTY4Yy0xLjcxMi0xLjcxMS0yLjU2OC0zLjkwMS0yLjU2OC02LjU2NyAgIHYtNDUuNjc5YzAtMi42NjYsMC44NTYtNC44NTMsMi41NjgtNi41NjdjMS43MTUtMS43MTMsMy45MDUtMi41NjgsNi41NjctMi41NjhoOTEuMzY3YzIuNjYyLDAsNC44NTMsMC44NTUsNi41NjEsMi41NjggICBjMS43MTEsMS43MTQsMi41NzMsMy45MDEsMi41NzMsNi41Njd2MTQ2LjE3OWgyNy40MDFjMi42NjksMCw0Ljg1OSwwLjg1NSw2LjU3LDIuNTY2YzEuNzA0LDEuNzEyLDIuNTY2LDMuOTAxLDIuNTY2LDYuNTY3djQ1LjY4MyAgIEgyOTIuMzU5eiIgZmlsbD0iIzAwMDAwMCIvPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=" />
      </label>
      <div class="col-lg-10">
       <input type="file" accept="image/*" class="form-control" id="image_id" name="image">
    </div>
    </div>
    <div class="form-group">
     <label for="descriptif_id" class="col-lg-2 control-label">Description</label>
     <textarea class="form-control" id="descriptif_id" name="descriptif"><?php echo $descriptif; ?></textarea>
     <script>
        CKEDITOR.replace( 'descriptif_id' );
     </script>
   </div>
  </fieldset>
      <button type="reset" class="btn btn-default">Annuler</button>
      <button type="submit" class="btn btn-primary">Accepter</button>
</form>
