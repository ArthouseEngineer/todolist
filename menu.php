<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/lib/includes/database.php');

    function   buidMenu($menuArray)
    {
        foreach ($menuArray as $node)
        {
            echo "<li><a href='#' />" . $node['title'] . "</a>";
            if ( !empty($node['children']))
            {
                // TODO: Write function to generate DOM-three and add Bootstap navbar

                echo "<ul>";
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
