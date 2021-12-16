<?php

    include '../dbb.php';
    include '../model/tretman.php';
     

        
    $myArray = Tretman::vratiSveTretmane2( $conn);
       
    echo json_encode($myArray);
       

?>