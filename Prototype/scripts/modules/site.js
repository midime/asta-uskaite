/*jslint regexp: true, nomen: true, sloppy: true */
/*global require, define, alert, applicationConfig, location, document, window,  setTimeout, Countable */

define(['jquery', 'bxslider', 'validation'], function ($) {

    var module = {},
        promoSlider;

    module.setHeader = function(){
        var viewportHeight = $(window).height(),
            header = $('header.js-header'),
            scrollPosition = $(document).scrollTop();

        if(scrollPosition > viewportHeight){
            header.css({position:'fixed', top:'0'});
        }else{
            header.css({position:'absolute', top:'auto'});
            $('.slide').css({backgroundPosition:'0 ' + scrollPosition / 2 + 'px'});
        }

        module.toggleHeader(scrollPosition);
    };

    module.initActiveSection = function(){
        var hashId = (window.location.hash + "?").split("?",1).toString();
        module.scrollTo(hashId);
    };

    module.scrollTo = function(sectionId){
        var sectionPosition,
            scrollSpeed,
            body = $('body'),
            scrollPosition = $(document).scrollTop();

        if($(sectionId).length == 0){
            sectionId = 'body';
        }

        sectionPosition = $(sectionId).offset().top;
        scrollSpeed = Math.abs(scrollPosition - sectionPosition);

        if(!body.hasClass('animating')){
            body.addClass('animating');

            //Scroll to section
            $('html,body').animate({scrollTop:sectionPosition}, scrollSpeed, 'easeInOutCubic', function(){
                //updateUrl(sectionId);
                body.removeClass('animating');
                module.setActiveSection();
            });

            //Update url
            /*function updateUrl(hashId){
                if(hashId == 'body'){
                    hashId = '';
                }
                location.hash = hashId;
            }*/
        }
    };

    module.onScroll = function () {
        var scrollPosition = $(document).scrollTop();

        var isTouchDevice = 'ontouchstart' in document.documentElement;

        window.addEventListener('scroll', function() {
            action();
        }, false);
        window.addEventListener('touchmove', function() {
            action();
        }, false);

        function action(){
            scrollPosition = $(document).scrollTop();

            module.setHeader();
            module.toggleHeader(scrollPosition);

            if(!$('body').hasClass('animating')){
                module.setActiveSection();

                //Stop slider on scroll down
                //TODO Uncomment back
                /*if(scrollPosition > 150){
                    promoSlider.stopAuto();
                }else{
                    promoSlider.startAuto();
                }*/

            }
        }
    };

    module.initSlider = function(){
        promoSlider = $('#promo-slide').bxSlider({
            auto:true,
            speed:1500,
            pause:3000
        });
    };

    //Hide header if scroll to top
    module.toggleHeader = function(scrollPosition){
        if(scrollPosition < 3){
            $('header.js-header').fadeOut(150);
        }else{
            $('header.js-header').fadeIn(150);
        }
    };

    module.onScreenResize = function(){
        $(window).resize(function() {
            module.setHeader();
            module.setActiveSection();
        });
    };

    module.setActiveSection = function(){
        var scrollPosition = $(document).scrollTop(),
            scrollTarget = scrollPosition + ($(window).height()/2),
            sections = [];

        $('.page-section').each(function(){
            var section = {},
                el = $(this);
            section.id = el.attr('id');
            if(section.id == 'promo'){
                section.id = '';
            }
            section.top = el.offset().top;
            section.bottom = el.height() + el.offset().top;
            sections.push(section);
        });

        var activeSection = findActiveSection(scrollTarget);

        function findActiveSection(scrollTarget) {
            for (var i = 0, length = sections.length; i < length; i++) {
                if (sections[i].top < scrollTarget && sections[i].bottom > scrollTarget)
                    return sections[i];
            }
            return 0;
        }

        $('.page-nav a').removeClass('active');
        $('.page-nav a[href="#' + activeSection.id + '"]').addClass('active');

        //Update url and disable onhashchange scrolling
        //location.hash = activeSection.id;
        //$(document).scrollTop(scrollPosition);

        if(history.pushState) {
            window.history.pushState(null, null, '#' + activeSection.id);
        }
        else {
            window.location.hash = '#' + activeSection.id;
        }
    };

    module.gmaps = function() {
        var mapCanvas = document.getElementById('contact-map');
        if (mapCanvas) {

            var myLatlng = new google.maps.LatLng(54.895988, 23.886058),
                pinImage = '/content/images/icn-pin.png',
                mapOptions = {
                    zoom: 17,
                    center: myLatlng,
                    disableDefaultUI: true,
                    scrollwheel:false,
                    mapTypeId:'custom_style'
                },
                map = new google.maps.Map(mapCanvas, mapOptions);

            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(54.896488, 23.889558),
                map: map,
                title: 'Asta Uskaite',
                icon:pinImage
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
                },{
                    featureType: 'water',
                    stylers: [
                        { color: '#AFC6CF' }
                    ]
                },{
                    "featureType": "road.highway",
                    "elementType": "geometry.fill",
                    "stylers": [
                        { "color": "#ffffff" }
                    ]
                },{
                    "featureType": "road.highway",
                    "elementType": "geometry.stroke",
                    "stylers": [
                        { "color": "#E3E1D9" }
                    ]
                },{
                    "featureType": "road.local",
                    "elementType": "geometry.fill",
                    "stylers": [
                        { "color": "#ffffff" },
                        { "weight": 8 }
                    ]
                },{
                    "featureType": "road.local",
                    "elementType": "geometry.stroke",
                    "stylers": [
                        { "color": "#E3E1D9" },
                        { "weight": 1 }
                    ]
                },{
                    "featureType": "road.local",
                    "elementType": "labels.icon",
                    "stylers": [
                        { "visibility": "off" }
                    ]
                },{
                    "featureType": "road.arterial",
                    "elementType": "geometry.fill",
                    "stylers": [
                        { "color": "#ffffff" },
                        { "weight": 8 }
                    ]
                },{
                    "featureType": "road.arterial",
                    "elementType": "geometry.stroke",
                    "stylers": [
                        { "color": "#E3E1D9" },
                        { "weight": 1 }
                    ]
                }
            ];

            var styledMapOptions = {
                name: 'Custom Style'
            };

            var customMapType = new google.maps.StyledMapType(featureOpts, styledMapOptions);
            map.mapTypes.set('custom_style', customMapType);

        }
    };

    module.mixedFunctions = function(){

        //Main navigation
        $('.page-nav a, a.logo').click(function(e){
            var sectionId = $(this).attr('href');
            module.scrollTo(sectionId);
            e.preventDefault();
        });

        //Show/Hide contact us form
        $('.js-toggle').click(function(){
            $('.contact-box').toggleClass('minimise');
        });

        //Contact us form validation
        $('.js-contactform').validate({
            errorElement: "span"
        });

        //Toggle form labels
        $('.js-field').bind('keyup blur', function() {
            var el = $(this);

            if(el.val()!== ''){
                el.parent().addClass('full');
            }else{
                el.parent().removeClass('full');
            }
        });

        //Load more
        $('.js-load-more').on('click', function(){
           $(this).toggleClass('loading');
        });

        var elDrawer = $('.js-drawer');

        //Toggle drawer
        if(elDrawer.length > 0){
            $('html').on('click touch', function() {
                if(elDrawer.hasClass('opened')){
                    elDrawer.removeClass('opened');
                }
            });

            $('.js-show-form').on('click', function(e){
                e.preventDefault();
                e.stopPropagation();
                elDrawer.toggleClass('opened');
            });

            $('.js-drawer-close').on('click', function(e){
                e.preventDefault();
                elDrawer.removeClass('opened');
            });

            elDrawer.on('click', function(e){
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
        module.setHeader();
        module.initActiveSection();
        module.onScroll();
        module.onScreenResize();
        module.mixedFunctions();
        module.initSlider();
        module.gmaps();
        module.validateForms();
    };

    return module;
});