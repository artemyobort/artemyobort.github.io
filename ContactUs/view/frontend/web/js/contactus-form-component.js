define(
  ['jquery', 'uiComponent', 'mage/url', 'mage/storage'],
  function ($, Component, urlBuilder, storage) {
    'use strict';
    return Component.extend({
      defaults: {
        template: 'Brander_ContactUs/contactus-form'
      },
      initialize: function () {
        this._super();
        this.formData = window.formData;
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
        storage.post(
          urlBuilder.build(this.formData.ajaxUrl), form.serialize(), false
        ).done(function (response) {
          if (response === 'success') {
            location.reload();
          }
        }).fail(function (response) {
          console.log(response);
        });
      },
      getPostName: function () {
        return this.formData.name;
      },
      getPostEmail: function () {
        return this.formData.email;
      },
      getPostPhone: function () {
        return this.formData.telephone;
      },
      getPostQuestion: function () {
        return this.formData.question;
      },
    });
  }
);