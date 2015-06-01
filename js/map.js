  $( document ).delegate("#directions_map", "pageinit", function() {
 		 		 		
		   //  $('#test').load('config.html #destination_address');
//$('#biz').load('config.html #destination_address');
//$('#biz2').load('config.html #destination_address2');
		    
		   							 var destad1=$('#dest_ad1').html();
									var destad2=$('#dest_ad2').html();

									$('#biz1').html(destad1).trigger('create');
									$('#biz2').html(destad2).trigger('create');
		    
		    
								var latlngx;
								
								var mapcontent = $('#directions_map').html();
								$('#splash_content').html(mapcontent); 
								$('#splash_content').trigger('create'); 
									
								function errorHandler(err) {
									if(err.code == 1) {
										  // alert("Error: Access is denied!");
										
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
									
									/* $('#biz').load('config.html #destination_address',function(){
									$('#biz').trigger('create');
									});
									$('#biz2').load('config.html #destination_address2',function(){
									$('#biz2').trigger('create');
									});  */
									//$('#biz').load('config.html #destination_address');
									
									var destad1=$('#dest_ad1').html();
									var destad2=$('#dest_ad2').html();

									$('#biz1').html(destad1).trigger('create');
									$('#biz2').html(destad2).trigger('create');

									
									var latitude = position.coords.latitude;
									var longitude = position.coords.longitude;
									latlngx = new google.maps.LatLng(latitude, longitude);
									//alert("Latitude : " + latitude + " Longitude: " + longitude);
									$("#xlat").text (latitude);
						            $("#xlng").text (longitude);
									 mapload();
									}
								

/* if(navigator.geolocation){
// timeout at 60000 milliseconds (60 seconds)
var options = {timeout:2000};
navigator.geolocation.getCurrentPosition(showLocation, 
           errorHandler,
           options);
           }else{
          
              alert("Sorry, browser does not support geolocation!");
               } */

 if(navigator.geolocation){
									// timeout at 5000 milliseconds (5 seconds)
									var options = {timeout:5000,enableHighAccuracy : true};
									navigator.geolocation.getCurrentPosition(showLocation, 
                                               errorHandler,
                                               options);
                                               }else{
                                              
                                            // alert("Sorry, browser does not support geolocation!");
                                             mapload();
                                               }

				
					 
						
							
										
		
										
						 function mapload() { 
						

var map;
var marker;
var infowindow;
//var latlngx;
var latlngy;
var mobileaddress;				
// create bounds variable
 

	
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
			   zoom: 11,
			   center: bizlatlng,
			   mapTypeId: google.maps.MapTypeId.ROADMAP
			   };								  
		   //var mapOptions = { 'center': bizlatlng , 'zoom': 12 };
	    // mapnew = $('#map_canvas_1').gmap(mapOptions);	
	      
	   map = new google.maps.Map(document.getElementById('map_canvas_1'), mapOptions);
		  
		 var bizinfocontent = '<div style="margin: 0px; padding: 0px; padding-left: 0px; margin-top: 0px;"><img alt="The Pour House Grill" src="/images/Pour-House-Grill-logo-brown.png" style="width:100px;float:left;margin-right:15px;"><p style="font-size:12px;color:#777777;text-shadow:none;width:250px;"><strong>The Pour House Grill</strong><br />1085 SE 3rd Street<br>Bend, OR 97702<br />(541) 388-2337  </p></div>'
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
$('#results2').hide();
$('#results').show();
//$('#destination_address_display').load('config.html #destination_address');
var target_address = $('#destination_address').html();
$('#destination_address_display').html(target_address).trigger('create'); 
 
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
 
//$('#destination_address_display2').load('config.html #destination_address2');
var target_address = $('#destination_address2').html();
$('#destination_address_display2').html(target_address).trigger('create');
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
//$('#destination_address_display').load('config.html #destination_address');
var target_address = $('#destination_address').html();
$('#destination_address_display').html(target_address).trigger('create'); 

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
//$('#destination_address_display2').load('config.html #destination_address2');
var target_address = $('#destination_address2').html();
$('#destination_address_display2').html(target_address).trigger('create');
	return false;
});
		  
		  
 		  
	   // $('#map_canvas_1').gmap('refresh');			 
				
	    


  // end loadit

 //end get mobile location 

} // end function mapload
						
			 	
}); 			 

 