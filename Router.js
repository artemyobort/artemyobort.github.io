// создаем класс роутер
var Router = Backbone.Router.extend({
// описание работы роутера, а именно какие функции ему применять относительно измененного урла
	routes: {
		'': 				'users',
		'users':  			'users',
		'stats': 			'stats'
	},
// при инициализации роутера будет включатся запись истроии
	initialize: function(){
		// запись истроии
		Backbone.history.start();	 
	},
// отображение в случае users
	users: function(){
		$('.hero-unit').hide();
		$('#page-first').show();
	},
// отображение в случае stats
	stats: function(){
		$('.hero-unit').hide();
		$('#page-second').show();
	}
})