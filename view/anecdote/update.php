<form method=<?php echo $postOrGet?> action="index.php" id="form_id" class="col-md-10">
  <fieldset>
    <legend>Modifier votre brouillon :</legend>
    <div class="form-group">
    <input type='hidden' name='action' value='updated'>
    <input type='hidden' name='controller' value='anecdote'>
    <input type='hidden' name='idAnecdote' value="<?php echo $idAnecdote; ?>">
    <div class="form-group">
      <label class="control-label" for="titre_id">Titre</label>
      <input class="form-control connect" id="titre_id" type="text" name="titre" value="<?php echo $titre; ?>" placeholder="Ex : Firewatch, une histoire prenante" required>
    </div>

    <div class="form-row">
        <div class="col" id="form_cat">
          <label class=" control-label" for="categorie_id">Catégorie</label><br>
          <select id="categorie_id" name="categorie">
            <option value="positive" <?php if($categorie=='positive') echo 'selected'; ?>>Positive</option>
            <option value="negative" <?php if($categorie=='negative') echo 'selected'; ?>>Negative</option>
            <option value="autre" <?php if($categorie=='autre') echo 'selected'; ?>>Autre</option>
          </select>
        </div>
        <div class="col">
          <label class="control-label" for="jeu_id">Jeu</label>
          <input class="form-control connect" id="jeu_id" type="text" name="jeu" placeholder="Ex : GTA5"  value="<?php echo $jeu; ?>" autocomplete="off" required>
          <div id="suggesstion-box"></div>
        </div>
      </div>
    <div class="form-group">
     <label for="texte_id" class=" control-label">Texte</label>
     <textarea class="form-control" id="texte_id" name="texte"> <?php echo $texte; ?> </textarea>
     <script>
        CKEDITOR.replace('texte_id');
     </script>
   </div>


   <div class="form-row" id="form_jauge">
       <div class="col" id="form_joie">
         <label class=" control-label" for="joie_id">Joie</label>
         <div class=" slider-wrapper">
           <input class="form-control connect jauge" list="tickmarks" id="joie_id" type="range" min="0" max="100" step="1" value="<?php echo $joie; ?>" name="joie" oninput="joieRes.value=parseInt(joie.value)">
         </div>
         <output name="joieRes">0</output>
       </div>
       <div class="col">
         <label class=" control-label" for="peur_id">Peur</label>
         <div class=" slider-wrapper">
           <input class="form-control connect jauge" list="tickmarks" id="peur_id" type="range" min="0" max="100" step="1" value="<?php echo $peur; ?>" name="peur" oninput="peurRes.value=parseInt(peur.value)">
         </div>
         <output name="peurRes">0</output>
       </div>
       <div class="col">
         <label class=" control-label" for="colere_id">Colère</label>
         <div class=" slider-wrapper">
           <input class="form-control connect jauge" list="tickmarks" id="colere_id" type="range" min="0" max="100" step="1" value="<?php echo $colere; ?>" name="colere" oninput="colereRes.value=parseInt(colere.value)">
         </div>
         <output name="colereRes">0</output>
       </div>
       <div class="col">
         <label class=" control-label" for="degout_id">Dégoût</label>
         <div class=" slider-wrapper">
           <input class="form-control connect jauge" list="tickmarks" id="degout_id" type="range" min="0" max="100" step="1" value="<?php echo $degout; ?>" name="degout" oninput="degoutRes.value=parseInt(degout.value)">
         </div>
         <output name="degoutRes">0</output>
       </div>
       <div class="col">
         <label class=" control-label" for="tristesse_id">Tristesse</label>
         <div class=" slider-wrapper">
           <input class="form-control connect jauge" list="tickmarks" id="tristesse_id" type="range" min="0" max="100" step="1" value="<?php echo $tristesse; ?>" name="tristesse" oninput="tristesseRes.value=parseInt(tristesse.value)">
         </div>
         <output name="tristesseRes">0</output>
       </div>
       <div class="col">
         <label class=" control-label" for="surprise_id">Surprise</label>
         <div class=" slider-wrapper">
           <input class="form-control connect range jauge" list="tickmarks" id="surprise_id" type="range" min="0" max="100" step="1" value= value="<?php echo $surprise; ?>" name="surprise" oninput="surpriseRes.value=parseInt(surprise.value)">
         </div>
         <output name="surpriseRes">0</output>
       </div>
     </div>
  </fieldset>
  <button type="reset" class="btn btn-default">Annuler</button>
  <button type="submit" class="btn btn-secondary" name="publie" value="0">Enregistrer en brouillon</button>
  <button type="button" data-toggle="modal" data-target="#modalConf" class="btn btn-primary">Publier</button>

  <div class="modal fade" id="modalConf" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Confirmer la publication</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Êtes vous sur de vouloir publier l'anecdote ? Une fois publié vous ne pourrez plus modifier ou supprimer l'anecdote.</p>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="publie" value="1">Confirmer</button></a>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button></a>
        </div>
      </div>
    </div>
  </div>

</form>
