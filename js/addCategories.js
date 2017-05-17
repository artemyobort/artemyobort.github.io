function AddCategories(){
	var getDb = JSON.parse(localStorage.getItem('db'));
	var incr = 1;
	var id ="id";
	var fullId = id + incr;
	getDb.categories.forEach(function(category){

		console.log(category.title);
		var addCategoryLi = markup.create({
			tag: 'li',
			parent: 'Categories',
			id: fullId
		});

		var adddCategoryA = murkup.create({
			tag: 'a',
			content: category.title,
			parent: fullId,
			attrs: 'href="#"'
		});

		incr+=incr;
	});
}

var addCategories = new AddCategories();