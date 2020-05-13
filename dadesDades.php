
<?php
include './DBconn.php';
DBconne::insertInitial();

class DadesDades extends DBconne {

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
            $result = $this->connect()->query('SELECT * FROM ventas');
            

        } else {
            $result = $this->connect()->query('SELECT * FROM ventas where ' . $urlbona);

        }
        return $result;    
    }
}
?>