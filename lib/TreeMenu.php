<?php
class TreeMenu {

	/**
	 * Дескриптор подключения к БД
	 */
	private $_db = null;
	
	/**
	 * Массив пунктов меню
	 */
	private $_category_arr = null;
	
	/**
	 * Конструктор класса
	 */
	public function __construct($db) {
	
		$this->_db = $db;
		
		$this->_category_arr = $this->_getCategory();
		
		$this->_category_tree = $this->buildTree($this->_category_arr);
	}
	
	public function buildTree(array &$elements, $parentId = 0) {
		$branch = array();

		foreach ($elements as $element) {
			// Если элемент является родителем
			if ($element['parent_id'] == $parentId) {
				
				// Запустим рекурсивный обход, но уже с дургим родительским идентфикатором
				$children = $this->buildTree($elements, $element['id']);
				
				// Если существуют дочерние категории - то добавим их
				if ($children) {
					$element['children'] = $children;
				}
				
				// Добавим данные в результирующий объект
				$branch[$element['id']] = $element;
				
				//unset($elements[$element['id']]);
			}
		}
		return $branch;
	}	
	
	/**
	 * Считывает из таблицы пункты меню
	 */
	private function _getCategory() {
		
		$query = $this->_db->prepare("SELECT * FROM menu WHERE active = 1");
		$query->execute();
		$result = $query->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}

	public function buildMenu($nodes) {

		foreach ($nodes as $node)
		{
			if (empty($node['children']))
			{
				echo '<li><a href="#">' . $node['title'] . '</a>';
			}
			else
            {
				    echo '<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" role="button" href="#">'
                          . $node['title'] . '<span class="caret"></span></a>';
                    echo '<ul class="dropdown-menu">';
                    $this->buildMenu($node['children']);
                    echo '</ul>';
            }
			echo '</li>';
		}
	
	}
	
	public function getMenuHtml() {
		$this->buildMenu($this->_category_tree);
	}
	
}