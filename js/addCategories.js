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
	    		{value: category.title}
	    	]
	    });
		
		var categoriesFiltered = [];
		addInput.onclick = function(event) {
			categoriesFiltered = selectCategory(category);
			
			var addGoods = document.getElementById('goods');
		  	addGoods.innerHTML = '';

			var addUl = markup.create({
				tag: 'ul',
				parent: addGoods,
				className: 'products clearfix'
			});

			for (var i = 0; i < getDb.products.length; i++) {
				var product = getDb.products[i];
				if (!categoriesFiltered.filter(function(category) { return category.id === product.category}).length){
				    continue;
				}

				var addLi = markup.create({
					tag: 'li',
				    parent: addUl,
				    className: 'product-wrapper'
				});
				
				var addHname = markup.create({
				    tag: 'h4',
				    content: product.title,
				    parent: addLi
				});

				var addA = markup.create({
				    tag: 'a',
				    parent: addLi,
				    className: 'product'
				});

				var addDiv = markup.create({
				    tag: 'div',
				    parent: addA,
				    className: 'product-photo'
				});

				var addImg = markup.create({
				    tag: 'img',
				    parent: addDiv,
				    attrs: [
				        {src: "https://pp.userapi.com/c629327/v629327473/db66/r051joYFRX0.jpg"}
				    ]
				});

				var addP = markup.create({
				    tag: 'p',
				    content: product.description,
				    parent: addA
				});

				var divInfo = markup.create({
					parent: addLi,
					className: 'row'
				});

				var divPrice = markup.create({
					parent: divInfo,
					className: 'col-md-6'
				});

				var addHprice = markup.create({
					tag: 'h4',
					content: product.price,
					parent: divPrice
				});

				var divBtn = markup.create({
					parent: divInfo,
					className: 'col-md-6'
				});

				var input = markup.create({
					tag: 'input',
					parent: divBtn,
					attrs: [
						{type: 'button'},
						{value: 'add'}
					]
				});
			};
		};
	});
};


var addCategories = new AddCategories();

addCategories.getCategories();

