<?php
// session_start();
// if(!session_is_registered(myusername)){
//  header("location:a_beerlogin.php");
// }
?>
 <!DOCTYPE html>
<html>
    <head>
    <title>Control Panel</title>
    <meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   <!-- StyleSheets (CSS) -->
		 
 
   	  <link rel="stylesheet" href="/css/jquery.mobile-1.3.2.min.css" />
	  <link rel="stylesheet" href="/css/themes/datafog.css" /> 
	  <link rel="stylesheet" href="/css/themes/jqm-icon-pack-2.0-original.css" />   
	 
	  <link rel="stylesheet" href="/css/jsShare.css" />
	  <link rel="stylesheet" href="/css/jquery-mobile-fluid960.min.css" /> 
	   <link rel="stylesheet" href="/css/custom.css" /> 	
	 <!-- JavaScripts -->
	 <script src="/js/jquery-1.10.2.min.js"></script> 
	 <script src="/js/jquery-ui.min.js"></script>
	 <script src="/js/modernizr-latest.js" type="text/javascript"></script>
	 <!--<script src="/js/custom.js"></script>-->
	 <script src="/js/jquery.mobile-1.3.2.min.js"></script>
	<script src="/js/swipe.js"  type="text/javascript"></script>
	 <script type="text/javascript" src="/js/jquery.easing.1.3.js"></script> 
	 <script src="ckeditor/ckeditor.js"></script>
	 <script src="ckeditor/adapters/jquery.js"></script>
	<script src="/js/jquery.ui.touch-punch.min.js"></script>  </head>
