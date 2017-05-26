<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/todolist/lib/includes/database.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/todolist/lib/User.php');

if (!empty($dbh)) {
    $user = new User($dbh);
}
$data = $_POST; // Ассоциативные массив данных полученных из формы при помощи POST метода

echo "<pre>";
print_r($_POST);
echo "</pre>";

/*
$data = array(
    'name' => strip_tags($_POST['name']),
    'email' => strip_tags($_POST['email']),
    'password' =>$_POST['password'],
    'password_repeat' =>$_POST['password_repeat'],
);
*/

$errors = array();


if (!(strlen($data['name']) >  2 && strlen($data['name']) <= 30))
{
    $errors[] = array(
        'name' => 'name',
        'message' => 'Имя пусто'
    );
}

// Первый шаг к валидации E-mail

if (!filter_var($data['email'],FILTER_VALIDATE_EMAIL))
{
    $errors[] = array(
        'name' => 'email',
        'message' => 'Email введен не корректно'
    );
}

//Если поля паролей заполненны


if (!empty($data['password']))
{
    $errors[] = array(
        'name' => 'password',
        'message' => 'Введите пароль'
    );
}

if (!empty($data['password']) && !empty($data['password_repeat']))
{
    if (!empty($data['password'] == $data['password_repeat']))
    {

        echo "Пароли не совпадают";

        $errors[] = array(
            'name' => 'password_repeat',
            'message' => 'Пароли не совпадают'
        );
    }
}


$patern = "/^[a-zA-Z0-9_-]+$/i";

if (!preg_match($patern,$name))
{
    $check = false;
    $errors[] = array
    (
        'name' => 'user_login',
        'message' => "Incorrect registration login"
    );
}


/*if (isset($_POST['btn-register'])) {
    $name = strip_tags(htmlspecialchars($data["name"]));
    $email = htmlspecialchars($data["email"]);
    $pass = $data["password"];
    $confirm_pass = $data["password_repeat"];

    $patern = "/^[a-zA-Z0-9_-]+$/i";

    if (!preg_match($patern,$name))
    {
        $check = false;
        $err['reg-login'] = "Incorrect registration login";
    }

    if (strlen($name) < 3 || strlen($name) > 30)
    {
        $check = false;
        $err['str-log-in'] = "Login must be more that 3 chars ans less 30, try again";
    }

    if (!preg_match($patern,$pass))
    {
        $check = false;
        $err['reg-pass'] = "Incorrect registartion password";
    }

    if (strlen($pass) < 4 || strlen($pass) > 30) {
        $check = false;
        $err['str-reg-pass'] = "*Password must be more that 4 chars and less 30";
    }
    if ($pass != $confirm_pass) {
        $check = false;
        $err['the-same'] = "*password and repeat passwod must be the same";
    }

    $user->register($name, $email, $data["password"]);
    echo "Успешная регистрация";
   // $user->redirect("/todolist/template.php");
}
*/



if (isset($_POST['btn-sign-up'])) {
    $user->login($data["name"], $data["password"]);
    echo "Успешная авторизация";
    // TODO: Как изменить страницу template.php с учетом того что необходимо Отобразить авторизовонного пользователя?
    $user->redirect("/todolist/home.php");
}

/*  $user = [
      "name" => strip_tags(htmlspecialchars($data["name"])),
      "email" => htmlspecialchars($data["email"]),
      "password" => md5($data["password"].$data["password"])
  ]; */


define("SITE_NAME_ROOT_DIR", $_SERVER["DOCUMENT_ROOT"] . "/todolist/");
