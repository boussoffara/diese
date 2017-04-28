<?php

class Candidat {

    public $_db;
    public $id;
    public $nom;
    public $prenom ;
    public $mail;
    public $phone;
    public $adresse;
    public $pseudo;
    public $promo;
    public $secu;
    public $status;
    

    function __construct($db,$pseudo){
    	$this->_db = $db;
    	$this->pseudo=$pseudo;
    	try {
			$stmt = $this->_db->prepare('SELECT nom,prenom,pseudo,mail,phone,adresse,promo,num_secu,status_intervenant FROM intervenant 
			NATURAL JOIN contact WHERE pseudo=:pseudo');
			$stmt->execute(array('pseudo' => $pseudo
			));
        $info=$stmt->fetch();
        $this->nom=$info['nom'];
        $this->prenom=$info['prenom'];
        $this->pseudo=$info['pseudo'];
        $this->mail=$info['mail'];
        $this->phone=$info['phone'];
        $this->adresse=$info['adresse'];
        $this->promo=$info['promo'];
        $this->secu=$info['num_secu'];
        $this->status=$info['status_intervenant'];
		
		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
    }

	public function get_id($pseudo){

		try {
			$stmt = $this->_db->prepare('SELECT idcontact FROM intervenant_all WHERE pseudo=:pseudo');
			$stmt->execute(array('pseudo' => $pseudo ));
			$rows=$stmt->fetchAll();
			$ids=array();
			foreach($rows as $row){
			    array_push($ids,$row['idcontact']);
			}
			return $ids;

		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}
	
	public function apply_for($idoffre,$disponibilite,$date_debut,$jeh_estime,$message){
			$stmt = $this->_db->prepare('INSERT INTO candidature (idoffre,id_intervenant,status,message,disponibilite,date_debut,jeh_estime) 
			VALUES ( :id_offre, :id_intervenant,:status, :message, :disponibilite, :date_debut, :jeh_estime)');
			$stmt->execute(array(
				':id_offre' => $idoffre,
				':id_intervenant' => $_SESSION['idcontact'],
				':status' => '0',
				':message' => $message,
				':disponibilite' => $disponibilite,
				':date_debut' => $date_debut,
				':jeh_estime' => $jeh_estime,
			));
	}
	
	    public function get_competences() {

        try {
            $stmt = $this
                ->_db
                ->prepare('SELECT nom FROM competence');
            $stmt->execute();
            $rows = $stmt->fetchAll();
            $ids = array();
            foreach ($rows as $row) {
                array_push($ids, $row['nom']);
            }
            return $ids;
        }
        catch(PDOException $e) {
            echo '<p class="bg-danger">' . $e->getMessage() . '</p>';
        }
    }
	
	 public function get_competences_intervenant() {
        try {
            $stmt = $this
            	->_db
                ->prepare('SELECT nom FROM competence_intervenant WHERE idcontact=:id');
            $stmt->execute(array('id' => $_SESSION['idcontact']));
            $rows = $stmt->fetchAll();
            $tab = array();
            if ($stmt->rowCount() == 0){
            	return array();
            }
            else{
            foreach ($rows as $row) {
                array_push($tab, $row['nom']);
            }
            return $tab;
        }}
        catch(PDOException $e) {
            echo '<p class="bg-danger">' . $e->getMessage() . '</p>';
        }
    }
    
    public function delete_competences_condidat($id) {

        try {
            $stmt = $this
                ->_db
                ->prepare('DELETE FROM competence_intervenant WHERE idcontact=:id');
             $stmt->execute(array('id' => $id));
            }
        catch(PDOException $e) {
            echo '<p class="bg-danger">' . $e->getMessage() . '</p>';
        }
    }
    
    public function add_secu($num_secu) {

        try {
            $stmt = $this
                ->_db
                ->prepare('UPDATE intervenant SET num_secu = :num_secu WHERE idcontact = :idcontact;');
             $stmt->execute(array('num_secu' => $num_secu,
             'idcontact' => $_SESSION['idcontact']));
            }
        catch(PDOException $e) {
            echo '<p class="bg-danger">' . $e->getMessage() . '</p>';
        }
    }
    
    public function add_address($adresse) {

        try {
            $stmt = $this
                ->_db
                ->prepare('UPDATE contact SET adresse = :adresse WHERE idcontact = :idcontact;');
             $stmt->execute(array('adresse' => $adresse,
             'idcontact' => $_SESSION['idcontact']));
            }
        catch(PDOException $e) {
            echo '<p class="bg-danger">' . $e->getMessage() . '</p>';
        }
    }
    
     public function validate_account() {

        try {
            $stmt = $this->_db->prepare('INSERT INTO demande_validation_intervenant VALUES(:id_intervenant, :id_charge)');
             $stmt->execute(array('id_intervenant' => $_SESSION['idcontact'],
             'id_charge' => NULL));
            }
        catch(PDOException $e) {
            echo '<p class="bg-danger">' . $e->getMessage() . '</p>';
        }
    }
    
}
?>