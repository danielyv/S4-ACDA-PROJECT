<?php
class ModelUtilisateur extends Model{

  private $login;
  private $mdp;
  private $pseudo;
  private $email;
  private $nonce;
  private $admin;
  private $sexe;
  private $profession;


  static protected $object ='Utilisateur';
  protected static $primary='login';

  public static function checkPassword($login,$mot_de_passe_chiffre){
    $u=ModelUtilisateur::select($login);
    if(!$u==false && $u->get('login')==$login && $u->get('mdp')==$mot_de_passe_chiffre){
      return true;
    }else{
      return false;
    }
  }

  public static function getNameByLogin($login){
    $table_name=static::$object;
    $primary_key=static::$primary;
    $sql = "SELECT pseudo from $table_name WHERE $primary_key=:primary_v";
    $req_prep = Model::$pdo->prepare($sql);
    $values = array(
        "primary_v" => $login,
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
    $tab = $req_prep->fetchAll(PDO::FETCH_ASSOC);
    // Attention, si il n'y a pas de résultats, on renvoie false
    if (empty($tab))
        return false;
    return $tab[0]['pseudo'];
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
  ///constructeur
  public function __construct($login=NULL, $mdp=NULL, $pseudo=NULL, $email=NULL, $admin=NULL, $nonce=NULL, $sexe=NULL, $profession=NULL){
    if (!is_null($login) && !is_null($mdp) && !is_null($pseudo) && !is_null($email) && !is_null($nonce) && !is_null($admin) &&!is_null($sexe) &&!is_null($profession)){
        $this->login=$login;
        $this->mdp=$mdp;
        $this->nom=$nom;
        $this->sexe=$sexe;
        $this->pseudo=$pseudo;
        $this->admin=$admin;
        $this->email=$email;
        $this->nonce=$nonce;
    }
  }
}
?>
