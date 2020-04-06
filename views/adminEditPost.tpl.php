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
    <title>Редактирования поста</title>

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

            <div style="margin-left: 0px;" class="col-md-12 col-md-offset-2">
                <h3>Задачник - редактирование поста: № <?=$pageData['post'][0]['id']?> </h3><br>
                <div class="panel panel-default">

                    <div class="panel-body">


                        <div class="table-container">
                            <table class="table table-filter">
                                <tbody>

                                    <tr>

                                        <td>
                                            <div class="media">
                                                <a href="#" class="pull-left">
                                                    <img src="https://s3.amazonaws.com/uifaces/faces/twitter/fffabs/128.jpg" class="media-photo">
                                                </a>
                                                <div class="media-body">

                                                    <h4 class="title">
                                                        Имя:  <?= $pageData['post'][0]['user_name']?> / Email: <?= $pageData['post'][0]['user_email']?>
                                                        <?php if($pageData['post'][0]['status'] != 'выполнено'):?>
                                                            <div id="content_status">
                                                                <span class="pull-right pagado"><b style="color: black;">Статус: </b><b> на модерации</b></span>
                                                            </div>
                                                        <?php else:?>
                                                            <span class="pull-right pagado"><b style="color: black;">Статус: </b><b> Выполнено</b></span>
                                                        <?php endif ?>

                                                        <?php if($pageData['post'][0]['edit'] != ''):?>
                                                            <div> <span class="pull-right pagado"><b>Отредактировано администратором</b></span></div>
                                                        <?php endif;?>
                                                    </h4>

                                                    <form action="/admin/storePost" method="post">
                                                        <textarea id="text_content" name="text" class="summary" ><?= $pageData['post'][0]['text']?></textarea>
                                                        <input type="hidden" name="post_id" value="<?=$pageData['post'][0]['id']?>">
                                                        <button id="save" class="btn btn-success" disabled>Сохранить</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>


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
<script src="/js/angular.min.js"></script>
<script src="/js/script.js"></script>

</body>
</html>