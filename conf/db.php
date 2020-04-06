<?php
/**
 * Created by PhpStorm.
 * User: Виталик
 * Date: 03.04.2020
 * Time: 16:44
 */

/**
 * Класс конфигурации БД
 */

class DB{

    const USER = "root";
    const PASS = "";
    const HOST = "localhost";
    const DB   = "board";


    public static function connectToDB(){

        $user = self::USER;
        $pass = self::PASS;
        $host = self::HOST;
        $db   = self::DB;

        $conn = new PDO("mysql:dbname=$db;host=$host",$user,$pass);

        return $conn;
    }

}
