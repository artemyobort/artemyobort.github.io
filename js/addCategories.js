function AddCategories(){
	var db = data.read('db');
  	if (!db) {
	    db = [];
	    data.update('db', JSON.stringify(db));
  	}
}

AddCategories.prototype.getCategories = function (){
	var getDb = data.read('db');
		getDb = JSON.parse(getDb);

	var addCategories = document.getElementById('categories');
	  addCategories.innerHTML = '';

	var addUl = markup.create({
	    tag: 'ul',
	    parent: addCategories
	  });

	  getDb.forEach(function(category) {
	    console.log(category.title);
	    var addLi = markup.create({
	      tag: 'li',
	      parent: addUl
	    });

	    var addA = murkup.create({
	    	tag: 'a',
	    	content: category.title,
	    	parent: addLi,
	    	attrs: 'href="#"'
	    });
	});
};

var addCategories = new AddCategories();

addCategories.getCategories();

