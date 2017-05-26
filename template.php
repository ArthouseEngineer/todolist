<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/todolist/lib/includes/database.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/todolist/lib/TreeMenu.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/todolist/lib/includes/modal_reg.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/todolist/lib/includes/modal_auth.php');

$tree = new TreeMenu($dbh);
?>


<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/todolist/lib/includes/header.php'); ?>
<body>

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
            <div class="nav navbar-nav navbar-right text-right">
                <a class="btn btn-primary btn-lg" href="#" data-toggle="modal" data-target="#modal_reg" datarole="button">Регистрация</a>
                <a class="btn btn-primary btn-lg" href="#" data-toggle="modal" data-target="#modal_auth" datarole="button">Вход</a>
            </div>
        </div><!--/.navbar-collapse -->
    </div>
</nav>

<div class="jumbotron">
    <div class="container">
        <h1>Multilanding конструктор создай Ленндинг своей мечты!</h1>
        <p>Создавай что угодно.</p>
        <p>Где и когда угодно</p>
<!--        <div class="btn-block">-->
<!--        <p><a class="btn btn-primary btn-lg" href="#" data-toggle="modal" data-target="#modal_reg" datarole="button">Начать&raquo;</a>-->
<!--        </p>-->
<!--        <p><a class="btn btn-primary btn-lg" href="#" data-toggle="modal" data-target="#modal_auth" datarole="button">Войти&raquo;</a></p>-->
<!--        </div>-->
    </div>
</div>
<div class="container">
    <!-- Example row of columns -->
    <div class="row">
        <div class="col-md-4">
            <h2>Дизайн без отвлекающих элементов.</h2>
            <p> </p>
            <p><a class="btn btn-default" href="#" role="button">Подробнее &raquo;</a></p>
        </div>
        <div class="col-md-4">
            <h2>Дизайн без отвлекающих элементов.</h2>
            <p></p>
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
        <p>&copy; 2017 Company, Inc.</p>
    </footer>
</div> <!-- /container -->

<script src="js/vendor/jquery/jquery-2.2.1.js"></script>
<script src="js/vendor/bootstrap/bootstrap.js"></script>
<!--    <script src="js/vendor/bootstrap/bootstrap-datetimepicker.min.js"></script>-->
<!--    <script src="js/app/app.js"></script>-->
</body>
</html>