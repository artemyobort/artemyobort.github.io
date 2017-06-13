function SortBy(){
	var db = data.read('db');
  	if (!db) {
	    db = [];
	    data.update('db', JSON.stringify(db));
  	}


}

SortBy.prototype.sortByMax = function (){
	var getDb = JSON.parse(data.read('db'));
	var selectProductsFiltered = [];
	// var arrGoodsToStash = [];
	// data.create('stash', JSON.stringify(arrGoodsToStash));
	var sortDb = getDb.products.sort(function(a,b){
			return b.price - a.price;
		});

	var arrDb = [];

		for (i = 0; i < sortDb.length; i++){
			arrDb[i] = sortDb[i];
		}
	

	var addGoods = document.getElementById('goods');
	  addGoods.innerHTML = '';

	var addUl = markup.create({
		tag: 'ul',
		parent: addGoods,
		className: 'products clearfix'
	});

	arrDb.forEach(function(product) {
		
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

		input.onclick = function(event) {
			selectProductsFiltered = addGoodsToStash(product);
			arrGoodsToStash.push(selectProductsFiltered);
			// data.update('stash', JSON.stringify(arrGoodsToStash));
			// var stash = JSON.parse(data.read('stash'));
			//  console.log(arrGoodsToStash);
		};
	});
};

SortBy.prototype.sortByMin = function (){
	var getDb = JSON.parse(data.read('db'));
	var selectProductsFiltered = [];
	// var arrGoodsToStash = [];
	// data.create('stash', JSON.stringify(arrGoodsToStash));
	var sortDb = getDb.products.sort(function(a,b){
			return a.price - b.price;
		});

	var arrDb = [];

	for (i = 0; i < sortDb.length; i++){
		arrDb[i] = sortDb[i];
	}

	var addGoods = document.getElementById('goods');
	  addGoods.innerHTML = '';

	var addUl = markup.create({
		tag: 'ul',
		parent: addGoods,
		className: 'products clearfix'
	});

	arrDb.forEach(function(product) {
		
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

		input.onclick = function(event) {
			selectProductsFiltered = addGoodsToStash(product);
			arrGoodsToStash.push(selectProductsFiltered);
			// data.update('stash', JSON.stringify(arrGoodsToStash));
			// var stash = JSON.parse(data.read('stash'));
			//  console.log(arrGoodsToStash);
		};
	});
};

var sortBy = new SortBy();

var elemax = document.getElementById('max');
var elemin = document.getElementById('min');

events.on(elemax, "click", sortBy.sortByMax);
events.on(elemin, "click", sortBy.sortByMin);

