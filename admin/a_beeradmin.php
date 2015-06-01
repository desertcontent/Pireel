<?php
session_start();
if(!session_is_registered(myusername)){
header("location:a_beerlogin.php");
}
?>
 <!DOCTYPE html>
<html>
    <head>
    <title>Control Panel</title>
    <meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <!-- StyleSheets (CSS) -->
		<!-- <link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css" />  -->
 <link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.0-rc.1/jquery.mobile-1.3.0-rc.1.min.css" /> 
	 <link rel="stylesheet" href="/css/swipe_style.css" />
	
	  <link rel="stylesheet" href="/css/themes/pourhouse.css" /> 
	 <link rel="stylesheet" href="/css/themes/jqm-icon-pack-2.0-original.css" />   
	 
	 <!--<link rel="stylesheet" href="css/screen-view.css" />--> 
	 <link rel="stylesheet" href="/css/custom.css" /> 
	  <link rel="stylesheet" href="/css/jsShare.css" />
	   <link rel="stylesheet" type="text/css" href="/css/jquery.jtweetsanywhere-1.3.1.css" /> 
	   <link rel="stylesheet" id="camera-css"  href="/css/camera.css" type="text/css" media="all"> 
	   <link rel="stylesheet" href="http://jeromeetienne.github.com/jquery-mobile-960/css/jquery-mobile-fluid960.min.css" /> 	
	 <!-- JavaScripts -->
	 <script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
	 <script src="/js/modernizr-latest.js" type="text/javascript"></script>
	 <script src="/js/custom.js"></script>
	 <!--<script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>-->
	 <script src="http://code.jquery.com/mobile/1.3.0-rc.1/jquery.mobile-1.3.0-rc.1.min.js"></script>
	
		 <script src="/js/swipe.js"  type="text/javascript"></script>
	 <script src="/js/jsShare.js"  type="text/javascript"></script>
 
	 <script type="text/javascript" src="/js/jquery.easing.1.3.js"></script> 
     <script type="text/javascript" src="/js/camera.min.js"></script> 
	 <script src="ckeditor/ckeditor.js"></script>
	 <script src="ckeditor/adapters/jquery.js"></script>
      

