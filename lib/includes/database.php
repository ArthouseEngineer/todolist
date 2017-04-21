<?php

require ("constants.php");

    try {
        $dbh = new PDO('mysql:host=' . DB_SERVER . ';' . 'dbname=' . DB_NAME,DB_USER,DB_PASS,
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br>";
            die();
    }
 ?>

