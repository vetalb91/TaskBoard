<?php

 class AuthModel extends Model {

     public function checkUser($login,$password) {



         $sql = "SELECT * FROM users WHERE login = :login AND password = :password";
         $stmt = $this->db->prepare($sql);
         $stmt->bindValue(":login", $login, PDO::PARAM_STR);
         $stmt->bindValue(":password", $password, PDO::PARAM_STR);
         $stmt->execute();


         $res = $stmt->fetch(PDO::FETCH_ASSOC);

         return $res;


     }


     public function addAuthUser($id,$login){

     }


 }