</head>
<body>
 
    <script>
     var beerview = 'ACTIVE';
       
     function onBeerAvailable(data, status)
        {
       // alert(data.data[0].id);
       // alert(data.data[0].name);
         if(data.totalResults == 0){$("#message_c").text('Beer Not Found.');}
         else{           
         $("#id").val(data[0].id);
         $("#beer_name").val(data[0].name);
         $("#beer_type").val(data[0]['style'].name);
         $("#beer_desc").val(data[0].description);
         $("#beer_abv").val(data[0].abv);
         $("#beer_ibu").val(data[0]['style'].ibuMax);
         $("#brewery_id").val(data[0]['breweries'][0].id); 
         $("#brewery_name").val(data[0]['breweries'][0].name); 
         var city = data[0]['breweries'][0].locations[0].locality+'-'+data[0]['breweries'][0].locations[0].region; 
         $("#brewery_city").val(city); 
         $("#brewery_url").val(data[0]['breweries'][0].website);        
          if(typeof(data[0]['labels']) != 'undefined') {
          var beer_label =  data[0]['labels'].large;
          } 
          if(typeof(data[0]['breweries'][0].images.medium) != 'undefined') {var brewery_label =  data[0]['breweries'][0].images.large;}
         //alert(data.response.beers.items[0].brewery.brewery_label);
         $("#beer_label").attr("src", beer_label);
         $("#beer_label_url").val(beer_label);
         $("#brewery_label").attr("src", brewery_label); 
         $("#brewery_label_url").val(brewery_label);        
         $("#beer_status").val("INACTIVE");
         $("#beer_glass_price").val("4.50")
         $("#beer_growler_price").val("10.95")
         $("#beer_special").val("OFF")
        
         getBeer(data[0].id);
         
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
         $("#beer_label").attr('src',data.beer_label_url);
         $("#beer_label_url").val(data.beer_label_url);
         $("#brewery_label").attr('src',data.brewery_label_url);
         $("#brewery_label_url").val(data.brewery_label_url);
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
             $('#beers-listview-inventory').append('<li data-role="list-divider" data-theme="b"><span> BEER </span><span style="float:right;"><span> SPECIAL </span><span style="padding-left:15px;">STATUS</span><span style="padding-left:20px;"> DELETE </span></span></li>');           
           
            Object.keys(data).forEach(function(key) {
             var dotimg='';
             var flagimg='';
              if(data[key].beer_status == 'ACTIVE'){dotimg = '<img style="width:10px;margin-left:5px;" src="../images/dot_green.png"/>';}
              if(data[key].beer_status == 'INACTIVE'){dotimg = '<img style="width:10px;margin-left:5px;" src="../images/dot_yellow.png"/>';}
              if(data[key].beer_status == 'BOTTLE-IN'){dotimg = '<img style="width:10px;margin-left:5px;" src="../images/dot_brown.png"/>';}
              if(data[key].beer_status == 'BOTTLE-OUT'){dotimg = '<img style="width:10px;margin-left:5px;" src="../images/dot_red.png"/>';}
              if(data[key].beer_special == 'ON'){flagimg = '<img style="width:20px;margin-right:10px;" src="../images/star_green.png"/>';}
              if(data[key].beer_special == 'OFF'){flagimg = '<img style="width:20px;margin-right:15px;" src="../images/star_yellow.png"/>';}
          // $('#beers-listview-inventory').append('<li data-theme="b"><img src="'+data[key].beer_label_url+'"/><h3>'+data[key].beer_name+'</h3><p style="max-width:350px;white-space:normal;padding:10px;">'+data[key].beer_desc+'<p><p>'+data[key].brewery_name+'<p><p>'+data[key].beer_style+'<p><p>Glass: '+data[key].beer_glass_price+'<p><p>Growler: '+data[key].beer_growler_price+'<p><p>ABV: '+data[key].beer_abv+'%<p><p>IBUs: '+data[key].beer_ibu+'<p></li>');
            if(data[key].beer_status == 'INACTIVE'){$theme='c';}else if(data[key].beer_status == 'ACTIVE'){$theme='e';} else {$theme='a';}
            
            //$('#beers-listview-inventory').append('<li class="beerdetails" data-theme="'+$theme+'" style="padding:0px;padding-left:35px;"><img src="'+data[key].beer_label_url+'" style="max-width:45px;max-height:45px;float:left;"/><h3>'+data[key].beer_name+'</h3><p class="beerspecial ui-li-aside" style="float:right;color:#ff0000;padding-right:10px;max-width:25px;" value="'+data[key].beer_special+'">'+flagimg+'</p><p class="beerdelete" style="float:right;color:#ff0000;padding-right:10px;">DELETE</p><p data-role="button" class="beertoggle" style="float:right;padding-right:5px;" id="'+data[key].id+'">'+data[key].beer_status+dotimg+'</p><p  style="float:left;padding-right:5px;">'+data[key].beer_style+'</p><p  style="clear:left;float:left;padding-right:5px;">'+data[key].brewery_name+'</p></li>');
            
             $('#beers-listview-inventory').append('<li class="beerdetails" data-theme="'+$theme+'" style="padding:0px;padding-left:70px;"><img src="'+data[key].beer_label_url+'" class="ui-li-thumb"/><h3 class="ui-li-heading" style="max-width:280px;">'+data[key].beer_name+'</h3><p  class="ui-li-desc">'+data[key].beer_style+'</p><p   class="ui-li-desc">'+data[key].brewery_name+'</p><p class="ui-li-desc" style="height:25px;padding-top:5px;"><span class="beerdelete" style="width:45px;color:#ff0000;padding-right:20px;padding-left:20px;padding-top:5px;float:right;">DELETE</span><span  class="beertoggle" style="min-width:65px;padding-right:0px;padding-top:5px;float:right;" id="'+data[key].id+'">'+data[key].beer_status+dotimg+'</span><span class="beerspecial" style="width:45px;max-width:40px;margin-right:25px;float:right;" value="'+data[key].beer_special+'">'+flagimg+'</span></p></li>');
           
           $('#beers-listview-inventory').listview('refresh');
           
    });
            
             //for (var id in data) {
			//   alert(data.id);
			//   }           
		   //jQuery.each(data, function(i, val) {
			  // $("#" + i).append(document.createTextNode(" - " + val));
			  // });
                 
       /*   if(data != false){ 
         $("#message_c").text('Beer Searched EXISTS in Current Beer List, see shaded text.');   
         $("#id_c").text(data.id);
         $("#beer_name_c").text(data.beer_name);
         $("#beer_type_c").text(data.beer_style);
         $("#beer_desc_c").text(data.beer_desc);
         $("#beer_abv_c").text(data.beer_abv);
         $("#beer_ibu_c").text(data.beer_ibu);
         $("#brewery_id_c").text(data.brewery_id); 
         $("#brewery_name_c").text(data.brewery_name); 
         $("#brewery_city_c").text(data.brewery_city); 
         $("#brewery_url_c").text(data.brewery_url);  
		 }else{
		 $("#message_c").text('Beer Searched is NOT in Current Beer List. Make any edits and click "Add Beer to List" button below to add.');
		 $("#id_c").text('Existing ID');
         $("#beer_name_c").text('Beer Name');
         $("#beer_type_c").text('Beer Type');
         $("#beer_desc_c").text('Description');
         $("#beer_abv_c").text('ABV');
         $("#beer_ibu_c").text('IBU');
         $("#brewery_id_c").text('Brewery ID'); 
         $("#brewery_name_c").text('Brewery Name'); 
         $("#brewery_city_c").text('Brewery City'); 
         $("#brewery_url_c").text('Brewery URL');
			 
		 } */
		
		  
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
            
           alert('error:'+status);
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
  

  
  
  
  
        $(document).ready(function() {
        
        
        				
			getBeer(0);
             listBeers(beerview,'','beer_name');            
            
            function onSuccessStatusUpdate(data, status)
            
			{ 
			
			listBeers(beerview,'','beer_name');
			 getBeer2(data);
				}
            
            $(".beerdetails").live('click',function(){  
            
				 var beerid = $(this).find('.beertoggle').attr("id");
				 $('.ui-li-heading').css('color','black');
				 $(this).find('.ui-li-heading').css('color','red');
				 getBeer2(beerid);
				 
				  });  

            
             $(".beertoggle").live('click',function(){  
            
				 var beerid = $(this).attr("id");
				
				 var beerstatus = $(this).text();
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
            
            
            $(".beerspecial").live('click',function(){  
            
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
					 callback(false);
					 $(this).off("click.sure");
					 });
					 $.mobile.changePage("#sure");
					 }
            
             $(".beerdelete").live('click',function(){  
                var beerid = $(this).next('p').attr("id");
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
            
			  

           
            
             $("#filterActive").live('click',function(){ 
             beerview = "ACTIVE";
             listBeers(beerview,'beer_status="ACTIVE"','beer_name'); 
             return false;
             }); 
             
              $("#filterInactive").live('click',function(){ 
              beerview = "INACTIVE";
             listBeers(beerview,'beer_status="INACTIVE"','beer_name');
              return false;
             });
              $("#filterBottle").live('click',function(){ 
              beerview = "BOTTLE";
             listBeers(beerview,'beer_status in ("BOTTLE-IN","BOTTLE-OUT")','beer_name');
              return false;
             });
              $("#filterDraft").live('click',function(){ 
              beerview = "DRAFT";
              listBeers(beerview,'beer_status in ("ACTIVE","INACTIVE")','beer_name');
              return false;
              });
              
               $("#filterAll").live('click',function(){ 
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
            
            
            $('#beersearch').live("submit", function() {
				 //var formData = $("#beersearch").serialize();
                var search = '';
                search = encodeURIComponent($("#searchbeer").val());
                
				var request='';
				 //request = 'https://api.untappd.com/v4/search/beer/?client_id=C40794B80F126BF02665235734EDE64B345F02BE&client_secret=0E9E64739DB498A434D439ED16175F27EF4F904A&q='+search+'';
				 	request='a_brewdbsearch.php';
				    $.ajax({
                    type: "GET",
                    url: request,
                    cache: true,
                    data: {search : search},
                    dataType:"json",
                    success: onBeerAvailable,
                    error: onErrorBeerSearch
                });
                return false;
			}); 
            
             $("#search").live('click', function(){
  
               //var formData = $("#beersearch").serialize();
                var search = '';
                search = encodeURIComponent($("#searchbeer").val());
                
				var request='';
				 //request = 'https://api.untappd.com/v4/search/beer/?client_id=C40794B80F126BF02665235734EDE64B345F02BE&client_secret=0E9E64739DB498A434D439ED16175F27EF4F904A&q='+search+'';
				 	request='a_brewdbsearch.php';
				    $.ajax({
                    type: "GET",
                    url: request,
                    cache: true,
                    data: {search : search},
                    dataType:"json",
                    success: onBeerAvailable,
                    error: onErrorBeerSearch
                });
  
                return false;
            });
             
           function onErrorBeerSearch(data, status){ alert(data.data);alert(status);}  
             
             
             $("#menubutton").live('click',function(){
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
  

             
             $("#upspecial").live('click',function(){
  
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
            
            
            
         function onSuccessAdLoad(data, status) {
         
         $("#ad-message").html('<h5 style="text-align:center;">Select an Ad to Edit</h5>').show('slow');
         $("#ad-id").val(data[0].id);
         $("#ad-title").val(data[0].ad_title);
         // $("#splash-editor").text(data[0].ad_content);
          $("#splash-editor").val(data[0].ad_content);
         
          var selectlist = '<select data-inline="false" name="ad-list" id="ad-list">';
            
          Object.keys(data).forEach(function(key) {
            
              selectlist += '<option id="select_id'+data[key].id+'" value="'+data[key].id+'">'+data[key].ad_title+'</option>';
			  });
          
          selectlist += '</select>';

          $('#ad-select').append(selectlist);
          $('#ad-select').trigger('create');
           
          }        
           
        
           function onErrorAdLoad(data, status){}

            
            $.ajax({
                    type: "POST",
                    url: "a_updatead.php",
                    cache: false,
                    data: {adlist : 'all'},
                    dataType:"json",
                    success: onSuccessAdLoad,
                    error: onErrorAdLoad
                });
				
			
			
            $("#ad-list").live('change', function(){ 
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
            
            
            $("#adupdate").live('click', function(){
				
				for ( instance in CKEDITOR.instances )CKEDITOR.instances[instance].updateElement();
                 var formData = $("#adForm").serialize();
				 
                $.ajax({
                    type: "POST",
                    url: "a_updatead.php",
                    cache: false,
                     data: formData,
                     
                    dataType:"json",
                    success: onSuccessAdUpdate,
                    error: onErrorAdUpdate
                });
  
                return false;
            });

            function onSuccessAd(data, status)
        {
         $("#ad-message").html('<h5 style="text-align:center;">Select an Ad to Edit</h5>').show('slow');
         $("#ad-id").val(data[0].id);
         $("#ad-title").val(data[0].ad_title);
         $("#splash-editor").val(data[0].ad_content);
                    
           
        }
           function onErrorAd(data, status)
        {
         
               }

		     function onSuccessAdUpdate(data, status)
        {
         $("#ad-message").html('<h5 style="text-align:center;color:green;">Your Ad has been Updated</h5>').show('slow');
         $("#ad-id").val(data[0].id);
         $("#ad-title").val(data[0].ad_title);
         $("#splash-editor").val(data[0].ad_content);
         
          
          $("#select_id"+data[0].id+"").text(data[0].ad_title).trigger('create');
         $('#ad-list option[value='+data[0].id+']').attr('selected', 'selected');
         $('#ad-list').selectmenu('refresh');       
           
        }
           function onErrorAdUpdate(data, status)
        {
         
               }


            
            $("#admin-specials").live('click',function(){
  
                $('#admin-wrapper').hide();
				$('#inventory').hide();
				$('#specialsForm').show();
				$('#splash-admin').hide();
                return false;
            });
            
            $("#admin-beers").live('click',function(){
  
                $('#admin-wrapper').show();
				$('#inventory').show();
				$('#specialsForm').hide();
				$('#splash-admin').hide();
                return false;
            });
            
            $("#admin-pages").live('click',function(){
  
                $('#admin-wrapper').hide();
				$('#inventory').hide();
				$('#specialsForm').hide();
				$('#splash-admin').show();
                return false;
            });

			// TESTING
			$('#admin-wrapper').show();
				$('#inventory').show();
				$('#specialsForm').hide();
				$('#splash-admin').hide();
                       
        });
    </script>
  
    <!-- call ajax page -->
    <div data-role="page" id="callAjaxPage" data-theme="d"  >
        <div data-role="header"  data-theme="b">
             <div data-role="navbar"   data-inset="false" >
				<ul>
				<li><a data-iconpos="left" data-icon="beer" data-ajax="true" data-rel="back" id="admin-beers">Beers</a></li> 
				<li><a data-iconpos="left" data-icon="dollar" data-ajax="true" data-rel="back" id="admin-specials">Specials</a></li>
				<li><a data-iconpos="left" data-icon="page" data-ajax="true" data-rel="back" id="admin-pages">Display Ads</a></li> 
				<li><a data-iconpos="left" data-icon="power" data-ajax="false" href="a_beerlogout.php">Logout</a></li>
				 
				</ul> 
		 </div>

                      </div>
  
        <div data-role="content" >
        <div id="admin-wrapper" style="display:inline-block;float:left;border:1px solid #ccc;">
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
					<img id="beer_label" src="../images/Pour-House-Cask-social.png" style="max-width:125px;"/>
					<img id="brewery_label" src="../images/Pour-House-Cask-social.png"  style="max-width:125px;"/>
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
        
       
        
         <div data-role="navbar"  data-type="horizontal"> 
         <ul>
        <li><a style="margin-bottom:0px;" href="#" data-role="button" data-inline="true"  data-mini="true" data-theme="e" id="filterActive">Active</a></li>
        <li><a  style="margin-bottom:0px;" href="#" data-role="button" data-inline="true"  data-mini="true"  data-theme="c" id="filterInactive">Inactive</a></li>
         <li><a  style="margin-bottom:0px;" href="#" data-role="button" data-inline="true"   data-mini="true"  data-mini="true" data-theme="a" id="filterDraft">Drafts</a></li>
        <li><a  style="margin-bottom:0px;" href="#" data-role="button" data-inline="true"  data-mini="true"  data-theme="a" id="filterBottle">Bottles</a></li>
       
        <li><a  style="margin-bottom:0px;" href="#" data-role="button" data-inline="true" data-mini="true" data-theme="a" id="filterAll">All Beers</a></li>
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
        <h3>Pour House Grill Beer Selection</h3>
        
        </li>
        </ul> 
        </div>
        
        
        
                 <!-- Update Specials Form -->
        <form id="specialsForm">
			<div style="clear:both;width:100%;background-color:#533a19;color:#fff;text-align:center;padding:5px;"><h3 style="text-shadow:none;margin:0px;">Manage Daily Specials</h3></div>

                <div data-role="fieldcontain"  style="padding:5px;">
                <!-- Special 1 -->
                    <label for="special1" style="font-weight:bold;font-variant:small-caps;">Special 1 Title</label>
                    <input maxlength="40" type="text" name="special1" id="special1" value=""  />
                    
                    <label for="special1h" style="font-size:80%;font-variant:small-caps;">Heading</label>
                    <input maxlength="80"  style="font-size:80%;" type="text" name="special1h" id="special1h" value=""  />
                     
                    <label for="special1s" style="font-size:80%;font-variant:small-caps;">Sub-Heading</label>
                    <input maxlength="80"  style="font-size:80%;" type="text" name="special1s" id="special1s" value=""  />
                    
                    <label for="special1d" style="font-size:80%;font-variant:small-caps;">Details</label>
                    <input maxlength="80"  style="font-size:80%;" type="text" name="special1d" id="special1d" value=""  />
                     
                     <label for="special2" style="font-weight:bold;font-variant:small-caps;">Special 2 Title</label>
                    <input maxlength="40" type="text" name="special2" id="special2" value=""  />
                    
                    <label for="special2h" style="font-size:80%;font-variant:small-caps;">Heading</label>
                    <input maxlength="80"  style="font-size:80%;" type="text" name="special2h" id="special2h" value=""  />
                     
                    <label for="special2s" style="font-size:80%;font-variant:small-caps;">Sub-Heading</label>
                    <input maxlength="80"  style="font-size:80%;" type="text" name="special2s" id="special2s" value=""  />
                    
                    <label for="special2d" style="font-size:80%;font-variant:small-caps;">Details</label>
                    <input maxlength="80"  style="font-size:80%;" type="text" name="special2d" id="special2d" value=""  />
                    
                     <label for="special3" style="font-weight:bold;font-variant:small-caps;">Special 3 Title</label>
                    <input maxlength="40" type="text" name="special3" id="special3" value=""  />
                    
                    <label for="special3h" style="font-size:80%;font-variant:small-caps;">Heading</label>
                    <input maxlength="80"  style="font-size:80%;" type="text" name="special3h" id="special3h" value=""  />
                     
                    <label for="special3s" style="font-size:80%;font-variant:small-caps;">Sub-Heading</label>
                    <input maxlength="80"  style="font-size:80%;" type="text" name="special3s" id="special3s" value=""  />
                    
                    <label for="special3d" style="font-size:80%;font-variant:small-caps;">Details</label>
                    <input maxlength="80"  style="font-size:80%;" type="text" name="special3d" id="special3d" value=""  />
                    
                     <label for="special4" style="font-weight:bold;font-variant:small-caps;">Special 4 Title</label>
                    <input maxlength="40" type="text" name="special4" id="special4" value=""  />
                    
                    <label for="special4h" style="font-size:80%;font-variant:small-caps;">Heading</label>
                    <input maxlength="80"  style="font-size:80%;" type="text" name="special4h" id="special4h" value=""  />
                     
                    <label for="special4s" style="font-size:80%;font-variant:small-caps;">Sub-Heading</label>
                    <input maxlength="80"  style="font-size:80%;" type="text" name="special4s" id="special4s" value=""  />
                    
                    <label for="special4d" style="font-size:80%;font-variant:small-caps;">Details</label>
                    <input maxlength="80"  style="font-size:80%;" type="text" name="special4d" id="special4d" value=""  />

					 <label for="marqueetext" style="font-weight:bold;font-variant:small-caps;">Marquee Text</label>
                    <input maxlength="255" type="text" name="marqueetext" id="marqueetext" value=""  />



                    
                </div>
                <button data-theme="b" id="upspecial" type="submit">Update Specials</button>
            </form>

        <div id='splash-admin'>
        <div style="clear:both;width:100%;background-color:#533a19;color:#fff;text-align:center;padding:5px;"><h3 style="text-shadow:none;margin:0px;">Manage Display Ads</h3></div>
		
		<form id="adForm" data-theme="b" data-inset="true" style="padding:5px;" >
		<p id="ad-message">Status Update</p>
		<p id="ad-select">
			 			</p>
        <p>
        
           <label for="ad-id" style="font-size:80%;font-variant:small-caps;">Ad ID</label>
             <input maxlength="80"  style="font-size:80%;" type="text" name="ad-id" id="ad-id" value="Ad ID"  />
            <label for="ad-title" style="font-size:80%;font-variant:small-caps;">Ad Title</label>
             <input maxlength="80"  style="font-size:80%;" type="text" name="ad-title" id="ad-title" value="Ad Title"  />
        <textarea class="splash-editor" id="splash-editor" name="splash-editor">&lt;p&gt;Initial value.&lt;/p&gt;</textarea>
         
              
             
        </p>
        <p>
            <input type="submit" id="adupdate" value="Add/Update Ad"/>
        </p>
    </form>
    <script type="text/javascript">
    var config = {
		skin:'moonocolor'
	};

	$('.splash-editor').ckeditor(config);</script> 
        </div>
        
        
        
        <div style="text-align:center;clear:both;">
        <div style="width:30%;display:inline-block;max-width:200px;"><img id="admin-qrcode" src="../images/qrcode_beer-admin.png"   style="max-width:200px;width:100%;"/>Beer Admin</div> 
        <div style="width:30%;display:inline-block;max-width:200px;"><img id="beerlist-qrcode" src="../images/qrcode_beerlist.png"  style="max-width:200px;width:100%;" />Beer List</div>
        <div style="width:30%;display:inline-block;max-width:200px;"><img id="menu-qrcode" src="../images/qrcode_foodmenu.png"  style="max-width:200px;width:100%;"/><br />Food Menu</div> 
        </div>
        
      
        
        
        </div>
  
        <div data-role="footer" data-theme="b">
            <h1>Control Panel</h1>
            
        </div>
    </div>
    
<div data-role="dialog" id="sure" data-title="Are you sure?" data-theme="b"  >
             <div data-role="content" >
	         <h3 class="sure-1">sure-1</h3>
			<p class="sure-2">sure-2</p>
			<a href="#" class="sure-do" data-role="button" data-theme="b"   data-mini="false"  data-rel="back">Yes</a>
			<a href="#" class="sure-dont" data-role="button" data-theme="b" data-mini="false"  data-rel="back">No</a>

        </div>
     </div>   

</body>
</html> 