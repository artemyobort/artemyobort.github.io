/**
 * @api
 */
define(['jquery'], function ($) {
    'use strict';

    return {
        method: 'rest',
        version: 'V1',
        serviceUrl: ':method/:version',

        /**
         * @param   {String}    url
         * @param   {Object}    params
         * @return  {*}
         */
        createUrl: function ( url, params ) {
            return this.bindParams(`${this.serviceUrl}${url}`, params);
        },

        /**
         * @param   {String}    url
         * @param   {Object}    params
         * @return  {String}
         */
        bindParams: function ( url, params ) {
            params.method = this.method;
            params.version = this.version;

            var  urlParts = url.split('/');
            urlParts = urlParts.filter(Boolean);

            $.each(urlParts, (key, part) => {
                part = part.replace(':', '');
                if (params[part] !== undefined) {
                    urlParts[key] = params[part];
                }
            });

            return urlParts.join('/');
        }
    };
});
