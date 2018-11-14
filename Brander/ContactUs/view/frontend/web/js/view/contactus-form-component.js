define(
  [
    'ko',
    'jquery',
    'uiComponent',
    'Brander_ContactUs/js/model/url-builder',
    'mage/storage',
  ],
  function ( ko, $, Component, urlBuilder, storage ) {
    'use strict';

    return Component.extend({
      /** @inheritdoc */
      initialize: function () {
        this._super();
        this.formData = window.formData;
        this.name = ko.observable(this.formData.customerData['name']);
        this.email = ko.observable(this.formData.customerData['email']);
        this.telephone = ko.observable(this.formData.customerData['telephone']);
        this.question = ko.observable(this.formData.customerData['question']);
        this.message = ko.observable('');

      },
      resetAction: function () {
        this.name(null);
        this.email(null);
        this.telephone(null);
        this.question(null);
      },

      /**
       * Method to handle and send contact us form.
       *
       * @return {void}
       */
      submitForm: function() {
        var self = this;
        var form = $('#contact-form');

        if (!form || !($(form).validation() && $(form).validation('isValid'))) {
          return;
        }

        storage.get(
          urlBuilder.createUrl('/callback/create/:data', {
            data: form.serialize()
          })
        ).done((response) => {
          self.resetAction();

          if (response) {
            self.message(response)
          }

          console.log(response);
        }).fail((response) => {
          console.log(response);
        });
      },
      /**
       * Method to get return contact us from's fromKey.
       *
       * @return  {String}
       */
      getFormKey: function () {
        return this.formData.formKey;
      },
    });
  }
);