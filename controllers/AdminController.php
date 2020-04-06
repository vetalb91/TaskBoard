<?php

 class AdminController extends Controller {

     private $pageTpl = "/views/admin.tpl.php";

     public function __construct() {

         $this->model = new AdminModel();
         $this->view = new View();
     }

     public function index() {
         if(!$_SESSION['login']) {
             header("Location: /");
         }

         $this->pageData['title'] = "Админка";


         if($this->model->countPosts() > 3) {


             $this->pageData['data'] = $this->pagination();

             $this->view->render($this->pageTpl, $this->pageData);

         }else{
             $this->pageData['data']['posts'] = $this->model->getPost();
             $this->view->render($this->pageTpl, $this->pageData);

         }

     }


     public function editPost(){

         $id = $_POST['post_id'];


         $result = $this->model->firstPost($id);

         $result ? $this->pageData['post'] = $result : $this->pageData['error'] = 'Ошибка пост не существует';

         $this->view->render('/views/adminEditPost.tpl.php', $this->pageData);

     }
     public function storePost(){

         $id = $_POST['post_id'];
         $text = $_POST['text'];

         if(!$_SESSION['login']){
             header('location: /?status=login');
         }else {

             $result = $this->model->updatePost($id, $text);

             $result ? $response = 'success' : $response = 'error';

             header('location: /admin/?status=' . $response);
         }
     }


     public function updateStatus(){

       $id = isset($_POST['status']) ?  $_POST['status'] : 0;


         if(!$_SESSION['login']){
             header('location: /?status=login');
         }else {

             $result = $this->model->setStatus($id);


             echo $result;
         }



     }





 }