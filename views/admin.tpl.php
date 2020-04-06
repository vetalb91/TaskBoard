<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <!-- <link rel="stylesheet" href="/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="/css/fontawesome.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <title><?php echo $pageData['title']?></title>

</head>
<body>

<header>
    <nav class="navbar navbar-default">
        <div class="container-fluid">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Лого</a>
            </div>


            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="/admin">Главная <span class="sr-only">(current)</span></a></li>

                        </ul>
                    </li>
                </ul>

                <form id="signin" class="navbar-form navbar-right" role="form">
                    <div style="margin-right: 10px;" class="input-group">
                        <div id="auth"><b>Добро пожаловать - <?php echo $_SESSION['login'] ?></b></div>
                    </div>


                    <button type="button" class="btn btn-primary"><a style="color: white" href="/auth/logout">Выход</a></button>

                </form>

            </div>
        </div>
    </nav>
</header>

<div class="container">
    <div class="row">

        <section class="content">
            <h1>Задачник</h1>


            <div style="margin-left: 0px;" class="col-md-12 col-md-offset-2">
                <?php if(isset($_GET['status']) && $_GET['status'] == 'error'): ?>

                    <div class="error_post"><p align="center" style="color: #fff">Пост не обновлен</p></div>

                <?php endif;?>

                <?php if(isset($_GET['status']) && $_GET['status'] == 'success'): ?>

                    <div class="success_post"><p style="color: #fff" align="center">Пост обновлен</p></div>

                <?php endif;?>
                <div class="panel panel-default">

                    <div class="panel-body">

                        <form action="/admin/" method="get">
                            <div style="margin-left: 10px;" class="pull-right">
                                <div class="btn-group">
                                    <button type="submit" class="btn btn-primary">Сортировать</button>
                                </div>
                            </div>
                        <div class="pull-right">
                            <div class="btn-group">
                                <select name="value" class="form-control form-control-sm">
                                    <option value="">выбрать</option>
                                    <option value="ASC">Возрастание</option>
                                    <option value="DESC">Убывание</option>
                                </select>
                            </div>
                        </div>
                        <div style="margin-right: 10px;" class="pull-right">
                            <div class="btn-group">
                                <select name="type" class="form-control form-control-sm">
                                    <option value="">выбрать</option>
                                    <option value="user_name">Имя</option>
                                    <option value="user_email">Email</option>
                                    <option value="status">Статус</option>
                                </select>
                            </div>
                        </div>
                        <div style="margin-right: 10px;margin-top: 5px;" class="pull-right">
                            <div class="btn-group">
                                <p><b>Сортировка по:</b></p>
                            </div>
                        </div>
                        </form>
                        <div class="table-container">
                            <table class="table table-filter">
                                <tbody>
                                <?php if(isset($pageData['data']['posts'])):?>
                                <?php foreach ($pageData['data']['posts'] as $post):?>
                                <tr>

                                    <td>
                                        <div class="media">
                                            <a href="#" class="pull-left">
                                                <img src="https://s3.amazonaws.com/uifaces/faces/twitter/fffabs/128.jpg" class="media-photo">
                                            </a>
                                            <div class="media-body">

                                                <h4 class="title">
                                                    Имя:  <?= $post['user_name']?> / Email: <?= $post['user_email']?>

                                                   <?php if($post['status'] != 'выполнено'):?>
                                                            <div id="content_status">
                                                                <input  class="pull-right pagado" value="<?=$post['id']?>" type="checkbox" >
                                                                <span class="pull-right pagado"><b>Выполнено</b></span>
                                                            </div>
                                                   <?php else:?>
                                                       <span class="pull-right pagado"><b style="color: black;">Статус: </b><b> Выполнено</b></span>
                                                   <?php endif ?>

                                                    <?php if($post['edit'] != ''):?>
                                                        <div> <span class="pull-right pagado"><b>Отредактировано администратором</b></span></div>
                                                    <?php endif;?>
                                                </h4>
                                                <textarea  class="summary" disabled><?= $post['text']?></textarea>
                                               <form action="/admin/editPost" method="post">
                                                    <input type="hidden" name="post_id" value="<?=$post['id']?>">
                                                    <button class="btn btn-info" type="submit" name="submit">Изменить</button>
                                               </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                <?php endif; ?>
                                </tbody>
                            </table>


                            <nav style="margin: 0px auto" aria-label="Page navigation example">

                                <ul class="pagination">

                                    <?php echo $pageData['data']['pagination']?>

                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>

            </div>


        </section>



    </div>
</div>




<footer></footer>

<script src="/js/jquery-3.4.1.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/script.js"></script>
</body>
</html>