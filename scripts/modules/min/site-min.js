define(["jquery","bxslider","validation","modal"],function($){var e={};return e.initSlider=function(){var e=document.getElementById("promo-slide");if(e){var t;t=$("#promo-slide").bxSlider($(window).width()>768?{mode:"vertical",auto:!0,speed:1500,pause:4e3,preloadImages:"visible",preventDefaultSwipeX:!0}:{mode:"horizontal",auto:!0,speed:1500,pause:4e3,preloadImages:"visible",preventDefaultSwipeY:!0}),$(".slide-content .btn").hover(function(){t.stopAuto()},function(){t.startAuto()})}},e.gmaps=function(){var e=document.getElementById("contact-map");if(e){var t=new google.maps.LatLng(54.897688,23.888458),o=WEBFOLDER+"/wp-content/themes/asta-uskaite/content/images/icn-pin-flower.png",a={zoom:18,center:t,disableDefaultUI:!0,scrollwheel:!1,mapTypeId:"custom_style"},n=new google.maps.Map(e,a),l=new google.maps.Marker({position:new google.maps.LatLng(54.897888,23.888678),map:n,title:"Asta Uskaite",icon:o}),i=[{elementType:"geometry.fill",stylers:[{weight:7},{visibility:"on"},{lightness:30},{hue:"#ffc300"},{saturation:-34}]},{featureType:"water",stylers:[{color:"#AFC6CF"}]},{featureType:"road.highway",elementType:"geometry.fill",stylers:[{color:"#ffffff"}]},{featureType:"road.highway",elementType:"geometry.stroke",stylers:[{color:"#E3E1D9"}]},{featureType:"road.local",elementType:"geometry.fill",stylers:[{color:"#ffffff"},{weight:8}]},{featureType:"road.local",elementType:"geometry.stroke",stylers:[{color:"#E3E1D9"},{weight:1}]},{featureType:"road.local",elementType:"labels.icon",stylers:[{visibility:"off"}]},{featureType:"road.arterial",elementType:"geometry.fill",stylers:[{color:"#ffffff"},{weight:8}]},{featureType:"road.arterial",elementType:"geometry.stroke",stylers:[{color:"#E3E1D9"},{weight:1}]}],s=new google.maps.InfoWindow({content:'<div class="infowindow" style="width:220px; height: 80px;"><a class="icon-info-close js-info-close"></a> <strong style="font-size: 16px">Asta Uskaite</strong> <br>Valanciaus g. 12-8, Kaunas, Kaunas <br>Tel.: +370 612 32789</div>'}),r={name:"Custom Style"},c=new google.maps.StyledMapType(i,r);n.mapTypes.set("custom_style",c),$(".js-contact").on("click",function(e){e.preventDefault(),$("body").toggleClass("show-map"),s.open(n,l),$(".js-info-close").on("click",function(){s.close(),$("body").toggleClass("show-map")})})}},e.mixedFunctions=function(){var e=1;$(".js-load-more").on("click",function(){if(thisButton=$(this),thisButton.hasClass("no-more-items"))return!1;thisButton.toggleClass("loading");var t=$(".accessory-page-data").data("category");$.ajax({type:"GET",url:WEBFOLDER+"?p=128",dataType:"html",data:{fetchContent:!0,catId:t,catPage:e}}).done(function(t){e++,"no result"==t?thisButton.hide():$(".gallery").append(t),thisButton.toggleClass("loading")})}),$("form.wpcf7-form").submit(function(){if(thisForm=$(this),$(".form-response").children().each(function(){$(this).hide()}),!$(this).valid())return!1;var e=$(this).attr("action"),t=$("input[name='_wpcf7']").val(),o=$("input[name='_wpcf7_version']").val(),a=$("input[name='_wpcf7_locale']").val(),n=$("input[name='_wpcf7_unit_tag']").val(),l=$("input[name='_wpnonce']").val(),i=$("input[name='m_fname']").val(),s=$("input[name='m_lname']").val(),r=$("input[name='m_email']").val(),c=$("input[name='m_phone']").val(),p=$("textarea[name='m_zinute']").val(),f="";return $("#real-product-url").length>0&&(f=$("#real-product-url").html()),$.ajax({type:"post",url:e,dataType:"html",data:{_wpcf7:t,_wpcf7_version:o,_wpcf7_locale:a,_wpcf7_unit_tag:n,_wpnonce:l,m_fname:i,m_lname:s,m_email:r,m_phone:c,m_zinute:p,m_product_url:f}}).done(function(e){e.indexOf("wpcf7-mail-sent-ok")>0?($(".js-product-form").fadeOut(),$(".fsuccess").fadeIn(),$(".js-reload").on("click",function(e){e.preventDefault(),location.reload()})):$(".ferror").fadeIn(),thisForm.find("input[type='text']").val(""),thisForm.find("input[type='email']").val(""),thisForm.find("textarea").val("")}),!1});var t=$(".js-drawer");t.length>0&&($("html").on("click touch",function(){t.hasClass("opened")&&t.removeClass("opened")}),$(".js-show-form").on("click touch",function(e){e.preventDefault(),e.stopPropagation(),t.toggleClass("opened"),$(".ferror").hide(),$(".fsuccess").hide(),$(".js-contact-form").show()}),$(".js-drawer-close").on("click touch",function(e){e.preventDefault(),t.removeClass("opened")}),t.on("click touch",function(e){e.stopPropagation()})),$(".js-nav-toggler").on("click touch",function(e){e.preventDefault(),$(".page-header").toggleClass("opened")})},e.validateForms=function(){$("form").each(function(){$(this).validate()})},e.initModal=function(){$(document).on("click","[data-modal]",function(e){var t=$(this).attr("data-image");t.length>0&&(e.preventDefault(),$(this).openModal({closeOnBlur:!1,templateId:"image-template"}))})},e.init=function(){e.initSlider(),e.initModal(),e.gmaps(),e.mixedFunctions(),e.validateForms()},e});