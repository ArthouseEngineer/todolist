<?php 


/**
* Построение дерева
*/
class TreeMenu {
	private $_db = null;
	private $_category_arr = array ();

	public function _construct($db) {
		// Подключаемся к базе данных и записывем подключение в переменную _db
		$this -> _db = $db;
		// В переменную $_category_arr записывем все категории см дальше
		$this ->_category_arr = $this -> _getCategory();
	}
	// Метод читает из таблицы category все строчки и возвращает двумерный массив, в котором первый ключ - id - родителя категория (parent_id) @return array

	private function _getCategory() {
		$query = $this->_db->prepare ("SELECT * from `menu`"); //Готовим запрос
		$query->execute(); //Выполняем запрос
		// Читаем все строчки и записывем в переменную $result
        $result = $query->fetchALL(PDO::FETCH_OBJ);
		$return = array();
		foreach ($result as $value) {
			$return[$value->parent_id] []=$value;
		}
		return $return;
	}

	public function outTree ($parent_id, $level) {
		if (isset ($this->_category_arr[$parent_id])) {
			foreach ($this->_category_arr[$parent_id] as $value) {
				echo "<div style='margin-left:" . ($level *25) . "'px;'>" . $value->title . "</div>";
				$level++;
				$this->outTree($value-id, $level);
				$level--;
			}
		}
	}
}
?>