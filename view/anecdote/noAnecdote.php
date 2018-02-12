<div class="alert alert-dismissible alert-danger">
  Aucune annecdote trouvée :/
</div>
<div class="filtre">
  <form id="filtre">
    <fieldset>
      <legend>Filtrer les anecdotes :</legend>
      <input hidden name="controller" value="anecdote"></input>
      <input hidden name="action" value="readAll"></input>
      <label class="col-lg-2 control-label" for="trie_id">Trie</label>
      <select name="trie" id="trie_id">
        <option value="date" <?php if($_GET['trie']=='date') echo 'selected';?> >Date</option>
        <option value="titre" <?php if($_GET['trie']=='titre') echo 'selected';?> >Titre</option>
        <option value="reaction" <?php if($_GET['trie']=='reaction') echo 'selected';?> >Top anecdotes</option>
        <option value="nbmots" <?php if($_GET['trie']=='nbmots') echo 'selected';?> >Nombre de mots</option>
      </select>
      <br>
      <label class="control-label" for="jeu_id">Jeu</label>
      <input class="form-control connect" id="jeu_id" type="text" name="jeu" placeholder="Ex : GTA5" autocomplete="off">
      <div id="suggesstion-box"></div>
      <br>
    </fieldset>
    <button type="submit" class="btn btn-primary">Accepter</button>
  </form>
</div>
