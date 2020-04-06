<?php

  class AdminModel extends Model {

      public function getPost(){

          $sql = "SELECT * FROM posts";
          $result = array();
          $stmt = $this->db->prepare($sql);
          $stmt->execute();
          while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              $result[$row['id']] = $row;
          }

          return $result ? $result : false;


      }



      public function firstPost($id){

          // Запрос для выборки целевых элементов:
          $sql = 'SELECT * FROM posts WHERE id='.$id;

          $stmt = $this->db->prepare($sql);
          $stmt->execute();
          while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              $result[] = $row;
          }
          return $result ? $result : false;

      }




      public function updatePost($id,$text){

          // query
          $sql = "UPDATE posts SET `text` = :text , `edit` = :edit WHERE `id` = :id";

          $stmt = $this->db->prepare($sql);
          $result =  $stmt->execute(array('text' => $text,'id' => $id,'edit' => 'отредактировано администратором'));

          return $result ? $result : false;
      }

      public function setStatus($id){


          // query
          $sql = "UPDATE posts SET `status` = :status  WHERE `id` = :id";

          $stmt = $this->db->prepare($sql);

          $result =  $stmt->execute(array('status' => 'выполнено','id' => $id));

          return $result ? 'success' : 'error';
      }

  }