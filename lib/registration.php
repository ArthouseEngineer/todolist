<?php
    include_once($_SERVER['DOCUMENT_ROOT'].'/todolist/lib/includes/database.php');
    include_once($_SERVER['DOCUMENT_ROOT'].'/todolist/lib/User.php');


    $user =  new User($dbh);

    $data = $_POST; // Ассоциативные массив данных полученных из формы при помощи POST метода.

    $user->register($data["name"],$data["email"],$data["password"]);

  /*  $user = [
        "name" => strip_tags(htmlspecialchars($data["name"])),
        "email" => htmlspecialchars($data["email"]),
        "password" => md5($data["password"].$data["password"])
    ]; */

  
  define("SITE_NAME_ROOT_DIR",$_SERVER["DOCUMENT_ROOT"]."/todolist/");
