<?php

    class Tretman{
        private $id;
        private $naziv;
        private $opis;
        private $adresa;
        private $cena;
        private $slika;



        public function __construct($id=null, $naziv=null,$opis=null, $adresa=null, $cena=null,$slika=null){
            $this->id=$id;
            $this->naziv=$naziv;
            $this->adresa=$adresa;
            $this->cena=$cena; 
            $this->slika=$slika; 
            $this->opis=$opis; 

        }
 

        public static function vratiSveTretmane($conn){
            $upit ="select * from tretman";

            return $conn->query($upit);
        }
       

















    }




?>