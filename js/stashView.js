function StashView(){
	var stashDb = data.read('stash');
  	if (!stashDb) {
	    stashDb = [];
	    data.update('stash', JSON.stringify(stashDb));
  	}
}

StashView.prototype.showStash = function(){
	// var stashDb = JSON.parse(data.read('stash'));
	 // console.log(stashDb);
	var addGoods = document.getElementById('goods');
	  addGoods.innerHTML = '';

	var addUl = markup.create({
		tag: 'ul',
		parent: addGoods,
		className: 'products clearfix'
	});

	arrGoodsToStash.forEach(function(product) {
		
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

var stashView = new StashView();

var stashBtn = document.getElementById('stash');
events.on(stashBtn, "click", stashView.showStash);
