<?php


 class AuthController extends Controller{
     private $pageTpl = '/views/main.tpl.php';

     public function __construct()
     {
         $this->model = new AuthModel();
         $this->view = new View();
     }



     public function login(){

         $login = $_POST['login'];
         $password = md5($_POST['password']);

         $auth = $this->model->checkUser($login,$password);


         if(!empty($auth)) {

           //  $_SESSION['id'] = session_id();
             $_SESSION['login'] = $_POST['login'];

           //  $this->model->addAuthUser($_SESSION['id'],$_SESSION['login']);

             header("Location: /admin");
         } else {
             $this->pageData['error'] = '<b style="color: red">неверный логин/пароль</b>';
             $this->view->render($this->pageTpl,$this->pageData);
         }

     }

     public function logout(){
         session_destroy();
         // метод удаление auth в базе
         header("Location: /");

     }
}