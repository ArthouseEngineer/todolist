<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/lib/includes/database.php');
    include_once ($_SERVER['DOCUMENT_ROOT'] . '/lib/includes/header.php');
    include_once($_SERVER['DOCUMENT_ROOT'] . '/lib/TreeMenu.php');

$tree = new TreeMenu($dbh);
$tree->getMenuHtml();
