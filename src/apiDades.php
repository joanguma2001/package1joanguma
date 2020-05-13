<?php

include 'dadesDades.php';

class ApiDades{

    function getAll(){

        

        $dadesDades = new DadesDades();
        $dadesDade = array();
        $dadesDade['register'] = array();
        
        $result = $dadesDades->getDades();
        if($result->rowCount()){
          while($row = $result->fetch(PDO::FETCH_ASSOC)){
              $register = array(
                  'name' => $row['name'],
                  'date' => $row['date'],
                  'qty' => $row['qty'],
              );
              array_push($dadesDade['register'], $register);
          }

            http_response_code(200);
            echo json_encode($dadesDade);
        }else{
            http_response_code(404);
            echo json_encode(array('message' => 'Element not found'));
        }
    }  
}

$api = new ApiDades();
$api->getAll();


?>