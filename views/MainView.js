// создаем класс главной view
var MainView = Backbone.View.extend({
// назначаем ей ивент
	events: {
		'click .updateDbase':  'updateDbase'
	},

	initialize: function(){
		// при инициализации берем наш шаблон, а именно его содержимое (html) по 
		// id #contacktsView и пихаем в переменную для удобства
		this.template = _.template($('#contacktsView').html());
		// в содержимое елемента, который был передан при созданиие главной view через new в файле app.js
		// вставляем полученный шаблон из this.template
		this.$el.html(this.template());
		// создаем коллекцию моделей и (пробую передать туда полученый Ajax с рандомайзера)
		this.coll = new ClientCollection(contacts);
		// подписываюсь на событие коллекции о изминение всего в ней выполнять this.render
		this.listenTo(this.coll, 'all', this.render);
		// подписываюсь на событие коллекции 'add' при этом выполнять this.addClient
		this.listenTo(this.coll, 'add', this.addClient);
		// рендерим главную view при инициализации главной view
		this.render();
	},
	// в функции рендер главной view я хотел сделать, что бы проходя по всем элементам соллекции в которой 
	// содержится contacts(Ajax) будет передаваться только что созданная модель аргументом в функцию  каждую итерацию вставлять в коллекцию пустую модель через .add, далее 
	// при прохождении по каждому элементу в contacts(Ajax) через each хотел в созданные переменный инкриментировать
	// по факту наличия нужных значение
	render: function(){
		var self = this;
		var male = 0;
		var female = 0;
		var mr = 0;
		var miss = 0;
		var ms = 0;
		var mrs = 0;
		var mansieur = 0;
		this.coll.each(function(model){
			self.coll.add({});
			if (model.get('gender') === 'male') {
				male +=1;
			} else {
				female += 1;
			}

			if (obj.name.get('title') === 'mr'){
				mr += 1;
			}

			if (obj.name.get('title') === 'miss'){
				miss += 1;
			}

			if (obj.name.get('title') === 'ms'){
				ms += 1;
			}

			if (obj.name.get('title') === 'mrs'){
				mrs += 1;
			}

			if (obj.name.get('title') === 'mansieur'){
				mansieur += 1;
			}
		});
// в конце всего через jquery вызывать нужные мне елементы разметки по их классам и в них вставлять значения переменных
		this.$('.male').text(male);
		this.$('.female').text(female);
		this.$('.mr').text(mr);
		this.$('.miss').text(miss);
		this.$('.ms').text(ms);
		this.$('.mrs').text(mrs);
		this.$('.mansieur').text(mansieur);
	},
// фунция addClient каждый раз будет выпонлятся благодаря прослушки на коллекии на событие .add т.е как я задумал, каждый раз 
//  в момент перебора массива contacts(Ajax) будет передаваться только что созданная модель аргументом в функцию addClient
// каждый раз создавать новую view клиента, передавать в нее модель с аргумента и с помощю jquery через метод .append вставлять 
//  в элемент разметки с классом contacktsList каждую view клиента и при это инициализировав рендер этой вью
	addClient: function(model){
		var view = new ClientView({ model: model});
		this.$('.contacktsList').append(view.render())
	},
// здесь я пытался сделать обновление  запроса с Ajaх путем того же кода (знаю что это не гениально) 
// но я с этим никогда не сталкивался посему не смог придумать что то стоящее
 	updateDbase: function(){
		var arr = [];
		var contacts = [];
		$.ajax({
		    url: 'https://randomuser.me/api/?results=100',
		    dataType: 'json',
		    success: function(data) {
			    arr.push(data);
			    arr[0].results.forEach(function(item) {
			  		contacts.push(item);
				});
			}
		});
	}
});