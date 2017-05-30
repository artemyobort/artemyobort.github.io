function selectCategory (category){
	var db = data.read('db');
  	if (!db) {
	    db = [];
	    data.update('db', JSON.stringify(db));
  	}

  	var getDb = JSON.parse(data.read('db'));
	var arrNew = getDb.categories.filter(function(category){

		var selectedCategory = category;
		// console.log(selectedCategory);

		return category.id === selectedCategory.id
	});
};

