
<?php
include './DBconn.php';
DBconne::insertInitial();

class DadesDades extends DBconne {

    function getDades(){


        //nous valors
        //valor del parametre global
        $url = $_SERVER['QUERY_STRING'];
        
        $error = "<br><a style='color:red'>El tipo de parámetro introducido no existe en esta API o no es correcto. Prueba con name o data. </a> <br> 
        <a style='color:red'>El formato consiste en añadir lo siguiente al final del enlace: </a><br><br>
        <a style='color:red'>apiDades.php?name=miss </a><br>
        <a style='color:red'>apiDades.php?date=1995 </a><br><br>";



        if (empty($url)) {
            $result = $this->connect()->query('SELECT * FROM ventas');
        } else {
            if (strpos($url, 'name=') !== false) {
                $valorQueryName = $_GET["name"];
                $result = $this->connect()->query('SELECT * FROM ventas where name like "%' . $valorQueryName . '%"');

            } else if (strpos($url, 'date=') !== false){
                $valorQueryDate = $_GET["date"];
                $result = $this->connect()->query('SELECT * FROM ventas where date like "%' . $valorQueryDate . '%"');

            } else if (strpos($url, 'qty=') !== false){
                $valorQueryQty = $_GET["qty"];
                $result = $this->connect()->query('SELECT * FROM ventas where qty like "%' . $valorQueryQty . '%"');
            } else {
                echo $error;
                $result = $this->connect()->query('SELECT * FROM ventas');

            }
        }


        return $result;    
    }
}
?>