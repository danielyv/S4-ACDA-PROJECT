<form id = "form_option" method=<?php echo $postOrGet?> action="index.php" id="form_id" class="col-md-10">
    <fieldset>
      <legend>Choisir les options pour le rapport :</legend>

      <div class="form-group">
        <input type='hidden' name='action' value='genererRapport'>
        <input type='hidden' name='controller' value='rapport'>
      </div>

        <div class="form-group">
          <label class="control-label" for="jeu_id">Jeu</label>
          <input class="form-control connect" id="jeu_id" type="text" name="jeu" placeholder="Ex : GTA5">
          <div id="suggesstion-box"></div>
        </div>

        <div class="form-group">
          <label class="control-label" for="categorie_id">Catégorie</label>
          <select id="categorie_id" name="categorie">
            <option value="">Tous</option>
            <option value="positive">Positive</option>
            <option value="negative">Negative</option>
            <option value="autre">Autre</option>
          </select>
        </div>

        <!-- <div class="form-group">
          <label class="col-lg-2 control-label" for="dated_id">Date début</label>
          <input class="form-control connect" id="dated_id" type="date" name="date_deb">
        </div>

        <div class="form-group">
          <label class="col-lg-2 control-label" for="datef_id">Date fin</label>
          <input class="form-control connect" id="datef_id" type="date" name="date_fin">
        </div> -->

        <div class="form-row">
            <div class="col">
              <label class=" control-label" for="dated_id">Date début</label>
              <input class="form-control connect" id="dated_id" type="date" name="date_deb">
            </div>
            <div class="col">
              <label class=" control-label" for="datef_id">Date fin</label>
              <input class="form-control connect" id="datef_id" type="date" name="date_fin">
            </div>
        </div>


        <div class="form-row" id="form_jauge">
          <img id="icon_i" data-toggle="tooltip" data-placement="right" title=" Les anecotes générées correspondent à une valeur des émotions supérieure à celle sélectionée" src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjI0cHgiIGhlaWdodD0iMjRweCIgdmlld0JveD0iMCAwIDI4LjYyMSAyOC42MjEiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDI4LjYyMSAyOC42MjE7IiB4bWw6c3BhY2U9InByZXNlcnZlIj4KPGc+Cgk8cGF0aCBkPSJNMTQuMzExLDBjLTYuOTA0LDAtMTIuNSw1LjU5Ni0xMi41LDEyLjVjMCw0LjcyMywyLjYxOCw4LjgyOCw2LjQ4LDEwLjk1NWwtMC4xNDcsNS4xNjZsNS44OTgtMy42MzUgICBDMTQuMTMxLDI0Ljk4OCwxNC4yMiwyNSwxNC4zMTEsMjVjNi45MDQsMCwxMi41LTUuNTk2LDEyLjUtMTIuNUMyNi44MTEsNS41OTYsMjEuMjE1LDAsMTQuMzExLDB6IE0xNS45MDMsMTkuNzg0aC0zLjIwM1Y5LjQ3NCAgIGgzLjIwM1YxOS43ODR6IE0xNC4yOCw4LjIxMWMtMS4wMTMsMC0xLjY4Ny0wLjcxOC0xLjY2NS0xLjYwNGMtMC4wMjEtMC45MjcsMC42NTItMS42MjQsMS42ODYtMS42MjQgICBjMS4wMzMsMCwxLjY4OSwwLjY5NywxLjcxLDEuNjI0QzE2LjAxLDcuNDkzLDE1LjMzMiw4LjIxMSwxNC4yOCw4LjIxMXoiIGZpbGw9IiMyZDgyZTIiLz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K" />

            <div class="col" id="form_joie">
              <label class=" control-label" for="joie_id">Joie</label>
              <div class=" slider-wrapper">
                <input class="form-control connect jauge" list="tickmarks" id="joie_id" type="range" min="0" max="100" step="1" value=0 name="joie" oninput="joieRes.value=parseInt(joie.value)">
              </div>
              <output name="joieRes">0</output>
            </div>
            <div class="col">
              <label class=" control-label" for="peur_id">Peur</label>
              <div class=" slider-wrapper">
                <input class="form-control connect jauge" list="tickmarks" id="peur_id" type="range" min="0" max="100" step="1" value=0 name="peur" oninput="peurRes.value=parseInt(peur.value)">
              </div>
              <output name="peurRes">0</output>
            </div>
            <div class="col">
              <label class=" control-label" for="colere_id">Colère</label>
              <div class=" slider-wrapper">
                <input class="form-control connect jauge" list="tickmarks" id="colere_id" type="range" min="0" max="100" step="1" value=0 name="colere" oninput="colereRes.value=parseInt(colere.value)">
              </div>
              <output name="colereRes">0</output>
            </div>
            <div class="col">
              <label class=" control-label" for="degout_id">Dégoût</label>
              <div class=" slider-wrapper">
                <input class="form-control connect jauge" list="tickmarks" id="degout_id" type="range" min="0" max="100" step="1" value=0 name="degout" oninput="degoutRes.value=parseInt(degout.value)">
              </div>
              <output name="degoutRes">0</output>
            </div>
            <div class="col">
              <label class=" control-label" for="tristesse_id">Tristesse</label>
              <div class=" slider-wrapper">
                <input class="form-control connect jauge" list="tickmarks" id="tristesse_id" type="range" min="0" max="100" step="1" value=0 name="tristesse" oninput="tristesseRes.value=parseInt(tristesse.value)">
              </div>
              <output name="tristesseRes">0</output>
            </div>
            <div class="col">
              <label class=" control-label" for="surprise_id">Surprise</label>
              <div class=" slider-wrapper">
                <input class="form-control connect range jauge" list="tickmarks" id="surprise_id" type="range" min="0" max="100" step="1" value=0 name="surprise" oninput="surpriseRes.value=parseInt(surprise.value)">
              </div>
              <output name="surpriseRes">0</output>
            </div>
          </div>




    </fieldset>
      <button type="reset" class="btn btn-default">Annuler</button>
      <button type="submit" class="btn btn-primary">Télécharger</button>


</form>
