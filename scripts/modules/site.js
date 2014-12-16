/*jslint regexp: true, nomen: true, sloppy: true */
/*global require, define, alert, applicationConfig, location, document, window,  setTimeout, Countable */

define(['jquery', 'bxslider', 'validation', 'modal'], function ($) {

    var module = {};

    module.initSlider = function () {
        var promoSlide = document.getElementById('promo-slide');
        if (promoSlide) {
            $('#promo-slide').bxSlider({
                mode: 'vertical',
                auto: true,
                speed: 1500,
                pause: 3000,
                preloadImages:'visible'
            });
        }
    };

    module.gmaps = function () {
        var mapCanvas = document.getElementById('contact-map');
        if (mapCanvas) {
            var myLatlng = new google.maps.LatLng(54.897688, 23.888458),
                pinImage = '/' + WEBFOLDER + '/wp-content/themes/asta-uskaite/content/images/icn-pin-flower.png',
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
                content: '<div class="infowindow" style="width:220px; height: 80px;"><a class="icon-info-close js-info-close"></a> <strong style="font-size: 16px">Asta Uskaite</strong> <br>Valanciaus g. 12-8, Kaunas, Kaunas <br>Tel.: +370 612 32789</div>'
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
                url: "/" + WEBFOLDER + "?p=128",
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

        //On form submit
        $('form.wpcf7-form').submit(function() {

            thisForm = $(this);

            $('.form-response').children().each(function() {
                $(this).hide();
            });

            if (!$(this).valid()) {
                return false;
            }

            var href = $(this).attr('action');
            var _wpcf7 = $("input[name='_wpcf7']").val();
            var _wpcf7_version = $("input[name='_wpcf7_version']").val();
            var _wpcf7_locale = $("input[name='_wpcf7_locale']").val();
            var _wpcf7_unit_tag = $("input[name='_wpcf7_unit_tag']").val();
            var _wpnonce = $("input[name='_wpnonce']").val();

            var _m_fname = $("input[name='m_fname']").val();
            var _m_lname = $("input[name='m_lname']").val();
            var _m_email = $("input[name='m_email']").val();
            var _m_phone = $("input[name='m_phone']").val();
            var _m_zinute = $("textarea[name='m_zinute']").val();

            $.ajax({
                type: "post",
                url: href,
                dataType: "html",
                data: { _wpcf7 : _wpcf7, _wpcf7_version : _wpcf7_version, _wpcf7_locale : _wpcf7_locale, _wpcf7_unit_tag : _wpcf7_unit_tag,
                    _wpnonce : _wpnonce,  m_fname : _m_fname, m_lname : _m_lname, m_email : _m_email, m_phone : _m_phone,
                    m_zinute : _m_zinute }
            }).done(function( htmlContent ) {

                if (htmlContent.indexOf("wpcf7-mail-sent-ok") > 0) {
                    $('.form-response').children('.fsuccess').show();
                } else {
                    $('.form-response').children('.ferror').show();
                }


                thisForm.find("input[type='text']").val('');
                thisForm.find("input[type='email']").val('');
                thisForm.find("textarea").val('');

                setTimeout('closeDrawer()', 2000);

            });

            return false;

        });

        function closeDrawer() {
            $('.js-drawer-close').trigger('click');
        }

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

    module.initModal = function (){
        $(document).on('click', '[data-modal]', function (e) {
            var largeImg = $(this).attr('data-image');
            if(largeImg.length > 0){
                e.preventDefault();
                $(this).openModal({
                    closeOnBlur: false,
                    content:'<img src="' + largeImg + '" alt="">',
                    onLoad: function () {
                        //Do stuff on load
                    },onClose: function () {
                        //Do stuff on unload
                    }
                });
            }
        });
    };

    module.init = function () {
        module.initSlider();
        module.initModal();
        module.gmaps();
        module.mixedFunctions();
        module.validateForms();
    };

    return module;
});