/*jslint regexp: true, nomen: true, sloppy: true */

//var WEBFOLDER = 'asta';
//var WEBFOLDER = 'staging';
var WEBFOLDER = '';

/*global require, applicationConfig, window, applicationConfig */

require.config({

    baseUrl: '/' + WEBFOLDER + '/wp-content/themes/asta-uskaite/scripts',
    paths: {
        jquery: 'libs/jquery-1.8.3.min',
        site: 'modules/site',
        validation: 'plugins/jquery.validate',
        jqueryEasing:'plugins/jquery.easing.1.3',
        bxslider:'plugins/jquery.bxslider.min',
        googlemaps: 'plugins/gmaps',
        async: 'libs/async',
        modal: 'plugins/jquery.modal'

    },

    shim: {
        site: {
            deps: ['jquery']
        },
        validation: {
            deps: ['jquery']
        },
        jqueryEasing:{
            deps:['jquery']
        },
        bxslider:{
            deps:['jquery']
        },
        modal:{
            deps:['jquery']
        }
    }

});

require(['jquery', 'site', 'bxslider', 'jqueryEasing', 'async', 'googlemaps', 'validation', 'modal'], function ($, site) {
    $(function(){
        site.init();
    });
});