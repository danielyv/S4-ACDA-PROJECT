<?php
class ModelAnecdote extends Model{

  private $idAnecdote;
  private $titre;
  private $texte;
  private $categorie;
  private $idJeu;
  private $idLogin;
  private $date;
  private $joie;
  private $peur;
  private $colere;
  private $degout;
  private $tristesse;
  private $surprise;
  private $NbReactions;
  private $publie;
  private $nbLike;
  private $nbLove;
  private $nbJpp;
  private $nbOh;
  private $nbSad;
  private $nbGrr;


  static protected $object ='Anecdote';
  protected static $primary='idAnecdote';

  //getter
  public function get($attribut) {
    if (property_exists($this, $attribut)) {
      return $this->$attribut;
    }
  }

  //setter
    public function set($attribut,$valeur) {
      if (property_exists($this, $attribut)) {
        $this->$attribut=$valeur;
     }
  }

  //méthodes

  public static function selectAll($trie='date', $jeu=NULL, $offset=0, $idAnecdote=''){
    $table_name=static::$object;
    $class_name='Model'.ucfirst($table_name);
    if(!empty($idAnecdote)){
      $sql="SELECT * FROM $table_name WHERE idAnecdote=:idAnecdote AND publie=1";
      $req_prep = Model::$pdo->prepare($sql);
      $req_prep->bindParam(':idAnecdote', $idAnecdote, PDO::PARAM_STR);
    }elseif($jeu==NULL && $trie=='date') {
      $sql="SELECT * FROM $table_name WHERE publie=1 ORDER BY $trie DESC LIMIT 7 OFFSET :offset";
      $req_prep = Model::$pdo->prepare($sql);
      $req_prep->bindParam(':offset', $offset, PDO::PARAM_INT);
    }elseif($jeu==NULL) {
      $sql="SELECT * FROM $table_name WHERE publie=1 ORDER BY $trie ASC LIMIT 7 OFFSET :offset";
      $req_prep = Model::$pdo->prepare($sql);
      $req_prep->bindParam(':offset', $offset, PDO::PARAM_INT);
    }elseif($trie=='date') {
      $sql="SELECT * FROM $table_name WHERE idJeu=:jeu AND publie=1 ORDER BY $trie DESC LIMIT 7 OFFSET :offset";
      $req_prep = Model::$pdo->prepare($sql);
      $req_prep->bindParam(':offset', $offset, PDO::PARAM_INT);
      $req_prep->bindParam(':jeu', $jeu, PDO::PARAM_STR);
    }else {
      $sql="SELECT * FROM $table_name WHERE idJeu=:jeu AND publie=1 ORDER BY $trie ASC LIMIT 7 OFFSET :offset";
      $req_prep = Model::$pdo->prepare($sql);
      $req_prep->bindParam(':offset', $offset, PDO::PARAM_INT);
      $req_prep->bindParam(':jeu', $jeu, PDO::PARAM_STR);
    }
    try {
      $req_prep->execute();
    } catch (PDOException $e) {
      if (Conf::getDebug()) {
        echo $e->getMessage(); // affiche un message d'erreur
      } else {
        echo 'Une erreur est survenue <a href="./index.php"> retour a la page d\'accueil </a>';
      }
        die();
      }
    $req_prep->setFetchMode(PDO::FETCH_CLASS, $class_name);
    return $req_prep->fetchAll();
  }

    public static function signalerAnec($values){
      $sql="INSERT INTO AnecSignale(idLogin, idAnecSignal, typeSignalAnec, descriptifSignalAnec) VALUES (:user, :anec, :type, :descAnec)";
      $req_prep = Model::$pdo->prepare($sql);
      try{
        $req_prep->execute($values);
      } catch (PDOException $e) {
        if (Conf::getDebug()) {
            echo $e->getMessage(); // affiche un message d'erreur
          } else {
            echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
          }
        return false;
      }
      return true;
    }

