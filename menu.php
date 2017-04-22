<?php
    include_once($_SERVER['DOCUMENT_ROOT'] . '/todolist/lib/includes/database.php');
    include_once ($_SERVER['DOCUMENT_ROOT'] . '/todolist/lib/includes/header.php');
    include_once($_SERVER['DOCUMENT_ROOT'] . '/todolist/lib/TreeMenu.php');

    $tree = new TreeMenu($dbh);
    $tree->getMenuHtml();
