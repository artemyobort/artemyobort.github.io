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
		
		var arrFiltered = [];
		addInput.onclick = function(event) {
			arrFiltered = selectCategory(category);
			// console.log(arrFiltered);
			// alert(arrFiltered[0].id);
			var getDb = JSON.parse(data.read('db'));

			for (var i = 0; i < arrFiltered.length; i++){
				for (var j = 0; j < getDb.products.length; j++) {

					if (getDb.products.category === arrFiltered[0].id){
						var addGoods = document.getElementById('goods');
				  		addUdGoods.innerHTML = '';

						var addUl = markup.create({
							tag: 'ul',
							parent: addGoods,
							className: 'products clearfix'
						});

						getDb.products.forEach(function(product) {
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

							var addHprice = markup.create({
								tag: 'h4',
								content: product.price,
								parent: addLi
							});
				  		});
					};  
				};
			};
		};
	});
};
// console.log(arrFiltered);

var addCategories = new AddCategories();

addCategories.getCategories();

