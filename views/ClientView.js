// создаем класс view клиента
var ClientView = Backbone.View.extend({
	// назначаем ему корневой элемент
	tagName: 'article',
	// назначаем корневому элементу класс
	className: 'col-md-6',
// при инициализации с помощю метода underscore берем html содержимое шаблона view клиента по id #contacktView 
// и присваеваем это в this.templete для удобства, после чего инициализируем render мшуц клиента
	initialize: function(){
		this.template = _.template($('#contacktView').html());
		this.render();
	},
// здесь мы берем модель, которая передается сюда с функции addClient в главной view отправляем её в JOSN 
	render: function(){
		var view = this.template(this.model.toJSON());
		// вставляем содержимое переменной view в html корневого элемента
		this.$el.html(view);
		// возвращаем корневой элемент для повторного использования на будущее
		return this.$el;
	},
});