<?php
class ModelReactionAnec extends Model{

  private $idLogin;
  private $idAnecReac;
  private $typeReacAnec;

  protected static $object ='ReactionAnec';
  protected static $primary='idLogin';
  protected static $primaryBis='idAnecReac';


  public static function select($data){
    $table_name=static::$object;
    $class_name='Model'.ucfirst($table_name);
    $primary_key=static::$primary;
    $primaryBis_key=static::$primaryBis;
    $sql = "SELECT * from $table_name WHERE $primary_key=:$primary_key AND $primaryBis_key=:$primaryBis_key";
    $req_prep = Model::$pdo->prepare($sql);
    try{
      $req_prep->execute($data);
    } catch (PDOException $e) {
      if (Conf::getDebug()) {
        echo $e->getMessage(); // affiche un message d'erreur
        } else {
          echo 'Une erreur est survenue <a href="./index.php"> retour a la page d\'accueil </a>';
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

  public static function delete($data){
    $table_name=static::$object;
    $primary_key=static::$primary;
    $primaryBis_key=static::$primaryBis;
    $sql= "DELETE FROM $table_name WHERE $primary_key=:$primary_key AND $primaryBis_key=:$primaryBis_key";
    $req_prep=Model::$pdo->prepare($sql);
    try{
      $req_prep->execute($data);
    } catch (PDOException $e) {
      if (Conf::getDebug()) {
          echo $e->getMessage(); // affiche un message d'erreur
        } else {
          echo 'Une erreur est survenue <a href="./index.php"> retour a la page d\'accueil </a>';
        }
      return false;
    }
    return true;
  }

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

  public function __construct($idLogin=NULL, $idAnecReac=NULL, $typeReacAnec=NULL){
    if (!is_null($idLogin) && !is_null($idAnecReac) && !is_null($typeReacAnec)){
        $this->$idLogin=$idLogin;
        $this->$idAnecReac=$idAnecReac;
        $this->$typeReacAnec=$typeReacAnec;
    }
  }

}
?>
