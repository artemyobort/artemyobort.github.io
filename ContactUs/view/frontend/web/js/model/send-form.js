/**
 * @api
 */
define(
  ['mage/storage', 'mage/url'],
  function ( storage, urlBuilder ) {
    'use strict';

    /**
     * Method to send form via ajax request.
     *
     * @param   {string}  url       url for ajax send
     * @param   {array}   formData  form data array
     * @return  {void}
     */
    return function ( url, formData ) {

      storage.post(
        urlBuilder.build(url), formData, false
      ).done(function (response) {
        if (response === 'success') {
          location.reload();
        }
      }).fail(function (response) {
        console.log(response);
      });

    };
  }
);
