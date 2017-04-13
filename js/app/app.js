(function(TDLCollection){
    'use strict'
    var my = [
    {
        task: 'list-goals',
        title: 'Мои цели'
    },
    {
       task: 'list-task',
        title: 'Мои задачи' 
    }
    ];

    var myCollection = new TDLCollection();
    my.forEach((task, index) => myCollection.addSingle(task));
    window.myCollection = myCollection;
    }) (ToDoListCollection);