    public static function updateJeu($idJeu){
      $table_name=static::$object;
      $class_name='Model'.ucfirst($table_name);
      $sql="UPDATE $table_name SET idJeu=1 WHERE idJeu=:idJeu";
      $req_prep = Model::$pdo->prepare($sql);
      $req_prep->bindParam(':idJeu', $idJeu, PDO::PARAM_INT);
      try {
        $req_prep->execute();
      } catch (PDOException $e) {
        if (Conf::getDebug()) {
          echo $e->getMessage(); // affiche un message d'erreur
        } else {
          echo 'Une erreur est survenue <a href="./index.php"> retour a la page d\'accueil </a>';
        }
          die();
        }
    }

   public static function getPlusRecentes(){
     $table_name=static::$object;
     $class_name='Model'.ucfirst($table_name);
     $sql="SELECT * FROM $table_name WHERE publie=1 ORDER BY `date` DESC LIMIT 3";
     $req_prep = Model::$pdo->prepare($sql);
     try {
       $req_prep->execute();
     } catch (PDOException $e) {
       if (Conf::getDebug()) {
         echo $e->getMessage(); // affiche un message d'erreur
       } else {
         echo 'Une erreur est survenue <a href="./index.php"> retour a la page d\'accueil </a>';
       }
         die();
       }
     $req_prep->setFetchMode(PDO::FETCH_CLASS, $class_name);
     return $req_prep->fetchAll();
   }

   public static function selectBrouillon($login){
     $table_name=static::$object;
     $class_name='Model'.ucfirst($table_name);
     $sql="SELECT * FROM $table_name WHERE idLogin=:idLogin AND publie=0 ORDER BY date ASC";
     $req_prep = Model::$pdo->prepare($sql);
     $req_prep->bindParam(':idLogin', $login, PDO::PARAM_STR);
     try {
       $req_prep->execute();
     } catch (PDOException $e) {
       if (Conf::getDebug()) {
         echo $e->getMessage(); // affiche un message d'erreur
       } else {
         echo 'Une erreur est survenue <a href="./index.php"> retour a la page d\'accueil </a>';
       }
         die();
       }
     $req_prep->setFetchMode(PDO::FETCH_CLASS, $class_name);
     return $req_prep->fetchAll();
   }

   public static function selectUser($login){
     $table_name=static::$object;
     $class_name='Model'.ucfirst($table_name);
     $sql="SELECT * FROM $table_name WHERE idLogin=:idLogin AND publie=1";
     $req_prep = Model::$pdo->prepare($sql);
     $req_prep->bindParam(':idLogin', $login, PDO::PARAM_STR);
     try {
       $req_prep->execute();
     } catch (PDOException $e) {
       if(Conf::getDebug()){
         echo $e->getMessage(); // affiche un message d'erreur
       } else {
         echo 'Une erreur est survenue <a href="./index.php"> retour a la page d\'accueil </a>';
       }
         die();
       }
     $req_prep->setFetchMode(PDO::FETCH_CLASS, $class_name);
     return $req_prep->fetchAll();
   }

   public static function getTop($offset=0){
     $table_name=static::$object;
     $class_name='Model'.ucfirst($table_name);
     $sql="SELECT A.idAnecdote, A.titre, A.texte, A.categorie, A.idJeu, A.idLogin, A.publie, A.nbLike, A.nbLove, A.nbJpp, A.nbOh, A.nbSad, A.nbGrr, A.date, A.joie, A.peur, A.colere, A.degout, A.tristesse, A.surprise FROM Anecdote A LEFT JOIN nbReacTotal Nb ON A.idAnecdote=Nb.idAnectode WHERE A.publie=1 ORDER BY Nb.nbReactions DESC LIMIT 3";
     $req_prep = Model::$pdo->prepare($sql);
     try {
       $req_prep->execute();
     } catch (PDOException $e) {
       if (Conf::getDebug()) {
         echo $e->getMessage(); // affiche un message d'erreur
       } else {
         echo 'Une erreur est survenue <a href="./index.php"> retour a la page d\'accueil </a>';
       }
         die();
       }
     $req_prep->setFetchMode(PDO::FETCH_CLASS, $class_name);
     return $req_prep->fetchAll();
   }

