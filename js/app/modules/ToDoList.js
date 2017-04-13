var ToDoList = function (name) {
	

	var tasks = [];

	this.el = document.querySelector('[data-list="' + name + '"]');

	// Array of DOM-elements - tasks (lists)

	this.childs = this.el.querySelectorAll('li');

	// List of delet tasks 
	this.lastRemoved = [];

	// input task 
	this.input = document.querySelector('[data-input="' + name + '"]');

	// Delete task button 
	this.undoButton = document.querySelector('[data-undo="' + name + '"]');

	/** 
	 * Method to add new task to List 
	 * @param name="string" value="">
	 */
		this.drawEntry = function(entry) {
				this.el.innerHTML += '<li>' + entry + '</li>'
	}
	this.addEntry = function (entry) {

		this.tasks.push(entry);
		this.drawEntry(entry);
}
/**
 * Доработат методы saveLoad Task с возможностью сохранения задач.
 * Удалить поле ввода добавить вместо него TextArea высотой 3 строки запретить его масштабирование по оси X 
 * Добавить поле ДАТА ОКОНЧАНИЯ  под TextArea input type='date' 
 */


	/**
	 *  initialization Method
	 */
	this.init = function () {
		this.loadTasks();
	//	this.addByInput();
		this.removeEntry();
		this.undoRemove();
		this.addByArray([]);
		this.saveTasks();
	}
}


/**
 * Add task to array Method
 * @param {array}
 */

ToDoList.prototype.saveTasks = function () {
	var tasksJSON = JSON.stringify(this.tasks);
	localStorage.setItem('tasks' + this.task,tasksJSON); 
	localStorage.key(this.tasks);
}

ToDoList.prototype.loadTasks = function () {
	var tasks = (localStorage.getItem('tasks' + this.task) !== null ) ? JSON.parse(
		localStorage.getItem('tasks' + this.task)) : [];
	this.tasks = tasks;

	this.addByArray(this.tasks);
}

ToDoList.prototype.addByArray = function (array) {
	this.array = array;
	var list = this;
	// Ask about this
	array.forEach(function (item) {
		list.drawEntry(item);
	});
}


/**
 * Method add  task on "Enter" press on input
 */

ToDoList.prototype.addByInput = function () {
	// Lesten press Enter in input (e.keyCode === 13)
	this.textarea.addEventListener('keyup', function (e) {
		e.preventDefault();
		if (e.keyCode === 13 && e.target.value.length > 0) {
			this.addEntry(e.target.value);
			var str = e.target.value;
			this.saveTasks();
		}
	}.bind(this));
}

/**
 * Method Delete  task 
 */

ToDoList.prototype.removeEntry = function () {
	// Add event mouse click with method - addEventListener
	this.el.addEventListener('click', function (e) {
		if (e.target.nodeName === 'LI') {
			this.lastRemoved.push({
				action: 'remove',
				content: e.target
			});
			this.el.removeChild(e.target);
		}
	}.bind(this));
}

/**
 * Method cancel delete select task
 */

ToDoList.prototype.undoRemove = function () {
	this.undoButton.addEventListener('click', function (e) {
		e.preventDefault();

		var lastEntry = this.lastRemoved.pop();

		if (lastEntry && lastEntry.action === 'remove') {
			this.addEntry(lastEntry.content.innerText);
		} else {
			alert("Нет удаленных задач!");
		}
	}.bind(this));
}



// $(document).ready(function(){
// 		var tasklist = $(data-list).html();
// 		localStorage.setItem('data-list',tasklist);
// })