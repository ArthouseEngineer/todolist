<?php 

    require_once("includes/database.php");
    require_once ("TreeMenu.php");
    $tree = new TreeMenu($dbh);
    $tree->outTree(0,0);
?>