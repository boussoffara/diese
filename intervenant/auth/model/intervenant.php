<?php
include('password.php');
class Intervenant extends Password{

    private $_db;

    function __construct($db){
    	parent::__construct();

    	$this->_db = $db;
    }

	private function get_user_hash($pseudo){

		try {
			$stmt = $this->_db->prepare('SELECT idcontact,pass, pseudo FROM intervenant WHERE pseudo= :pseudo  AND email_valide=:active ');
			$stmt->execute(array('pseudo' => $pseudo,
			'active' => "Yes"
			));

			return $stmt->fetch();

		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}
	
	public function login($pseudo,$pass){

		$row = $this->get_user_hash($pseudo);

		if($this->password_verify($pass,$row['pass']) == 1){

		    $_SESSION['intervenantloggedin'] = true;
		    $_SESSION['pseudo'] = $row['pseudo'];
		    $_SESSION['idcontact'] = $row['idcontact'];
		    return true;
		}
	}

	public function logout(){
		session_destroy();
	}

	public function is_logged_in(){
		if(isset($_SESSION['intervenantloggedin']) && $_SESSION['intervenantloggedin'] == true){
			return true;
		}
	}

  public function activate($idcontact,$active){
    //if id is number and the active token is not empty carry on
    if(is_numeric($idcontact) && !empty($active)){

    	//update users record set the active column to Yes where the memberID and active value match the ones provided in the array
    	$stmt = $this->_db->prepare("UPDATE intervenant SET email_valide = 'Yes' WHERE idcontact = :idcontact AND email_valide = :active");
    	$stmt->execute(array(
    		':idcontact' => $idcontact,
    		':active' => $active
    	));
      return $stmt->rowCount() == 1 ;

  }
  return false;
}


}
?>
