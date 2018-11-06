define(
  [
    'jquery',
    'uiComponent',
    'Brander_ContactUs/js/action/validate-form',
    'Brander_ContactUs/js/model/send-form'
  ],
  function ( $, Component, validateForm, sendForm ) {
    'use strict';

    return Component.extend({
      defaults: {
        template: 'Brander_ContactUs/contactus-form'
      },
      /** @inheritdoc */
      initialize: function () {
        this._super();
        this.formData = window.formData;
      },
      /**
       * Method to handle and send contact us form.
       *
       * @return {void}
       */
      submitForm: function() {

        var form = $('#contact-form');
        if (!form || !validateForm(form)) {
          return;
        }

        const url = this.getSendFormUrl();
        const input = $('<input>').attr('type', 'hidden').attr('name', 'isAjax').val(1);
        form.append(input);

        if (url) {
          sendForm(url, form.serialize());
        }
      },
      /**
       * Method to get return contact us from's fromKey.
       *
       * @return  {string}
       */
      getFormKey: function () {
        return this.formData.formKey;
      },
      /**
       * Method to get return contact us from's fromKey.
       *
       * @return  {string}
       */
      getSendFormUrl: function () {
        return this.formData.ajaxUrl;
      },
      /**
       * Method to get return form input value by form input name
       * if it exist in POST or in customer data.
       *
       * @param   {string}  key   the key of form data array.
       * @return  {string}
       */
      getFormValue: function ( key ) {
        return this.formData.customerData[key] ? this.formData.customerData[key] : '';
      },
    });
  }
);