   public static function selectTop($jeu=NULL, $offset=0){
     $table_name=static::$object;
     $class_name='Model'.ucfirst($table_name);
     if($jeu==NULL) {
       $sql="SELECT A.idAnecdote, A.titre, A.texte, A.categorie, A.idJeu, A.idLogin, A.publie, A.nbLike, A.nbLove, A.nbJpp, A.nbOh, A.nbSad, A.nbGrr, A.date, A.joie, A.peur, A.colere, A.degout, A.tristesse, A.surprise FROM Anecdote A LEFT JOIN nbReacTotal Nb ON A.idAnecdote=Nb.idAnectode WHERE publie=1 ORDER BY Nb.nbReactions DESC LIMIT 7 OFFSET :offset";
       $req_prep = Model::$pdo->prepare($sql);
       $req_prep->bindParam(':offset', $offset, PDO::PARAM_INT);
     }else{
       $sql="SELECT A.idAnecdote, A.titre, A.texte, A.categorie, A.idJeu, A.idLogin, A.publie, A.nbLike, A.nbLove, A.nbJpp, A.nbOh, A.nbSad, A.nbGrr, A.date, A.joie, A.peur, A.colere, A.degout, A.tristesse, A.surprise FROM Anecdote A LEFT JOIN nbReacTotal Nb ON A.idAnecdote=Nb.idAnectode WHERE idJeu=:jeu AND publie=1 ORDER BY Nb.nbReactions DESC LIMIT 7 OFFSET :offset";
       $req_prep = Model::$pdo->prepare($sql);
       $req_prep->bindParam(':offset', $offset, PDO::PARAM_INT);
       $req_prep->bindParam(':jeu', $jeu, PDO::PARAM_STR);
     }
     try {
       $req_prep->execute();
     } catch (PDOException $e) {
       if (Conf::getDebug()) {
         echo $e->getMessage(); // affiche un message d'erreur
       } else {
         echo 'Une erreur est survenue <a href="./index.php"> retour a la page d\'accueil </a>';
       }
         die();
       }
     $req_prep->setFetchMode(PDO::FETCH_CLASS, $class_name);
     return $req_prep->fetchAll();
   }

   public static function getAleatoire(){
     $table_name=static::$object;
     $class_name='Model'.ucfirst($table_name);
     $sql="SELECT idAnecdote FROM Anecdote WHERE publie=1";
     $req_prep = Model::$pdo->prepare($sql);
     try {
       $req_prep->execute();
     } catch (PDOException $e) {
       if (Conf::getDebug()) {
         echo $e->getMessage(); // affiche un message d'erreur
       } else {
         echo 'Une erreur est survenue <a href="./index.php"> retour a la page d\'accueil </a>';
       }
         die();
      }
      $IDs=$req_prep->fetchAll(PDO::FETCH_ASSOC);
      $nb=count($IDs);
      $alea=$IDs[rand(0,$nb-1)]['idAnecdote'];
      return self::select($alea);
   }

   public static function addNbReact($idAnecdote,$colone,$valeur){
     $table_name=static::$object;
     $primary_key=static::$primary;
     $sql= "UPDATE $table_name SET $colone=$colone+($valeur) WHERE $primary_key=:$primary_key";
     $req_prep=Model::$pdo->prepare($sql);
     try{
       $req_prep->execute(array($primary_key=>$idAnecdote));
     } catch (PDOException $e) {
       if (Conf::getDebug()) {
           echo $e->getMessage(); // affiche un message d'erreur
         } else {
           echo 'Une erreur est survenue <a href="./index.php"> retour a la page d\'accueil </a>';
         }
         die();
     }
     return true;
   }

   //ModelAnecdote::dejaSignale($_SESSION['login'], Util::myGet('idAnec'))
   public static function dejaSignale($log, $idAnec){
     $sql= "SELECT COUNT(*) FROM AnecSignale WHERE AnecSignale.idLogin='$log' AND AnecSignale.idAnecSignal='$idAnec'";
     $req_prep=Model::$pdo->prepare($sql);

     try{
       $req_prep->execute();
     } catch (PDOException $e) {
       if (Conf::getDebug()) {
           echo $e->getMessage(); // affiche un message d'erreur
         } else {
           echo 'Une erreur est survenue <a href="./index.php"> retour a la page d\'accueil </a>';
         }
         die();
     }
     $NB=$req_prep->fetchAll(PDO::FETCH_ASSOC);
     return ($NB[0]['COUNT(*)']==1);
   }

