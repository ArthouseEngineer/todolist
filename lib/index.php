<?php 

    require_once("includes/database.php");
    require_once ("TreeMenu.php");
    $tree = new TreeMenu($dbh);
    $tree->outTree(0,0);

    // TODO : Rewrite this method
    function buildTree(array $elements,$parrentid = 0)
    {
        $branch = array();

        foreach ($elements as $element)
        {
            if ($element['parent'] == $parrentid) {
                $children = buildTree($elements,$element['id']);
                if ($children) {
                    $element['children'] = $children;
                }
                $branch[$element['id']] = $element;

                unset($elements[$element['id']]);
            }
        }
        return $branch;
    }

    $tree = buildTree()
?>