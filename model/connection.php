<?php 

    class Connection{
        protected $pdo;
        
        public function __construct(){
    
            try {
                $this->pdo = new PDO("mysql:dbname=ecommerce;host=localhost", "root","");
            } catch (PDOException $e) {
                echo "DATABASE ERROR: ".$e->getMessage();
                
            } catch (Exception $e) {
                echo "ERROR: ".$e->getMessage();
            }
        }
    }
?>