define(
  ['jquery', 'uiComponent', 'mage/url'],
  function ($, Component, urlBuilder) {
    'use strict';
    return Component.extend({
      defaults: {
        template: 'Brander_ContactUs/contactus-form'
      },
      initialize: function () {
        this._super();
      },
      validateForm: function (form) {
        return $(form).validation() && $(form).validation('isValid');
      },
      submitForm: function(){
        var form = $('#contact-form');
        if (!this.validateForm(form)) {
          return;
        }

        var input = $('<input>').attr('type', 'hidden').attr('name', 'isAjax').val(1);
        form.append(input);
        $.ajax({
          url: urlBuilder.build(this.ajaxUrl),
          dataType: 'JSON',
          type: 'POST',
          data: form.serialize(),
          success: function (response) {
            if (response === 'success') {
              location.reload();
            }
          },
        });
      },
      getPostName: function () {
        return this.postName;
      },
      getPostEmail: function () {
        return this.postEmail;
      },
      getPostPhone: function () {
        return this.postPhone;
      },
      getPostQuestion: function () {
        return this.postQuestion;
      },
    });
  }
);