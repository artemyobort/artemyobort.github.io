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

	  if (!getDb.length) {
	    return false
	  }

	  getDb.forEach(function(category) {
	    console.log(category.title);
	    var addLi = markup.create({
	      tag: 'li',
	      parent: addUl,
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

	// var getDb = JSON.parse(localStorage.getItem('db'));
	// var incr = 1;
	// var id ="id";
	// var fullId = id + incr;
	// getDb.categories.forEach(function(category){

	// 	console.log(category.title);
	// 	var addCategoryLi = markup.create({
	// 		tag: 'li',
	// 		parent: 'Categories',
	// 		id: fullId
	// 	});

	// 	var adddCategoryA = murkup.create({
	// 		tag: 'a',
	// 		content: category.title,
	// 		parent: fullId,
	// 		attrs: 'href="#"'
	// 	});

	// 	incr+=incr;
	// });

