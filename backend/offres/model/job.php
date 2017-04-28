<?php
require_once ('../../contact/model/contact.php');
require_once ('../../contact/model/entreprise.php');
class Job {
    public $_db;
    public $id;
    public $ref;
    public $nom;
    public $status;
    public $date_mise_jour;
    public $date_debut;
    public $type;
    public $nombre_jeh;
    public $prix_jeh;
    public $prix_ttc;
    public $duree;
    public $origin;
    public $comment;
    public $confiance;
    public $charge_etude;
    public $client;
    public $entreprise;
    public $description_privee;
    public $description_public;
    public $rubrique;
    public $competences=array();
    public $candidats=array();
    public $hired=array();

    function __construct($db, $id) {
        $this->_db = $db;
        $this->id = $id;
        try {
            $stmt = $this
                ->_db
                ->prepare('SELECT * FROM appel_offre WHERE id=:id');
            $stmt->execute(array(
                'id' => $id
            ));
            $info = $stmt->fetch();
            $this->ref = $info[' '];
            $this->nom = $info['nom'];
            $this->status = $info['status'];
            $this->date_mise_jour = $info['date_mise_jour'];
            $this->date_debut = $info['date_debut'];
            $this->type = $info['type'];
            $this->nombre_jeh = $info['nombre_jeh'];
            $this->prix_jeh = $info['prix_jeh'];
            $this->prix_ttc = $info['prix_ttc'];
            $this->duree = $info['duree'];
            $this->origin = $info['origin'];
            $this->comment = $info['comment'];
            $this->confiance = $info['confiance'];
            $this->charge_etude = new Contact($db, $info['charge_etude']);
            $this->client = new Contact($db, $info['client']);;
            $this->entreprise = new Entreprise($db, $info['entreprise']);
            $this->description_privee = $info['description_privee'];
            $this->description_public = $info['description_public'];
            $this->rubrique = $info['rubrique'];
            $stmt = $this->_db->prepare('SELECT competence FROM competence_offre where id=:id');
            $stmt->execute(array(':id'=>$id));
            $rows = $stmt->fetchAll();
            foreach ($rows as $row) {
                array_push($this->competences, $row['competence']);
            }
            $stmt = $this->_db->prepare('SELECT * FROM candidature where idoffre=:id');
            $stmt->execute(array(':id'=>$id));
            $rows = $stmt->fetchAll();
            foreach ($rows as $row) {
                array_push($this->candidats,new Contact($db,$row['id_intervenant']));
            }
        
            $stmt = $this->_db->prepare('SELECT * FROM candidature where idoffre=:id and status=1');
            $stmt->execute(array(':id'=>$id));
            $rows = $stmt->fetchAll();
            foreach ($rows as $row) {
                array_push($this->hired,new Contact($db,$row['id_intervenant']));
            }
        }
        catch(PDOException $e) {
            echo '<p class="bg-danger">' . $e->getMessage() . '</p>';
        }
    }

