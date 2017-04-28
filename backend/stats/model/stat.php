<?php
class Stat {

    public $_db;
    function __construct($db){
    	$this->_db = $db;

    }
    
    public function propects_type(){
		try {
			$stmt = $this->_db->prepare('SELECT type,count(*) FROM prospection  group by type');
			$stmt->execute();
			$rows=$stmt->fetchAll();
			return $rows;

		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}
	    public function propects_origin(){
		try {
			$stmt = $this->_db->prepare('SELECT origin,count(*) FROM prospection  group by origin');
			$stmt->execute();
			$rows=$stmt->fetchAll();
			return $rows;

		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}

}
?>