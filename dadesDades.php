
<?php
include 'DBconn.php';
DBconne::insertInitial();

class DadesDades extends DBconn {

    

    function getDades(){
        $host = 'localhost';
        $dbname = 'dades_guma';
        $user = 'root';
        $password = '';
        $conn;
        $conn = mysqli_connect($host, $user, $password, $dbname);

        $url = $_SERVER['QUERY_STRING'];
        $urlbona=  str_replace("%22","'",$url);
        if (empty($url)) {
            //$result = $this->connect()->query('SELECT * FROM ventas');
            $sql1 = "SELECT * FROM ventas";
            $result = $conn->query($sql1);

        } else {
            $sql2 = $this->connect()->query('SELECT * FROM ventes where ' . $urlbona);
            $result = $conn->query($sql2);


        }


        return $result;

        
    }
}
?>