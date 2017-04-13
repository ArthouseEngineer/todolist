<?php 
    $data = $_POST; 
    $user = [
        "firstname" => strip_tags(htmlspecialchars($data["firstname"])),
        "lastname" => strip_tags(htmlspecialchars($data["lastname"])),
        "email" => htmlspecialchars($data["email"]),
        "pwd" => md5($data["email"].$data["pwd"])
    ];

  
  define("SITE_NAME_ROOT_DIR",$_SERVER["DOCUMENT_ROOT"]."/todolist/");
