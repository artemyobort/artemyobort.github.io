function AddCategories(){
	var db = data.read('db');
  	if (!db) {
	    db = [];
	    data.update('db', JSON.stringify(db));
  	}
}

AddCategories.prototype.getCategories = function (){
	// var getDb = data.read('db');
	// 	getDb = JSON.parse(getDb);

	var getDb = JSON.parse(data.read('db'));

	var addCategories = document.getElementById('categories');
	  addCategories.innerHTML = '';

	var addUl = markup.create({
	    tag: 'ul',
	    parent: addCategories
	  });

	  getDb.categories.forEach(function(category) {
	    // console.log(category.title);
	    var addLi = markup.create({
	      tag: 'li',
	      parent: addUl
	    });

	    var addA = markup.create({
	    	tag: 'a',
	    	content: category.title,
	    	parent: addLi
	    	// attrs: 'href="#"'
	    });
	});
};

var addCategories = new AddCategories();

addCategories.getCategories();

