<?php
class ModelJeuVideo extends Model implements JsonSerializable{

  private $idJeu;
  private $nomJeu;
  private $descriptifJeu;
  private $categorieJeu;
  private $image;
  private $valide;

  static protected $object ='JeuVideo';
  protected static $primary='idJeu';

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

  public static function autocomplete($keyword){
    $table_name=static::$object;
    $class_name='Model'.ucfirst($table_name);
    try{
      $req=Model::$pdo->query("SELECT * FROM $table_name WHERE nomJeu like '$keyword%' AND valide=1 ORDER BY nomJeu LIMIT 0,6");
    } catch (PDOException $e) {
      if (Conf::getDebug()) {
        echo $e->getMessage(); // affiche un message d'erreur
        } else {
          echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
        }
        die();
    }
    $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
    return $req->fetchAll();
  }

  public static function selectNom($primary_value){
    $table_name=static::$object;
    $class_name='Model'.ucfirst($table_name);
    $primary_key=static::$primary;
    $sql = "SELECT * from $table_name WHERE nomJeu=:primary_v AND idJeu<>1";
    $req_prep = Model::$pdo->prepare($sql);
    $values = array(
        "primary_v" => $primary_value,
    );
    try{
      $req_prep->execute($values);
    } catch (PDOException $e) {
      if (Conf::getDebug()) {
        echo $e->getMessage(); // affiche un message d'erreur
        } else {
          echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
        }
        die();
    }
    // On récupère les résultats comme précédemment
    $req_prep->setFetchMode(PDO::FETCH_CLASS, $class_name);
    $tab = $req_prep->fetchAll();
    // Attention, si il n'y a pas de résultats, on renvoie false
    if (empty($tab))
        return false;
    return $tab[0];
  }

  public static function getNameById($idJ){
    $table_name=static::$object;
    $sql = "SELECT nomJeu from $table_name WHERE idJeu=:nom_tag";
    $req_prep = Model::$pdo->prepare($sql);
    $values = array('nom_tag' => $idJ, );
    try{
      $req_prep->execute($values);
    } catch (PDOException $e) {
      if (Conf::getDebug()) {
        echo $e->getMessage(); // affiche un message d'erreur
        } else {
          echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
        }
        die();
    }
    $Jeu = $req_prep->fetchAll(PDO::FETCH_ASSOC);
    //Util::aff($Jeu[0]['nomJeu']);
    return $Jeu[0]['nomJeu'];
  }

  public function jsonSerialize() {
    $json = array();
        foreach($this as $key => $value) {
            $json[$key] = $value;
        }
        return $json;
 }

  ///constructeur
  public function __construct($idJeu=NULL, $nomJeu=NULL, $descriptifJeu=NULL, $categorieJeu=NULL, $image=NULL, $valide=NULL){
    if (!is_null($idJeu) && !is_null($nomJeu) && !is_null($descriptifJeu) && !is_null($categorieJeu) && !is_null($image) && !is_null($valide)){
        $this->idJeu=$idJeu;
        $this->nomJeu=$nomJeu;
        $this->descriptifJeu=$descriptifJeu;
        $this->categorieJeu=$categorieJeu;
        $this->image=$image;
        $this->valide=$valide;
    }
  }
}
?>
