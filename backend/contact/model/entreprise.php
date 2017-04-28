<?php
class Entreprise {

    public $_db;
	public $id  ;
	public $nom  ;
	public $domaine  ;
	public $type  ;
	public $adresse  ;
	public $city  ;
	public $zipcode  ;
	public $mail  ;
	public $phone  ;
	public $comment  ;

    function __construct($db,$id){
    	$this->_db = $db;
    	$this->id=$id;
    	try {
			$stmt = $this->_db->prepare('SELECT * FROM entreprise_all WHERE id=:id');
			$stmt->execute(array('id' => $id
			));
        $info=$stmt->fetch();
		$this->nom  =$info['nom'];
		$this->domaine  =$info['domaine'];
		$this->type  =$info['type'];
		$this->adresse  =$info['adresse'];
		$this->city  =$info['city'];
		$this->zipcode  =$info['zipcode'];
		$this->mail  =$info['mail'];
		$this->phone  =$info['phone'];
		$this->comment  =$info['comment'];
       
        
		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
    }



	public function get_ids(){

		try {
			$stmt = $this->_db->prepare('SELECT id FROM entreprise');
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
public function get_types(){

try {
	$stmt = $this->_db->prepare('SELECT type FROM type_entreprise');
	$stmt->execute();
	$rows=$stmt->fetchAll();
	$ids=array();
	foreach($rows as $row){
	    array_push($ids,$row['type']);
	}
	return $ids;

} catch(PDOException $e) {
    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
}
}
public function get_domaines(){

try {
	$stmt = $this->_db->prepare('SELECT domaine FROM domaine_entreprise');
	$stmt->execute();
	$rows=$stmt->fetchAll();
	$ids=array();
	foreach($rows as $row){
	    array_push($ids,$row['domaine']);
	}
	return $ids;

} catch(PDOException $e) {
    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
}
}
	public function get_names(){
			$stmt = $this->_db->prepare('SELECT id,nom FROM entreprise');
			$stmt->execute();
			$rows=$stmt->fetchAll();
			return $rows;
		
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
	public function add($nom,$type,$domaine,$mail,$phone,$adresse,$zipcode,$city,$comment){
			$stmt = $this->_db->prepare('INSERT INTO entreprise (nom,domaine,type,adresse,city,zipcode,mail,phone,comment) VALUES (:nom,:domaine,:type,:adresse,:city,:zipcode,:mail,:phone,:comment)');
			$stmt->execute(array(
					':nom'=>$nom,
					':domaine'=>$domaine,
					':type'=>$type,
					':adresse'=>$adresse,
					':city'=>$city,
					':zipcode'=>$zipcode,
					':mail'=>$mail,
					':phone'=>$phone,
					':comment'=>$comment,
			));
	}



}
?>