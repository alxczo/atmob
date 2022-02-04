<?php
    function conectar(){
        
     try{
         $conn = new PDO("mysql:host=localhost; dbname=atmob", "root", "");
     }catch(PDOException $e){
         echo $e-> getMessage();
     }

     return $conn;
    }
?>