   public static function getAllReport(){
     $sql="SELECT idAnecSignal, COUNT(*) AS 'Nombre_Signalements' FROM AnecSignale GROUP BY idAnecSignal ORDER BY COUNT(*) DESC, idAnecSignal";
     $req_prep=Model::$pdo->prepare($sql);
     try{
       $req_prep->execute();
     } catch (PDOException $e) {
       if (Conf::getDebug()) {
           echo $e->getMessage(); // affiche un message d'erreur
         } else {
           echo 'Une erreur est survenue <a href="./index.php"> retour a la page d\'accueil </a>';
         }
         die();
     }
     $Reports=$req_prep->fetchAll(PDO::FETCH_ASSOC);
     return $Reports;
   }

   public static function getReportById($idAnec){
     $sql="SELECT idLogin, typeSignalAnec, descriptifSignalAnec FROM AnecSignale WHERE idAnecSignal=:tag";
     $req_prep=Model::$pdo->prepare($sql);
     $values = array('tag' => $idAnec, );
     try{
       $req_prep->execute($values);
     } catch (PDOException $e) {
       if (Conf::getDebug()) {
           echo $e->getMessage(); // affiche un message d'erreur
         } else {
           echo 'Une erreur est survenue <a href="./index.php"> retour a la page d\'accueil </a>';
         }
         die();
     }
     $Detail=$req_prep->fetchAll(PDO::FETCH_ASSOC);
     return $Detail;
   }

   public static function deleteReportById($idAnec){
     $sql="DELETE FROM AnecSignale WHERE idAnecSignal=:tag";
     $req_prep=Model::$pdo->prepare($sql);
     $values = array('tag' => $idAnec, );
     try{
       $req_prep->execute($values);
     } catch (PDOException $e) {
       if (Conf::getDebug()) {
           echo $e->getMessage(); // affiche un message d'erreur
         } else {
           echo 'Une erreur est survenue <a href="./index.php"> retour a la page d\'accueil </a>';
         }
         die();
     }
   }

   public static function getTitleById($idAnec){
     $sql="SELECT titre FROM Anecdote WHERE idAnecdote=:tag ";
     $req_prep=Model::$pdo->prepare($sql);
     $values = array('tag' => $idAnec, );
     $values = array('tag' => $idAnec, );
     try{
       $req_prep->execute($values);
     } catch (PDOException $e) {
       if (Conf::getDebug()) {
           echo $e->getMessage(); // affiche un message d'erreur
         } else {
           echo 'Une erreur est survenue <a href="./index.php"> retour a la page d\'accueil </a>';
         }
         die();
     }
     $titre=$req_prep->fetchAll(PDO::FETCH_ASSOC);
     return $titre;
   }

  ///constructeur
  public function __construct($idAnecdote=NULL, $titre=NULL, $texte=NULL, $categorie=NULL, $idJeu=NULL, $idLogin=NULL, $date=NULL, $joie=NULL, $peur=NULL, $colere=NULL, $degout=NULL, $tristesse=NULL, $surprise=NULL, $publie=NULL, $nbLike=NULL, $nbLove=NULL, $nbJpp=NULL, $nbOh=NULL, $nbSad=NULL, $nbGrr=NULL){
    if(!is_null($idAnecdote) && !is_null($titre) && !is_null($texte) && !is_null($categorie) && !is_null($idJeu) && !is_null($idLogin) && !is_null($date) && !is_null($joie) && !is_null($peur) && !is_null($colere) && !is_null($degout) && !is_null($tristesse) && !is_null($surprise) && !is_null($publie) && !is_null($nbLike) && !is_null($nbLove) && !is_null($nbJpp) && !is_null($nbOh) && !is_null($nbSad) && !is_null($nbGrr)){
        $this->idAnecdote=$idAnecdote;
        $this->titre=$titre;
        $this->texte=$texte;
        $this->categorie=$categorie;
        $this->idJeu=$idJeu;
        $this->idLogin=$idLogin;
        $this->joie=$joie;
        $this->peur=$peur;
        $this->colere=$colere;
        $this->degout=$degout;
        $this->tristesse=$tristesse;
        $this->surprise=$surprise;
        $this->publie=$publie;
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
