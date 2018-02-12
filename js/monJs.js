// AJAX call for autocomplete
$(document).ready(function(){

  $('output[name=degoutRes]').val($('input[name=degout]').val());
  $('output[name=joieRes]').val($('input[name=joie]').val());
  $('output[name=tristesseRes]').val($('input[name=tristesse]').val());
  $('output[name=peurRes]').val($('input[name=peur]').val());
  $('output[name=colereRes]').val($('input[name=colere]').val());
  $('output[name=surpriseRes]').val($('input[name=surprise]').val());

  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })

  $.expr[":"].contains = $.expr.createPseudo(function(arg) { //Rendre le contain case insensitive
    return function( elem ) {
        return $(elem).text().toUpperCase().indexOf(arg.toUpperCase()) >= 0;
    };
  });

  $("#jeu_id").keyup(function(){
    $.ajax({
      type: "POST",
      url: "index.php?controller=jeu&action=autocomplete",
      data:'keyword='+$(this).val(),
      success: function(data){
        $("#suggesstion-box").show();
        $("#suggesstion-box").html(data);
        $("#jeu_id").css("background","#FFF");
      }
    });
  });

  $("#jeu_trie").keyup(function(){
    var jeu = $('#jeu_trie').val();
    $(".listeJeu .jeu .titreJeu:not(:contains('"+jeu+"'))").parent().hide();
    $(".listeJeu .jeu .titreJeu:contains('"+jeu+"')").parent().show();
  });

  var count = 7;
  $(window).scroll(function(){
      if($(window).scrollTop() == $(document).height() - $(window).height()){
        loadArticle(count);
        count=count+7;
      }
      $('[data-toggle="tooltip"]').tooltip()
  });

  $("#ReportForm").submit(function(e) {
      var url = "index.php?controller=anecdote&action=reported"; // the script where you handle the form input.

      $.ajax({
             type: "POST",
             url: url,
             data: $("#ReportForm").serialize(), // serializes the form's elements.
             success: function(data)
             {
                 alert(data); // show response from the php script.
                 $('#myModal').modal('toggle');
             }
           });

      e.preventDefault(); // avoid to execute the actual submit of the form.
  });
});

//To select game
function selectJeu(val) {
$("#jeu_id").val(val);
$("#suggesstion-box").hide();
}

//Envoie requete ajout réaction.
function addReact(idAnec,val){
  $.ajax({ //Requête AJAX
    type: "POST",
    url: "index.php?controller=reaction&action=addReact",//URL
    data: "valeur="+val+"&idAnecdote="+idAnec,
    dataType : 'html', // On désire recevoir du HTML
    success : function(data){ //data contient le possible "true"
        $("#"+idAnec+" .reaction").removeClass("selected");
        if(data){//Si on a ajouté une réaction
          $("#"+idAnec+val).addClass("selected");
        }
    }
  });
}

function readMore(idAnec){
  if ($("#"+idAnec+" .anecdotePrincipale").attr('class').indexOf("open")<0){
      $("#"+idAnec+" .anecdotePrincipale").css("height","100%");
      $("#"+idAnec+" .anecdoteTexte").css("overflow","initial");
      $("#"+idAnec+" .anecdoteTexte").css("height","100%");
      $("#"+idAnec+" .readMore").attr("data-original-title","Rétracter");
      $("#"+idAnec+" .anecdotePrincipale").addClass("open");
    }else{
      $("#"+idAnec+" .anecdotePrincipale").css("height","250px");
      $("#"+idAnec+" .anecdoteTexte").css("overflow","hidden");
      $("#"+idAnec+" .anecdoteTexte").css("height","50%");
      $("#"+idAnec+" .readMore").attr("data-original-title","Lire la suite");
      $("#"+idAnec+" .anecdotePrincipale").removeClass("open");

    }
};

function loadArticle(pageNumber){
        var trie=getUrlVars()["trie"];
        var jeu=getUrlVars()["jeu"];
        $('a#inifiniteLoader').show('fast');
        $.ajax({
            url: "?controller=anecdote&action=infiniteScroll",
            type:'POST',
            data: "offset="+ pageNumber+"&trie="+trie+"&jeu="+jeu,
            success: function(html){
                $('a#inifiniteLoader').hide('1000');
                $("#listeAnecdote").append(html);    // This will be the div where our content will be loaded
                $('.spoiler-toggle').removeClass('hide-icon');
                $('.spoiler-toggle').addClass('show-icon');
            }
        });
    return false;
}

function getUrlVars(){
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++){
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars;
}

//ReportForm
  function getidAnec(idAnecdote){
  var x = document.forms["ReportForm"]["idAnec"].value=idAnecdote;
}

function prepDelete(idAnecdote){
  $('#modalAnecdote .delconf').attr("onclick","deleteAnec('"+idAnecdote+"')");
}

function deleteAnec(idAnecdote){
  $.ajax({
      url: "?controller=anecdote&action=delete",
      type:'POST',
      data: "idAnecdote="+ idAnecdote,
      success: function(){
          $('#modalAnecdote').modal('toggle');
          $("#"+idAnecdote).hide('slow', function(){ $target.remove(); });
      }
  });
}
