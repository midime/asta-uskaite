/*jslint regexp: true, nomen: true, sloppy: true */

/*global require, define, alert, applicationConfig, location, document, window,  setTimeout, Countable */



define(['jquery'], function ($) {



    var browserCompatability = {};



    browserCompatability.getCookieValue = function (key) {

        currentcookie = document.cookie;

        if (currentcookie.length > 0) {

            firstidx = currentcookie.indexOf(key + "=");

            if (firstidx != -1) {

                firstidx = firstidx + key.length + 1;

                lastidx = currentcookie.indexOf(";", firstidx);

                if (lastidx == -1) {

                    lastidx = currentcookie.length;

                }

                return unescape(currentcookie.substring(firstidx, lastidx));

            }

        }

        return "";

    };



    browserCompatability.checkCookies = function () {

        var cookieEnabled = (navigator.cookieEnabled) ? true : false;

        if (typeof navigator.cookieEnabled == "undefined" && !cookieEnabled) {

            document.cookie = "testcookie";

            cookieEnabled = (document.cookie.indexOf("testcookie") != -1) ? true : false;

        }

        return (cookieEnabled);

    };



    browserCompatability.browserOutdated = function () {



        var checkCookie = browserCompatability.checkCookies();



        var isBrowserAccepted = browserCompatability.getCookieValue('browser_accept');

        if (typeof isBrowserAccepted != 'undefined' && isBrowserAccepted == 'accepted') {



        } else {

            var body = $('body'),

                html = $('html'),

                head = $('head');



            if (typeof ieVersionVariable !== "undefined" && ieVersionVariable === true) {



                var cssBrowser = '<style type="text/css">html.bc-warning-active{position:fixed;width:100%;height:100%;overflow:hidden;}#bc-warning-browser{font-family:"TrebuchetMS",Helvetica,sans-serif;font-size:18px;line-height:1.5em;color:#666666;position:absolute;left:0;top:0;z-index:1000;width:100%;height:100%;overflow:hidden;padding:250px 0 0; }#bc-warning-browser a{cursor:pointer;} .bc-title h4 { font-weight:bold; font-size:30px; margin-bottom:3px; line-height:1.2; } .bc-warning-box p{ font-size:22px; font-weight:bold; font-family:Museo Sans W01 500, sans-serif; color:#77787c; position:relative; } .bc-box-shadow { position:absolute; top:100%; height:13px; width:460px; left:50%; margin-left:-230px; background:url("/content/styles/images/bg-shadow.png") no-repeat 0 0; } .bc-warning-overlay{position:absolute;left:0;top:0;width:100%;height:100%;overflow:hidden;background:#fff;-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=50)";/*IE5-7*/filter:alpha(opacity=50);/*Netscape*/-moz-opacity:0.5;/*Safari1.x*/-khtml-opacity:0.5;opacity:0.5;}.bc-warning-box{margin:0 auto;padding:25px 35px; background:#e6e6e6; width:430px; position:relative;z-index:1010;}.bc-title{font-size:36px;line-height:1.0em;font-weight:bold;color:#303030;margin-bottom:20px;}.bc-desc{margin-bottom:15px;}.bc-desc+.bc-desc{font-size:13px;}.bc-link{font-size:24px;margin:50px00;text-align:center;}</style>',

                    htmlBrowser = '<div id="bc-warning-browser">' +

                        '<div class="bc-warning-overlay"></div>' +

                        '<div class="bc-warning-box">'+

                        '<div class="bc-title"><h4>We recommend<br/> updating your<br/> browser immediately.</h4>' +

                        '</div>' +

                        '<p>Your current browser version may pose security risks and may not display all features of this website.</p>' +

                        '<p>We recommend: <a target="_blank" href="http://www.google.com/chrome/‎">Google Chrome</a></p><div class="bc-box-shadow"></div>'+

                        '</div>' +

                        '</div>';



                head.append(cssBrowser);

                $('.fade-block').remove();

                body.append(htmlBrowser);

                html.addClass('bc-warning-active');



                $('.js-accept-browser').on('click', function (e) {

                    e.preventDefault();

                    document.cookie = "browser_accept=" + 'accepted';

                    $('#bc-warning-browser').remove();

                    html.removeClass('bc-warning-active');

                });



            } else {



                //document.cookie = "browser_accept=" + 'accepted';



            }

        }





        //If cookies disabled

        if (typeof checkCookie !== "undefined" && checkCookie === false) {



            var cssCookies = '<style type="text/css">#bc-warning-cookies{z-index:99999; position:fixed;left:0;right:0;top:0;background:#FFF366;padding:5px 20px;font-family:"TrebuchetMS",Helvetica,sans-serif;font-size:14px;line-height:1.4em;}#bc-warning-cookies a{position:absolute;right:4px;top:4px;display:block;background:#000000;color:#ffffff;line-height:1.0em;text-decoration:none;padding:3px 6px;}</style>',

                htmlCookies = '<div id="bc-warning-cookies"><strong>Attention!</strong> Your browser either does not support cookies or it has been disabled.<a class="js-cookies-disabled" href="#close-cookies">X</a></div>';



            head.append(cssCookies);

            body.append(htmlCookies);



            //$('#bc-warning-browser').remove();

            //html.removeClass('bc-warning-active');



            $('.js-cookies-disabled').on('click', function (e) {

                e.preventDefault();

                $('#bc-warning-cookies').remove();

            });

        }

    };



    browserCompatability.browserOutdated();

});