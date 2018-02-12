<?php

class ModelRapport{

  private $idAnecdote;
  private $titre;
  private $texte;
  private $categorie;
  private $joie;
  private $peur;
  private $colere;
  private $degout;
  private $tristesse;
  private $surprise;
  private $nbLike;
  private $nbLove;
  private $nbJpp;
  private $nbOh;
  private $nbSad;
  private $nbGrr;
  private $date;

  private $nomJeu;
  private $categorieJeu;

  private $pseudo;
  private $sexe;
  private $profession;

  static protected $object ='Anecdote';
  protected static $primary='idAnecdote';

  public static function selectAll($dateI,$dateF,$categorieAnecdote,$jeu,$joie, $peur, $colere, $degout, $tristesse, $surprise){
    $table_name=static::$object;
    $class_name='ModelRapport';
    if($dateI==''){
      $dateI='1970-01-01 00:00:01';
    }
    if($dateF==''){
        $dateF='2038-01-19 03:14:07';
    }
    try {
      $sql="SELECT a.idAnecdote, a.titre, a.texte, a.categorie, a.joie, a.peur, a.colere, a.degout, a.tristesse, a.surprise, a.nbLike, a.nbLove, a.nbJpp,a.nbOh, a.nbSad, a.nbGrr, a.date, j.nomJeu, j.categorieJeu, u.pseudo, u.sexe, u.profession
      FROM $table_name a JOIN Utilisateur u ON a.idLogin=u.login JOIN JeuVideo j ON j.idJeu=a.idJeu WHERE a.date>\"$dateI\" AND a.date<\"$dateF\" AND a.joie>=$joie AND a.peur>=$peur AND a.colere>=$colere AND a.degout>=$degout AND a.tristesse>=$tristesse AND a.surprise>=$surprise ";
      if($categorieAnecdote!=''){
        $sql.="AND a.categorie=$categorieAnecdote";
      }
      if($jeu!=''){
         $sql.="AND j.idJeu=$jeu";
      }
      $rep=Model::$pdo->query($sql);
    } catch (PDOException $e) {
      if (Conf::getDebug()) {
        echo $e->getMessage(); // affiche un message d'erreur
      } else {
        echo 'Une erreur est survenue <a href="./index.php"> retour a la page d\'accueil </a>';
      }
        die();
      }
    $rep->setFetchMode(PDO::FETCH_ASSOC);
    return $rep->fetchAll();
  }

    ///constructeur
  public function __construct($idAnecdote=NULL, $titre=NULL, $texte=NULL, $categorie=NULL, $joie=NULL, $peur=NULL, $colere=NULL, $degout=NULL, $tristesse=NULL, $surprise=NULL, $nomJeu=NULL, $categorieJeu=NULL, $pseudo=NULL, $sexe=NULL, $profession=NULL, $nbLike=NULL, $nbLove=NULL, $nbJpp=NULL, $nbOh=NULL, $nbSad=NULL, $nbGrr=NULL, $date=NULL){
    if ( !is_null($idAnecdote) && !is_null($titre) && !is_null($texte) && !is_null($categorie) && !is_null($joie) && !is_null($peur) && !is_null($colere) && !is_null($degout) && !is_null($tristesse) && !is_null($surprise) && !is_null($nomJeu) && !is_null($categorieJeu) && !is_null($pseudo) && !is_null($sexe) && !is_null($profession) && !is_null($nbLike) && !is_null($nbLove) && !is_null($nbJpp) && !is_null($nbOh) && !is_null($nbSad) && !is_null($nbGrr) && !is_null($date)){
        $this->idAnecdote=$idAnecdote;
        $this->titre=$titre;
        $this->texte=$texte;
        $this->categorie=$categorie;
        $this->joie=$joie;
        $this->peur=$peur;
        $this->colere=$colere;
        $this->degout=$degout;
        $this->tristesse=$tristesse;
        $this->surprise=$surprise;
        $this->nomJeu=$nomJeu;
        $this->categorieJeu=$categorieJeu;
        $this->pseudo=$pseudo;
        $this->sexe=$sexe;
        $this->professsion=$professsion;
        $this->nbLike=$nbLike;
        $this->nbLove=$nbLove;
        $this->nbJpp=$nbJpp;
        $this->nbOh=$nbOh;
        $this->nbSad=$nbSad;
        $this->nbGrr=$nbGrr;
        $this->date=$date;
    }
  }

}


 ?>
