<form method=<?php echo $postOrGet?> action="index.php" id="form_id" class="col-md-10">
  <fieldset>
    <legend>Signalement :</legend>
    <div class="form-group">
    <input type='hidden' name='action' value='reported'>
    <input type='hidden' name='controller' value='anecdote'>
    <input type='hidden' name='idAnecdote' value='<?php echo $idAnecdote; ?>'>
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
      <label class="col-lg-2 control-label" for="Explic">Explications :</label>
      <input class="form-control connect" id="Explic" type="text" name="explications" placeholder="Pas obligatoire">
    </div>
  </fieldset>
      <button type="reset" class="btn btn-danger">Annuler</button>
      <button type="submit" class="btn btn-primary">Accepter</button>
</form>
