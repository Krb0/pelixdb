<?php 
    require_once('config/config.php');
    class Database{
        private $hostname;
        private $username;
        private $password;
        private $dbname;

        private $error;

        function __construct()
        {
            $this->hostname = DB_HOST;
            $this->username = DB_USER;
            $this->password = DB_PASS;
            $this->dbname = DB_NAME;
        }

        public function getError(){
            return $this->error;
        }
        public function isConnected(){
            return $this->dbconnected;
        }

        function getHost(){
            return $this->hostname;
        }
        function getUser(){
            return $this->username;
        }
        function getPass(){
            return $this->password;
        }
        function getName(){
            return $this->dbname;
        }
    }
    $newDB = new Database();
    try{
        $conn = new mysqli($newDB->getHost(), $newDB->getUser(), $newDB->getPass(), $newDB->getName());
        if($conn->connect_error){
            die("<h2 style='color:white;'>La base de datos está mal seteada</h2>");
        }
        else{
        }
    }catch(Exception $e){
    }
?>