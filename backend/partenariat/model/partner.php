<?php
require_once('../../contact/model/contact.php');
require_once('../../contact/model/entreprise.php');
class Partner {

    public $_db;
	public $id  ;
	public $status  ;
	public $update_date  ;
	public $start_date  ;
	public $end_date  ;
	public $comment ;
	public $id_company  ;
	public $origin  ;
	public $name ;
	public $id_charge  ;
	public $id_contact  ;
	public $goals  ;
	public $lock  ;
	public $rate  ;

    function __construct($db,$id){
    	$this->_db = $db;
    	$this->id=$id;
    	try {
			$stmt = $this->_db->prepare('SELECT * FROM partenariat  WHERE id=:id');
			$stmt->execute(array('id' => $id));
        $info=$stmt->fetch();
		$this->status  =$info['status'];
		$this->update_date  =$info['update_date'];
		$this->start_date  =$info['start_date'];
		$this->end_date  =$info['end_date'];
		$this->comment =$info['comment'];
		$this->id_company  =new entreprise($db,$info['id_company']);
		$this->origin  =$info['origin'];
		$this->name =$info['name'];
		$this->id_charge  =new contact($db,$info['id_charge']);
		$this->id_contact  =new contact($db,$info['id_contact']);
		$this->goals  =$info['goals'];
		$this->lock  =$info['lock'];
		$this->rate  =$info['rate'];
       
        
		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
    }

	public  function  get_ids(){

		try {
			$stmt = $this->_db->prepare('SELECT id FROM partenariat');
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
			$stmt = $this->_db->prepare('SELECT id FROM partenariat where lock=0');
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
			$stmt = $this->_db->prepare('SELECT id FROM partenariat where lock=1');
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
		    		    $stmt = $this->_db->prepare('DELETE FROM partenariat where id= :id');
		$stmt->execute(array('id' => $this->id
		));
		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}
	public function add($name,$origin,$start_date,$end_date,$goals,$rate,$contact_select,$entreprise_select){
			$stmt = $this->_db->prepare('INSERT INTO partenariat (name,origin,start_date,end_date,goals,rate,id_contact,id_company,id_charge,status,lock) VALUES ( :name, :origin, :start_date, :end_date, :goals, :rate, :id_contact, :id_company,:id_charge,:status,:lock)');
			$stmt->execute(array(
				':name' => $name,
				':origin' => $origin,
				':start_date' => $start_date,
				':end_date' => $end_date,
				':goals' => $goals,
				':rate' => $rate,
				':id_contact' => $contact_select,
				':id_company' => $entreprise_select,
				':id_charge' => $_SESSION['adminid'],
				':status'=>'0',
				':lock'=>'0',
			));
		
	}



}
?>