    public function get_ids() {

        try {
            $stmt = $this
                ->_db
                ->prepare('SELECT id FROM appel_offre');
            $stmt->execute();
            $rows = $stmt->fetchAll();
            $ids = array();
            foreach ($rows as $row) {
                array_push($ids, $row['id']);
            }
            return $ids;

        }
        catch(PDOException $e) {
            echo '<p class="bg-danger">' . $e->getMessage() . '</p>';
        }
    }
    public function get_rub_ids($rubrique) {

        try {
            $stmt = $this
                ->_db
                ->prepare('SELECT id FROM appel_offre where rubrique=:rubrique');
            $stmt->execute(array(
                'rubrique' => $rubrique
            ));
            $rows = $stmt->fetchAll();
            $ids = array();
            foreach ($rows as $row) {
                array_push($ids, $row['id']);
            }
            return $ids;

        }
        catch(PDOException $e) {
            echo '<p class="bg-danger">' . $e->getMessage() . '</p>';
        }
    }
    public function get_my_ids() {

        try {
            $stmt = $this
                ->_db
                ->prepare('SELECT id FROM appel_offre where charge_etude=:charge_etude');
            $stmt->execute(array(
                'charge_etude' => $_SESSION['adminid']
            ));
            $rows = $stmt->fetchAll();
            $ids = array();
            foreach ($rows as $row) {
                array_push($ids, $row['id']);
            }
            return $ids;

        }
        catch(PDOException $e) {
            echo '<p class="bg-danger">' . $e->getMessage() . '</p>';
        }
    }
    public function get_types() {

        try {
            $stmt = $this
                ->_db
                ->prepare('SELECT type FROM type_offre');
            $stmt->execute();
            $rows = $stmt->fetchAll();
            $ids = array();
            foreach ($rows as $row) {
                array_push($ids, $row['type']);
            }
            return $ids;

        }
        catch(PDOException $e) {
            echo '<p class="bg-danger">' . $e->getMessage() . '</p>';
        }
    }
    public function get_origines() {

        try {
            $stmt = $this
                ->_db
                ->prepare('SELECT origine FROM origine_offre');
            $stmt->execute();
            $rows = $stmt->fetchAll();
            $ids = array();
            foreach ($rows as $row) {
                array_push($ids, $row['origine']);
            }
            return $ids;

        }
        catch(PDOException $e) {
            echo '<p class="bg-danger">' . $e->getMessage() . '</p>';
        }
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
    public function remove() {

        try {
            $stmt = $this
                ->_db
                ->prepare('DELETE FROM appel_offre where id= :id');
            $stmt->execute(array(
                'id' => $this->id
            ));
        }
        catch(PDOException $e) {
            echo '<p class="bg-danger">' . $e->getMessage() . '</p>';
        }
    }
    public function add($name, $end_date, $type, $origine, $contact_select, $entreprise_select, $safety, $private, $public) {
        $stmt = $this
            ->_db
            ->prepare('INSERT INTO appel_offre (nom,date_debut,type,origin,client,entreprise,confiance,
			description_public,description_privee,charge_etude,rubrique,status) VALUES ( :name,:end_date,:type,:origine,:contact_select,
			:entreprise_select,:safety,:public,:private,:charge,0,0)');
        $stmt->execute(array(
            ':name' => $name,
            ':end_date' => $end_date,
            ':type' => $type,
            ':origine' => $origine,
            ':contact_select' => $contact_select,
            ':entreprise_select' => $entreprise_select,
            ':safety' => $safety,
            ':private' => $private,
            ':public' => $public,
            ':charge' => $_SESSION['adminid']
        ));
    }
        public function set_ap($ref,$nbjeh,$prixjeh,$prixttc,$duree,$type,$safety){
				try {
			$stmt = $this->_db->prepare('UPDATE appel_offre set ref=:ref,
			nombre_jeh=:nbjeh,prix_jeh=:prixjeh,prix_ttc=:prixttc,duree=:duree,
			confiance=:safety,type=:type, date_mise_jour=current_date where id=:id');
			$stmt->execute(array(
			':id'=> $this->id ,
			':ref'=>$ref,
			':nbjeh'=>$nbjeh,
			':prixjeh'=>$prixjeh,
			':prixttc'=>$prixttc,
			':duree'=>$duree,
			':safety'=>$safety,
			':type'=>$type,
			
			));
	}
	 catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}


    	public function set_rubrique($rub){
				try {
			$stmt = $this->_db->prepare('UPDATE appel_offre set rubrique=:lock, date_mise_jour=current_date where id=:id');
			$stmt->execute(array(
					':id'=> $this->id ,
					':lock'=> $rub
			));
	}
	 catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}


	public function get_discussion($interv){

			$stmt = $this->_db->prepare('SELECT sender,charge,intervenant,message,sent_date from discussion where offre=:offre and intervenant=:interv order by sent_date');
			$stmt->execute(array(':offre' => $this->id,
			':interv'=>$interv
			));
			$rows=$stmt->fetchAll();
			$ids=array();
			foreach($rows as $row){
					array_push($ids,$row);
				}
			return $ids;

		
	}
	public function message($message,$interv){

			$stmt = $this->_db->prepare('INSERT INTO discussion (offre,charge,intervenant,sent_date,message,sender) VALUES (:id,:charge,:intervenant,CURRENT_TIMESTAMP,:message,:sender)');
			$stmt->execute(array(':id' => $this->id,
			':message' => $message,
			':charge' => $this->charge_etude->id,
			':intervenant' => $interv,
			':sender' => $_SESSION['adminid'],
			));

		
	}
	public function hireFire($interv,$state){
	    			$stmt = $this->_db->prepare('UPDATE candidature set status=:lock where id_intervenant=:interv and idoffre=:idoffre');
			$stmt->execute(array(
					':idoffre'=> $this->id ,
					':interv'=> $interv ,
					':lock'=> $state
			));
	}


}
?>
