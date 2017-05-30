function AddCategories(){
	var db = data.read('db');
  	if (!db) {
	    db = [];
	    data.update('db', JSON.stringify(db));
  	}
}

AddCategories.prototype.getCategories = function (){

	var getDb = JSON.parse(data.read('db'));

	var addCategories = document.getElementById('categories');
	  addCategories.innerHTML = '';

	var addUl = markup.create({
	    tag: 'ul',
	    parent: addCategories
	  });

	  getDb.categories.forEach(function(category) {
	    
	    var addLi = markup.create({
	      tag: 'li',
	      parent: addUl
	    });

	    var addInput = markup.create({
	    	tag: 'input',
	    	parent: addLi,
	    	attrs: [
	    		{type: "button"},
	    		{onclick: "selectCategory(category)"},
	    		{value: category.title}
	    		
	    	]
	    });
	});
};

var addCategories = new AddCategories();

addCategories.getCategories();

