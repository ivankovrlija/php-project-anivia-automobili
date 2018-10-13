<?php 
include_once("utill.php");

class DBConn{
	private static $connection;


	public static function setConnection(){
		self::$connection=new mysqli(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
	}
		public function getConnection(){
		return self::$connection;
	}

	public static function closeConnection(){
		self::$connection->close();
	}
}
 ?>