<?php


 class IndexController extends Controller{
     private $pageTpl = '/views/main.tpl.php';

     public function __construct()
     {
         $this->model = new IndexModel();
         $this->view = new View();
     }




     public function index(){

         $this->pageData['title'] = "Главная страница";




         if($this->model->countPosts() > 3) {


             $this->pageData['data'] = $this->pagination();

             $this->view->render($this->pageTpl, $this->pageData);

         }else{

             $this->pageData['data']['posts'] = $this->model->getPost();
             $this->view->render($this->pageTpl, $this->pageData);
         }
     }


     public function createPost(){

         $name  = $_POST['name'];
         $email = $_POST['email'];
         $text  = htmlspecialchars($_POST['text']);


         $result = $this->model->addPost($name,$email,$text);

         $result ? $response = 'success' : $response = 'error';

         header('location: /?status=' . $response);
     }



     public function pagination(){


         // Число вообще всех элементов ( без LIMIT ) по нужным критериям.
         $allItems = 0;

         // HTML - код постраничной навигации.
         $html = NULL;

         // Количество элементов на странице.
         $limit = 3;

         // Количество страничек, нужное для отображения полученного числа элементов:
         $pageCount = 0;


         $start = isset($_GET['start'])   ? intval( $_GET['start'] )  : 0 ;

         $critery  = isset($_GET['type']) ?  $_GET['type'] : 'user_name';
         $critery2  = isset($_GET['value']) ?  $_GET['value']  : 'DESC';



         $data['posts'] = $this->model->getSortPost($start,$limit,$critery,$critery2);
         $allItems = $this->model->countPosts();



         $pageCount = ceil( $allItems / $limit);

         // Начинаем с нуля! Это даст нам правильные смещения для БД
         for( $i = 0; $i < $pageCount; $i++ ) {
             // Здесь ($i * $limit) - вычисляет нужное для каждой страницы  смещение,
             // а ($i + 1) - для того что бы нумерация страниц начиналась с 1, а не с 0
             $html .= '<li class="page-item"><a class="page-link"  href="/?type='.$critery.'&value='.$critery2.'&start=' . ($i * $limit)  . '">' . ($i + 1)  . '</a></li>';
         }
         $data['pagination'] = $html;

         return $data ? $data : false;



     }




 }
