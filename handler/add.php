<?php
    include '../dbb.php';
    include '../model/termin.php';
 

    if(isset($_POST["idkozmeticara"]) && isset($_POST["datum"]) && isset($_POST["tretmani"]) ){
       
        
         $termin = new Termin(null,$_POST["datum"],$_POST["idkozmeticara"],$_POST["tretmani"]);
        
        $status= Termin::dodajTermin($termin,$conn);
        
        
          if($status){
             echo 'Success';
          }else{
              echo $status;
              echo 'Failed';
          }
    }

  

?>