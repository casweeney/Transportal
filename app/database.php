<?php
	require_once("config.php");
	class Database {
		public static $connection;

		function __construct(){
			self::db_connection();
		}

		public static function db_connection(){
			self::$connection = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
		}

		public static function query($sql){
			$result = self::$connection->query($sql);
			!$result ? die("Query failed " .mysqli_error(self::$connection)) : "";
			return $result;
		}

		public static function fetch_data($result){
			$row = mysqli_fetch_assoc($result);
			return $row;
		}

		public static function escaped_string($string){
			$escaped_string = mysqli_real_escape_string(self::$connection, $string);
			$escaped_string = trim($escaped_string);
			$escaped_string = htmlspecialchars($escaped_string);
			return $escaped_string;
		}

		public static function inject_checker($field){
	        return (htmlspecialchars(htmlentities(trim(mysqli_real_escape_string(self::$connection, $field)))));
	    }
	}

	$database = new Database();
