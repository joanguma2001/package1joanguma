<?php

class DBconn{
    private $host;
    private $dbname;
    private $user;
    private $password;
    public $conn;

    public function __construct(){
        $this->host = 'localhost';
        $this->dbname = 'lsg_musica';
        $this->user = 'root';
        $this->password = '';
    }

    public function connect(){
        $this->conn = null;

        try{
            $this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname,$this->user,$this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOEXCEPTION $e){
            echo 'Connection failed: '.$e->getMessage();
        }
        return $this->conn;
    }

    public function insertInitial() {
        require_once 'vendor/autoload.php';
        for ($i = 0; $i < 10; $i++) {
          echo $faker->clientName, "\n";
          echo $faker->dateTimeBetween($startDate = '-30 years', $endDate = 'now', $timezone = null), "\n";
          echo $faker->biasedNumberBetween($min = 1, $max = 10000, $function = 'sqrt');
        }
    }
}
?>