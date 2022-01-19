<?php 

    class User{
        private $name;
        private $email;
        private $password;
        private $address;
        private $zipCode;
        private $isSeller;

        public function __construct($name, $email, $password, $address, $zipCode, $isSeller){
            $this->name = $name;
            $this->email = $email;
            $this->password = $password;
            $this->address = $address;
            $this->zipCode = $zipCode;
            $this->isSeller = $isSeller;
            
            $this->isSeller = true;
        }


        public function setName($name){
            $this->name = $name;
        }

        public function getName(){
            return $this->name;
        }

        public function setEmail($email){
            $this->email = $email;
        }

        public function getEmail(){
            return $this->email;
        }

        public function setPassword($password){
            $this->password = $password;
        }

        public function getPassword(){
            return $this->password;
        }

        public function setAddress($address){
            $this->address = $address;
        }

        public function getAddress(){
            return $this->address;
        }

        public function setZipCode($zipCode){
            $this->zipCode = $zipCode;
        }

        public function getZipCode(){
            return $this->zipCode;
        }

        
        public function setIsSeller($isSeller){
            $this->isSeller = $isSeller;
        }

        public function getIsSeller(){
            return $this->isSeller;
        }


    }


?>