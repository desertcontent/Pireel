  
  $( document ).bind("pagebeforeload", function() {
  //$.mobile.changePage("#main-mobile");
  //if (screen.width > 200){$.mobile.changePage("#main");}
  
  });
 
   $( document ).bind("pagebeforecreate", function() {
	 //$.mobile.changePage("#main-mobile");
  //if (screen.width > 200){$.mobile.changePage("#main");}
 	
  });
	
   $( document ).delegate("#specialspage", "pageinit", function() {
   $('#specialscontent').load('beer-admin/specials.html',function(){	
				 $('#specialscontent').trigger('create'); 
				 $('#specialscontent #specials').css('background','transparent url(/images/wood_bg_beach.png) 0 0 repeat');
				 $('#specialscontent #specials').css('padding', '10px');
				 $('#specialscontent #specials').css('margin-left', '0px');
				 $('#specialscontent #specials').css('width', '100%');
				 $('#specialscontent #specials').css('float', 'none');
				 $('#specialscontent #specials .header').css('padding-top', '0px');
				 $('#specialscontent #specials .header').css('font-size', '20px');
				 $('#specialscontent #specials .title').css('padding-top', ' 5px');
				 $('#specialscontent #specials .title').css('margin-top', ' 15px');
				 $('#specialscontent #specials .heading').css('padding-top', '5px');
				 $('#specialscontent #specials .marqueetext').hide();

			 });

   });
 
  $( document ).delegate("#main", "pageinit", function() {
		 // alert(document.documentElement.clientWidth+':'+screen.width);
  			// Modernizr
				//if (Modernizr.geolocation) {var ua = navigator.userAgent; $('#diagnostics').text(ua);alert(screen.width+'x'+screen.height+' '+$(window).width()+'x'+$(window).height())}
				  // var ua = navigator.userAgent; $('#diagnostics').text(ua);alert(ua+' '+screen.width+'x'+screen.height+' '+$(window).width()+'x'+$(window).height());
		 
		  $('#biz').load('config.html #destination_address',function(){
				 $('#biz').trigger('create'); 	 
				  });
				   $('#biz2').load('config.html #destination_address2',function(){
				 $('#biz2').trigger('create'); 	 
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
				yoursitetitle: 'The Pour House Grill',
				yoursiteurl: 'http://thepourhousegrill.com',
				yoursitename: 'The Pour House Grill',
				desc: 'The Pour House Grill - Your Home for Beer, Burgers, Ribs & Wings.',
			maxwidth: 150 
			});

				 $('#destination_address_display').load('config.html #destination_address');
				 $('#destination_address_display2').load('config.html #destination_address2');

				   
				 // Load Logo to both positions 
				
				// Default Logo Class (small mobile size)
				// $('.logo-main').load('config.html #logo-mobile'); 
				 
				 //$('#logo-page').load('config.html #logo-mobile'); 
				 //$('#logo-header').load('config.html #logo-mobile'); 
				  $('#logo-wrapper').load('config.html #logo-tablet'); 
				 $('#logo-leftnav').load('config.html #splash-init-content-mobile'); 
				
			
				// $('#header-block-right').load('config.html #header-promo-links'); 
				// $('#header-content-c').load('config.html #logo-mobile');					 
				// $('#header-content-r').load('config.html #logo');
									
				 	
 
				 $('#pane').trigger('expand');
				 
				 
				 // Fill left panel with content
				 /*	 $('#mypanel').load('#menu-page #menu-list',function(){
								  $('#mypanel').trigger('create');
  
			 				 }); 	
				 */
				  
				 
				 
										
						
			
						
					
				

								
				 $('#staffbutton').click(function() {
							//$('#splash_content').load('#menu-page-mobile #menu-section-a',function(){
							$('#splash_content').load('#staff #staff-listview',function(){

								  $('#splash_content').trigger('create');
								  $('#splash_content').trigger('create');
								  $('#staff-listview').css('max-height','425px');
								  $('#staff-listview').css('overflow','auto');
								 });							 
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
						
				$('#mapdir, #mapdirt').click(function() {

								 
								 $('#splash_content').load('googlemap.html #testmap',function(){
								  $('#splash_content').trigger('create');
								   mapload();
								   //$('#map_canvas_1').gmap('refresh');
								  
								  });
							 return false;
						});
			
			$('#facebooklink').click(function() {
							 $('#splash_content').load('config.html #facebook-display',function(){
								// $('#splash_content').trigger('create');
  

								 });							 
								 return false;
						});

						$('#coveragebutton').click(function() {
					 
								 //$('#splash_content').load('config.html #splash-init-content5',function(){

							 $('#splash_content').load('#coverage #coverage-listview',function(){
								 	$('#splash_content').trigger('create');
								 	$('#coverage-listview').css('max-height','435px');
								  $('#coverage-listview').css('overflow-y','scroll');
								  $('#coverage-listview').css('padding-bottom','0px');
								  $('#coverage-listview').css('margin','auto');

								 });							 
								 return false;
						});



			$('#aboutusbutton').click(function() {
			
							//$('#splash_content').html('');
							 $('#splash_content').load('#aboutus #history',function(){
								 $('#splash_content').trigger('create'); 							 
								 $('#history').css('max-height','435px');
								 $('#history').css('overflow-y','scroll');
								 $('#history').css('margin','auto');
								   
								 });							
								 return false;
						});
						
					
												
						
						
												

				// List Ads	 
		/* 	$('#list-ad1').load('config.html #splash-init-content',function(){
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
		
		*/
				
				 $('#list-ada').load('config.html #splash-init-content5',function(){
				//$('#list-ad3').trigger('create'); 	 
				  });
				  $('#list-adb').load('config.html #splash-init-content2',function(){
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
				  $('#list-adf').load('config.html #splash-init-content7',function(){
				//$('#list-ad3').trigger('create'); 	 
				 });
				/* $('#list-adg').load('config.html #splash-init-content3',function(){
				//$('#list-ad3').trigger('create'); 	 
				 });
				 $('#list-adh').load('config.html #splash-init-content4',function(){
				//$('#list-ad3').trigger('create'); 	 
				 });  */
								
				
				//$('#splash_content').load('config.html #logo-tablet');
				
				$('#homebutton').click(function() {
				//$('#splash_content').load('config.html #splash-init-content',function(){	
				//$('#splash_content').trigger('create'); 
				 $('#splash_content').load('phpqrcode/splash.php',function(){	
				 $('#splash_content').trigger('create'); 
				
			 });
				
				 return false;
						});


						
							$('#dailyspecials').click(function() {
				//$('#splash_content').load('config.html #splash-init-content',function(){	
				//$('#splash_content').trigger('create'); 
				 $('#splash_content').load('beer-admin/specials.html',function(){	
				 $('#splash_content').trigger('create'); 
				 $('#specials').css('background','transparent url(/images/wood_bg_beach.png) 0 0 repeat');
				 $('#specials').css('padding', '25px');
				 $('#specials').css('margin-left', '0px');
				 $('#specials').css('width', '490px');
				 $('#specials .header').css('padding-top', '0px');
				 $('#specials .title').css('padding-top', ' 5px');
				  $('#specials .title').css('margin-top', ' 15px');
				 $('#specials .heading').css('padding-top', '5px');
				 $('#specials .marqueetext').hide();

			 });
				
				 return false;
						});

			//$('#specialslistbutton').click(function() {
				//$('#splash_content').load('config.html #splash-init-content',function(){	
				//$('#splash_content').trigger('create'); 
				 $('#specialscontent').load('beer-admin/specials.html',function(){	
				 $('#specialscontent').trigger('create'); 
				 $('#specialscontent #specials').css('background','transparent url(/images/wood_bg_beach.png) 0 0 repeat');
				 $('#specialscontent #specials').css('padding', '10px');
				 $('#specialscontent #specials').css('margin-left', '0px');
				 $('#specialscontent #specials').css('width', '100%');
				 $('#specialscontent #specials').css('float', 'none');
				 $('#specialscontent #specials .header').css('padding-top', '0px');
				 $('#specialscontent #specials .header').css('font-size', '20px');
				 $('#specialscontent #specials .title').css('padding-top', ' 5px');
				 $('#specialscontent #specials .title').css('margin-top', ' 15px');
				 $('#specialscontent #specials .heading').css('padding-top', '5px');
				 $('#specialscontent #specials .marqueetext').hide();

			 });
				
				 //return false;
						//});


			   

			
				
			  $('#splash_content').load('config.html #splash-init-content',function(){	
			 
			  });
			 
			 // Guest Communicator Sign up form 'Pour House Grill Contact List'
			//   $('#gc-form').load('gc_form.html #form',function(){	
			 // });
			 	  
				 
				 	
 			//$('#splash_content').load('config.html #testcamera',function(){
			//					 $('#splash_content').trigger('create'); 							 
								 //$('#testcamera').camera({thumbnails: true, fx: 'simpleFade', loader: 'bar', time: 5000, pagination: true});
								// $('#testcamera').camera({loader:'none', pagination: false, thumbnails: false, navigation: false,time:3000, transPeriod:750,fx:'simpleFade',height: '55%',portrait:false});
								// getSoup();
								   
								// });	
 						  

					 // $('#testcamera').camera({height: '50%', thumbnails : false}); //the basic method
					 
					 
					 							
						
						 						
				       //var menuinsert =     '<ul id="menu-listview" data-role="listview" data-theme="b" data-inset="true" ><li><h3>Pour House Grill Beer Selection</h3><p>Here is a list of all our current beers on tap and growler.</p></li></ul>';
					 
					 $('#happyhourbutton').click(function() {
			
							 
							       // $('#splash_content').load('beer-admin/getvenue.php #lamenucontent');
							     $('#splash_content').load('beer-admin/getvenue3.php #lamenucontent',function(){

							     $('#splash_content').trigger('create');
							     	$('#lamenucontent').css('max-height','545px');
								   $('#lamenucontent').css('overflow-y','scroll');
								  $('#lamenucontent').css('padding-bottom','0px');
								  $('#lamenucontent').css('display','block');
								  
							     });
							      $('#lamenucontent').trigger('create');
						 		//$('#splash_content').html('');
							   //$('#locu-foodmenu-block').show();
							   //$('#splash_content').html($('#locu-foodmenu-block'));
							   								  return false;
						});
						

					 
					 
					 
					 
					 $('#portfoliobutton').click(function() {

							      //var scriptski = '<script id="-locu-widget" type="text/javascript" src="https://widget.locu.com/widget2/locu.widget.v2.0.js?id=8aee47ad9dcb4438327a&medium=mobile"></script>';
							       // $('#splash_content').load('beer-admin/getvenue.php #lamenucontent');
							     $('#splash_content').load('beer-admin/getvenue2.php #lamenucontent',function(){

							     $('#splash_content').trigger('create');
							     	$('#lamenucontent').css('max-height','545px');
								   $('#lamenucontent').css('overflow-y','scroll');
								  $('#lamenucontent').css('padding-bottom','0px');
								  //$('#lamenucontent').css('margin','auto');
							     });
						 		//$('#splash_content').html('');
							   //$('#locu-foodmenu-block').show();
							   //$('#splash_content').html($('#locu-foodmenu-block'));
							   								  return false;
						 });


					 
					 
					 //  START BEER MENU SCRIPTS
					 
					 
					 var beerinsert =     '<div id="beerlist-insert"><ul id="beers-listview" data-role="listview" data-theme="d" data-inset="true" style="margin-top:15px;" data-filter="true" data-filter-placeholder="Search Our Current Beer Selection or Scroll to Browse" ><li style="background-color:#000;color:#fff;" data-role="list-divider" data-theme="f"><img style="padding:10px;width:45px;  " src="images/Beers.png"/><h3 style="margin-left:55px;">Pour House Grill Beer Selection</h3><p style="margin-left:55px;">A list of all our Current Beers. Updated Daily.</p></li></ul></div>';
					 	
						$('#portfoliobutton_desktop').click(function() {
								$('#splash_content').html(beerinsert);
								
								listBeers('ACTIVE');
							//$('#splash_content').html('');
							 //$('#splash_content').load('config.html #testcamera2',function(){
								  $('#splash_content').trigger('create');
								  $('#beers-listview').css('max-height','530px');
								   $('#beers-listview').css('overflow-y','scroll'); 							 						 

								//$('#testcamera2').camera({loader:'none', pagination: true, thumbnails: false, navigation: true,time:3000, transPeriod:750,fx:'simpleFade',width:'560px;',height: '405px',portrait:false,alignment:'topCenter'});
								   
								 //});							
								 return false;
						});



					  
         function onSuccessBeerList(data, status)
        {
            
            Object.keys(data).forEach(function(key) {
            
        //    $('#beers-gridview').append('<a href="#" data-role="button" data-inline="true" data-theme="b" class="col1"><img class="ui-li-thumb" src="'+data[key].beer_label_url+'"/><h3 class="ui-li-heading">'+data[key].beer_name+'</h3><p class="beer-style">'+data[key].beer_style+'</p><p  class="brewery-name">'+data[key].brewery_name+'</p><p  class="brewery-city">'+data[key].brewery_city+'</p><p  class="ui-li-desc beer-desc">'+data[key].beer_desc+'</p><p class="ui-li-desc beer-abv">ABV: '+data[key].beer_abv+'%</p><p class="ui-li-desc beer-ibu">IBUs: '+data[key].beer_ibu+'</p><p class="ui-li-desc beer-glass">Pint: $'+data[key].beer_glass_price+'</p><p class="ui-li-desc beer-growler">Growler: $'+data[key].beer_growler_price+'</p></a>');
            // $('#beers-gridview').trigger('create');


 $('#beers-listview').append('<li class="mobilebeerthumb" data-theme="a"><img src="'+data[key].beer_label_url+'"/><h2 style="fonte-size:22px;">'+data[key].beer_name+'</h2><p style="padding-bottom:5px;">'+data[key].beer_style+'</p><p style="float:left;"><span style="margin-right:10px;">ABV:</span> '+data[key].beer_abv+'% <span style="margin-right:10px;margin-left:5px;">IBUs:</span> '+data[key].beer_ibu+'</span></p><p style="max-width:350px;white-space:normal;padding:0px;float:left;clear:left;padding-top:5px;display:none;">'+data[key].beer_desc+'</p><p style="clear:both;font-size:14px;"><img style="width:50px;float:left;margin-right:15px;" src="'+data[key].brewery_label_url+'"/>'+data[key].brewery_name+'<br /><span style="font-size:12px;">'+data[key].brewery_city+'</span><br /><span style="font-size:12px;"><a style="text-decoration:none;color:#000;" href="'+data[key].brewery_url+'">'+data[key].brewery_url+'</a></span></p><p style="float:right;margin-left:5px"> <span style="margin-left:15px;margin-right:5px;">Glass:</span> '+data[key].beer_glass_price+' <span style="margin-right:5px;margin-left:15px;">Growler:</span> '+data[key].beer_growler_price+'</p></li>');

         
           //$('#beers-listview').append('<li class="mobilebeerthumb" data-theme="b"><img src="'+data[key].beer_label_url+'"/><h3>'+data[key].beer_name+'</h3><p>'+data[key].brewery_name+'<p><p>'+data[key].beer_style+'<p><p style="margin-bottom:20px;float:right;margin-left:15px;"> <span style="">Glass:</span> $'+data[key].beer_glass_price+' <span style="margin-left:5px;">Growler:</span> $'+data[key].beer_growler_price+'</p><p style="float:left;"><span>ABV:</span> '+data[key].beer_abv+'% <span style="margin-left:5px;">IBUs:</span> '+data[key].beer_ibu+'</p></li>');
           $('#beers-listview').listview('refresh');
    });
		
		  
        }

        
                function onError(data, status)
        {
            // handle an error
            alert('error_getBeer'+status);
        }   
        
            
  
    
  
			
			function listBeers(beerstatus){ 
				 //alert('getBeer'+beerid);
                //var formData = $("#callAjaxForm").serialize();
				 
                $.ajax({
                    type: "POST",
                    url: "beer-admin/listbeers.php",
                    cache: false,
                    //data: formData,
                    data: {beer_status : beerstatus},
                    dataType:"json",
                    success: onSuccessBeerList,
                    error: onError
                });
			}	

			 //listBeers('ACTIVE');
					 
					 // END BEER MENU SCRIPTS
			
						
						// Check business hours to see if open  -- Needs to be changed to a class
						var d = new Date();
						var dateski = (d.getDay()+' '+d.getHours()+' '+d.getFullYear()+' '+d.getHours()+' '+d.getMinutes()+' '+d.getSeconds());

						$('.store_open_message').html('We\'re Closed').css('color','#cccccc;');
						 if (d.getDay() >=1  && d.getDay() <=  5  && d.getHours() <= 16 && d.getHours() >=8) $('.store_open_message').html('We\'re Open!').css('color','#00ff00');
						 if (d.getDay() ==	6 && d.getHours() <= 12 && d.getHours() >=9) $('.store_open_message').html('We\'re Open!').css('color','#00ff00');;

						//alert(dateski); 
						
						
						
						
						function tooltips() {
	var targets = $( '[rel~=tooltip]' ),
		target	= false,
		tooltip = false,
		title	= false;
 
	targets.bind( 'mouseenter', function()
	{
		target	= $( this );
		tip		= target.attr( 'title' );
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
				pos_top	 = target.offset().top - tooltip.outerHeight() - 20;
 
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
				var pos_top	 = target.offset().top + target.outerHeight();
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
						
						 //getSpecials();
						
												
							var latlngx;	
						    
						/*$('#mapdir').click(function() {
							 
							 $('#splash_content').load('googlemap.html #testmap',function(){
							 	  $('#splash_content').trigger('create');
								  

							 	  });
								 

								 
								 	function errorHandler(err) {
									if(err.code == 1) {
										 //alert("Error: Access is denied!");
										 
										  mapload();
										   $('#gps').hide();
										  $('#gps2').hide(); 
										  $('#gpslabel').hide();
										   
										
										}else if( err.code == 2) {
											 //alert("Error: Position is unavailable!");
											  
											 mapload();
											  $('#gps').hide();
											  $('#gps2').hide();
											  $('#gpslabel').hide(); 
											
											}
											else if( err.code == 3) {
											 //alert("Error: Position is unavailable!");
											 
											 mapload();
											  $('#gps').hide();
											 $('#gps2').hide();
											 $('#gpslabel').hide(); 
											 
											}

											}
											
									function showLocation(position) {
									
									$('#biz').load('config.html #destination_address',function(){
									$('#biz').trigger('create');
									});
									$('#biz2').load('config.html #destination_address2',function(){
									$('#biz2').trigger('create');
									});
									//$('#biz').load('config.html #destination_address');
									
									var latitude = position.coords.latitude;
									var longitude = position.coords.longitude;
									latlngx = new google.maps.LatLng(latitude, longitude);
									//alert("Latitude : " + latitude + " Longitude: " + longitude);
									$("#xlat").text (latitude);
						            $("#xlng").text (longitude);
									 mapload();
									}
								
								
								if(navigator.geolocation){
									// timeout at 5000 milliseconds (5 seconds)
									var options = {timeout:5000,enableHighAccuracy : true};
									navigator.geolocation.getCurrentPosition(showLocation, 
                                               errorHandler,
                                               options);
                                               }else{
                                              
	                                            // alert("Sorry, browser does not support geolocation!");
	                                               }


							 return false;
						});*/
						
						
							
										
						 function mapload() { 

var map;
var marker;
var infowindow;
//var latlngx;
var latlngy;
var mobileaddress;				
 
	
	// Start Geocoder
	var geocoder;
	geocoder = new google.maps.Geocoder();
	
	
	
	
	
	
	
	geocoder.geocode({'latLng': latlngx}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
        if (results[0]) {
            
          $("#from").val(results[0].formatted_address);
        }
      } else {
       // alert("Geocoder failed due to: " + status);
      }
    });

	
								
	var bizlatlng;
	var bizlatlng2;
	// Destination Location Marker (Business Location)		 
		 var addy =	 document.getElementById("destination_address").innerHTML;
		 var addy2 = document.getElementById("destination_address2").innerHTML;
	 	 		   		
		 geocoder.geocode({'address': addy}, function(results, status) {
		   document.getElementById("biz").innerHTML = '' + addy + '<br />' + (results[0].geometry.location);

		document.getElementById("blat").innerHTML = '' + (results[0].geometry.location.hb);
		document.getElementById("blng").innerHTML = '' + (results[0].geometry.location.ib);	   
		  bizlatlng = results[0].geometry.location;
		  

		   var mapOptions = {
			   zoom: 6,
			   center: bizlatlng,
			   mapTypeId: google.maps.MapTypeId.ROADMAP
			   };								  
		   //var mapOptions = { 'center': bizlatlng , 'zoom': 12 };
	    // mapnew = $('#map_canvas_1').gmap(mapOptions);	
	      
	 map = new google.maps.Map(document.getElementById('map_canvas_1'),
mapOptions);
		 
		 //var bizinfocontent = '<div class="infowindow">'+bizlatlng+'<br />'+addy+'<br /></div>'
		 
		 
		 
		 
		 var bizinfocontent = '<div style="margin: 0px; padding: 0px; padding-left: 0px; margin-top: 0px;"><img alt="The Pour House Grill" src="/images/Pour-House-Grill-logo-brown.png" style="width:100px;float:left;margin-right:15px;"><p style="font-size:12px;color:#777777;text-shadow:none;width:250px;"><strong>The Pour House Grill</strong><br />1085 SE 3rd Street<br>Bend, OR 97702<br />(541) 388-2337  </p></div>';		 
		 
		 var bizwindow = new google.maps.InfoWindow({
			 content: bizinfocontent
			 });
		 
		 
		 
		 var bizmarker = new google.maps.Marker({
			 position: bizlatlng,
			 map: map,
			 title: 'Business Location'
			 });
		bizwindow.open(map,bizmarker);	 
       google.maps.event.addListener(bizmarker, 'click', function() {
	       bizwindow.open(map,bizmarker);
	       });
        

		  });			 				
		
		
/*		 geocoder.geocode({'address': addy2}, function(results, status) {
		   document.getElementById("biz2").innerHTML = '' + addy2 + '<br />' + (results[0].geometry.location);
		document.getElementById("blat2").innerHTML = '' + (results[0].geometry.location.hb);
		document.getElementById("blng2").innerHTML = '' + (results[0].geometry.location.ib);	   
		  bizlatlng2 = results[0].geometry.location;
		  

		  var bizinfocontent2 = '<div class="infowindow">'+bizlatlng2+'<br />'+addy2+'<br /></div>'
		 
		 var bizinfocontent2 = '<div style="margin: 0px; padding: 0px; padding-left: 0px; margin-top: 0px;"><img alt="The Pour House Grill" src="/images/Pour-House-Grill-logo-brown.png" style="width:100px;float:left;margin-right:15px;"><p style="font-size:12px;color:#777777;text-shadow:none;width:250px;"><strong>The Pour House Grill</strong><br />1085 SE 3rd Street<br>Bend, OR 97702<br />(541) 388-2337  </p></div>';
		 
		 var bizwindow2 = new google.maps.InfoWindow({
			 content: bizinfocontent2,
			 });
		 
		 var bizmarker2 = new google.maps.Marker({
			 position: bizlatlng2,
			 map: map,
			 title: 'Business Location2'
			 });
			 bizwindow2.open(map,bizmarker2);
       google.maps.event.addListener(bizmarker2, 'click', function() {
	       bizwindow2.open(map,bizmarker2);
	       });

	        
		  });			 
			  				
	*/
	
				 							 
						
//  DIRECTIONS BUTTONS
var directionsDisplay;
 var directionsService = new google.maps.DirectionsService();
 directionsDisplay = new google.maps.DirectionsRenderer();
		  
// DIRECTIONS FROM LOCATION INPUT TEXT
// To Primary Business Location
$('#submit').click(function() {

// Show Directions

 directionsDisplay.setMap(map);
 directionsDisplay.setPanel(document.getElementById('results'));
function calcRoute() {
 
	var start = $('#from').val();
	var end = $('#to').val();
	var request = {
		origin: start,
		destination: end,
		travelMode: google.maps.DirectionsTravelMode.DRIVING
		};
		directionsService.route(request, function(response, status) {
			if (status == google.maps.DirectionsStatus.OK) {
				directionsDisplay.setDirections(response);
				}
				});
				}

calcRoute();
$('#results').hide();
$('#results').show();
$('#destination_address_display').load('config.html #destination_address');
 

	return false;
});


// To Secondary Business Location
$('#submit2').click(function() {

// Show Directions

 directionsDisplay.setMap(map);
 directionsDisplay.setPanel(document.getElementById('results2'));
function calcRoute() {
 
	var start = $('#from').val();
	var end = $('#to2').val();
	var request = {
		origin: start,
		destination: end,
		travelMode: google.maps.DirectionsTravelMode.DRIVING
		};
		directionsService.route(request, function(response, status) {
			if (status == google.maps.DirectionsStatus.OK) {
				directionsDisplay.setDirections(response);
				}
				});
				}

calcRoute();
$('#results').hide();
$('#results2').show();
 
$('#destination_address_display2').load('config.html #destination_address2');

	return false;
});




 
// DIRECTIONS FROM CURRENT DEVICE LOCATION
// To Primary Business Location
$('#gps').click(function() {


 directionsDisplay.setMap(map);
 directionsDisplay.setPanel(document.getElementById('results'));
function calcRoute() {
 
	var start = latlngx;
	var end = $('#to').val();
	var request = {
		origin: start,
		destination: end,
		travelMode: google.maps.DirectionsTravelMode.DRIVING
		};
		directionsService.route(request, function(response, status) {
			if (status == google.maps.DirectionsStatus.OK) {
				directionsDisplay.setDirections(response);
				}
				});
				}

calcRoute();
$('#results2').hide();
$('#results').show();
$('#destination_address_display').load('config.html #destination_address');
 

	return false;
});

// To Secondary Business Location
$('#gps2').click(function() {


 directionsDisplay.setMap(map);
 directionsDisplay.setPanel(document.getElementById('results2'));
function calcRoute() {
 
	var start = latlngx;
	var end = $('#to2').val();
	var request = {
		origin: start,
		destination: end,
		travelMode: google.maps.DirectionsTravelMode.DRIVING
		};
		directionsService.route(request, function(response, status) {
			if (status == google.maps.DirectionsStatus.OK) {
				directionsDisplay.setDirections(response);
				}
				});
				}

calcRoute();
$('#results').hide();
$('#results2').show();
$('#destination_address_display2').load('config.html #destination_address2');

	return false;
});
		  
		  
 		  
	 //  $('#map_canvas_1').gmap('refresh');			 
				



  // end loadit

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






// $( document ).delegate("#gallerypage", "pageinit", function() {
 // var maxwidth=$(window).width();
 //var maxheight=($(window).height())-50;
 
 //alert(maxwidth+' '+maxheight+'<br >'+screen.width+' '+screen.height);
 // $('#gallery_content').css({'padding': '0px'});
  // $('div#gallerypage.ui-page div#gallery_content.ui-content div#slider.swipe div.swipe-wrap div div img').css({'height': maxheight});
 
 //});



