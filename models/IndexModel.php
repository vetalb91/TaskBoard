<?php
/**
 * Created by PhpStorm.
 * User: Виталик
 * Date: 03.04.2020
 * Time: 18:00
 */

 class IndexModel extends Model {

     public function getPost(){

         $sql = "SELECT * FROM posts";
         $result = array();
         $stmt = $this->db->prepare($sql);
         $stmt->execute();
         while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
             $result[$row['id']] = $row;
         }

         return $result;


     }

     public function addPost($name,$email,$text){


         $sql = "INSERT INTO `posts` SET user_name = :user_name, user_email = :user_email ,text = :text , status = :status , edit = :edit";
         $stmt = $this->db->prepare($sql);

         $result =  $stmt->execute(array('user_name' => $name, 'user_email' => $email, 'text' => $text , 'status' => '', 'edit' => ''));

         $insert_id = $this->db->lastInsertId();

         return $result ? $result : false;

     }


 }