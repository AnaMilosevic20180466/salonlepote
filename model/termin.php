<?php


    class Termin{
        private $id;
        private $datumVreme;
        private $kozmeticar;
        private $tretman;


        public function __construct($id=null,$datumVreme=null,$kozmeticar=null,$tretman=null ){
            $this->id=$id;
            $this->datumVreme=$datumVreme;  
            $this->kozmeticar=$kozmeticar;            
            $this->tretman=$tretman;            

 
        }

    }



?>