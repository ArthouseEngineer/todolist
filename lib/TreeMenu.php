<?php 


/**
* Построение дерева
*/
class TreeMenu
{
    /**
     * @_db Дескриптор подключения к БД
     */
    private $_db = null;

    /**
     * @_categoryArr Массив категорий
     */
    private $_categoryArr = null;

    /**
     * @_categoryTree Массив Категорий иерархический
     */
    private  $_categoryTree = null;

    public function __construct($db)
    {
        // Подключаемся к базе данных и записывем подключение в переменную _db
        $this->_db = $db;

        // В переменную $_category_arr записывем все категории
        $this->_categoryArr = $this -> _getCategory();

        //@_categoryTree Иерархический массив категорий с вложенными подпунктам
        $this->_categoryTree = $this->buildTree($this->_categoryArr);
}
      public  function buildTree(array $elements,$parent_id = 0)
        {
            $branch = array();

            foreach ($elements as $element)
            {
                if ($element['parent_id'] == $parent_id)
                {

                    $children = $this->buildTree($elements,$element['id']);
                    if ($children)
                    {
                        $element['children'] = $children;
                    }
                    $branch[$element['id']] = $element;

                    unset($elements[$element['id']]);
                }
            }
            return $branch;
        }

    public function  getMenuHtml()
    {
        echo '
            <nav class="navbar navbar-default navbar-inverse navbar-fixed-top">
  <div class="navbar-header">
  <a class="navbar-brand" href="#">ToDoList</a>
    <div  class="collapse navbar-collapse navbar-ex1-collapse">
    </div>
    </div>
    <ul class="nav navbar-nav">
    ';

        $this->buidMenu($this->_categoryTree);
       /* echo '<pre>';
        print_r($this->_categoryTree); */
    }

    public function buidMenu($nodes)
    {
        foreach ($nodes as $node) {
            if (empty($node['children']))
            {
                echo '<li><a href="#" />' . $node['title'] . "</a>";
            }
             else
            {
                echo '       <li class="dropdown">';
               echo' <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" 
                        aria-expanded="false">' . $node['title'] . ' <span class="caret"></span>';
                echo '<ul class="dropdown-menu">';
                $this->buidMenu($node['children']);
                echo '</ul>';
            }
            echo '</li>';

        }
    }

    private function _getCategory()
    {
        $query = $this->_db->prepare("SELECT * FROM menu WHERE active=1");
        $query->execute();

        $result = $query->fetchAll(PDO::FETCH_ASSOC);
       return $result;
    }
}

?>