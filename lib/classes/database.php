<?php

class Database{

	private static $user = 'root';
	private static $pass = '';
	private static $dsn = 'mysql:host=localhost;dbname=cookbook';
	private static $dbcon;

	private function __construct(){

	}
//get pdo connection
	public static function getDb(){
		if(!isset(self::$dbcon))
		try{
			self::$dbcon = new PDO(self::$dsn, self::$user, self::$pass);

		//show the sql error
			self::$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}catch
			(PDOException $e){
				echo $msg = $e->getMessage();
				// include 'customerror.php';
				exit();
			}


		return self::$dbcon;
	}
}



?>