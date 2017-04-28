<?php
require_once('../../contact/model/contact.php');
require_once('../../contact/model/entreprise.php');
class Prospect {

    public $_db;
	public $id  ;
	public $state  ;
	public $start_date  ;
	public $update_date ;
	public $end_date ;
	public $type  ;
	public $origin ;
	public $comment ;
	public $safety  ;
	public $id_charge  ;
	public $id_contact  ;
	public $id_company  ;
	public $goals  ;
	public $lock  ;

    function __construct($db,$id){
    	$this->_db = $db;
    	$this->id=$id;
    	try {
			$stmt = $this->_db->prepare('SELECT * FROM prospection  WHERE id=:id');
			$stmt->execute(array('id' => $id
			));
        $info=$stmt->fetch();
		$this->state  =$info['state'];
		$this->start_date  =$info['start_date'];
		$this->update_date =$info['update_date'];
		$this->end_date =$info['end_date'];
		$this->type  =$info['type'];
		$this->origin =$info['origin'];
		$this->comment =$info['comment'];
		$this->safety  =$info['safety'];
		$this->id_charge  =new Contact($db,$info['id_charge']);
		$this->id_contact  =new Contact($db,$info['id_contact']);
		$this->id_company  =new Entreprise($db,$info['id_company']);
		$this->goals  =$info['goals'];
		$this->lock  =$info['lock'];
       
        
		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
    }

	public function get_ids(){

		try {
			$stmt = $this->_db->prepare('SELECT id FROM prospection');
			$stmt->execute();
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
	public function get_potential_ids(){

		try {
			$stmt = $this->_db->prepare('SELECT id FROM prospection where lock=0');
			$stmt->execute();
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
		public function get_signed_ids(){

		try {
			$stmt = $this->_db->prepare('SELECT id FROM prospection where lock=1');
			$stmt->execute();
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

	public function remove(){

		try {
		    		    $stmt = $this->_db->prepare('DELETE FROM prospection where id= :id');
		$stmt->execute(array('id' => $this->id
		));

		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}
	public function set_signed(){
				try {
			$stmt = $this->_db->prepare('UPDATE prospection set lock=:lock,end_date=current_date,update_date=current_date where id=:id');
			$stmt->execute(array(
					':id'=> $this->id ,
					':lock'=> '1'
			));
	}
	 catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}
		public function set_unsigned(){
				try {
			$stmt = $this->_db->prepare('UPDATE prospection set lock=:lock, end_date=NULL,update_date=current_date where id=:id');
			$stmt->execute(array(
					':id'=> $this->id ,
					':lock'=> '0'
			));
	}
	 catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}
	
	public function add($idcontact,$id,$entreprise,$type,$origin,$rate,$goals){
		try {
			$stmt = $this->_db->prepare('INSERT INTO prospection (state,start_date,type,origin,safety,id_charge,id_contact,id_company,goals,lock) VALUES ( :state,current_date,:type,:origin,:safety,:id_charge,:id_contact,:id_company,:goals,:lock)');
			$stmt->execute(array(
					':state'=> '0' ,
					':type'=> $type,
					':origin'=> $origin,
					':safety'=> $rate,
					':id_charge'=> $id,
					':id_contact'=> $idcontact,
					':id_company'=> $entreprise,
					':goals'=> $goals,
					':lock'=> '0'
			));
	}
	 catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}



}
?>