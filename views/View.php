<?php
/**
 * Created by PhpStorm.
 * User: Виталик
 * Date: 03.04.2020
 * Time: 17:49
 */

 class View {

     public function render($tpl, $pageData){
         include ROOT. $tpl;
     }

 }