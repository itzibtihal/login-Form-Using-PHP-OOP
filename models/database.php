
<?php 

    class Database {
        private static $connection;
    
        
        private function __construct() {}
    
        public static function getConnection() {
            if (!self::$connection) {
               
                $host = "localhost";
                $username = "root";
                $password = "";
                $database = "oop_reglog";
    
                self::$connection = new mysqli($host, $username, $password, $database);
    
                // Check the connection
                if (self::$connection->connect_error) {
                    die("Connection failed: " . self::$connection->connect_error);
                }else{
                    echo "connected";
                }
            }
    
            return self::$connection;
        }
    
       
    
    }
    
    //  use the Database class
    $db = Database::getConnection();
    
    
    
        
