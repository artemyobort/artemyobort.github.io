function selectCategory(category){
	var db = data.read('db');
  	if (!db) {
	    db = [];
	    data.update('db', JSON.stringify(db));
  	}

  	var selectedCategory = category;
  	var getDb = JSON.parse(data.read('db'));
	var arrNew = getDb.categories.filter(function(category){
		return selectedCategory.id === category.id
	});
		return arrNew;
};

