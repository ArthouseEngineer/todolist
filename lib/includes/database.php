<?php

require ("constants.php");

    try {
        $dbh = new PDO('mysql:host=' . DB_SERVER . ';' . 'dbname=' . DB_NAME,DB_USER,DB_PASS);
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br>";
            die();
    }
/**
 * Добавить вложенные записи в таблицу меню такие как catigories1,catigories2 Родителем которых являются пункт
 * Написать функцию buildTree которая из плоского массива делает иерархический, вызвать её и передать массив категории полученных  БД
 * На полученном иерархическом массиве вызовем функцию BuildMenu
 */
    ?>

