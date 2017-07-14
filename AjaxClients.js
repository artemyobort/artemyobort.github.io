// обращаемся к API randomauser.me 
$.ajax({
  url: 'https://randomuser.me/api/?results=100',
  dataType: 'json',
  success: function(data) {
  	// пытался как-то преобразовать полученные данные, что бы было мне легче их обробатывать
  	// но не много не вышло
    arr.push(data);
    arr[0].results.forEach(function(item) {
  		contacts.push(item);
	});
  }
});


var arr = [];
var contacts = [];