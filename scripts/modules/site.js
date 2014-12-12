/*jslint regexp: true, nomen: true, sloppy: true */
/*global require, define, alert, applicationConfig, location, document, window,  setTimeout, Countable */

define(['jquery', 'bxslider', 'validation'], function ($) {

    var module = {};

    module.initSlider = function () {
        $('#promo-slide').bxSlider({
            mode: 'vertical',
            auto: true,
            speed: 1500,
            pause: 3000
        });
    };
    module.gmaps = function () {
        var mapCanvas = document.getElementById('contact-map');
        if (mapCanvas) {
            var myLatlng = new google.maps.LatLng(54.897688, 23.888458),
                pinImage = '/staging/wp-content/themes/asta-uskaite/content/images/icn-pin-flower.png',
                mapOptions = {
                    zoom: 18,
                    center: myLatlng,
                    disableDefaultUI: true,
                    scrollwheel: false,
                    mapTypeId: 'custom_style'
                },
                map = new google.maps.Map(mapCanvas, mapOptions);

            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(54.897888, 23.888678),
                map: map,
                title: 'Asta Uskaite',
                icon: pinImage
            });

            var featureOpts = [
                {
                    "elementType": "geometry.fill",
                    "stylers": [
                        { "weight": 7 },
                        { "visibility": "on" },
                        { "lightness": 30 },
                        { "hue": "#ffc300" },
                        { "saturation": -34 }
                    ]
                },
                {
                    featureType: 'water',
                    stylers: [
                        { color: '#AFC6CF' }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry.fill",
                    "stylers": [
                        { "color": "#ffffff" }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry.stroke",
                    "stylers": [
                        { "color": "#E3E1D9" }
                    ]
                },
                {
                    "featureType": "road.local",
                    "elementType": "geometry.fill",
                    "stylers": [
                        { "color": "#ffffff" },
                        { "weight": 8 }
                    ]
                },
                {
                    "featureType": "road.local",
                    "elementType": "geometry.stroke",
                    "stylers": [
                        { "color": "#E3E1D9" },
                        { "weight": 1 }
                    ]
                },
                {
                    "featureType": "road.local",
                    "elementType": "labels.icon",
                    "stylers": [
                        { "visibility": "off" }
                    ]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "geometry.fill",
                    "stylers": [
                        { "color": "#ffffff" },
                        { "weight": 8 }
                    ]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "geometry.stroke",
                    "stylers": [
                        { "color": "#E3E1D9" },
                        { "weight": 1 }
                    ]
                }
            ];
            var infowindow = new google.maps.InfoWindow({
                content: '<div class="infowindow"><a class="icon-info-close js-info-close"></a> <strong style="font-size: 16px">Asta Uskaite</strong> <br>Vilniaus g. 12-1D, Kaunas <br>Tel.: +370 612 32789</div>'
            });

            var styledMapOptions = {
                name: 'Custom Style'
            };
            var customMapType = new google.maps.StyledMapType(featureOpts, styledMapOptions);
            map.mapTypes.set('custom_style', customMapType);

            //Toggle Form
            $('.js-contact').on('click', function(e){
                e.preventDefault();
                $('body').toggleClass('show-map');
                infowindow.open(map,marker);
                $('.js-info-close').on('click', function(){
                    infowindow.close();
                    $('body').toggleClass('show-map');
                });
            });
        }
    };
    module.mixedFunctions = function () {

        var catPage = 1;
        //Show/Hide contact us form
        $('.js-toggle').click(function () {
            $('.contact-box').toggleClass('minimise');
        });

        //Contact us form validation
        $('.js-contactform').validate({
            errorElement: "span"
        });

        //Toggle form labels
        $('.js-field').bind('keyup blur', function () {
            var el = $(this);
            if (el.val() !== '') {
                el.parent().addClass('full');
            } else {
                el.parent().removeClass('full');
            }
        });

        //Load more
        $('.js-load-more').on('click', function(){

            thisButton = $(this);
            if (thisButton.hasClass('no-more-items')) {
                return false;
            }

            thisButton.toggleClass('loading');

            var catId = $('.accessory-page-data').data('category');
            $.ajax({
                type: "GET",
                url: "/staging/?p=80",
                dataType: "html",
                data: { 'fetchContent' : true, 'catId' : catId, 'catPage' : catPage }
            }).done(function( html ) {

                catPage++;

                if (html == "no result") {
                    thisButton.addClass('no-more-items');
                } else {
                    $( ".gallery" ).append( html );
                }

                thisButton.toggleClass('loading');
            });

        });

        //Toggle drawer
        var elDrawer = $('.js-drawer');
        if (elDrawer.length > 0) {
            $('html').on('click touch', function () {
                if (elDrawer.hasClass('opened')) {
                    elDrawer.removeClass('opened');
                }
            });

            $('.js-show-form').on('click', function (e) {
                e.preventDefault();
                e.stopPropagation();
                elDrawer.toggleClass('opened');

//                $('.js-form').toggleClass('active');
            });

            $('.js-drawer-close').on('click', function (e) {
                e.preventDefault();
                elDrawer.removeClass('opened');
            });

            elDrawer.on('click', function (e) {
                e.stopPropagation();
            });
        }
    };
    module.validateForms = function () {
        $('form').each(function () {
            $(this).validate();
        });
    };
    module.init = function () {
        module.initSlider();
        module.gmaps();
        module.mixedFunctions();
        module.validateForms();
    };

    return module;
});