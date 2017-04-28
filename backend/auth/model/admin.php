<?php
include('password.php');
class Admin extends Password{

    private $_db;

    function __construct($db){
    	parent::__construct();

    	$this->_db = $db;
    }

	private function get_user_hash($pseudo){

		try {
			$stmt = $this->_db->prepare('SELECT pass, pseudo, idcontact FROM charge_etude WHERE pseudo= :pseudo  AND email_valide=:active ');
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
		$tab = $this->get_user($pseudo);
		

		if($this->password_verify($pass,$row['pass']) == 1){

		    $_SESSION['adminloggedin'] = true;
		    $_SESSION['adminpseudo'] = $row['pseudo'];
		    $_SESSION['adminid'] = $row['idcontact'];
		    $_SESSION['user'] = $tab;
		    return true;
		}
	}

	public function logout(){
		session_destroy();
	}

	public function is_logged_in(){
		if(isset($_SESSION['adminloggedin']) && $_SESSION['adminloggedin'] == true){
			return true;
		}
	}

  public function activate($idcontact,$active){
    //if id is number and the active token is not empty carry on
    if(is_numeric($idcontact) && !empty($active)){

    	//update users record set the active column to Yes where the memberID and active value match the ones provided in the array
    	$stmt = $this->_db->prepare("UPDATE charge_etude SET email_valide = 'Yes' WHERE idcontact = :idcontact AND email_valide = :active");
    	$stmt->execute(array(
    		':idcontact' => $idcontact,
    		':active' => $active
    	));
      return $stmt->rowCount() == 1 ;

  }
  return false;
}

	 public function get_user($pseudo){

		try {
			$stmt = $this->_db->prepare('SELECT * FROM 
		charge_etude i , contact c  WHERE c.idcontact = i.idcontact AND pseudo= :pseudo  AND email_valide=:active ');
			$stmt->execute(array('pseudo' => $pseudo,
			'active' => "Yes"
			));

			return $stmt->fetch();

		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}
	
	
}
?>
