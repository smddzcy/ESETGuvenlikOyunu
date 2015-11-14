<?php 

class User_DB_Helper {

	public $db;

	public function __construct() {
		$this->db = new mysqli(Config::DB_HOST, Config::DB_USERNAME, Config::DB_PASSWORD, Config::DB_NAME);
	}

	/**
	 * Add user
	 *
	 * name, surname, platform, id, email, points
	 */
	public function addUser($data) {
		$keys = array_keys($data);
		$values = "";
		$first = true;
		foreach ($variable as $key => $value) {
			if(is_string($value)) {
				$values .= ($first) ? "", ", '" . $value . "'";
			} else {
				$values .= ($first) ? "", ", " . $value;
			}
			$first = false;
		}
		$query = "INSERT INTO users (".implode(", ", $keys).") VALUES (".implode(", ", $values).")";

		$result = $this->db->query($query);
		return $result;
	}


	public function getUser($id = false) {
		$query = "SELECT * FROM users";
		if($id === false) {
			return $this->db->query($query);
		} else {
			return $this->db->query($query." WHERE _ID=".$id);
		}
	}

	public function increasePoint($id, $point) {
		$query = "UPDATE users SET points=points+".$point." WHERE _ID=".$id;
		return $this->db->query($query);
	}

	public function decreasePoint($id, $point) {
		$query = "UPDATE users SET points=points+".$point." WHERE _ID=".$id;
		return $this->db->query($query);
	}


}

?>