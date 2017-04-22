<?php
	include_once($_SERVER['DOCUMENT_ROOT'].'/lib/includes/database.php');
	include_once($_SERVER['DOCUMENT_ROOT'].'/lib/TreeMenu.php');
	
	$tree = new TreeMenu($dbh);
?>

        
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title> Аптека Санна </title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">
</head>
<body>
    <!--Begin modal window-->
<div class="modal fade bs-example-modal-lg in" id="add-new-task" role="dialog" tabindex="-1" aria-labelledby="myLargeModalLabel">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
      </div>
   </div>
</div> <!--End modal window-->

    <!--Begin modal window-->
<div class="modal fade bs-example-modal-lg in" id="add-new-task-month" role="dialog" tabindex="-1" aria-labelledby="myLargeModalLabel">
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
                <div type="button" class="btn btn-primary text-right "> Добавить </div>
         </div>
      </div>
   </div>
</div> <!--End modal window-->

    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="true" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">ToDoList</a>
            </div>
              <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                <?=$tree->getMenuHtml();?>
                </ul>
                <form class="navbar-form navbar-right">
                      <div class="form-group">
                      <input type="text" placeholder="Email" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="password" placeholder="Password" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success">Войти</button>
                </form>
            </div><!--/.navbar-collapse -->
        </div>
    </nav>

    <div class="jumbotron">
        <div class="container">
            <h1>ToDoList</h1>
            <p></p>
            <p><a class="btn btn-primary btn-lg" href="#" role="button">Наши скидки &raquo;</a></p>
        </div>
    </div>

    <div class="container">
        <!-- Example row of columns -->
        <div class="row">
            <div class="col-md-4">
                <h2>Товар 1 </h2> 1
                <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
            </div>
            <div class="col-md-4">
                <h2>Heading</h2>
                <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
            </div>
            <div class="col-md-4">
                <h2>Heading</h2>
                <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
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
      $(\'#datetimepicker1\').datetimepicker({language: \'ru\', pickTime: false});
    });
</script>
<!--Переключаем состояния радио кнопок из активного на неактивное и наооборот-->
</body>
</html>