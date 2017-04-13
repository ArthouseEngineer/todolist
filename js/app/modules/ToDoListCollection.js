'use strict';

var ToDoListCollection = function (name) {
	this.container = document.querySelector('#todo-lists');
	this.init = function(){
	}
}

ToDoListCollection.prototype = Object.create(Array.prototype);
ToDoListCollection.prototype.constructor = ToDoListCollection;

ToDoListCollection.prototype.addSingle = function(options) {
	var el = document.createElement('div');
	el.innerHTML = this.getTemplate(options);
	this.container.appendChild(el);
	var toDoList = new ToDoList(options.task);
	toDoList.init();
	this.push(toDoList);
}

ToDoListCollection.prototype.getTemplate = function(options){
	var task = options.task,
	title = options.title ||'Мои задачи';
	var template = `
	<div class="row">
<div class="col-xs-12">
<div class="padding-5">
</div>
<article  class = "list list--task padding-5">
    <hgroup class = "list_header">
        <div class = "tree-quarters">
            <h3 class="text-center">${title}</h3>
        </div>
        <div class="one-quarter text-right">
            <div class="btn-group">
                <!--a href="#" class="btn btn-primary"> Добавить </a> -->
                <a href="#" class="btn btn-danger" data-undo="${task}">Отменить</a>
            </div>
        </div>
    </hgroup>
    <ul id="${task}" data-list="${task}"></ul>
    <!--input type="text" data-input="${task}" class="input input--task"-->
    <div class="container">
        <div class="col-lg-push-3 col-lg-6">
            <textarea class="form-control" id="exampleTextarea"  rows="3"></textarea>
            <div class="padding-5"> </div>
            <div class="form-group">
                <div class="input-group date" id="datetimepicker1">
                    <input type="text" class="form-control"/>
                    <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
			<div class="row">
 <div class="form-group">
    		<div class="col-sm-10 col-md-10 col-sm-push-3">
    			<div class="input-group">
    				<div id="radioBtn" class="btn-group">
    					<a class="btn btn-primary btn-sm notActive" data-toggle="fun" data-title="Y">Выполнена</a>
                        <a class="btn btn-primary btn-sm notActive" data-toggle="fun" data-title="X">В процессе</a>
    					<a class="btn btn-primary btn-sm notActive" data-toggle="fun" data-title="N">Не завершена	</a>
    				</div>
					</div>
</article>
</div>
</div>
`;
	 return template;
}