// создаем объект
var app = app || {};

$(function() {
	// инициализируем главную view черезе new
	app.mainView = new MainView({
		// передаем в view елемент
		el: '#contackts'
	});
// инициализируем роутер
	app.router = new Router();
});