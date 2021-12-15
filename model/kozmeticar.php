<?php


    class Kozmeticar{

        private $id;
        private $ime;
        private $prezime;
        private $email;
        private $sifra;


        public function __construct($id=null,$ime=null,$prezime=null,$email=null,$sifra=null)
        {
            $this->id=$id;
            $this->ime=$ime;
            $this->prezime=$prezime;
            $this->email=$email;
            $this->sifra=$sifra;
 
        }



    }





?>