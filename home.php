<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 04.05.2017
 * Time: 22:56
 */

include_once($_SERVER['DOCUMENT_ROOT'] . '/todolist/lib/includes/database.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/todolist/lib/TreeMenu.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/todolist/lib/User.php');
$tree = new TreeMenu($dbh);
$user = new User($dbh);

// Пользователь не авторизован отправим его на главную страницу
if (!$user->is_loggedin()) {
    $user->redirect("/todolist/template.php");
}
$user_id = $_SESSION['user_session'];
$stmt = $dbh->prepare("SELECT * FROM users WHERE id = :user_id");
$stmt->execute(array(":user_id" => $user_id));
$userRow = $stmt->fetch(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title> ToDoList </title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">
</head>
<body>

<!--Begin modal window-->
<div class="modal fade bs-example-modal-lg in" id="add-new-task-month" role="dialog" tabindex="-1"
     aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title text-center">Добавить задачу</h4>
            </div>
            <div class="modal-body"> <!--Как привязать ИНПУТ К отдельным блокам задач??? и само модальное окно-->
                <input type="text" data-input="month" class="input input--task">
            </div>
            <div class="modal-footer">
                <div type="button" class="btn btn-primary text-right "> Добавить</div>
            </div>
        </div>
    </div>
</div> <!--End modal window-->
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="true" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">ToDoList</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <?= $tree->getMenuHtml(); ?>
            </ul>

            <form class="navbar-form navbar-right" method="post" action="/todolist/lib/registration.php">
                <div class="form-group">
                    <input type="text" placeholder="name" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <input type="password" placeholder="password" class="form-control" name="password">
                </div>
                <button type="submit" class="btn btn-success" name="btn-sign-up">Войти</button>
            </form>
        </div><!--/.navbar-collapse -->
    </div>
</nav>

<div class="jumbotron">
    <div class="container">
        <h1>ToDoList - Ты никогда не забудешь о своих задачах</h1>
        <p>Управляйте вашими задачами с чего угодно.</p>
        <p>Желаете начать жмите кнопку ниже.</p>
        <p><a class="btn btn-primary btn-lg" href="#" data-toggle="modal" data-target="#modal_reg" datarole="button">Начать&raquo;</a>
        </p>
    </div>
</div>
<div class="container">
    <!-- Example row of columns -->
    <div class="row">
        <div class="col-md-4">
            <h2>Дизайн без отвлекающих элементов.</h2>
            <p>Ваши задачи - большая часть вашей жизни. Остовайтесь мотивированными с помощью интуитивного списка задач
                ToDoList. </p>
            <p><a class="btn btn-default" href="#" role="button">Подробнее &raquo;</a></p>
        </div>
        <div class="col-md-4">
            <h2>Дизайн без отвлекающих элементов.</h2>
            <p>Ваши задачи - большая часть вашей жизни. Остовайтесь мотивированными с помощью интуитивного списка задач
                ToDoList. </p>
            <p><a class="btn btn-default" href="#" role="button">Подробнее &raquo;</a></p>
        </div>
        <div class="col-md-4">
            <h2>Дизайн без отвлекающих элементов.</h2>
            <p>Ваши задачи - большая часть вашей жизни. Остовайтесь мотивированными с помощью интуитивного списка задач
                ToDoList.</p>
            <p><a class="btn btn-default" href="#" role="button">Подробнее &raquo;</a></p>
        </div>
    </div>
    <hr>

    <footer>
        <p>&copy; 2016 Company, Inc.</p>
    </footer>
</div> <!-- /container -->

<script src="js/vendor/jquery/jquery-2.2.1.js"></script>
<script src="js/vendor/bootstrap/bootstrap.js"></script>
<script src="js/vendor/bootstrap/bootstrap-datetimepicker.min.js"></script>
<script src="js/app/app.js"></script>
<!--Скрипт Открытия календаря с параметрами-->
<script type="text/javascript">
    $(function () {
        $('#datetimepicker1\').datetimepicker({language: \'ru\', pickTime: false});
    });
</script>
<!--Переключаем состояния радио кнопок из активного на неактивное и наооборот-->
</body>
</html>