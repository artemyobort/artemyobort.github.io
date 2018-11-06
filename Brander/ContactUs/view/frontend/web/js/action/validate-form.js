/**
 * @api
 */
define(
  ['jquery'],
  function ( $ ) {
    'use strict';

    /**
     * Method to handle form validation.
     *
     * @param   {object}  from    DOM element
     * @return  {bool}
     */
    return function ( form ) {

      return $(form).validation() && $(form).validation('isValid');

    };
  }
);
