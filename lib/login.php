<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/todolist/lib/Auth.php');

$auth = new Auth(demo,password);

if (isset($_POST["login"]) && isset($_POST["password"]))
{
    if (!$auth->auth($_POST["login"],$_POST["password"]))
    {
        echo "<h2 style=\"color:red;\"> Логин и пароль введены не правильно! </h2>>";
    }
}

if (isset($_GET["is_exit"])) {
    if ($_GET["is_exit"] == 1) {
        $auth->out();
        header("Location : ?is_exit=0");
    }
}
/*
if ($auth->isAuth()) {
    echo "Здравствуйте, " . $auth->getLogin();
    echo "<br/><br/><a href=\"?is_exit=1\">Выйти</a>";
    }
    else {
        ?>
        <form method="post" action="">
            Логин : <input type="text" name="login" value="<?php echo (isset($_POST["login"])) ?
            $_POST["login"] : null; ?> /> <br/>"
            Пароль : <input type="password" name="password" value=""/><br/>
            <input type="submit" value="Войти"/>
        </form>
<?php}?>*/
