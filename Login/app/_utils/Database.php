<?php
namespace _utils;

   class Database {
      public function getConnection(){
        try {
         $dsn = "mysql:host=127.0.0.1;dbname=dz_tetofedo_kft;utf-8;port:3306";
         $user = "root";
         $password = "";
         $conn = new \PDO($dsn, $user, $password);
      } catch (\PDOException $ex){
          var_dump($ex);
      }
      return $conn;
   }


   }

?>