function Markup() {
  
}

Markup.prototype.create = function(options) {
  // tag
  // content
  // parent
  // className
  // id
  // callback

  optionsDefault = {
    tag: 'div',
    content: '',
    parent: 'body',
    className: '',
    id: '',
    callback: undefined,
    attrs: []
  };

  options = options || {};

  for(var i in optionsDefault) {
    if (!options.hasOwnProperty(i)) {
      options[i] = optionsDefault[i];
    }
  }

  var element;
  // var elem = document.createElement(tag);
  //   if (content) {
  //       if (tag === 'a') {
  //         element.src = content;
  //       } else {
  //         element.innerHTML += content;
  //         }
  //   }

  if (options.tag === 'input#checkbox') {
    element = document.createElement('input');
    element.type = 'checkbox';
    element.value = 1;
  } else {
    element = document.createElement(options.tag);
  }

  element.innerHTML = options.content;

  if (options.className) {
    element.className += options.className;
  }

  if (options.id) {
    element.id = options.id;
  }

  if (options.tag === 'form') {
    element.action = 'javascript:void(0)';
    element.method = 'post';
  }

  if (options.attrs.length) {
    options.attrs.forEach(function(attr) {
      for (var name in attr) {
        switch (name) {
          default:
            element[name] = attr[name];
            break;
        }
      }
    });
  }

  if (options.parent) {
    var prnt = typeof options.parent === 'string'
      ? document.querySelector(options.parent)
      : options.parent;

    if (!prnt) {
      console.error('No element found');
      return false;
    }
    prnt.appendChild(element);
  } else {
    document.body.appendChild(element);
  }
  return element;
};

Markup.prototype.update = function(query, content) {
  var elements = this.find(query);
  elements[0].innerHTML = content;
};

Markup.prototype.delete = function(query) {
  var elements = this.find(query);
  elements[0].remove();
};

Markup.prototype.find = function(query) {
  var elements = document.querySelectorAll(query);
  return elements;
};

var markup = new Markup();



function addElements() {
  var self = this;
  var container = markup.create({
    id: container
  });

  var header = markup.create({
    content: 'Исторический турнир',
    parent: container,
    id: header
  });

  var sidebar = markup.create({
    parent: container,
    id: sidebar
  });

  var pone = markup.create({
    tag: 'p',
    parent: sidebar,
    id: pone
  });

  var aone = markup.create({
    tag: 'a',
    content: 'Статистика турнира',
    parent: pone,
    attrs: [
      {href: 'stat.html'}
    ]
  });

   var ptwo = markup.create({
    tag: 'p',
    parent: sidebar,
    id: ptwo
  });

  var atwo = markup.create({
    tag: 'a',
    content: 'Интервью с главным судьей',
    parent: ptwo,
    attrs: [
      {href: 'interview.html'}
    ]
  });

     var pthree = markup.create({
    tag: 'p',
    parent: sidebar,
    id: pthree
  });

  var atwo = markup.create({
    tag: 'a',
    content: 'Конкурсные вопросы',
    parent: pthree,
    attrs: [
      {href: 'ask.html'}
    ]
  });


  var content = markup.create({
    parent: container,
    id: content
  });

  var h2 = markup.create({
    tag: 'h2',
    content: 'Опрос общественного мнения показал',
    parent: content
  });

  var ul = markup.create({
    tag: 'ul',
    parent: content,
    id: ul
  });

  var li1 = markup.create({
    tag: 'li',
    content: 'что пароход изобретен: Петром I, А. Эйнштейном и А. Поповым;',
    parent: ul
  });

  var li2 = markup.create({
    tag: 'li',
    content: 'Диего Веласкес писал свои полотна в стиле: империализма, кубизма и империосионизма;',
    parent: ul
  });

  var li3 = markup.create({
    tag: 'li',
    content: 'Фаросский маяк находится в Фаросе;',
    parent: ul
  });
  
  var li4 = markup.create({
    tag: 'li',
    content: 'конфуцианство возникло в: Италии, Корее и Франции;',
    parent: ul
  });

  var li5 = markup.create({
    tag: 'li',
    content: 'богами торговли и воровства в Древней Греции были: Марс, Меркурий и Дионис;',
    parent: ul
  });

  var li6 = markup.create({
    tag: 'li',
    content: 'Франция – это город;',
    parent: ul
  });

  var li7 = markup.create({
    tag: 'li',
    content: 'богами загробного мира в Египте были: Аид, Анубис и Ассирис;',
    parent: ul
  });

  var li8 = markup.create({
    tag: 'li',
    content: 'столица Золотой Орды — Монголия;',
    parent: ul
  });

  var li9 = markup.create({
    tag: 'li',
    content: 'главные противники Александра Македонского: татаро-монголы, Дедал и Цезарь;',
    parent: ul
  });

  var li10 = markup.create({
    tag: 'li',
    content: 'священными птицами — символами Афин были: ворона и орел;',
    parent: ul
  });

   var li11 = markup.create({
    tag: 'li',
    content: 'в Древней Греции морями повелевали боги: Плутон, Нептун и Тритон.',
    parent: ul
  });

   var footer = markup.create({
    content: '&copy; JSLearn',
    parent: container,
    id: footer
   }); 
}

var addElements = new addElements();