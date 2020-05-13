<?php

class DBconne {


    function insertInitial() {
        require_once 'vendor/autoload.php';

        $host = 'localhost';
        $dbname = 'dades_guma';
        $user = 'root';
        $password = '';
        $conn;

        $faker = Faker\Factory::create();
        $conn = mysqli_connect($host, $user, $password, $dbname);

        //mirem que la db no estigui buida per a que no ho faci 50000 cops
        $sql1 = "SELECT * FROM ventas";
        $result = $conn->query($sql1);
        
        if ($result->num_rows >= 1) {
            //no s'inserta res, detecta que hi han valors
        } else {
            for ($i = 0; $i < 1000; $i++) {
            
                //dades
                $events = $faker->dateTimeBetween($startDate = '-30 years', $endDate = 'now', $timezone = null);
                $client = $faker->name;
                $fecha = $dateFormate = $events->format('Y-m-d');
                $qty = $faker->biasedNumberBetween($min = 1, $max = 10000, $function = 'sqrt');
                $sql = "INSERT INTO ventas (name, date, qty)
                VALUES ('" . $client . "', '" . $fecha . "', '" . $qty . "')";
                $result = $conn->query($sql);
            }
            $conn->close();
        }
        
    }
    
}
?>