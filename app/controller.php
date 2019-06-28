<?php
	require_once("functions.php");
	require_once("database.php");
	
	class User {
		public $id;
		public $firstname;
		public $lastname;
		public $email;
		public $phone;
		public $gender;
		public $state_of_origin;
		public $address;
		public $next_of_kin;
		public $password;
		public $mode_of_id;
		public $id_number;
		public $reg_date;

		public function find_all_users(){
			return self::find_by_sql("SELECT * FROM users");
		}

		public static function find_by_id($id=0){
			global $database; // Calling the Database variable from the database.php file
			$result_array = self::find_by_sql("SELECT * FROM users WHERE id = {$id} LIMIT 1");
			return !empty($result_array) ? array_shift($result_array) : false;
		}


		public static function find_by_sql($sql=""){
			global $database; // Calling the Database variable from the database.php file
			$result_set = $database->query($sql);
			$object_array = array();
			while($row = $database->fetch_data($result_set)){
				$object_array[] = self::instantiate($row);
			}

			return $object_array;
		}

		public static function authenticate($email="", $password=""){
			global $database; // Calling the Database variable from the database.php file
			$email = $database->escaped_string($email);
			$password = $database->escaped_string($password);

			$sql = "SELECT * FROM users ";
			$sql .= "WHERE email = '{$email}' ";
			$sql .= "AND password = '{$password}' ";
			$sql .= "LIMIT 1";

			$result_array = self::find_by_sql($sql);
			return !empty($result_array) ? array_shift($result_array) : false;
		}

		private static function instantiate($record){
			// We could check that record exist and is an array

			// This step is a simple but a long form approach:
			$object = new self;
			/*$object->id = $record['id'];
			$object->username   = $record['username'];
			$object->password   = $record['password'];
			$object->firstname  = $record['firstname'];
			$object->lastname   = $record['lastname'];*/

			// A more dynamic and short form approach of the same code above:
			foreach ($record as $attribute => $value) {
				if($object->has_attribute($attribute)){
					$object->$attribute = $value;
				}
			}

			return $object;
		}

		private function has_attribute($attribute){
			// get_object_vars returns an associative array with all attributes
			// (incl. private ones!) as keys and their current values as the values
			$object_vars = get_object_vars($this);

			//We don't care about the values, we just want to know if the key exist
			//Will return true or false
			return array_key_exists($attribute, $object_vars);
		}
	}


	class Vehicle {
		public $id;
		public $user_id;
		public $vehicle_type;
		public $vehicle_make;
		public $vehicle_model;
		public $vehicle_colour;
		public $vehicle_age;
		public $vehicle_reg_number;
		public $chasis_number;
		public $state_trans_number;
		public $route_plied;
		public $reg_date;

		public static function find_by_sql($sql=""){
			global $database; // Calling the Database variable from the database.php file
			$result_set = $database->query($sql);
			$object_array = array();
			while($row = $database->fetch_data($result_set)){
				$object_array[] = self::instantiate($row);
			}

			return $object_array;
		}

		private static function instantiate($record){
			// We could check that record exist and is an array

			// This step is a simple but a long form approach:
			$object = new self;
			/*$object->id = $record['id'];
			$object->username   = $record['username'];
			$object->password   = $record['password'];
			$object->firstname  = $record['firstname'];
			$object->lastname   = $record['lastname'];*/

			// A more dynamic and short form approach of the same code above:
			foreach ($record as $attribute => $value) {
				if($object->has_attribute($attribute)){
					$object->$attribute = $value;
				}
			}

			return $object;
		}

		private function has_attribute($attribute){
			// get_object_vars returns an associative array with all attributes
			// (incl. private ones!) as keys and their current values as the values
			$object_vars = get_object_vars($this);

			//We don't care about the values, we just want to know if the key exist
			//Will return true or false
			return array_key_exists($attribute, $object_vars);
		}

	}

	class Driver {
		public $id;
		public $user_id;
		public $vehicle_id;
		public $firstname;
		public $lastname;
		public $address;
		public $state_of_origin;
		public $phone;
		public $gender;
		public $next_of_kin;
		public $valid_id_type;
		public $id_number;
		public $guarantor_name;
		public $guarantor_id_type;
		public $guarantor_id_number;
		public $guarantor_photo;
		public $reg_date;

		public static function find_by_sql($sql=""){
			global $database; // Calling the Database variable from the database.php file
			$result_set = $database->query($sql);
			$object_array = array();
			while($row = $database->fetch_data($result_set)){
				$object_array[] = self::instantiate($row);
			}

			return $object_array;
		}

		private static function instantiate($record){
			// We could check that record exist and is an array

			// This step is a simple but a long form approach:
			$object = new self;
			/*$object->id = $record['id'];
			$object->username   = $record['username'];
			$object->password   = $record['password'];
			$object->firstname  = $record['firstname'];
			$object->lastname   = $record['lastname'];*/

			// A more dynamic and short form approach of the same code above:
			foreach ($record as $attribute => $value) {
				if($object->has_attribute($attribute)){
					$object->$attribute = $value;
				}
			}

			return $object;
		}

		private function has_attribute($attribute){
			// get_object_vars returns an associative array with all attributes
			// (incl. private ones!) as keys and their current values as the values
			$object_vars = get_object_vars($this);

			//We don't care about the values, we just want to know if the key exist
			//Will return true or false
			return array_key_exists($attribute, $object_vars);
		}

	}

  	class Admin {
		public $id;
		public $fullname;
		public $email;
		public $phone;
		public $password;
		public $reg_date;

		public function find_all_admin(){
			return self::find_by_sql("SELECT * FROM admin");
		}

		public static function find_by_id($id=0){
			global $database; // Calling the Database variable from the database.php file
			$result_array = self::find_by_sql("SELECT * FROM admin WHERE id = {$id} LIMIT 1");
			return !empty($result_array) ? array_shift($result_array) : false;
		}


		public static function find_by_sql($sql=""){
			global $database; // Calling the Database variable from the database.php file
			$result_set = $database->query($sql);
			$object_array = array();
			while($row = $database->fetch_data($result_set)){
				$object_array[] = self::instantiate($row);
			}

			return $object_array;
		}

		public static function authenticate($email="", $password=""){
			global $database; // Calling the Database variable from the database.php file
			$email = $database->escaped_string($email);
			$password = $database->escaped_string($password);

			$sql = "SELECT * FROM admin ";
			$sql .= "WHERE email = '{$email}' ";
			$sql .= "AND password = '{$password}' ";
			$sql .= "LIMIT 1";

			$result_array = self::find_by_sql($sql);
			return !empty($result_array) ? array_shift($result_array) : false;
		}

		private static function instantiate($record){
			// We could check that record exist and is an array

			// This step is a simple but a long form approach:
			$object = new self;
			/*$object->id = $record['id'];
			$object->username   = $record['username'];
			$object->password   = $record['password'];
			$object->firstname  = $record['firstname'];
			$object->lastname   = $record['lastname'];*/

			// A more dynamic and short form approach of the same code above:
			foreach ($record as $attribute => $value) {
				if($object->has_attribute($attribute)){
					$object->$attribute = $value;
				}
			}

			return $object;
		}

		private function has_attribute($attribute){
			// get_object_vars returns an associative array with all attributes
			// (incl. private ones!) as keys and their current values as the values
			$object_vars = get_object_vars($this);

			//We don't care about the values, we just want to know if the key exist
			//Will return true or false
			return array_key_exists($attribute, $object_vars);
		}
	}