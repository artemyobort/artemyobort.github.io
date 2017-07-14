// создаем модел
var ClientModel = Backbone.Model.extend({
	
});

// создаем коллекцию и передаем ей в качестве модели по умолчанию модель ClientModel
var ClientCollection = Backbone.Collection.extend({
	model: ClientModel
});