<?php
    class Database {
        // private static $user = 'raygiang';
        // private static $pass = 'cooking888'; // removed root
        // private static $dsn = 'mysql:host=project-cookbook.caablfu69mfx.us-east-2.rds.amazonaws.com:3306;dbname=cookbook';

        private static $user = 'root';
        private static $pass = 'root'; // removed root
        private static $dsn = 'mysql:host=localhost;dbname=cookbook';

        private static $dbh;

        private function __construct() {
        }

        public static function getDb() {
            if(!isset(self::$dbh)){
                try {
                    self::$dbh = new PDO(self::$dsn, self::$user, self::$pass);
                    self::$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                } catch (PDOException $e) {
                    $errMsg = $e->getMessage();
                    include 'views/customError.php';
                    exit();
                }
            }

            return self::$dbh;
        }
    }
?>
