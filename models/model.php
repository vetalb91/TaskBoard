<?php
/**
 * Created by PhpStorm.
 * User: Виталик
 * Date: 03.04.2020
 * Time: 17:47
 */

  class Model {
     protected $db = null;

     public function __construct()
     {
         $this->db = DB::connectToDB();
     }

      public function countPosts(){


          // Запрос для выборки целевых элементов:
          $sql = 'SELECT COUNT(*) AS `count` FROM posts';
          $stmt = $this->db->query($sql);

          $allItems = $stmt->fetch(PDO::FETCH_OBJ)->count;

          return $allItems ? $allItems : false;

      }


      public function getSortPost($start,$limit,$critery,$critery2){


          // Запрос для выборки целевых элементов:
          $sql = 'SELECT * FROM posts ORDER BY '. $critery.' '.$critery2.' LIMIT ' . $start . ', ' .$limit;


          $result = array();
          $stmt = $this->db->prepare($sql);
          $stmt->execute();
          while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              $result[$row['id']] = $row;
          }
          return $result ? $result : false;

      }



 }
