<?php
require_once('../../../backend/contact/model/contact.php');
require_once('../../../backend/contact/model/entreprise.php');
class Job {
    public $_db;
    public $id  ;
    public $ref  ;
    public $nom  ;
    public $status  ;
    public $date_mise_jour ;
    public $date_debut ;
    public $type  ;
    public $nombre_jeh ;
    public $prix_jeh  ;
    public $prix_ttc  ;
    public $duree ;
    public $origin  ;
    public $comment ;
    public $confiance  ;
    public $charge_etude  ;
    public $client  ;
    public $entreprise  ;
    public $description_privee  ;
    public $description_public ;
    public $rubrique  ;

    function __construct($db,$id){
    	$this->_db = $db;
    	$this->id=$id;
    	try {
			$stmt = $this->_db->prepare('SELECT * FROM appel_offre WHERE id=:id');
			$stmt->execute(array('id' => $id
			));
        $info=$stmt->fetch();
        $this->ref  = $info[' '];
        $this->nom  = $info['nom'];
        $this->status  = $info['status'];
        $this->date_mise_jour = $info['date_mise_jour'];
        $this->date_debut = $info['date_debut'];
        $this->type  = $info['type'];
        $this->nombre_jeh = $info['nombre_jeh'];
        $this->prix_jeh  = $info['prix_jeh'];
        $this->prix_ttc  = $info['prix_ttc'];
        $this->duree = $info['duree'];
        $this->origin  = $info['origin'];
        $this->comment = $info['comment'];
        $this->confiance  = $info['confiance'];
        $this->charge_etude  = new Contact($db,$info['charge_etude']);
        $this->client  = new Contact($db,$info['client']);;
        $this->entreprise  = new Entreprise($db,$info['entreprise']);
        $this->description_privee  = $info['description_privee'];
        $this->description_public = $info['description_public'];
        $this->rubrique  = $info['rubrique'];
		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
    }


	public function get_rub_ids($rubrique){

		try {
			$stmt = $this->_db->prepare('SELECT id FROM appel_offre where rubrique=:rubrique');
			$stmt->execute(array('rubrique' => $rubrique
			));
			$rows=$stmt->fetchAll();
			$ids=array();
			foreach($rows as $row){
			    array_push($ids,$row['id']);
			}
			return $ids;

		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}
		public function get_my_ids(){

		try {
			$stmt = $this->_db->prepare('SELECT id FROM appel_offre where charge_etude=:charge_etude');
			$stmt->execute(array('charge_etude' => $_SESSION['idcontact']
			));
			$rows=$stmt->fetchAll();
			$ids=array();
			foreach($rows as $row){
			    array_push($ids,$row['id']);
			}
			return $ids;

		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}
	
			public function get_mycand_ids(){

		try {
			$stmt = $this->_db->prepare('SELECT idoffre FROM candidature where id_intervenant=:charge_etude and status=0');
			$stmt->execute(array('charge_etude' => $_SESSION['idcontact']
			));
			$rows=$stmt->fetchAll();
			$ids=array();
			foreach($rows as $row){
				$check=new Job($this->_db,$row['idoffre']);
				if($check->rubrique==1){
					array_push($ids,$row['idoffre']);
				}
			    
			}
			return $ids;

		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}
	
				public function get_mycurr_ids(){

		try {
			$stmt = $this->_db->prepare('SELECT idoffre FROM candidature where id_intervenant=:charge_etude and status=1');
			$stmt->execute(array('charge_etude' => $_SESSION['idcontact']
			));
			$rows=$stmt->fetchAll();
			$ids=array();
			foreach($rows as $row){
				$check=new Job($this->_db,$row['idoffre']);
				if($check->rubrique<4){
					array_push($ids,$row['idoffre']);
				}
			    
			}
			return $ids;

		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}
	
	
					public function get_myhist_ids(){

		try {
			$stmt = $this->_db->prepare('SELECT idoffre FROM candidature where id_intervenant=:charge_etude and status=1');
			$stmt->execute(array('charge_etude' => $_SESSION['idcontact']
			));
			$rows=$stmt->fetchAll();
			$ids=array();
			foreach($rows as $row){
				$check=new Job($this->_db,$row['idoffre']);
				if($check->rubrique>4){
					array_push($ids,$row['idoffre']);
				}
			    
			}
			return $ids;

		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}
	
	public function remove(){

		try {
		    		    $stmt = $this->_db->prepare('DELETE FROM appel_offre where id= :id');
		$stmt->execute(array('id' => $this->id
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
	}
		public function check_applied(){
			$stmt = $this->_db->prepare('SELECT * FROM candidature where idoffre=:idoffre and id_intervenant=:id');
			$stmt->execute(array(':idoffre' => $this->id,
			':id'=>$_SESSION['idcontact'],
			));

			return $stmt->rowCount();

		
	}
	
	
					public function get_discussion(){

			$stmt = $this->_db->prepare('SELECT sender,charge,intervenant,message,sent_date from discussion where offre=:offre and intervenant=:interv order by sent_date');
			$stmt->execute(array(':offre' => $this->id,
			':interv'=>$_SESSION['idcontact']
			));
			$rows=$stmt->fetchAll();
			$ids=array();
			foreach($rows as $row){
					array_push($ids,$row);
				}
			    
			
			return $ids;

		
	}
					public function message($message){

			$stmt = $this->_db->prepare('INSERT INTO discussion (offre,charge,intervenant,sent_date,message,sender) VALUES (:id,:charge,:intervenant,CURRENT_TIMESTAMP,:message,:sender)');
			$stmt->execute(array(':id' => $this->id,
			':message' => $message,
			':charge' => $this->charge_etude->id,
			':intervenant' => $_SESSION['idcontact'],
			':sender' => $_SESSION['idcontact'],
			));

		
	}


}
?>