<?php
require_once('entreprise.php');
class Contact {

    public $_db;
    public $nom ;
    public $id;
    public $prenom ;
    public $mail;
    public $phone;
    public $pseudo;
    public $promo;
    public $secu;
    public $adresse;
    public $entreprises;
    public $is_charge=false;
    public $is_intervenant=false;
    public $competences=array();

    function __construct($db,$id){
    	$this->_db = $db;
    	$this->id=$id;
    	try {
			$stmt = $this->_db->prepare('SELECT * FROM contact WHERE idcontact=:id');
			$stmt->execute(array('id' => $id
			));
        $info=$stmt->fetch();
        $this->nom=$info['nom'];
        $this->adresse=$info['adresse'];
        $this->prenom=$info['prenom'];
        $this->mail=$info['mail'];
        $this->phone=$info['phone'];
		$stmt = $this->_db->prepare('SELECT pseudo,promo FROM charge_etude WHERE idcontact=:id');
		$stmt->execute(array('id' => $id
		));
		if($stmt->rowCount()==1){
			 $this->is_charge=true;
		     $info=$stmt->fetch();
		     $this->promo=$info['promo'];
		     $this->pseudo=$info['pseudo'];
		}
	    $stmt = $this->_db->prepare('SELECT * FROM intervenant WHERE idcontact=:id');
		$stmt->execute(array('id' => $id
		));
		if($stmt->rowCount()==1){
		 
	     $info=$stmt->fetch();
	     $this->is_intervenant=$info['status_intervenant'];
	     $this->promo=$info['promo'];
	     $this->pseudo=$info['pseudo'];
	     $this->secu=$info['num_secu'];
		}
		
		$stmt = $this->_db->prepare('SELECT id FROM entreprise_contact WHERE idcontact=:id');
		$stmt->execute(array('id' => $id
		));
		$info=$stmt->fetchAll();
		$this->entreprises=array();
		foreach ($info as $identreprise){
		    array_push($this->entreprises,new Entreprise($db,$identreprise['id']));
		}
		$stmt = $this->_db->prepare('SELECT nom FROM competence_intervenant where idcontact=:id');
		$stmt->execute(array(':id'=>$id));
		$rows = $stmt->fetchAll();
		foreach ($rows as $row) {
		array_push($this->competences, $row['nom']);
		}

		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
    }

	public function get_names(){
			$stmt = $this->_db->prepare('SELECT idcontact, nom, prenom FROM contact');
			$stmt->execute();
			$rows=$stmt->fetchAll();
			return $rows;
		
	}

	public function get_ids(){

		try {
			$stmt = $this->_db->prepare('SELECT idcontact FROM contact ORDER BY nom');
			$stmt->execute();
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
		public function get_recrutement_ids(){

		try {
			$stmt = $this->_db->prepare('SELECT intervenant FROM demande_validation_intervenant order by charge desc');
			$stmt->execute();
			$rows=$stmt->fetchAll();
			$ids=array();
			foreach($rows as $row){
			    array_push($ids,$row['intervenant']);
			}
			return $ids;

		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}

	public function get_admin_ids(){

		try {
			$stmt = $this->_db->prepare('SELECT idcontact FROM charge_etude');
			$stmt->execute();
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
		public function get_intervenant_ids(){

		try {
			$stmt = $this->_db->prepare('SELECT idcontact FROM intervenant');
			$stmt->execute();
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
	public function get_count(){

		try {
			$stmt = $this->_db->prepare('SELECT idcontact FROM contact');
			$stmt->execute();

			return $stmt->rowCount();

		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}
	public function remove(){

		try {
		    		    $stmt = $this->_db->prepare('DELETE FROM contact where idcontact= :id');
		$stmt->execute(array('id' => $this->id
		));
				    $stmt = $this->_db->prepare('DELETE FROM intervenant where idcontact= :id ');
		$stmt->execute(array('id' => $this->id
		));
				    $stmt = $this->_db->prepare('DELETE FROM charge_etude where idcontact= :id ;');
		$stmt->execute(array('id' => $this->id
		));
		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}
		public function activate(){

		try {
		    		    $stmt = $this->_db->prepare('UPDATE intervenant set status_intervenant=TRUE where idcontact= :id');
		$stmt->execute(array('id' => $this->id
		));
				    $stmt = $this->_db->prepare('UPDATE demande_validation_intervenant set charge=:charge where intervenant= :id ');
		$stmt->execute(array('id' => $this->id,
		':charge'=>$_SESSION['adminid']
		));
		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}
			public function desactivate(){

		try {
		    		    $stmt = $this->_db->prepare('UPDATE intervenant set status_intervenant=FALSE where idcontact= :id');
		$stmt->execute(array('id' => $this->id
		));
				    $stmt = $this->_db->prepare('UPDATE demande_validation_intervenant set charge= null where intervenant= :id ');
		$stmt->execute(array('id' => $this->id,
		));
		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}
	public function add($nom,$prenom,$mail,$phone,$adresse){
			$stmt = $this->_db->prepare('INSERT INTO contact (nom,prenom,mail,phone,adresse) VALUES ( :nom, :prenom,:email, :phone, :adresse)');
			$stmt->execute(array(
				':phone' => $phone,
				':nom' => $nom,
				':prenom' => $prenom,
				':email' => $mail,
				':adresse' => $adresse,
			));
			return $this->_db->lastInsertId('contact_idcontact_seq');
	}
		public function update($id,$nom,$prenom,$mail,$phone,$adresse){
			$stmt = $this->_db->prepare('UPDATE  contact SET  nom=:nom,prenom=:prenom,mail=:mail,phone=:phone,adresse=:adresse where idcontact=:id');
			$stmt->execute(array(
				':phone' => $phone,
				':nom' => $nom,
				':prenom' => $prenom,
				':mail' => $mail,
				':adresse' => $adresse,
				':id'=> $id
			));
	}
	public function get_candidature($id){
			$stmt = $this->_db->prepare('SELECT * from candidature where idoffre=:idoffre and id_intervenant=:idinter order by status' );
			$stmt->execute(array(
				':idoffre' => $id,
				':idinter' => $this->id,
			));
			$rows=$stmt->fetchAll();
			return $rows[0];
	}
	
		public function candidat_status($idoffre){
	    			$stmt = $this->_db->prepare('SELECT status from candidature  where id_intervenant=:interv and idoffre=:idoffre');
			$stmt->execute(array(
					':idoffre'=> $idoffre ,
					':interv'=> $this->id ,
			));	    
			$row=$stmt->fetch();
			return $row['status'];
	}
}
?>