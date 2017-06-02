function AddGoods(){
	var db = data.read('db');
  	if (!db) {
	    db = [];
	    data.update('db', JSON.stringify(db));
  	}
}

AddGoods.prototype.getGoods = function (){
	// var getDb = data.read('db');
	// 	getDb = JSON.parse(getDb);

	var getDb = JSON.parse(data.read('db'));
	// var arrGoodsToStash = [];

	var addGoods = document.getElementById('goods');
	  addGoods.innerHTML = '';

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

		productsFiltered = [];
		input.onclick = function(event) {
			productsFiltered = addGoodsToStash(product);
			arrGoodsToStash.push(productsFiltered);
			console.log(arrGoodsToStash);
		};
	});
};
var arrGoodsToStash = [];

var addGoods = new AddGoods();

addGoods.getGoods();

