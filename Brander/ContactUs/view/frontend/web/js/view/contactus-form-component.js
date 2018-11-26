define(
  [
    'ko',
    'jquery',
    'Magento_Ui/js/form/form',
    'Brander_ContactUs/js/model/url-builder',
    'mage/storage',
    'mage/validation'
  ],
  function ( ko, $, Component, urlBuilder, storage ) {
    'use strict';

    return Component.extend({
      /** @inheritdoc */
      initialize: function () {
        this._super();
        this.message = ko.observable('');

      },
      /**
       * Method to handle and send contact us form.
       *
       * @return {void}
       */
      submitForm: function() {
        var self = this;
        var form = $('#contact-form');

        if (form && $(form).validation() && $(form).validation('isValid')) {
          storage.get(
            urlBuilder.createUrl('/callback/create/:data', {
              data: form.serialize()
            })
          ).done((response) => {
            form[0].reset();
            if (response) {
              self.message(response)
            }

            console.log(response);
          }).fail((response) => {
            console.log(response);
          });
        }
      },
      /**
       * Method to get return contact us from's fromKey.
       *
       * @return  {String}
       */
      getFormKey: function () {
        return window.formData.formKey;
      },
    });
  }
);