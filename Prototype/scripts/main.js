/*jslint regexp: true, nomen: true, sloppy: true */
/*global require, applicationConfig, window, applicationConfig */
require.config({
    baseUrl: '/scripts',
    paths: {
        jquery: 'libs/jquery-1.8.3.min',
        site: 'modules/site',
        validation: 'plugins/jquery.validate',
        browserCompatability: 'modules/outdatedBrowser',
        jqueryEasing:'plugins/jquery.easing.1.3',
        bxslider:'plugins/jquery.bxslider.min',
        googlemaps: 'plugins/gmaps',
        async: 'libs/async'
    },
    shim: {
        site: {
            deps: ['jquery']
        },
        validation: {
            deps: ['jquery']
        },
        browserCompatability: {
            deps: ['jquery']
        },
        jqueryEasing:{
            deps:['jquery']
        },
        bxslider:{
            deps:['jquery']
        }
    }
});
require(['jquery', 'site', 'bxslider', 'jqueryEasing', 'async', 'googlemaps', 'validation'], function ($, site) {
    site.init();
});
