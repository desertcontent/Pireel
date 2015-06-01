  $(document).bind("mobileinit", function() {
  
    // Mobile Device Initialization Event
    // Override global options here
   
     // Online? boolean
    //alert(navigator.onLine);

 /*   var deviceAgent = navigator.userAgent.toLowerCase();
    var agentID = deviceAgent.match(/(iphone|ipod|ipad|android)/);
    if (agentID) {
       //alert(agentID+' '+navigator.onLine);
    }
    
    
    /* use userAgent to detect devices */
   /* var isMobile = {
    Android: function() {
        return navigator.userAgent.match(/Android/i);
    },
    BlackBerry: function() {
        return navigator.userAgent.match(/BlackBerry/i);
    },
    iOS: function() {
        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    },
    Opera: function() {
        return navigator.userAgent.match(/Opera Mini/i);
    },
    Windows: function() {
        return navigator.userAgent.match(/IEMobile/i);
    },
    any: function() {
        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
    }
};

if( isMobile.any() ) alert('Mobile');
if( isMobile.iOS() ) alert('iOS');
*/
    
      //if ($(window).width() < 580){$.mobile.changePage("#main-mobile");}    

}); 


  
  $( document ).bind("pagebeforeload", function() {
  //$.mobile.changePage("#main-mobile");
  //if (screen.width > 200){$.mobile.changePage("#main");}
  
  });
 
   $( document ).bind("pagebeforecreate", function() {
     //$.mobile.changePage("#main-mobile");
  //if (screen.width > 200){$.mobile.changePage("#main");}
 	
  });
    
   
 
  $( document ).delegate("#main", "pageinit", function() {
         // alert(document.documentElement.clientWidth+':'+screen.width);
  			// Modernizr
                //if (Modernizr.geolocation) {var ua = navigator.userAgent; $('#diagnostics').text(ua);alert(screen.width+'x'+screen.height+' '+$(window).width()+'x'+$(window).height())}
               // var ua = navigator.userAgent; $('#diagnostics').text(ua);alert(ua+' '+screen.width+'x'+screen.height+' '+$(window).width()+'x'+$(window).height());
         
              
              $('#fullsite').live('click',function(event) {
               $.cookie('the_cookie', 'desktop',{ domain: 'briscocountywoodgrill.com' });
				  });	

                                         	                
                // Load Social Share Buttons
             $('#socialbutton').jsShare({ 
            initialdisplay: 'expanded', 
            animate: true,
             facebook: true,
                twitter: true,
                digg: true,
                reddit: false,
                stumbleupon: false,
                messenger: false,
                delicious: false,
                linkedin: true,
                googlebuzz: false,
                yoursitetitle: 'Brisco County Wood Grill',
                yoursiteurl: 'http://briscocountywoodgrill.com',
                yoursitename: 'Brisco County Wood Grill',
                desc: '',
            maxwidth: 150 
            });

                 $('#destination_address_display').load('config.html #destination_address');
                   
                 // Load Logo to both positions 
                
                // Default Logo Class (small mobile size)
                // $('.logo-main').load('config.html #logo-mobile'); 
                 
                 //$('#logo-page').load('config.html #logo-mobile'); 
                 //$('#logo-header').load('config.html #logo-mobile'); 
                  $('#logo-wrapper').load('config.html #logo-mobile'); 
                 $('#logo-leftnav').load('config.html #logo-mobile'); 
                
            
                // $('#header-block-right').load('config.html #header-promo-links'); 
                // $('#header-content-c').load('config.html #logo-mobile');               
                // $('#header-content-r').load('config.html #logo');
                                    
                 	
 
                 $('#pane').trigger('expand');
                 
                 
                 // Fill left panel with content
                 /*  $('#mypanel').load('#menu-page #menu-list',function(){
								  $('#mypanel').trigger('create');
  
			 				 }); 	
                 */
                  
                 
                 
                						
						
				$('#header-button-right').click(function() {
							//$('#left-nav-container').load('#menu-page #menu-list',function(){
							$('#left-nav-container').load('#menu-page #menu-section-1',function(){

								   $('#left-nav-container').trigger('create');
								  //galleryload();
								  // $('#left-nav-container').slider('refresh');
								    
								 });							 
								 return false;
						});
		
						
						
						
						
						
				$('#but2').click(function() {
							$('header-content-l').load('config.html #logo');
							$('#pane').trigger('expand');

							//return false;
						});
            
             
				 $('#but3').toggle(function (){
					$(this).buttonMarkup({icon:'star'});
					$('#mypanel').panel( "toggle" );
					 
					}, function(){
					$(this).buttonMarkup({icon:'arrow-l'});
					$('#mypanel').panel( "toggle" ); 
						});
						
						
						
					
                
								
								
				 $('#foodmenu, #menureturn').live('click',function(event) {
				 				            event.preventDefault();
							//$('#splash_content').load('#menu-page-mobile #menu-section-a',function(){
							//$('#splash_content').load('config.html #menu-main',function(){
							$('#splash_content').load('menu.html #menu-section-m',function(){
							$('#menu-section-m').css('max-height','435px');
								  $('#splash_content').trigger('create');


								 });							 
								 return false;
						});		
						
						
				  
				      $('#beverages-link').live('click',function(event) { 
							event.preventDefault();
							$('#splash_content').load('menu.html #beverage-list-m',function(){
							$('#splash_content').trigger('create');
								 });							 
								 return false;
						});	
					 $('#burgers-link').live('click',function(event) { 
							event.preventDefault();
							$('#splash_content').load('menu.html #burgers-list-m',function(){
							$('#splash_content').trigger('create');
								 });							 
								 return false;
						});	
					
					$('#appetizers-link').live('click',function(event) {
							event.preventDefault(); 
							$('#splash_content').load('menu.html #appetizers-list-m',function(){
								  $('#splash_content').trigger('create');
								 });							 
								 return false;
						});	
						
						$('#salads-link').live('click',function(event) {
							event.preventDefault(); 
							$('#splash_content').load('menu.html #salads-list-m',function(){
								  $('#splash_content').trigger('create');
								 });							 
								 return false;
						});
						
						$('#sandwiches-link').live('click',function(event) {
							event.preventDefault(); 
							$('#splash_content').load('menu.html #sandwiches-list-m',function(){
								  $('#splash_content').trigger('create');
								 });							 
								 return false;
						});	
	
						$('#sides-link').live('click',function(event) {
							event.preventDefault(); 
							$('#splash_content').load('menu.html #sides-list-m',function(){
								  $('#splash_content').trigger('create');
								 });							 
								 return false;
						});	
						
						$('#wraps-link').live('click',function(event) {
							event.preventDefault(); 
							$('#splash_content').load('menu.html #wraps-list-m',function(){
								  $('#splash_content').trigger('create');
								 });							 
								 return false;
						});	
						
						$('#dinners-link').live('click',function(event) {
							event.preventDefault(); 
							$('#splash_content').load('menu.html #dinners-list-m',function(){
								  $('#splash_content').trigger('create');
								 });							 
								 return false;
						});
						
						$('#seafood-link').live('click',function(event) {
							event.preventDefault(); 
							$('#splash_content').load('menu.html #seafood-list-m',function(){
								  $('#splash_content').trigger('create');
								 });							 
								 return false;
						});
						
						$('#steaks-link').live('click',function(event) {
							event.preventDefault(); 
							$('#splash_content').load('menu.html #steaks-list-m',function(){
								  $('#splash_content').trigger('create');
								 });							 
								 return false;
						});
						
						$('#ribschicken-link').live('click',function(event) {
							event.preventDefault(); 
							$('#splash_content').load('menu.html #ribschicken-list-m',function(){
								  $('#splash_content').trigger('create');
								 });							 
								 return false;
						});
						
						$('#pasta-link').live('click',function(event) {
							event.preventDefault(); 
							$('#splash_content').load('menu.html #pasta-list-m',function(){
								  $('#splash_content').trigger('create');
								 });							 
								 return false;
						});
						
						$('#mexican-link').live('click',function(event) {
							event.preventDefault(); 
							$('#splash_content').load('menu.html #mexican-list-m',function(){
								  $('#splash_content').trigger('create');
								 });							 
								 return false;
						});

						
						$('#submenu-row').live('click',function(event) {
							event.preventDefault(); 
							//$('#splash_content').load('menu.html #mexican-list-m',function(){
							//	  $('#splash_content').trigger('create');
							//	 });							 
								 return false;
						});
	


						
						
						
								
				 
				$('#photos').click(function() {
							$('#splash_content').load('gallery.html #slider',function(){
								  $('#splash_content').trigger('create');
								   galleryload();
								  // $('#splash_content').slider('refresh');
								    
								 });							 
								 return false;
						});
						
				$('#mapdir, #mapdirt, #mapbutton').click(function() {

							  
							  $('#splash_content').load('googlemap.html #testmap',function(){
								  $('#splash_content').trigger('create');
								   mapload();
								  // $('#map_canvas_1').gmap('refresh');
								   
								    
								  });
							 return false;
						});
			
			$('#facebooklink').click(function() {
							 $('#splash_content').load('config.html #facebook-display',function(){
								// $('#splash_content').trigger('create');
  

								 });							 
								 return false;
						});

						$('#video').click(function() {
					 
							  //$('#splash_content').load('config.html #splash-init-content5',function(){

							 $('#splash_content').load('config.html #video',function(){
								//  $('#splash_content').trigger('create');
  

								 });							 
								 return false;
						});



			$('#welcome').click(function() {
			
							//$('#splash_content').html('');
							 $('#splash_content').load('config.html #testcamera',function(){
							  //$('#splash_content').trigger('create'); 							 
							  //$('#testcamera').camera({thumbnails: true, fx: 'simpleFade', loader: 'bar', time: 5000, pagination: true});
							  $('#testcamera').camera({loader:'none', pagination: true, thumbnails: false, navigation: false,time:3000, transPeriod:500,fx:'simpleFade',height: '70%',portrait:false});
							  getSoup();
							  getSpecials();
								   
								 });							
								 return false;
						});

				// List Ads  
				$('#list-ad1').load('config.html #splash-init-content',function(){
				//$('#list-ad1').trigger('create'); 	 
				 });
				
				$('#list-ad2').load('config.html #splash-init-content6',function(){
				//$('#list-ad2').trigger('create'); 	 
				 });
				
				 $('#list-ad3').load('config.html #splash-init-content3',function(){
				//$('#list-ad3').trigger('create'); 	 
				 });
				 
				 $('#list-ad4').load('config.html #splash-init-content2',function(){
				//$('#list-ad3').trigger('create'); 	 
				 });
				
				 $('#list-ada').load('config.html #splash-init-content5',function(){
				//$('#list-ad3').trigger('create'); 	 
				  });
			   $('#list-adb').load('config.html #splash-init-content7',function(){
				//$('#list-ad3').trigger('create'); 	 
				 });
				/* $('#list-adc').load('config.html #splash-init-content3',function(){
				//$('#list-ad3').trigger('create'); 	 
				 });
				 $('#list-add').load('config.html #splash-init-content4',function(){
				//$('#list-ad3').trigger('create'); 	 
				 });  */

			    $('#list-ade').load('config.html #splash-init-content4',function(){
				//$('#list-ad3').trigger('create'); 	 
				  });
				  $('#list-adf').load('config.html #splash-init-content2',function(){
				//$('#list-ad3').trigger('create'); 	 
				 });
				/* $('#list-adg').load('config.html #splash-init-content3',function(){
				//$('#list-ad3').trigger('create'); 	 
				 });
				 $('#list-adh').load('config.html #splash-init-content4',function(){
				//$('#list-ad3').trigger('create'); 	 
				 });  */
								
				
				//$('#splash_content').load('config.html #logo-tablet');
				
				$('#splash_content').load('config.html #splash-init-content',function(){	
				 getSoup();
				 getSpecials();
				 });
				 
				 	
/* 				$('#splash_content').load('config.html #testcamera',function(){
							  $('#splash_content').trigger('create'); 							 
							  //$('#testcamera').camera({thumbnails: true, fx: 'simpleFade', loader: 'bar', time: 5000, pagination: true});
							  $('#testcamera').camera({loader:'none', pagination: false, thumbnails: false, navigation: false,time:3000, transPeriod:750,fx:'simpleFade',height: '60%',portrait:false});
							  getSoup();
								   
								 });	
*/						  

			      // $('#testcamera').camera({height: '50%', thumbnails : false}); //the basic method
			
						
						// Check business hours to see if open  -- Needs to be changed to a class
						var d = new Date();
						var dateski = (d.getDay()+' '+d.getHours()+' '+d.getFullYear()+' '+d.getHours()+' '+d.getMinutes()+' '+d.getSeconds());

						$('.store_open_message').html('We\'re Closed').css('color','#cccccc;');
						 if (d.getDay() <= 4 && d.getHours() <= 21 && d.getHours() >=11) $('.store_open_message').html('We\'re Open!').css('color','#00ff00');
						 if (d.getDay() >  4 && d.getHours() <= 22 && d.getHours() >=11) $('.store_open_message').html('We\'re Open!').css('color','#00ff00');;

						//alert(dateski); 
						
						
						
						
						function tooltips() {
    var targets = $( '[rel~=tooltip]' ),
        target  = false,
        tooltip = false,
        title   = false;
 
    targets.bind( 'mouseenter', function()
    {
        target  = $( this );
        tip     = target.attr( 'title' );
        tooltip = $( '<div id="tooltip"></div>' );
 
        if( !tip || tip == '' )
            return false;
 
        target.removeAttr( 'title' );
        tooltip.css( 'opacity', 0 )
               .html( tip )
               .appendTo( 'body' );
 
        var init_tooltip = function()
        {
            if( $( window ).width() < tooltip.outerWidth() * 1.5 )
                tooltip.css( 'max-width', $( window ).width() / 2 );
            else
                tooltip.css( 'max-width', 340 );
 
            var pos_left = target.offset().left + ( target.outerWidth() / 2 ) - ( tooltip.outerWidth() / 2 ),
                pos_top  = target.offset().top - tooltip.outerHeight() - 20;
 
            if( pos_left < 0 )
            {
                pos_left = target.offset().left + target.outerWidth() / 2 - 20;
                tooltip.addClass( 'left' );
            }
            else
                tooltip.removeClass( 'left' );
 
            if( pos_left + tooltip.outerWidth() > $( window ).width() )
            {
                pos_left = target.offset().left - tooltip.outerWidth() + target.outerWidth() / 2 + 20;
                tooltip.addClass( 'right' );
            }
            else
                tooltip.removeClass( 'right' );
 
            if( pos_top < 0 )
            {
                var pos_top  = target.offset().top + target.outerHeight();
                tooltip.addClass( 'top' );
            }
            else
                tooltip.removeClass( 'top' );
 
            tooltip.css( { left: pos_left, top: pos_top } )
                   .animate( { top: '+=10', opacity: 1 }, 50 );
        };
 
        init_tooltip();
        $( window ).resize( init_tooltip );
 
        var remove_tooltip = function()
        {
            tooltip.animate( { top: '-=10', opacity: 0 }, 50, function()
            {
                $( this ).remove();
            });
 
            target.attr( 'title', tip );
        };
 
        target.bind( 'mouseleave', remove_tooltip );
        tooltip.bind( 'click', remove_tooltip );
     });
} 
						
						tooltips();
						 						
						
						function getSoup() { 
						// Assign the Soup of The Day  (Daily Specials of any Kind)
						if(d.getDay() == 0 ){$('.daily-soup-text').load('config.html #soup0');}
						if(d.getDay() == 1 )$('.daily-soup-text').load('config.html #soup1'); 
						if(d.getDay() == 2 )$('.daily-soup-text').load('config.html #soup2'); 
						if(d.getDay() == 3 )$('.daily-soup-text').load('config.html #soup3'); 
						if(d.getDay() == 4 )$('.daily-soup-text').load('config.html #soup4');
						if(d.getDay() == 5 )$('.daily-soup-text').load('config.html #soup5'); 
						if(d.getDay() == 6 )$('.daily-soup-text').load('config.html #soup6');  
						 $('.daily-soup-text').trigger('create');
						 $('.daily-soup-text2').load('config.html #soupdefault');
						}
						getSoup();
						
						
						function getSpecials (){
						
						 function onSuccess(data, status)
					        {
					         
					         $(".daily-special-text").text(data.special_1);
					        
					         $(".daily-special-text2").text(data.special_1s);
					         $(".daily-special-text3").text(data.special_2);
					         $(".daily-special-text4").text(data.special_2s);
					         $(".daily-special-text5").text(data.special_3);
					         $(".daily-special-text6").text(data.special_3s);
					         
					         $(".list-special-1").text(data.special_1);
					         $(".list-special-2").text(data.special_2);
					   
					        }
					  
					        function onError(data, status)
					        {
					            // handle an error
					        }  
						
						
						 var formData = $("#callAjaxForm").serialize();
  
				                $.ajax({
				                    type: "POST",
				                    url: "getspecials.php",
				                    cache: false,
				                    data: formData,
				                    dataType:"json",
				                    success: onSuccess,
				                    error: onError
				                });
										
						
						/*	$('.daily-special-text').load('specials.html #special1');
							$('.daily-special-text2').load('specials.html #special1-subheading');
							$('.daily-special-text3').load('specials.html #special2');
							$('.daily-special-text4').load('specials.html #special2-subheading');
							$('.daily-special-text5').load('specials.html #special3');
							$('.daily-special-text6').load('specials.html #special3-subheading'); */
						}
						
						 getSpecials();
						
						
						
						 
								function mapload() { 
								 //  $('#test').load('config.html #destination_address');
					    $('#biz').load('config.html #destination_address');
					    var map;
						var marker;
						var infowindow;
						var latlngx;
						var latlngy;
		                var mobileaddress;
		
		                navigator.geolocation.getCurrentPosition (function (pos) { 
                 		 
                 		 // Get Device GPS Location
						var xlat = pos.coords.latitude;
						var xlng = pos.coords.longitude;
						 $("#xlat").text (xlat);
						 $("#xlng").text (xlng);
						 latlngy = new google.maps.LatLng(xlat, xlng);
						 latlngx = latlngy;
					
						
							 var mapOptions = { 'center': latlngx , 'zoom': 6 };
							mapnew = $('#map_canvas_1').gmap(mapOptions);	 
							
							
							// Start Geocoder
							var geocoder;
							geocoder = new google.maps.Geocoder();
							
							// Source Location Marker (Mobile Location)  
							  geocoder.geocode({'latLng': latlngx}, function(results, status) {
								document.getElementById("test").innerHTML = '' + (results[0].formatted_address);  
							    mobileaddress= results[0].formatted_address;
							    $('#map_canvas_1').gmap('addMarker', { 'position':  latlngx, 'bounds': true }).click(function() {
							$('#map_canvas_1').gmap('openInfoWindow', { 'content': mobileaddress+'<br />'+mapOptions.center }, this);
							});
							});
							
							var bizlatlng;
							// Destination Location Marker (Business Location)	   
							  var addy =  document.getElementById("destination_address").innerHTML;
							 				   		
							  geocoder.geocode({'address': addy}, function(results, status) {
							    document.getElementById("biz").innerHTML = '' + addy + '<br />' + (results[0].geometry.location);
								document.getElementById("blat").innerHTML = '' + (results[0].geometry.location.hb);
								document.getElementById("blng").innerHTML = '' + (results[0].geometry.location.ib);    
							   bizlatlng = results[0].geometry.location;
							    $('#map_canvas_1').gmap('addMarker', { 'position':   bizlatlng, 'bounds': true }).click(function() {
								$('#map_canvas_1').gmap('openInfoWindow', { 'content': '<div class="infowindow">'+bizlatlng+'<br />'+addy+'<br /></div>' }, this);
							  }); 
							  });	      				
								      				
						
						
						
						//  DIRECTIONS BUTTONS
						
						     
						// Show Directions from LOCATION INPUT TEXT
						$('#submit').click(function() {
						
						// Place Marker for Text Input
						     
						 		var formaddy =  $('#from').val(); 						   		
							    geocoder.geocode({'address': formaddy}, function(results, status) { 
							   formlatlng = results[0].geometry.location;
							   
							    $('#map_canvas_1').gmap('addMarker', { 'position':   formlatlng, 'bounds': true }).click(function() {
								$('#map_canvas_1').gmap('openInfoWindow', { 'content': formlatlng+'<br />'+formaddy+'<br />' }, this);
							  }); 
							  });	
						
						// Show Directions
						
							$('#map_canvas_1').gmap('displayDirections',{ 'origin': $('#from').val(), 'destination': $('#to').val(), 'travelMode': google.maps.DirectionsTravelMode.DRIVING },  { 'panel': document.getElementById('directions'), 'suppressMarkers': true}, function(response, status) {
								( status === 'OK' ) ? $('#results').show() : $('#results').hide();
								$('#destination_address_display').load('config.html #destination_address');
							});
							return false;
						});
						
						
						
						// Show Directions for CURRENT DEVICE LOCATIION
						$('#gps').click(function() {
							$('#map_canvas_1').gmap('displayDirections',{ 'origin': latlngx, 'destination': $('#to').val(), 'travelMode': google.maps.DirectionsTravelMode.DRIVING },  { 'panel': document.getElementById('directions'), 'suppressMarkers': true}, function(response, status) {
								( status === 'OK' ) ? $('#results').show(): $('#results').hide();
								 $('#destination_address_display').load('config.html #destination_address');
							});
							return false;
						});
						     
						            
                  	    $('#map_canvas_1').gmap('refresh');           
                      				
			 	});
		               //end get mobile location 
		
						} // end function mapload
						
						
						function galleryload() {
						
						 window.slider = new Swipe(document.getElementById('slider'), {
							 startSlide: 0,
							 speed: 400,
							 auto: 3000, 
							 callback: function(event, index, elem) {
								 //alert(elem.child("div").innerHTML);
								 }
							});

						
						}
						// end function galleryload

});



 $( document ).delegate("#main-mobile", "pageinit", function() {
  
  $('#mobile-logo').load('config.html #logo-mobile');
  //$('#mobile-splash').load('config.html #logo');
  
  $('#mobile-photos').click(function() {
							$('#mobile-splash').load('gallery.html #slider',function(){
								  $('#mobile-splash').trigger('create');
								  galleryload();
								  $('#mobile-splash').slider('refresh'); 
								 });							 
								 return false;
						});
  
  $('#mobile-map').click(function() {

							  
							  $('#mobile-splash').load('googlemap.html #testmap',function(){
								  $('#mobile-splash').trigger('create');
								   mapload();
								  // $('#map_canvas_1').gmap('refresh');
								   
								    
								  });
							 return false;
						});
						
   						

      var d = new Date();
      var dataski = (d.getDate()+' '+d.getMonth()+' '+d.getFullYear()+' '+d.getHours()+' '+d.getMinutes()+' '+d.getSeconds());

$('.store_open_message').html('We\'re Closed');
if (d.getDay() <= 4 && d.getHours() <= 23 && d.getHours() >=11) { $('.store_open_message').html('We\'re Open');}
if (d.getDay() > 4 && d.getHours() <= 22 && d.getHours() >=11) { $('.store_open_message').html('We\'re Open');}

//alert(dataski); 


function mapload() { 
				//  $('#test').load('config.html #destination_address');
			    $('#biz').load('config.html #destination_address');
			    var map;
				var marker;
				var infowindow;
				var latlngx;
				var latlngy;
                var mobileaddress;

                navigator.geolocation.getCurrentPosition (function (pos) { 
                 		 
                 		 // Get Device GPS Location
						 var xlat = pos.coords.latitude;
						 var xlng = pos.coords.longitude;
						 $("#xlat").text (xlat);
						 $("#xlng").text (xlng);
						 latlngy = new google.maps.LatLng(xlat, xlng);
						 latlngx = latlngy;
					
						
						var mapOptions = { 'center': latlngx , 'zoom': 6 };
						mapnew = $('#map_canvas_1').gmap(mapOptions);	 
							
							
						// Start Geocoder
						var geocoder;
						geocoder = new google.maps.Geocoder();
						
						// Source Location Marker (Mobile Location)  
						  geocoder.geocode({'latLng': latlngx}, function(results, status) {
							document.getElementById("test").innerHTML = '' + (results[0].formatted_address);  
						    mobileaddress= results[0].formatted_address;
						    $('#map_canvas_1').gmap('addMarker', { 'position':  latlngx, 'bounds': true }).click(function() {
						$('#map_canvas_1').gmap('openInfoWindow', { 'content': mobileaddress+'<br />'+mapOptions.center }, this);
						});
						});
						
						var bizlatlng;
						// Destination Location Marker (Business Location)	   
						  var addy =  document.getElementById("destination_address").innerHTML;
						 				   		
						  geocoder.geocode({'address': addy}, function(results, status) {
						    document.getElementById("biz").innerHTML = '' + addy + '<br />' + (results[0].geometry.location);
							document.getElementById("blat").innerHTML = '' + (results[0].geometry.location.hb);
							document.getElementById("blng").innerHTML = '' + (results[0].geometry.location.ib);    
						   bizlatlng = results[0].geometry.location;
						    $('#map_canvas_1').gmap('addMarker', { 'position':   bizlatlng, 'bounds': true }).click(function() {
							$('#map_canvas_1').gmap('openInfoWindow', { 'content': '<div class="infowindow">'+bizlatlng+'<br />'+addy+'<br /></div>' }, this);
						  }); 
						  });	      				
							      				
					
						
						
						//  DIRECTIONS BUTTONS
						
						     
						// Show Directions from LOCATION INPUT TEXT
						$('#submit').click(function() {
						
						// Place Marker for Text Input
						     
						 		var formaddy =  $('#from').val(); 						   		
							    geocoder.geocode({'address': formaddy}, function(results, status) { 
							   formlatlng = results[0].geometry.location;
							   
							    $('#map_canvas_1').gmap('addMarker', { 'position':   formlatlng, 'bounds': true }).click(function() {
								$('#map_canvas_1').gmap('openInfoWindow', { 'content': formlatlng+'<br />'+formaddy+'<br />' }, this);
							  }); 
							  });	
						
						// Show Directions
						
							$('#map_canvas_1').gmap('displayDirections',{ 'origin': $('#from').val(), 'destination': $('#to').val(), 'travelMode': google.maps.DirectionsTravelMode.DRIVING },  { 'panel': document.getElementById('directions'), 'suppressMarkers': true}, function(response, status) {
								( status === 'OK' ) ? $('#results').show() : $('#results').hide();
								$('#destination_address_display').load('config.html #destination_address');
							});
							return false;
						});
						
						
						
						// Show Directions for CURRENT DEVICE LOCATIION
						$('#gps').click(function() {
							$('#map_canvas_1').gmap('displayDirections',{ 'origin': latlngx, 'destination': $('#to').val(), 'travelMode': google.maps.DirectionsTravelMode.DRIVING },  { 'panel': document.getElementById('directions'), 'suppressMarkers': true}, function(response, status) {
								( status === 'OK' ) ? $('#results').show(): $('#results').hide();
								 $('#destination_address_display').load('config.html #destination_address');
							});
							return false;
						});
						     
						            
                  	    $('#map_canvas_1').gmap('refresh');           
                      				
			 	});
                //end get mobile location 
			 	
			 	} // end function mapload

				function galleryload() {
						
						 window.slider = new Swipe(document.getElementById('slider'), {
							 startSlide: 0,
							 speed: 400,
							 auto: 3000, 
							 callback: function(event, index, elem) {
								 //alert(elem.child("div").innerHTML);
								 }
							});

						
						}
				// end function galleryload

 });// end main-mobile


// $( document ).delegate("#gallerypage", "pageinit", function() {
 // var maxwidth=$(window).width();
 //var maxheight=($(window).height())-50;
 
 //alert(maxwidth+' '+maxheight+'<br >'+screen.width+' '+screen.height);
 // $('#gallery_content').css({'padding': '0px'});
  // $('div#gallerypage.ui-page div#gallery_content.ui-content div#slider.swipe div.swipe-wrap div div img').css({'height': maxheight});
 
 //});