<body>
 
    <script>
     // $( document ).delegate("#main", "pageinit", function() {
    //$(document).ready(function() {
      $(document).on('pageinit', function() {
     
    
    
    
     var msg = "";  
     var myeditor;   
	 var currAdEdit = '';
	 var currAds = Array;
	/*ui.item.find('.li-order-id').text(parseInt(prevOrderId)-1);*/
 /*  $( "#sortable" ).sortable(
    {
    distance: 10, 
    start: function(e, ui) {
        // creates a temporary attribute on the element with the old index
        $(this).attr('data-previndex', ui.item.index());
        $("#sortable li").css("border","0px solid #aaaaaa");
        ui.item.css("border","3px solid #aaaaaa");
         msg="Ad Selected";
         currAdEdit = ui.item.find('.li-ad-id').text();
        
      loadadeditor(ui.item.find('.li-ad-id').text());       
    },
    update: function(e, ui) {
        var newIndex = ui.item.index();
        var prevIndex = ui.item.index()-1;
        var prevOrderId = $(this).find('li:eq('+prevIndex+')').find('.li-order-id').text();
       if(prevOrderId == 'Order')prevOrderId=0;
         $("#sortable li").css("border","0px solid #aaaaaa");
         ui.item.css("border","3px solid #aaaaaa");
       
         ui.item.find('.li-order-id').text(zeroFill((parseInt(prevOrderId)-1),2));
        var oldIndex = $(this).attr('data-previndex');
         
        $("#ad-order").val(zeroFill((parseInt(prevOrderId)+1),2)); 
        $(this).removeAttr('data-previndex');
         msg ="Ad has been repositioned";
       adupdate();
        var listItems = $("#sortable li");
		  listItems.each(function(idx, li) {
			 var ad = $(li);
		  if(idx > 0)ad.find('.li-order-id').text(zeroFill(idx,2));
			 // and the rest of your code
		 });
       orderupdate();
	   loadads();
       loadadeditor(currAdEdit);
    }
});
     //$( "#sortable" ).disableSelection();
    <!-- Refresh list to the end of sort to have a correct display -->
   // $( "#sortable" ).on( "sortstop", function(event, ui) {
   $(document ).on( "sortstop",'#sortable', function(event, ui) {
          $('#sortable').listview('refresh');
    }); */
// }); 

   
  
    
    
    
 // BEER MANAGEMENT      
    
     var beerview = 'ACTIVE';
       
     function onBeerAvailable(data, status)
        {
        
       if(data.response.found == 0){$("#message_c").text('Beer Not Found.');}
         else{           
         $("#id").val(data.response.beers.items[0].beer.bid);
         $("#beer_name").val(data.response.beers.items[0].beer.beer_name);
         $("#beer_type").val(data.response.beers.items[0].beer.beer_style);
         $("#beer_desc").val(data.response.beers.items[0].beer.beer_description);
         $("#beer_abv").val(data.response.beers.items[0].beer.beer_abv);
         $("#beer_ibu").val(data.response.beers.items[0].beer.beer_ibu);
         $("#brewery_id").val(data.response.beers.items[0].brewery.brewery_id); 
         $("#brewery_name").val(data.response.beers.items[0].brewery.brewery_name);
         var city = data.response.beers.items[0].brewery.location.brewery_city+'-'+data.response.beers.items[0].brewery.location.brewery_state; 
         $("#brewery_city").val(city); 
         $("#brewery_url").val(data.response.beers.items[0].brewery.contact.url);        
        var beer_label =  data.response.beers.items[0].beer.beer_label; 
         //var beer_label = 'beerimages/'+data.response.beers.items[0].beer.bid+'.jpg';
         var brewery_label =  data.response.beers.items[0].brewery.brewery_label;
        // var brewery_label =  'breweryimages/'+data.response.beers.items[0].beer.bid+'.jpg';
         //alert(data.response.beers.items[0].brewery.brewery_label);
         $("#beer_label").attr("src", beer_label);
         //$("#beer_label_url").val(data.response.beers.items[0].beer.beer_label);
          $("#beer_label_url").val(beer_label);
         $("#brewery_label").attr("src", brewery_label); 
         $("#brewery_label_url").val(brewery_label);        
         $("#beer_status").val("INACTIVE");
         $("#beer_glass_price").val("4.50")
         $("#beer_growler_price").val("10.95")
         $("#beer_special").val("OFF")
        
         getBeer(data.response.beers.items[0].beer.bid);
         
		 }
          
        }
  

        function onSuccessBeer(data, status)
        {
          //alert('data:'+data); 
         
          if(data != false){ 
         $("#message_c").text('Beer Searched EXISTS in Current Beer List, see shaded text.');   
         $("#id_c").text(data.id);
         $("#beer_label_url_c").text(data.beer_label_url);
         $("#brewery_label_url_c").text(data.brewery_label_url);
         $("#beer_name_c").text(data.beer_name);
         $("#beer_type_c").text(data.beer_style);
         $("#beer_desc_c").text(data.beer_desc);
         $("#beer_abv_c").text(data.beer_abv);
         $("#beer_ibu_c").text(data.beer_ibu);
         $("#brewery_id_c").text(data.brewery_id); 
         $("#brewery_name_c").text(data.brewery_name); 
         $("#brewery_city_c").text(data.brewery_city); 
         $("#brewery_url_c").text(data.brewery_url); 
         $("#beer_status_c").text(data.beer_status);
         $("#beer_glass_price_c").text(data.beer_glass_price);
         $("#beer_growler_price_c").text(data.beer_growler_price);
         $("#beer_special_c").text(data.beer_special);
         $("#beer_special_c").val(data.beer_special); 
         $("#beer_status").val(data.beer_status);
         $("#beer_glass_price").val(data.beer_glass_price)
         $("#beer_growler_price").val(data.beer_growler_price)
         $("#beer_special").val(data.beer_special)
 
		 }else{
		 $("#message_c").text('Beer Searched is NOT in Current Beer List. Make any edits and click "Add Beer" button to add.');
		 $("#id_c").text('Existing ID');
		 $("#beer_label_url_c").text('Beer Label Image URL');
		 $("#brewery_label_url_c").text('Brewery Label Image URL');
         $("#beer_name_c").text('Beer Name');
         $("#beer_type_c").text('Beer Type');
         $("#beer_desc_c").text('Description');
         $("#beer_abv_c").text('ABV');
         $("#beer_ibu_c").text('IBU');
         $("#brewery_id_c").text('Brewery ID'); 
         $("#brewery_name_c").text('Brewery Name'); 
         $("#brewery_city_c").text('Brewery City'); 
         $("#brewery_url_c").text('Brewery URL');
         $("#beer_status_c").text('Beer Status'); 
         $("#beer_glass_price_c").text('Price per Glass');
         $("#beer_growler_price_c").text('Growler Price');
         $("#beer_special_c").text('Beer Special');
         $("#beer_special_c").val('OFF');
			 
		 }
		
		  
        }
        
        function onSuccessBeerView(data, status)
        {
          //alert('data:'+data); 
         
          if(data != false){ 
         $("#message_c").text('EXISTING Beer selected to view. Edit and click "Add Beer" to update beer.');   
         $("#id").val(data.id);
        // $("#beer_label").attr('src',data.beer_label_url);
        // $("#beer_label_url").val(data.beer_label_url);
        // $("#brewery_label").attr('src',data.brewery_label_url);
         //$("#brewery_label_url").val(data.brewery_label_url);
         $("#beer_label").attr('src','beerimages/'+data.id+'.jpg');
         $("#beer_label_url").val('beerimages/'+data.id+'.jpg');
         $("#brewery_label").attr('src','breweryimages/'+data.id+'.jpg');
         $("#brewery_label_url").val('breweryimages/'+data.id+'.jpg');

         $("#beer_name").val(data.beer_name);
         $("#beer_type").val(data.beer_style);
         $("#beer_desc").val(data.beer_desc);
         $("#beer_abv").val(data.beer_abv);
         $("#beer_ibu").val(data.beer_ibu);
         $("#brewery_id").val(data.brewery_id); 
         $("#brewery_name").val(data.brewery_name); 
         $("#brewery_city").val(data.brewery_city); 
         $("#brewery_url").val(data.brewery_url); 
         $("#beer_status").val(data.beer_status);
         $("#beer_glass_price").val(data.beer_glass_price);
         $("#beer_growler_price").val(data.beer_growler_price); 
         $("#beer_special").val(data.beer_special); 
		 }else{
		 $("#message_c").val('Beer Searched is NOT in Current Beer List. Make any edits and click "Add Beer to List" button below to add.');
		 $("#id_c").val('Existing ID');
		 $("#beer_label_url_c").val('Beer Label Image URL');
		 $("#brewery_label_url_c").val('Brewery Label Image URL');
         $("#beer_name_c").val('Beer Name');
         $("#beer_type_c").val('Beer Type');
         $("#beer_desc_c").val('Description');
         $("#beer_abv_c").val('ABV');
         $("#beer_ibu_c").val('IBU');
         $("#brewery_id_c").val('Brewery ID'); 
         $("#brewery_name_c").val('Brewery Name'); 
         $("#brewery_city_c").val('Brewery City'); 
         $("#brewery_url_c").val('Brewery URL');
         $("#beer_status_c").val('Beer Status'); 
         $("#beer_glass_price_c").val('Price per Glass');
         $("#beer_growler_price_c").val('Growler Price');
         $("#beer_special_c").val('Beer Special');
			 
		 }
		
		  
        }

        
         var beercount ='0';
         function onSuccessBeerList(data, status)
        {
            beercount = Object.keys(data).length;
            
            $('#beers-listview-inventory').html('');
             $('#beers-listview-infoline').text('There are '+beercount+' Beers in: '+beerview+'');
             $('#beers-listview-inventory').append('<li data-role="list-divider" data-theme="b"><span> BEER </span><span style="float:right;"><span>   </span><span style="padding-left:15px;"> </span><span style="padding-left:20px;"> CONTROLS </span></span></li>');           
           
            Object.keys(data).forEach(function(key) {
             var dotimg='';
             var flagimg='';
              if(data[key].beer_status == 'ACTIVE'){}
              if(data[key].beer_status == 'INACTIVE'){}
              if(data[key].beer_status == 'BOTTLE-IN'){dotimg = '<img style="width:10px;margin-left:5px;" src="../images/dot_brown.png"/>';}
              if(data[key].beer_status == 'BOTTLE-OUT'){dotimg = '<img style="width:10px;margin-left:5px;" src="../images/dot_red.png"/>';}
             
              if(data[key].beer_special == 'ON'){var speccss='style="box-shadow: 0 0 25px rgba(0, 255, 0, 1.0);border:3px solid green;color:#00ff00;"';var sicon='star';}
              if(data[key].beer_special == 'OFF'){var speccss='style="box-shadow: 0 0 8px rgba(255,0, 0, 0.3);"';var sicon='pause';}          // $('#beers-listview-inventory').append('<li data-theme="b"><img src="'+data[key].beer_label_url+'"/><h3>'+data[key].beer_name+'</h3><p style="max-width:350px;white-space:normal;padding:10px;">'+data[key].beer_desc+'<p><p>'+data[key].brewery_name+'<p><p>'+data[key].beer_style+'<p><p>Glass: '+data[key].beer_glass_price+'<p><p>Growler: '+data[key].beer_growler_price+'<p><p>ABV: '+data[key].beer_abv+'%<p><p>IBUs: '+data[key].beer_ibu+'<p></li>');
            if(data[key].beer_status == 'INACTIVE'){$theme='c';}else if(data[key].beer_status == 'ACTIVE'){$theme='e';} else {$theme='a';}
            
            //$('#beers-listview-inventory').append('<li class="beerdetails" data-theme="'+$theme+'" style="padding:0px;padding-left:35px;"><img src="'+data[key].beer_label_url+'" style="max-width:45px;max-height:45px;float:left;"/><h3>'+data[key].beer_name+'</h3><p class="beerspecial ui-li-aside" style="float:right;color:#ff0000;padding-right:10px;max-width:25px;" value="'+data[key].beer_special+'">'+flagimg+'</p><p class="beerdelete" style="float:right;color:#ff0000;padding-right:10px;">DELETE</p><p data-role="button" class="beertoggle" style="float:right;padding-right:5px;" id="'+data[key].id+'">'+data[key].beer_status+dotimg+'</p><p  style="float:left;padding-right:5px;">'+data[key].beer_style+'</p><p  style="clear:left;float:left;padding-right:5px;">'+data[key].brewery_name+'</p></li>');
            
          //$('#beers-listview-inventory').append('<li class="beerdetails" data-theme="'+$theme+'" style="padding:0px;padding-left:70px;"><img src="beerimages/'+data[key].id+'.jpg" class="ui-li-thumb"/><h3 class="ui-li-heading" style="max-width:280px;">'+data[key].beer_name+'</h3><p  class="ui-li-desc">'+data[key].beer_style+'</p><p   class="ui-li-desc">'+data[key].brewery_name+'</p><p class="ui-li-desc" style="height:25px;padding-top:5px;"><span class="beerdelete" style="width:45px;color:#ff0000;padding-right:20px;padding-left:20px;padding-top:5px;float:right;">DELETE</span><span  class="beertoggle" style="min-width:65px;padding-right:0px;padding-top:5px;float:right;" id="'+data[key].id+'">'+data[key].beer_status+dotimg+'</span><span class="beerspecial" style="width:45px;max-width:40px;margin-right:25px;float:right;" value="'+data[key].beer_special+'">'+flagimg+'</span></p></li>');
          
          //$('#beers-listview-inventory').append('<li class="beerdetails" data-theme="'+$theme+'" style="padding:0px;padding-left:5px;"><div class="container_16"><div id="beerdetailsgridl" class="grid_9" ><img src="beerimages/'+data[key].id+'.jpg" class="ui-li-thumb"/><h3 class="ui-li-heading" >'+data[key].beer_name+'</h3><p  class="ui-li-desc">'+data[key].beer_style+'</p><p class="ui-li-desc">'+data[key].brewery_name+'</p></div><div id="beercontrols" class="grid_7" style="height:50px;float:right;"><div data-role="controlgroup" data-type="horizontal" data-mini="true" ><a class="beertoggle" href="#" data-role="button"  data-type="horizontal" data-inline="true" data-iconpos="left" data-icon="power"  id="'+data[key].id+'">'+data[key].beer_status+'</a><a class="beerspecial" href="#" data-role="button"  data-type="horizontal" data-inline="true" data-iconpos="left" data-icon="'+sicon+'" data-theme="d"  value="'+data[key].beer_special+'" '+speccss+'>Special</a><a class="beerdelete" href="#" data-role="button" data-type="horizontal" data-inline="true" data-iconpos="left" data-icon="delete" data-theme="d">Delete</a><!--</div>--></div></div> </li>').trigger('create');

           
            $('#beers-listview-inventory').append('<li class="beerdetails" data-theme="'+$theme+'" style="padding:0px;padding-left:5px;"><div class="container_16"><div id="beerdetailsgridl" class="grid_9" ><img src="beerimages/'+data[key].id+'.jpg" class="ui-li-thumb"/><h3 class="ui-li-heading" >'+data[key].beer_name+'</h3><p  class="ui-li-desc">'+data[key].beer_style+'</p><p class="ui-li-desc">'+data[key].brewery_name+'</p></div><div id="beercontrols" class="grid_7" style="height:50px;float:right;"><a class="beertoggle" href="#" data-role="button"  data-type="horizontal" data-inline="true" data-iconpos="notext" data-icon="power" id="'+data[key].id+'">'+data[key].beer_status+'</a><a class="beerspecial" href="#" data-role="button"  data-type="horizontal" data-inline="true" data-iconpos="notext" data-icon="'+sicon+'" data-theme="d"  value="'+data[key].beer_special+'" '+speccss+'>Special</a><a class="beerdelete" href="#" data-role="button" data-type="horizontal" data-inline="true" data-iconpos="notext" data-icon="delete" data-theme="d">Delete</a></div></div> </li>').trigger('create');

			 
          // $('#beers-details').trigger('create');
           // $('#beers-listview-inventory').listview('refresh');
           
    });
		$('#beers-listview-inventory').listview('refresh');  
        }

        
        
         function onSuccessInsert(data, status)
        {
          $("#message_c").text('Beer has been added and set as '+data.beer_status+'.');          
         $("#id_c").text(data.id);
         $("#beer_label_c").text(data.beer_label_url);
         $("#brewery_label_c").text(data.brewery_label_url);
         $("#beer_name_c").text(data.beer_name);
         $("#beer_type_c").text(data.beer_style);
         $("#beer_desc_c").text(data.beer_desc);
         $("#beer_abv_c").text(data.beer_abv);
         $("#beer_ibu_c").text(data.beer_ibu);
         $("#brewery_id_c").text(data.brewery_id); 
         $("#brewery_name_c").text(data.brewery_name); 
         $("#brewery_city_c").text(data.brewery_city); 
         $("#brewery_url_c").text(data.brewery_url);
         $("#beer_status_c").text(data.beer_status);
         $("#beer_glass_price_c").text(data.beer_glass_price);
         $("#beer_growler_price_c").text(data.beer_growler_price); 
         $("#beer_special_c").text(data.beer_special);    
		 listBeers(beerview,'','beer_name');
        }
  
        function onError(data, status)
        {
            // handle an error
            alert('error_getBeer'+status);
        }   
        
        function onErrors(data, status)
        {
            // handle an error
            
           alert('errorb:'+status);
        }       
  
    
  
			function getBeer(beerid){ 
				 //alert('getBeer'+beerid);
                //var formData = $("#callAjaxForm").serialize();
				 
                $.ajax({
                    type: "POST",
                    url: "a_getbeer.php",
                    cache: false,
                    //data: formData,
                    data: {beerid_req : beerid},
                    dataType:"json",
                    success: onSuccessBeer,
                    error: onError
                });
			}	
			
			function getBeer2(beerid){ 
				 //alert('getBeer'+beerid);
                //var formData = $("#callAjaxForm").serialize();
				 
                $.ajax({
                    type: "POST",
                    url: "a_getbeer.php",
                    cache: false,
                    //data: formData,
                    data: {beerid_req : beerid},
                    dataType:"json",
                    success: onSuccessBeerView,
                    error: onError
                });
			}	
			
			function listBeers(beerview,beerselect,beersort){ 
				 //alert('getBeer'+beerid);
                //var formData = $("#callAjaxForm").serialize();
				 
                $.ajax({
                    type: "POST",
                    url: "a_listbeers.php",
                    cache: false,
                    // data: formData,
                    data: {beer_view : beerview, beer_select : beerselect,beer_sort : beersort},
                    dataType:"json",
                    success: onSuccessBeerList,
                    error: onError
                });
			}	

			function onMenuAvailable(data, status)
        {
                    
            alert('Menu Available');  
			$("#msg").html(data);
          
        }
  
		 function onErrorsMenu(data, status)
        {
            // handle an error
            
           alert('errors:'+status);
           alert('errord:'+data);
        }  
  
		function onSuccessSpecials(data, status)
        {
         
       
         $("#special1").val(data.special_1);
         $("#special1h").val(data.special_1h);
         $("#special1s").val(data.special_1s);
         $("#special1d").val(data.special_1d);
          
         $("#special2").val(data.special_2);
         $("#special2h").val(data.special_2h);
         $("#special2s").val(data.special_2s);
         $("#special2d").val(data.special_2d);
          
		 $("#special3").val(data.special_3);
         $("#special3h").val(data.special_3h);
         $("#special3s").val(data.special_3s);
         $("#special3d").val(data.special_3d);
          

		 $("#special4").val(data.special_4);
         $("#special4h").val(data.special_4h);
         $("#special4s").val(data.special_4s);
         $("#special4d").val(data.special_4d);
          $("#marqueetext").val(data.marquee_text);
          

   
        }
  
        function onErrorSpecials(data, status)
        {
            // handle an error
        }       
  
		function onSuccessSpecials3(data, status)
        {
         
       
         $("#3special1").val(data.special_1);
         $("#3special1h").val(data.special_1h);
         $("#3special1s").val(data.special_1s);
         $("#3special1d").val(data.special_1d);
          
         $("#3special2").val(data.special_2);
         $("#3special2h").val(data.special_2h);
         $("#3special2s").val(data.special_2s);
         $("#3special2d").val(data.special_2d);
          
		 $("#3special3").val(data.special_3);
         $("#3special3h").val(data.special_3h);
         $("#3special3s").val(data.special_3s);
         $("#3special3d").val(data.special_3d);
          

		 $("#3special4").val(data.special_4);
         $("#3special4h").val(data.special_4h);
         $("#3special4s").val(data.special_4s);
         $("#3special4d").val(data.special_4d);
          
		 $("#3special5").val(data.special_5);
         $("#3special5h").val(data.special_5h);
         $("#3special5s").val(data.special_5s);
         $("#3special5d").val(data.special_5d);
          

		 $("#3special6").val(data.special_6);
         $("#3special6h").val(data.special_6h);
         $("#3special6s").val(data.special_6s);
         $("#3special6d").val(data.special_6d);
         

         
          $("#3marqueetext").val(data.marquee_text);
          

   
        }
  
        function onErrorSpecials3(data, status)
        {
            // handle an error
        }       
  

  
  
  
  
      //  $(document).ready(function() {
        
        
        				
			getBeer(0);
             listBeers(beerview,'','beer_name');            
            
            function onSuccessStatusUpdate(data, status)
            
			{ 
			
			listBeers(beerview,'','beer_name');
			 getBeer2(data);
				}
           
             $(document).on("click",".beerdetails", function(){ 
              
                               
				 var beerid = $(this).find(".beertoggle").attr("id");
				 $('.ui-li-heading').css("color","black");
				 $(this).find(".ui-li-heading").css("color","red");
				 getBeer2(beerid);
				 
				  });  

            
             $(document).on('click','.beertoggle', function(){  
                 
				 var beerid = $(this).attr("id");
				
				 var beerstatus = $(this).attr('title');
				
               $.ajax({
                    type: "POST",
                    url: "a_updatebeerstatus.php",
                    cache: false,
                    data: {beer_status : beerstatus,beer_id : beerid},
                    dataType:"text",
                    success: onSuccessStatusUpdate,
                    error: onError
                });   
                
  
                return false;
            });
            
            
            $(document).on('click','.beerspecial', function(){  
            
				// var beerid = $(this).prev().attr("id");
				var beerid = $(this).siblings('.beertoggle').attr("id");
				
				 
				var beerspecial = $(this).attr("value");
				  $.ajax({
                    type: "POST",
                    url: "a_updatebeerspecial.php",
                    cache: false,
                    data: {beer_special : beerspecial,beer_id : beerid},
                    dataType:"text",
                    success: onSuccessBeerSpecialUpdate,
                    error: onError
                });   
                
  
                return false;
            });

             function onSuccessBeerSpecialUpdate(data, status)
            
			{ 
			
			listBeers(beerview,'','beer_name');
			 getBeer2(data);
				}
            

            
             function onSuccessBeerDelete(){listBeers(beerview,'','beer_name');}
             function onErrorBeerDelete(){alert('could not delete beer');}
			 
			 function areYouSure(text1, text2, button, callback) {
				 $("#sure .sure-1").text(text1);
				 $("#sure .sure-2").text(text2);
				 $("#sure .sure-do").text(button).on("click.sure", function() {
				 //$(document).on("click.sure", '"#sure .sure-do").text(button)', function() {
					 callback(false);
					 $(this).off("click.sure");
					 });
					 $.mobile.changePage("#sure");
					 }
             
             $(document).on('click','.beerdelete', function(){  
               // var beerid = $(this).next('p').attr("id");
               beerid = $(this).parents().children(".beertoggle").attr("id");

               areYouSure("Are you sure?", "Do you want to DELETE this Beer from Your Database?", "Yes", function() {
               	// user has confirmed, do stuff 
				
				
				  
                $.ajax({
                    type: "POST",
                    url: "a_deletebeer.php",
                    cache: false,
                    data: {beer_id : beerid},
                    dataType:"text",
                    success: onSuccessBeerDelete,
                    error: onErrorBeerDelete
                });  
                
  
                
                });
                
                return false;
                
            });
            
			  

           
            
             $(document).on('click','#filterActive',function(){ 
             beerview = "ACTIVE";
             listBeers(beerview,'beer_status="ACTIVE"','beer_name'); 
             return false;
             }); 
             
              $(document).on('click','#filterInactive',function(){ 
              beerview = "INACTIVE";
             listBeers(beerview,'beer_status="INACTIVE"','beer_name');
              return false;
             });
              $(document).on('click','#filterBottle', function(){ 
              beerview = "BOTTLE";
             listBeers(beerview,'beer_status in ("BOTTLE-IN","BOTTLE-OUT")','beer_name');
              return false;
             });
              $(document).on('click','#filterDraft', function(){ 
              beerview = "DRAFT";
              listBeers(beerview,'beer_status in ("ACTIVE","INACTIVE")','beer_name');
              return false;
              });
              
               $(document).on('click','#filterAll', function(){ 
               beerview = "ALL";
              listBeers(beerview,'beer_status in ("ACTIVE","INACTIVE","BOTTLE-IN","BOTTLE-OUT")','beer_name'); 
              return false;
              });
        
            $("#submit").click(function(){
  
                var formData = $("#addBeerForm").serialize();
  
                $.ajax({
                    type: "POST",
                    url: "a_updatebeer.php",
                    cache: false,
                    data: formData,
                    dataType:"json",
                    success: onSuccessInsert,
                    error: onError
                });
  
                return false;
            });
            
            
            
            
             $(document).on("submit", '#beersearch', function() {
				 // var formData = $("#beersearch").serialize();
                var search = '';
                search = encodeURIComponent($("#searchbeer").val());
				//var request='';
				// request = 'https://api.untappd.com/v4/search/beer/?client_id=C40794B80F126BF02665235734EDE64B345F02BE&client_secret=0E9E64739DB498A434D439ED16175F27EF4F904A&q='+search+'';
				 
				 //request='http://api.brewerydb.com/v2/search?q=Coors&type=beer&key=fcedc8bd35bff69c87fd220225a585e3&name='+search+'&p=1';
				    $.ajax({
                    type: "GET",
                   // url: request,
                    url: "searchuntappd.php",
                    cache: false,
                   //data: formData,
                     data: {'search': search},
                    dataType:"json",
                    success: onBeerAvailable,
                    error: onErrors
                });
  
                return false;
			});  

            
           /*  $(document).on("submit", '#beersearch', function() {
				  var formData = $("#beersearch").serialize();
                var search = '';
                search = encodeURIComponent($("#searchbeer").val());
				var request='';
				 request = 'https://api.untappd.com/v4/search/beer/?client_id=C40794B80F126BF02665235734EDE64B345F02BE&client_secret=0E9E64739DB498A434D439ED16175F27EF4F904A&q='+search+'';
				 
				 //request='http://api.brewerydb.com/v2/search?q=Coors&type=beer&key=fcedc8bd35bff69c87fd220225a585e3&name='+search+'&p=1';
				    $.ajax({
                    type: "GET",
                    url: request,
                    cache: false,
                    data: formData,
                    dataType:"json",
                    success: onBeerAvailable,
                    error: onErrors
                });
  
                return false;
			}); */
            
            // POLLING FOR INTERNET CONNECTION ON/OFF
             var ifonline=' on';
			 (function poll() {
				 setTimeout(function() {
					 $.ajax({ url: "testinet.php", success: function(data) {
						 ifonline = data;
						 //alert(ifonline);
						 }, dataType: "text", complete: poll });
						 }, 30000);
						 })();
			
			/*function online() {
				var result;
				$.ajax({
					url:"testinet.php",
					async: false,  
					success:function(data) {
						result = data;
						}
						});
						return result;
						}    
			*/	
				
			  		
						        
              $(document).on('click','#search',  function(){
				 // var ifonline = online();
				 if(ifonline == " on"){ 
               // var formData = $("#beersearch").serialize();
                var search = '';
                search = encodeURIComponent($("#searchbeer").val());
				var request='';
				// request = 'https://api.untappd.com/v4/search/beer/?client_id=C40794B80F126BF02665235734EDE64B345F02BE&client_secret=0E9E64739DB498A434D439ED16175F27EF4F904A&q='+search+'';
				// request='http://api.brewerydb.com/v2/search?q=Coors&type=beer&key=fcedc8bd35bff69c87fd220225a585e3&name='+search+'&p=1';
				    $.ajax({
                    type: "GET",
                    url: "searchuntappd.php",
                    cache: false,
                   //data: formData,
                    data: {'search': search},
                    dataType:"json",
                    success: onBeerAvailable,
                    error: onErrors
                });
				}
                else{alert('SEARCH UNAVAILABLE. NO INTERNET CONNECTION. WAIT 30 SECONDS');$("#message_c").text('SEARCH UNAVAILABLE. NO INTERNET CONNECTION');}

				
                return false;
                            });
             
           function onErrorBeerSearch(data, status){/* alert(data.data);alert(status);*/}  
             
             
             $(document).on('click','#menubutton', function(){
				 var formData = $("#menusearch").serialize();
				    $.ajax({
                    type: "POST",
                    url: "getvenue.php",
                    cache: false,
                     data: formData,                    
                    //data: {menus : %7B%22Pour%20House%20Eats%22%7D},
                    dataType:"json",
                    success: onMenuAvailable,
                    error: onErrorsMenu
                });
  
                return false;
            });

 // SPECIALS MANAGEMENT            
              var formData = $("#specialsForm").serialize();
  
                $.ajax({
                    type: "POST",
                    url: "a_getspecials.php",
                    cache: false,
                    data: formData,
                    dataType:"json",
                    success: onSuccessSpecials,
                    error: onErrorSpecials
                });
  

             
             $(document).on('click','#upspecial', function(){
  
                var formData = $("#specialsForm").serialize();
  
                $.ajax({
                    type: "POST",
                    url: "a_updatespecials.php",
                    cache: false,
                    data: formData,
                    dataType:"json",
                    success: onSuccessSpecials,
                    error: onErrorSpecials
                });
  
                return false;
            });
            
 // SPECIALS BOARD MANAGEMENT   JMA         
              var formData = $("#specialsForm3").serialize();
  
                $.ajax({
                    type: "POST",
                    url: "a_getspecials3.php",
                    cache: false,
                    data: formData,
                    dataType:"json",
                    success: onSuccessSpecials3,
                    error: onErrorSpecials3
                });
  

             
             $(document).on('click','#upspecial3', function(){
  
                var formData = $("#specialsForm3").serialize();
  
                $.ajax({
                    type: "POST",
                    url: "a_updatespecials3.php",
                    cache: false,
                    data: formData,
                    dataType:"json",
                    success: onSuccessSpecials3,
                    error: onErrorSpecials3
                });
  
                return false;
            });
            

// AD MANAGEMENT

 		function loadadeditor(adid) { 
   
 			  
             var val=adid;
			  $.ajax({
                    type: "POST",
                    url: "a_updatead.php",
                    cache: false,
                   // async: false,  
                    data: {adlist : 'loadsingle',loadid : val},
                    dataType:"json",
                    success: onSuccessAdSort,
                    error: onErrorAdSort
                });
                   function onSuccessAdSort(data, status)
        {
        
         
         $("#ad-message").html('<h5 style="text-align:center;color:green;">'+msg+'</h5>').show('slow');
         $("#ad-id").val(data[0].id);
         $("#ad-title").val(data[0].ad_title);
         $("#ad-status").val(data[0].astatus);
         $("#ad-timing").val(data[0].atiming);
         $("#ad-order").val(data[0].aorder);
         $("#ad-type").val(data[0].atype);
          $("#splash-editor").val(data[0].ad_content);
          
          
         
            
         if(data[0].atype == "HTML"){
         $('input[type=radio]#ad-type-1').prop('checked',true).checkboxradio('refresh');
         $('input[type=radio]#ad-type-2').prop('checked',false).checkboxradio('refresh');
         $('input[type=radio]#ad-type-3').prop('checked',false).checkboxradio('refresh');
         }
         if(data[0].atype == "Video"){
         $('input[type=radio]#ad-type-2').prop('checked',true).checkboxradio('refresh');
         $('input[type=radio]#ad-type-1').prop('checked',false).checkboxradio('refresh');
         $('input[type=radio]#ad-type-3').prop('checked',false).checkboxradio('refresh');
         }
         if(data[0].atype == "Module"){
         $('input[type=radio]#ad-type-3').prop('checked',true).checkboxradio('refresh');
         $('input[type=radio]#ad-type-1').prop('checked',false).checkboxradio('refresh');
         $('input[type=radio]#ad-type-2').prop('checked',false).checkboxradio('refresh');

		 


         }
           
          
           
        }
           function onErrorAdSort(data, status)
        {
         
               }
                }  

            
        // SELECT AD FROM NAVIGATION TO LOAD EDITOR
            
           $(document).on('click','#sortable li', function(){
				$("#sortable li").css("border","0px solid #aaaaaa");  
				$(this).css("border","3px solid #aaaaaa"); 
			    msg="Ad Selected";
				currAdEdit = $(this).find('.li-ad-id').text();
				loadadeditor(currAdEdit); 
                return false;
            });
           
        //MOVE UP
        $(document).on('click','.moveup', function(e){
        var currInd=$(this).parents('li').index();
        var prevInd=$(this).parents('li').index()-1;
        var currId =$(this).parents('li').find('.li-ad-id').text();
        currAdEdit = currId;
        $("#sortable li").css("border","0px solid #aaaaaa");
        $("#sortable li:eq("+currInd+")").css("border","3px solid #aaaaaa");
        loadadeditor(currId); 
         var prevOrd = $(this).parents('li').prev().find('.li-order-id').text();
         $("#ad-order").val(zeroFill( (parseInt(prevOrd)-1) ,2));
         msg ="Ad has been repositioned";
         adupdate(); 
         var item=$(this).parents('li');
     
          $(item).insertBefore('#sortable li:eq('+prevInd+')').trigger('create');
         // $(item).remove();
         $('#sortable').listview('refresh');
		 orderupdate();
		
         return false;
        });
        
        
        
        // MOVE DOWN 
        $(document).on('click','.movedown', function(e){
        var currInd=$(this).parents('li').index();
        var nextInd=$(this).parents('li').index()+1;
        var currId =$(this).parents('li').find('.li-ad-id').text();
        currAdEdit = currId;
        $("#sortable li").css("border","0px solid #aaaaaa");
        $("#sortable li:eq("+currInd+")").css("border","3px solid #aaaaaa");
         loadadeditor(currId); 
         var nextOrd = $(this).parents('li').next().find('.li-order-id').text();
          $("#ad-order").val(zeroFill( (parseInt(nextOrd)+1) ,2));
          msg ="Ad has been repositioned";
          adupdate(); 
         var item=$(this).parents('li');
        
         //alert($(item).html());
         $(item).insertAfter('#sortable li:eq('+nextInd+')').trigger('create');
         // $(item).remove();
         $('#sortable').listview('refresh');
		 orderupdate();
		 
         return false;
        });
         
         
         // ORDER UPDATE
        function orderupdate(){
        var listarray={};
        var i = '';
        var listItems = $("#sortable li");
		  listItems.each(function(idx, li) {
			 var ad = $(li);
		  if(idx > 0)ad.find('.li-order-id').text(zeroFill(idx,2));
		 })		
		$("#sortable li").each(function () {
        var order=i;
        var id=$(this).find('.li-ad-id').text();
        if(order>0)listarray[id] = zeroFill(order,2);
        i++; 
        });
		
        
       		 $.ajax({
                    type: "POST",
                    url: "a_test.php",
                    cache: false,
                    aysnc: false,
                    data: {orders:listarray},
                    dataType:"text",
                    success: onSuccessOrder,
                    error: onErrorOrder
                }); 
		
				function onSuccessOrder(data, status){
				loadads();
				
					//alert(data);
				}
				function onErrorOrder(data, status){
					 alert(data);
				}
				
				//return false;
				}
        
        
        
        
          
			// LOAD ADS  - LOAD EDITOR (FIRST IN DATABASE ORDER RETURNED)  AND AD NAVIGATION LISTVIEW 
           function loadads() {  
            $.ajax({
                    type: "POST",
                    url: "a_updatead.php",
                    cache: false,
                    // async: false,
                    data: {adlist : 'all'},
                    dataType:"json",
                    success: onSuccessAdLoad,
                    error: onErrorAdLoad
                });
				}
				
				 loadads();
				  currAdEdit='1';
				  //currAdEdit = $('#sortable li:eq(1)').find('.li-ad-id').text();
				 //alert(currAdEdit);
				//$('.li-ad-id:contains("'+currAdEdit+'")').parents('li').css("border","3px solid #aaaaaa");
			
			
			   loadadeditor(currAdEdit); 
			 
			 function onSuccessAdLoad(data, status) {
   
       /*  $("#ad-message").html('<h5 style="text-align:center;">'+msg+'</h5>').show('slow');
         $("#ad-id").val(data[0].id);
         $("#ad-title").val(data[0].ad_title);
         $("#ad-status").val(data[0].astatus);
         $("#ad-timing").val(data[0].atiming);
         $("#ad-order").val(data[0].aorder);
         // $("#splash-editor").text(data[0].ad_content);
          $("#splash-editor").val(data[0].ad_content);*/
          //currAdEdit=data[0].id;
           
           
          var selectlist = '<select data-inline="false" name="ad-list" id="ad-list">';
          var navlist ='<li data-role="list-divider" data-theme="b"><span class="li-order-id" style="margin-left:0px;">Order</span><span style="margin-left:15px;">Description</span><span style="margin-left:5px;float:right;">Controls</span></li>';  
          Object.keys(data).forEach(function(key) {
                             selectlist += '<option id="select_id'+data[key].id+'" value="'+data[key].id+'">'+data[key].id+' - '+data[key].ad_title+'</option>';
              if(data[key].astatus == "ON"){navlist +='<li data-theme="e">';}else{navlist +='<li data-theme="f">';}
              navlist += '<div class="container_16"><div class="grid_1 ordering" style="height:45px"><h6 class="li-order-id">'+data[key].aorder+'</h6></div><div class="grid_7 addetail" style="height:45px">';
              if(data[key].astatus == "ON"){navlist +='<h3 style="color:green;">';}else{navlist +='<h3 style="color:red;">';}
              
              navlist += data[key].ad_title+'</h3><p>Ad ID: <span class="li-ad-id">'+data[key].id+'</span>   Timing: <span class="li-ad-timing">'+data[key].atiming+'</span> seconds</p></div><div class="adcontrols "><div class="timingcontrol" style=""><input type="text" name="adtiming" id="adtiming" value="'+data[key].atiming+'" style="display:inline;max-width:35px;max-height:15px;" maxlength="3"/></div><div class="controlgroup" data-role="controlgroup" data-type="horizontal" data-mini="true"><a class="adtoggle" href="#" data-role="button"  data-type="horizontal" data-inline="true" data-iconpos="notext" data-icon="power">'+data[key].astatus+'</a><a class="moveup" href="#" data-role="button"  data-type="horizontal" data-inline="true" data-iconpos="notext" data-icon="arrow-u" data-theme="d">Up</a><a class="movedown" href="#" data-role="button" data-type="horizontal" data-inline="true" data-iconpos="notext" data-icon="arrow-d" data-theme="d">Down</a></div></div></div></li>';
 /*  <label for="ad-status" style="font-size:80%;font-variant:small-caps;color:#333;">Length</label>*/             
			  });
          
          selectlist += '</select>';

          $('#ad-select').append(selectlist);
          $('#ad-select').trigger('create');
          $('#sortable').html(navlist);
           $('#sortable').trigger('create');
          // $('.li-ad-id:contains("'+currAdEdit+'")').parents('li').css("border","3px solid #aaaaaa"); 
        
          $('#sortable').listview('refresh');
                    
          }        
			
			 function onErrorAdLoad(data, status){}
			// END LOAD ADS
			
			
			// SELECT LIST LOAD SINGLE AD
            $(document).on('change', '#ad-list', function(){ 
	          var val = $(this).val();
			  $.ajax({
                    type: "POST",
                    url: "a_updatead.php",
                    cache: false,
                    data: {adlist : 'loadsingle',loadid : val},
                    dataType:"json",
                    success: onSuccessAd,
                    error: onErrorAd
                });
 
            });
            
             function onSuccessAd(data, status)
			 {
         $("#ad-message").html('<h5 style="text-align:center;">Select an Ad to Edit</h5>').show('slow');
         $("#ad-id").val(data[0].id);
         $("#ad-title").val(data[0].ad_title);
         $("#ad-status").val(data[0].astatus);
         $("#ad-timing").val(data[0].atiming);
         $("#ad-order").val(data[0].aorder);
         $("#ad-type").val(data[0].atype);
         $("#splash-editor").val(data[0].ad_content);
         
         
             
          if(data[0].atype == "HTML"){
         $('input[type=radio]#ad-type-1').prop('checked',true).checkboxradio('refresh');
         $('input[type=radio]#ad-type-2').prop('checked',false).checkboxradio('refresh');
         $('input[type=radio]#ad-type-3').prop('checked',false).checkboxradio('refresh');
         }
         if(data[0].atype == "Video"){
         $('input[type=radio]#ad-type-2').prop('checked',true).checkboxradio('refresh');
         $('input[type=radio]#ad-type-1').prop('checked',false).checkboxradio('refresh');
         $('input[type=radio]#ad-type-3').prop('checked',false).checkboxradio('refresh');
         }
         if(data[0].atype == "Module"){
         $('input[type=radio]#ad-type-3').prop('checked',true).checkboxradio('refresh');
         $('input[type=radio]#ad-type-1').prop('checked',false).checkboxradio('refresh');
         $('input[type=radio]#ad-type-2').prop('checked',false).checkboxradio('refresh');

         }



           
             
           
        }
           	function onErrorAd(data, status)
		   	{
         
               }
		   	// END SELECT LIST JMA
            
            
            // EDITOR AD UPDATE ON BUTTON CLICK  (CALLS adupdate function ONLY)
            $(document).on('click','#adupdate',  function(){	
				adupdate();  
                return false;
            });
            
            // EDITOR AD UPDATE ON BUTTON CLICK  (CALLS adupdate function ONLY)
           
            $(document).on('change','#adtiming', function(e){
           // alert('now');
            
            
            var currInd=$(this).parents('li').index();
			var nextInd=$(this).parents('li').index()+1;
			var currId =$(this).parents('li').find('.li-ad-id').html();
         
        
        
         currAdEdit = currId;
         var adtiming = $(this).val();
        //$("#sortable li").css("border","0px solid #aaaaaa");
        //$("#sortable li:eq("+currInd+")").css("border","3px solid #aaaaaa");
         
        // loadadeditor(currId); 
         // var adstatus;
        /*  if($(this).attr('title') == 'ON'){
          $("#ad-status").val('OFF');$(this).attr('title','OFF');adstatus='OFF';$(this).parents('li').buttonMarkup({theme: 'f'});changestatus();
           
          }
          else{
          $("#ad-status").val('ON');$(this).attr('title','ON');adstatus='ON';$(this).parents('li').buttonMarkup({theme: 'e'});changestatus();
           
          }*/
          changetiming();
          
         msg ="Ad Timing has been changed to "+$(this).val()+" seconds";
          
            
          function changetiming() { 
		   $.ajax({
                    type: "POST",
                    url: "a_updatead_timing.php",
                    cache: false,
                     data: {'ad-id': currId, 'ad-timing': adtiming},
                     // async: false,
                    dataType:"text", 
                    success: onSuccessAdTiming,
                    error: onErrorAdTiming
                });	
		    
		   		  function onErrorAdTiming(data, status)
		   		  {  alert(status+'-'+data); }
        	function onSuccessAdTiming(data, status)
			{ loadadeditor(currId);
			  orderupdate() }

		}	 

         return false;

            
            
            });
           
                       
            
            
              // TOGGLE AD ON/OFF
        $(document).on('click','.adtoggle', function(e){
        var currInd=$(this).parents('li').index();
        var nextInd=$(this).parents('li').index()+1;
        var currId =$(this).parents('li').find('.li-ad-id').html();
         
        
        
         currAdEdit = currId;
        $("#sortable li").css("border","0px solid #aaaaaa");
        $("#sortable li:eq("+currInd+")").css("border","3px solid #aaaaaa");
         
        // loadadeditor(currId); 
          var adstatus;
          if($(this).attr('title') == 'ON'){
          $("#ad-status").val('OFF');$(this).attr('title','OFF');adstatus='OFF';$(this).parents('li').buttonMarkup({theme: 'f'});changestatus();
           
          }
          else{
          $("#ad-status").val('ON');$(this).attr('title','ON');adstatus='ON';$(this).parents('li').buttonMarkup({theme: 'e'});changestatus();
           
          }
          msg ="Ad Status has been changed to "+adstatus+"";
          
            
           function changestatus() { 
		   $.ajax({
                    type: "POST",
                    url: "a_updatead_status.php",
                    cache: false,
                     data: {'ad-id': currId, 'ad-status': adstatus},
                     // async: false,
                    dataType:"text", 
                    success: onSuccessAdStatus,
                    error: onErrorAdStatus
                });	
		    
		   		  function onErrorAdStatus(data, status)
		   		  {  alert(status+'-'+data); }
        	function onSuccessAdStatus(data, status)
			{ loadadeditor(currId);
			  orderupdate() }

		}	

         return false;
        });        
            
            
          
            

			// AD UPDATE  PRIMARY ROUTING
			function adupdate(){
			  			 
			 for ( instance in CKEDITOR.instances )CKEDITOR.instances[instance].updateElement();
			 
                 var formData = $("#adForm").serialize();
				  
                $.ajax({
                    type: "POST",
                    url: "a_updatead.php",
                    cache: false,
                     data: formData,
                      async: false,
                    dataType:"json",
                    success: onSuccessAdUpdate,
                    error: onErrorAdUpdate
                });	
			}


           // Success Subroutine (  CALLS laodads() and loadadeditor()  )
		     function onSuccessAdUpdate(data, status)
        {
         $("#ad-message").html('<h5 style="text-align:center;color:green;">Your Ad has been Updated</h5>').show('slow');
         $("#ad-id").val(data[0].id);
         $("#ad-title").val(data[0].ad_title);
         $("#ad-status").val(data[0].astatus);
         $("#ad-timing").val(data[0].atiming);
         $("#ad-order").val(data[0].aorder);
         $("#ad-type").val(data[0].atype);
         $("#splash-editor").val(data[0].ad_content);
         
               
         if(data[0].atype == "HTML"){
         $('input[type=radio]#ad-type-1').prop('checked',true).checkboxradio('refresh');
         $('input[type=radio]#ad-type-2').prop('checked',false).checkboxradio('refresh');
         $('input[type=radio]#ad-type-3').prop('checked',false).checkboxradio('refresh');
         }
         if(data[0].atype == "Video"){
         $('input[type=radio]#ad-type-2').prop('checked',true).checkboxradio('refresh');
         $('input[type=radio]#ad-type-1').prop('checked',false).checkboxradio('refresh');
         $('input[type=radio]#ad-type-3').prop('checked',false).checkboxradio('refresh');
         }
         if(data[0].atype == "Module"){
         $('input[type=radio]#ad-type-3').prop('checked',true).checkboxradio('refresh');
         $('input[type=radio]#ad-type-1').prop('checked',false).checkboxradio('refresh');
         $('input[type=radio]#ad-type-2').prop('checked',false).checkboxradio('refresh');

         }
          // loadadeditor(data[0].id);  
          CurrAdEdit=data[0].id;
          //alert(data[0].id);
          loadads();
          
           
        }
           function onErrorAdUpdate(data, status)
        {
         
               }
               
               
               
               

		// END AD UPDATE
		
		
		// MAIN ADMIN PANEL SELECTIONS
            
            $(document).on('click','#admin-specials', function(){
  
                $('#admin-wrapper').hide();
				$('#inventory').hide();
				$('#specialsForm').show();
				$('#specialsForm3').hide();
				$('#splash-admin').hide();
                return false;
            });
            
             $(document).on('click','#admin-specials3', function(){
  
                $('#admin-wrapper').hide();
				$('#inventory').hide();
				$('#specialsForm').hide();
				$('#specialsForm3').show();
				$('#splash-admin').hide();
                return false;
            });

            
            $(document).on('click','#admin-beers', function(){
  
                $('#admin-wrapper').show();
				$('#inventory').show();
				$('#specialsForm').hide();
				$('#specialsForm3').hide();
				$('#splash-admin').hide();
                return false;
            });
            
            $(document).on('click','#admin-pages', function(){
  
                $('#admin-wrapper').hide();
				$('#inventory').hide();
				$('#specialsForm').hide();
				$('#specialsForm3').hide();
				$('#splash-admin').show();
                return false;
            });

			// TESTING
			$('#admin-wrapper').hide();
				$('#inventory').hide();
				$('#specialsForm').hide();
				$('#specialsForm3').hide();
				$('#splash-admin').show();
				
				function zeroFill( number, width )
				{
					width -= number.toString().length;
					if ( width > 0 )
					{
						return new Array( width + (/\./.test( number ) ? 2 : 1) ).join( '0' ) + number;
						}
						return number + ""; // always return a string
						}
				
				
							
				
                       
        });
    </script>
  
    <!-- call ajax page -->
    <div data-role="page" id="main" data-theme="d"  >
        <div data-role="header"  data-theme="b">
             <div data-role="navbar"   data-inset="false" >
				<ul>
				 <li><a data-iconpos="left" data-icon="beer" data-ajax="true" data-rel="back" id="admin-beers">Beers</a></li> 				<li><a data-iconpos="left" data-icon="dollar" data-ajax="true" data-rel="back" id="admin-specials">Primary Ad</a></li>
				<li><a data-iconpos="left" data-icon="dollar" data-ajax="true" data-rel="back" id="admin-specials3">Ad Blocks</a></li>
				<li><a data-iconpos="left" data-icon="page" data-ajax="true" data-rel="back" id="admin-pages">Ad Inventory</a></li> 
				<!--<li><a data-iconpos="left" data-icon="power" data-ajax="false" href="a_beerlogout.php">Logout</a></li>-->
				 
				</ul> 
		 </div>

                      </div>
  
        <div data-role="content" >
        <div id="diag"></div>
        <div id="admin-wrapper" style="display:inline-block;float:left;border:1px solid #ccc;">
        <div data-role="navbar" data-theme="b" ><ul><li><a href="#"><h3 style="text-shadow:none;margin:0px;">Beer Editor</h3></a></li></ul></div>
         
        <div id="msg"></div>
        <!-- <form id="menusearch">
                <div data-role="fieldcontain"  style="padding:5px;">
                    <label for="id" >Menupull</label>
                    <input maxlength="40" type="text" name="menus" id="searchmenu" value=""  />
  
                </div>
                <button data-theme="b" id="menubutton" type="submit">Menu</button>
            </form> -->
        
        <form id="beersearch" style="margin-left:15px;margin-right:15px;">
                 
                    <!--<label for="id">Beer to Search</label>-->
                    <input maxlength="40" type="text" name="searchbeer" id="searchbeer" value=""/>
                
	             <button data-theme="b" data-role="button"  data-inline="false" data-mini="false" id="search" type="submit" style="float:left;">Search Beer</button>   
                   <div   id="message_c" style="color:#603913; font-size:12px;font-weight:bold;margin-left:10px;padding:5px;">Note: Current information for searched beer in shaded text</div>               
            </form>
			       
            <form id="addBeerForm" >

               <button data-theme="b" id="submit" type="submit" data-role="button" data-inline="false" data-mini="false" style="margin-left:15px;">Add / Update Beer</button> 
                
                 <hr style="color:#ccc;width:100%;margin-top:0px;margin-bottom:0px;clear:both;"/> 
                <div data-role="fieldcontain"  data-inset="true" style="padding:5px;max-width:1550px;margin-top:0px;margin-bottom:0px;">

                <div id="beer-details" style="padding-left:15px;">
                
                <div style="text-align:center;clear:both;margin-top:10px;">
					<img id="beer_label" src="../images/logo_8st.png" style="max-width:125px;"/>
					<img id="brewery_label" src="../images/logo_8st.png"  style="max-width:125px;"/>
				</div>
                   
                   
                    <label for="id" >ID</label>
                    <input maxlength="40" type="text" name="id" id="id" value="" readonly="readonly" class="readonly" />
                     <div class="current" id="id_c" >Existing ID</div> 
                     
                    <label for="beer_name">Name</label>
                    <input maxlength="80"  type="text" name="beer_name" id="beer_name" value=""  />
                    <div class="current" id="beer_name_c" >Beer Name</div> 
                     
                    <label for="beer_type" >Type</label>
                    <input maxlength="40"  type="text" name="beer_type" id="beer_type" value=""  readonly="readonly" class="readonly"/>
                    <div class="current" id="beer_type_c" >Beer Type</div>
                    
                    <label for="beer_desc" >Description</label>
                    <textarea cols="40"  rows="10" name="beer_desc" id="beer_desc" value="" style="height:200px;" ></textarea>
                    <div class="current" id="beer_desc_c" >Description</div>
                                        
                    <label for="beer_abv" >ABV</label> 
                    <input maxlength="40"  type="text" name="beer_abv" id="beer_abv" value=""  />
                    <div class="current" id="beer_abv_c" >ABV</div> 
                    
                    <label for="beer_ibu" >IBU</label> 
                    <input maxlength="80"  type="text" name="beer_ibu" id="beer_ibu" value=""  />
                    <div class="current" id="beer_ibu_c" >IBU</div>
                    
                    <label for="brewery_id" >Brewery ID</label> 
                    <input maxlength="80"  type="text" name="brewery_id" id="brewery_id" value=""  readonly="readonly" class="readonly"/>
                    <div class="current" id="brewery_id_c" >Brewery ID</div>
                    
                    <label for="brewery_name" >Brewery Name</label> 
                    <input maxlength="80"  type="text" name="brewery_name" id="brewery_name" value=""  />
                    <div class="current" id="brewery_name_c" >Brewery Name</div>
                    
                    <label for="brewery_city" >Brewery City</label> 
                    <input maxlength="80"  type="text" name="brewery_city" id="brewery_city" value=""  />
                    <div class="current" id="brewery_city_c" >Brewery City</div>
                    
                    <label for="brewery_url" >Brewery URL</label> 
                    <input maxlength="80"  type="text" name="brewery_url" id="brewery_url" value=""  />
                    <div class="current" id="brewery_url_c" >Brewery URL</div>
                    
                    <label for="beer_label_url" >Beer Image URL</label> 
                    <input maxlength="80"  type="text" name="beer_label_url" id="beer_label_url" value=""  />
                    <div class="current" id="beer_label_url_c" >Image URL</div>
					
					<label for="brewery_label_url" >Brewery Image URL</label> 
                    <input maxlength="80"  type="text" name="brewery_label_url" id="brewery_label_url" value=""  />
                    <div class="current" id="brewery_label_url_c" >Image URL</div>
					
                     <label for="beer_status" >Beer Status</label> 
                    <input maxlength="80"  type="text" name="beer_status" id="beer_status" value="ACTIVE"  />
                    <div class="current" id="beer_status_c" >Image URL</div>
                    
                     <label for="beer_glass_price" >Glass Price</label> 
                    <input maxlength="80"  type="text" name="beer_glass_price" id="beer_glass_price" value="4.50"  />
                    <div class="current" id="beer_glass_price_c" >Glass Price</div>

					 <label for="beer_growler_price" >Growler Price</label> 
                    <input maxlength="80"  type="text" name="beer_growler_price" id="beer_growler_price" value="10.95"  />
                    <div class="current" id="beer_growler_price_c" >Growler Price</div>
					
					 <label for="beer_special" >Beer Special</label> 
                    <input maxlength="80"  type="text" name="beer_special" id="beer_special" value="OFF"  />
                    <div class="current" id="beer_special_c" >Beer Special</div>

                    
                </div>
                </div>
                
            </form>
            
        
        </div>
        
        <div id="inventory" style="display:inline-block;float:left;"> 
        <!--<h5 id="beers-listview-infoline" style="margin:0px;padding-top:5px;padding-left:25px;">Beer Count</h5>-->
       
       <!--  <div data-role="controlgroup"  data-type="horizontal"> 
        <a style="margin-bottom:25px;" href="#" data-role="button" data-inline="true"  data-mini="true" data-theme="e" id="filterActive">Active</a>
        <a  style="margin-bottom:25px;" href="#" data-role="button" data-inline="true"  data-mini="true"  data-theme="c" id="filterInactive">Inactive</a>
         <a  style="margin-bottom:25px;" href="#" data-role="button" data-inline="true"   data-mini="true"  data-mini="true" data-theme="a" id="filterDraft">All Drafts</a>
        <a  style="margin-bottom:25px;" href="#" data-role="button" data-inline="true"  data-mini="true"  data-theme="a" id="filterBottle">Bottle</a>
       
        <a  style="margin-bottom:25px;" href="#" data-role="button" data-inline="true" data-mini="true" data-theme="a" id="filterAll">All Beers</a>
        </div>-->
        
       <!--<div data-role="navbar" data-theme="b" ><ul><li><a href="#"><h3 style="text-shadow:none;margin:0px;">Beer Inventory</h3></a></li></ul></div>-->
        
         <div data-role="navbar"  data-type="horizontal"> 
         <ul>
        <li><a style="margin-bottom:0px;" href="#" data-role="button" data-inline="true"  data-mini="true" data-theme="e" id="filterActive">Active</a></li>
        <li><a  style="margin-bottom:0px;" href="#" data-role="button" data-inline="true"  data-mini="true"  data-theme="c" id="filterInactive">Inactive</a></li>
         <li><a  style="margin-bottom:0px;" href="#" data-role="button" data-inline="true"   data-mini="true"  data-mini="true" data-theme="b" id="filterDraft">All</a></li>
        <!--<li><a  style="margin-bottom:0px;" href="#" data-role="button" data-inline="true"  data-mini="true"  data-theme="a" id="filterBottle">Bottles</a></li>
       
        <li><a  style="margin-bottom:0px;" href="#" data-role="button" data-inline="true" data-mini="true" data-theme="a" id="filterAll">All Beers</a></li>-->
         </ul>
        </div>
        
         <div data-role="navbar"  > 
         <ul>

         <li>
	          <a href="#" id="beers-listview-infoline" style="margin:0px;padding-top:5px;padding-left:25px;text-align:left;clear:both;margin-bottom:15px;font-size:12px;">Beer Count</a>
         </li>
         </ul></div>
        
        
        <ul id="beers-listview-inventory" data-role="listview" data-theme="b" data-inset="true" data-filter="true" >
        <li>
        <h3>8th Street Ale Haus Beer Selection</h3>
        
        </li>
        </ul> 
        </div>
        
        
        
                 <!-- Update Specials Form -->
        <form id="specialsForm">
			<div data-role="navbar" data-theme="a" ><ul><li><a href="#"><h3 style="text-shadow:none;margin:0px;">Manage Primary Ad</h3></a></li></ul></div>
                <div data-role="fieldcontain"  style="padding:15px;">
                <!-- Special 1 -->
                    <label for="special1" style="font-weight:bold;font-variant:small-caps;">Item 1 Title</label>
                    <input maxlength="40" type="text" name="special1" id="special1" value=""  />
                    
                    <label for="special1h" style="font-size:80%;font-variant:small-caps;">Heading</label>
                    <input maxlength="255"  style="font-size:80%;" type="text" name="special1h" id="special1h" value=""  />
                     
                    <label for="special1s" style="font-size:80%;font-variant:small-caps;">Sub-Heading</label>
                    <input maxlength="255"  style="font-size:80%;" type="text" name="special1s" id="special1s" value=""  />
                    
                    <label for="special1d" style="font-size:80%;font-variant:small-caps;">Details</label>
                    <input maxlength="255"  style="font-size:80%;" type="text" name="special1d" id="special1d" value=""  />
                     
                     <label for="special2" style="font-weight:bold;font-variant:small-caps;">Item 2 Title</label>
                    <input maxlength="40" type="text" name="special2" id="special2" value=""  />
                    
                    <label for="special2h" style="font-size:80%;font-variant:small-caps;">Heading</label>
                    <input maxlength="255"  style="font-size:80%;" type="text" name="special2h" id="special2h" value=""  />
                     
                    <label for="special2s" style="font-size:80%;font-variant:small-caps;">Sub-Heading</label>
                    <input maxlength="255"  style="font-size:80%;" type="text" name="special2s" id="special2s" value=""  />
                    
                    <label for="special2d" style="font-size:80%;font-variant:small-caps;">Details</label>
                    <input maxlength="255"  style="font-size:80%;" type="text" name="special2d" id="special2d" value=""  />
                    
                     <label for="special3" style="font-weight:bold;font-variant:small-caps;">Item 3 Title</label>
                    <input maxlength="40" type="text" name="special3" id="special3" value=""  />
                    
                    <label for="special3h" style="font-size:80%;font-variant:small-caps;">Heading</label>
                    <input maxlength="255"  style="font-size:80%;" type="text" name="special3h" id="special3h" value=""  />
                     
                    <label for="special3s" style="font-size:80%;font-variant:small-caps;">Sub-Heading</label>
                    <input maxlength="255"  style="font-size:80%;" type="text" name="special3s" id="special3s" value=""  />
                    
                    <label for="special3d" style="font-size:80%;font-variant:small-caps;">Details</label>
                    <input maxlength="255"  style="font-size:80%;" type="text" name="special3d" id="special3d" value=""  />
                    
                     <label for="special4" style="font-weight:bold;font-variant:small-caps;">Item 4 Title</label>
                    <input maxlength="40" type="text" name="special4" id="special4" value=""  />
                    
                    <label for="special4h" style="font-size:80%;font-variant:small-caps;">Heading</label>
                    <input maxlength="255"  style="font-size:80%;" type="text" name="special4h" id="special4h" value=""  />
                     
                    <label for="special4s" style="font-size:80%;font-variant:small-caps;">Sub-Heading</label>
                    <input maxlength="255"  style="font-size:80%;" type="text" name="special4s" id="special4s" value=""  />
                    
                    <label for="special4d" style="font-size:80%;font-variant:small-caps;">Details</label>
                    <input maxlength="255"  style="font-size:80%;" type="text" name="special4d" id="special4d" value=""  />

					 <label for="marqueetext" style="font-weight:bold;font-variant:small-caps;">Marquee Text</label>
                    <input maxlength="255" type="text" name="marqueetext" id="marqueetext" value=""  />



                    
                </div>
                <button data-theme="b" id="upspecial" type="submit">Update Specials</button>
            </form>
            
                           <!-- Update Specials Form -->
        <form id="specialsForm3">
			<div data-role="navbar" data-theme="a" ><ul><li><a href="#"><h3 style="text-shadow:none;margin:0px;">Manage Ad Blocks </h3></a></li></ul></div>
                <div data-role="fieldcontain"  style="padding:15px;">
                <!-- Special 1 -->
                    <label for="3special1" style="font-weight:bold;font-variant:small-caps;">Item 1 Title</label>
                    <input maxlength="40" type="text" name="3special1" id="3special1" value=""  />
                    
                    <label for="3special1h" style="font-size:80%;font-variant:small-caps;">Heading</label>
                    <input maxlength="255"  style="font-size:80%;" type="text" name="3special1h" id="3special1h" value=""  />
                     
                    <label for="3special1s" style="font-size:80%;font-variant:small-caps;">Sub-Heading</label>
                    <input maxlength="255"  style="font-size:80%;" type="text" name="3special1s" id="3special1s" value=""  />
                    
                    <label for="3special1d" style="font-size:80%;font-variant:small-caps;">Details</label>
                    <input maxlength="255"  style="font-size:80%;" type="text" name="3special1d" id="3special1d" value=""  />
                     
                     <label for="3special2" style="font-weight:bold;font-variant:small-caps;">Item 2 Title</label>
                    <input maxlength="40" type="text" name="3special2" id="3special2" value=""  />
                    
                    <label for="3special2h" style="font-size:80%;font-variant:small-caps;">Heading</label>
                    <input maxlength="255"  style="font-size:80%;" type="text" name="3special2h" id="3special2h" value=""  />
                     
                    <label for="3special2s" style="font-size:80%;font-variant:small-caps;">Sub-Heading</label>
                    <input maxlength="255"  style="font-size:80%;" type="text" name="3special2s" id="3special2s" value=""  />
                    
                    <label for="3special2d" style="font-size:80%;font-variant:small-caps;">Details</label>
                    <input maxlength="255"  style="font-size:80%;" type="text" name="3special2d" id="3special2d" value=""  />
                    
                     <label for="3special3" style="font-weight:bold;font-variant:small-caps;">Item 3 Title</label>
                    <input maxlength="40" type="text" name="3special3" id="3special3" value=""  />
                    
                    <label for="3special3h" style="font-size:80%;font-variant:small-caps;">Heading</label>
                    <input maxlength="255"  style="font-size:80%;" type="text" name="3special3h" id="3special3h" value=""  />
                     
                    <label for="3special3s" style="font-size:80%;font-variant:small-caps;">Sub-Heading</label>
                    <input maxlength="255"  style="font-size:80%;" type="text" name="3special3s" id="3special3s" value=""  />
                    
                    <label for="3special3d" style="font-size:80%;font-variant:small-caps;">Details</label>
                    <input maxlength="255"  style="font-size:80%;" type="text" name="3special3d" id="3special3d" value=""  />
                    
                     <label for="3special4" style="font-weight:bold;font-variant:small-caps;">Item 4 Title</label>
                    <input maxlength="40" type="text" name="3special4" id="3special4" value=""  />
                    
                    <label for="3special4h" style="font-size:80%;font-variant:small-caps;">Heading</label>
                    <input maxlength="255"  style="font-size:80%;" type="text" name="3special4h" id="3special4h" value=""  />
                     
                    <label for="3special4s" style="font-size:80%;font-variant:small-caps;">Sub-Heading</label>
                    <input maxlength="255"  style="font-size:80%;" type="text" name="3special4s" id="3special4s" value=""  />
                    
                    <label for="3special4d" style="font-size:80%;font-variant:small-caps;">Details</label>
                    <input maxlength="255"  style="font-size:80%;" type="text" name="3special4d" id="3special4d" value=""  />
                    
                     <label for="3special5" style="font-weight:bold;font-variant:small-caps;">Item 5 Title</label>
                    <input maxlength="40" type="text" name="3special5" id="3special5" value=""  />
                    
                    <label for="3special5h" style="font-size:80%;font-variant:small-caps;">Heading</label>
                    <input maxlength="255"  style="font-size:80%;" type="text" name="3special5h" id="3special5h" value=""  />
                     
                    <label for="3special5s" style="font-size:80%;font-variant:small-caps;">Sub-Heading</label>
                    <input maxlength="255"  style="font-size:80%;" type="text" name="3special5s" id="3special5s" value=""  />
                    
                    <label for="3special5d" style="font-size:80%;font-variant:small-caps;">Details</label>
                    <input maxlength="255"  style="font-size:80%;" type="text" name="3special5d" id="3special5d" value=""  />
                     
                     <label for="3special6" style="font-weight:bold;font-variant:small-caps;">Item 6 Title</label>
                    <input maxlength="40" type="text" name="3special6" id="3special6" value=""  />
                    
                    <label for="3special6h" style="font-size:80%;font-variant:small-caps;">Heading</label>
                    <input maxlength="255"  style="font-size:80%;" type="text" name="3special6h" id="3special6h" value=""  />
                     
                    <label for="3special6s" style="font-size:80%;font-variant:small-caps;">Sub-Heading</label>
                    <input maxlength="255"  style="font-size:80%;" type="text" name="3special6s" id="3special6s" value=""  />
                    
                    <label for="3special6d" style="font-size:80%;font-variant:small-caps;">Details</label>
                    <input maxlength="255"  style="font-size:80%;" type="text" name="3special6d" id="3special6d" value=""  />


					 <label for="3marqueetext" style="font-weight:bold;font-variant:small-caps;">Marquee Text</label>
                    <input maxlength="255" type="text" name="3marqueetext" id="3marqueetext" value=""  />



                    
                </div>
                <button data-theme="b" id="upspecial3" type="submit">Update Specials Board</button>
            </form>


        <div id='splash-admin'>
        <div data-role="navbar" data-theme="a" ><ul><li><a href="#"><h3 style="text-shadow:none;margin:0px;">Manage Display Ads</h3></a></li></ul></div>
		
		<div id="ad-editor-block">
		 		  
		<form id="adForm" data-theme="b" data-inset="true" style="padding:5px;" >
		<p id="ad-message">Status Update</p>
		<!--<p id="ad-select">
			 			</p>-->
        <p>
        
           <label for="ad-id" style="font-size:80%;font-variant:small-caps;">Ad ID (Read Only)</label>
             <input maxlength="80"  style="font-size:80%;color:#00ff00;" type="text" name="ad-id" id="ad-id" value="Ad ID" />
            <label for="ad-title" style="font-size:80%;font-variant:small-caps;">Ad Title</label>
             <input maxlength="80"  style="font-size:80%;" type="text" name="ad-title" id="ad-title" value="Ad Title"  />
        </p>
             <div id="ad-status-block" >
             <label for="ad-status" style="font-size:80%;font-variant:small-caps;">Ad Status</label>
             <input maxlength="3"  style="font-size:80%;" type="text" name="ad-status" id="ad-status" value="Ad Status"  />
             </div>
             <div  id="ad-timing-block" >
             <label for="ad-timing" style="font-size:80%;font-variant:small-caps;">Ad Timing</label>
             <input maxlength="10"  style="font-size:80%;" type="text" name="ad-timing" id="ad-timing" value="Ad Timing"  />
              </div>
             <div  id="ad-order-block" >
             <label for="ad-order" style="font-size:80%;font-variant:small-caps;">Ad Order</label>
             <input maxlength="10"  style="font-size:80%;" type="text" name="ad-order" id="ad-order" value="Ad Order"  />
             </div>
            <!-- <div  id="ad-type-block" >
             <label for="ad-type" style="font-size:80%;font-variant:small-caps;">Ad Type</label>
             <input maxlength="10"  style="font-size:80%;" type="text" name="ad-type" id="ad-type" value="Ad Type"  />
             </div>-->
             
            <div  id="ad-type-block" >
              <fieldset data-role="controlgroup" data-type="horizontal" id="ad-type-control">
    	    <input type="radio" name="ad-type" id="ad-type-1" value="HTML"  checked="checked" /> 
         	<label for="ad-type-1">HTML</label>

         	<input type="radio" name="ad-type" id="ad-type-2" value="Video"  /> 
         	<label for="ad-type-2">Video</label>

         	<input type="radio" name="ad-type" id="ad-type-3" value="Module"  />
         	<label for="ad-type-3">Module</label>
         	
		 	</fieldset>             
		 	
		 	</div> 
		 	
		 	<div id="ad-submit-block">
             <input data-role="button" data-theme="d" type="submit" id="adupdate" value="Add/Update Ad"/>
             </div>

        <textarea class="splash-editor" id="splash-editor" name="splash-editor">&lt;p&gt;Initial value.&lt;/p&gt;</textarea>
         
             
             
        </p>
        <!--<p>
            <input type="submit" id="adupdate" value="Add/Update Ad"/>
        </p>-->
    </form>
    <script type="text/javascript">
    var config = {
		skin:'moonocolor',
		enterMode : CKEDITOR.ENTER_BR	};

	$('.splash-editor').ckeditor(config);
	</script> 
        </div>
        <div id="ad-nav-block" >
        <ul data-role="listview" data-inset="true" data-theme="c" id="sortable">
       
    </ul> 
    </div>
 </div>       

        
        
        <div style="text-align:center;clear:both;">
        <div style="width:30%;display:inline-block;max-width:200px;"><img id="admin-qrcode" src="qrcode_piadmin.png"   style="max-width:200px;width:100%;"/>Pi Admin</div> 
       <!-- <div style="width:30%;display:inline-block;max-width:200px;"><img id="beerlist-qrcode" src="../images/qrcode_beerlist.png"  style="max-width:200px;width:100%;" />Beer List</div>
        <div style="width:30%;display:inline-block;max-width:200px;"><img id="menu-qrcode" src="../images/qrcode_foodmenu.png"  style="max-width:200px;width:100%;"/><br />Food Menu</div> -->
      <!--  <ul data-role="listview" data-inset="true" id="testview" data-theme="b" >
        <li>
        <div class="container_16"><div style="height:45px" class="grid_2"><h6 class="li-order-id ui-li-heading">8</h6></div><div style="height:45px" class="grid_6"><h3 style="color:red;" class="ui-li-heading">Weather  </h3><p class="ui-li-desc">Ad ID: <span class="li-ad-id">7</span>   Timing: 5 seconds</p></div><div style="height:45px;" class="grid_8"><div data-role="controlgroup" data-type="horizontal" style="float:right;">

    <a href="#" data-role="button" data-icon="check"  data-iconpos="notext" data-mini="true" >Active</a>
     <a href="#" data-role="button" data-icon="arrow-u" data-iconpos="notext" data-mini="true">Up</a>
    <a href="#" data-role="button" data-icon="arrow-d"  data-iconpos="notext" data-mini="true">Down</a> 
</div></div></div></li></ul>-->
        
        
                     
        </div>
        
      
        
        
        </div>
  
        <div data-role="footer" data-theme="b">
            <h1>Control Panel</h1>
            
        </div>
    </div>
    
<div data-role="dialog" id="sure" data-title="Are you sure?" data-theme="b">
             <div data-role="content">
	         <h3 class="sure-1">sure-1</h3>
			<p class="sure-2">sure-2</p>
			<a href="#" class="sure-do" data-role="button" data-theme="b"   data-mini="false"  data-rel="back">Yes</a>
			<a href="#" class="sure-dont" data-role="button" data-theme="b" data-mini="false"  data-rel="back">No</a>

        </div>
     </div>   

</body>
</html> 