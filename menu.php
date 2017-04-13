<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/lib/includes/database.php');
    include_once ($_SERVER['DOCUMENT_ROOT'] . '/lib/includes/header.php.');
    function   buidMenu($menuArray)
    {
        echo '
            <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div  class="collapse navbar-collapse">
    <ul class="nav navbar-nav"> 
    ';
        foreach ($menuArray as $node)
        {
            echo "<li><a href='#' />" . $node['title'] . "</a>";
            if ( !empty($node['children']))
            {
                buidMenu($node['children']);
                echo "</ul>";
            }
            echo "</li>";
        }
    }
        $query = $dbh->prepare("SELECT * FROM menu WHERE active=1");
        $query->execute();

        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        buidMenu($result);
