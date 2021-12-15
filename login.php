<?php
    include 'dbb.php';
    include 'model/kozmeticar.php';

    if(isset($_POST['login']) ){ //kada korisnik klikne dugme login
        //preuzimamo podatke iz forme 
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        $kozmeticar = new Kozmeticar(null,null,null,$email,$pass);

        $status = Kozmeticar::login($kozmeticar,$conn);

        if($status){
            echo "ULOGOVAN";
            header('Location: pocetna.php'); //ako je korisnik ulogovan mozemo da ga posaljemo na glavnu stranicu
        }else{
            echo "GRESKA";
        }


    }





?>