function Data(){

}

Data.prototype.createData = function(key, data) {
    key = key || prompt('Key:');
    data = data || prompt('Data:');

    if (typeof key === 'undefined') {
      console.error('No key');
      return false;
    }

    if (typeof data === 'undefined') {
      console.error('No data');
      return false;
    }

    localStorage.setItem(key, data);
  };

  var data = new Data();






// var dataGet = JSON.parse(localStorage.getItem('db')) - преобразование строки в обьект с двумя массивами
// console.log(retObj) - отображение данных с локал сторедж