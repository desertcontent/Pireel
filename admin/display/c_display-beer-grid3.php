<?php ?>
<!DOCTYPE html>
<html>
    <head>
    <title>PiReel Display</title>
    <meta charset='utf-8' />
    <meta content='width=device-width, initial-scale=1.0' name='viewport' />
  <!-- StyleSheets (CSS) -->
		 
  	 <link rel="stylesheet" href="/css/jquery.mobile-1.3.0-rc.1.min.css" />  
	 <link rel="stylesheet" href="/css/themes/pourhouse.css" /> 

	 <link rel="stylesheet" id="camera-css"  href="/css/camera.css" type="text/css" media="all"> 
	 <link rel="stylesheet" href="/css/pourhouse.css" /> 
	 <link rel="stylesheet" href="/css/display1.css" /> 
	 <script src="/js/jquery-1.8.2.min.js"></script>
 <script src="/js/jquery.marquee.js"  type="text/javascript"></script>  
 
	  
	 	 <!-- JavaScripts -->
	
		<style type="text/css" media="screen">
			/* I wanted to center my loader */
			#cycle-loader {
				height:32px;
				left:50%;
				margin:-8px 0 0 -8px;
				position:absolute;
				top:50%;
				width:32px;
				z-index:999;
			}
			
			/*I want to avoid jumpiness as the JS loads, so I initially hide my cycle*/
			#maximage {
				display:none;/* Only use this if you fade it in again after the images load */
				position:fixed !important;
			}
			
			/*Set my gradient above all images*/
			#gradient {
				left:0;
				height:100%;
				position:absolute;
				top:0;
				width:100%;
				z-index:999;
			}
			
			/*Set my logo in bottom left*/
			#logo {
				bottom:30px;
				height:auto;
				right:30px;
				position:absolute;
				/*width:34%;*/
				z-index:1000;
				float:right;
			}
			#logo img {
				width:100%;
			}
			
			#arrow_left, #arrow_right {
				bottom:30px;
				height:67px;
				position:absolute;
				right:30px;
				width:36px;
				z-index:1000;
			}
			#arrow_left {
				right:86px;
			}
			
			#arrow_left:hover, #arrow_right:hover {
				bottom:29px;
			}
			#arrow_left:active, #arrow_right:active {
				bottom:28px;
			}
			
			a {color:#666;text-decoration:none;}
			a:hover {text-decoration:underline;}
			
			.in-slide-content { 
				color:#ffffff;
				float:right;
				font-family:'Helvetica Neue', helvetica;
				 font-size:60px;  
				font-weight:bold;
				right:0;
				margin:0px;
				padding:25px;
				position:absolute;
				top:0;
				width:90%;
				z-index:9999; /* Show above .gradient */
				text-shadow: #533a19 0.1em 0.1em 0.4em;
				-webkit-font-smoothing:antialiased;
			}
			.in-slide-contentb { 
				color:#ffffff;
				float:right;
				font-family:'Helvetica Neue', helvetica;
				 font-size:60px;  
				font-weight:bold;
				right:0;
				margin:0px;
				padding:25px;
				position:absolute;
				top:0;
				width:97%;
				z-index:9999; /* Show above .gradient */
				text-shadow: #533a19 0.1em 0.1em 0.4em;
				-webkit-font-smoothing:antialiased;
			}
			
			.light-text {color:#ddd;text-shadow: 0 1px 0 #666;}
			.smaller-text {font-size:30px;}
			.youtube-video, video {
				left:0;
				position:absolute;
				top:0;
			}


.textshadow {
text-shadow: 0px 1px 0px #999, 0px 2px 0px #888, 0px 3px 0px #777, 0px 4px 0px #666, 0px 5px 0px #555, 0px 6px 0px #444, 0px 7px 0px #333, 0px 8px 7px #001135;
	
}

.header {font-size:75px;margin-bottom:25px;
text-shadow: 0px 1px 0px #999, 0px 2px 0px #888, 0px 3px 0px #777, 0px 4px 0px #666, 0px 5px 0px #555, 0px 6px 0px #444, 0px 7px 0px #333, 0px 8px 7px #001135;
	
}
			
			#specials {width:49%;background:transparent url(/images/caption-bg.png) 0 0 repeat;-moz-border-radius:20px;
-webkit-border-radius:20px;
-khtml-border-radius:20px;
border-radius:20px;
padding:30px;
max-width:775px;
}
 
#specials > h1,#specials > h2,#specials > h3,#specials > h4,#specials > h5,#specials > h6,#specials > p{color:#ffffff; font-weight:normal;margin:0px;} 
 #specials > .header{font-size:70px;font-weight:bold;vertical-align:top;margin-top:0px;padding-top:0px;color:#ffffff; }
 
 
 #specials > .title{margin-top:25px;font-size:45px;font-weight:bold;}
 #specials > .heading{padding-top:10px;font-size:30px;font-style: italic;}
 #specials > .subheading{padding-top:5px;font-size:30px;font-style: italic;}
 #specials > .details{padding-top:5px;font-size:30px;}  
 
#specialsboard {width:100%;background:transparent url(/images/caption-bg.png) 0 0 repeat;-moz-border-radius:20px;
-webkit-border-radius:20px;
-khtml-border-radius:20px;
border-radius:20px;
padding:30px;
/*max-width:1500px;*/
}
 
#specialsboard > h1,#specials > h2,#specials > h3,#specials > h4,#specials > h5,#specials > h6,#specials > p{color:#ffffff; font-weight:normal;margin:0px;} 
 #specialsboard > .header{font-size:70px;font-weight:bold;vertical-align:top;margin-top:0px;padding-top:0px;color:#ffffff; }
 
 #specialsboarda {clear:left;width:49%;display:inline;float:left; }
 #specialsboardb {width:46%;display:inline;float:right; }
  
 #specialsboarda > .title{margin-top:25px;font-size:45px;font-weight:bold;}
 #specialsboarda > .heading{padding-top:10px;font-size:30px;font-style: italic;line-height:40px;}
 #specialsboarda > .subheading{padding-top:5px;font-size:30px;font-style: italic;line-height:40px;}
 #specialsboarda > .details{padding-top:5px;font-size:30px;line-height:40px;}  
 
 #specialsboardb > .title{margin-top:25px;font-size:45px;font-weight:bold;}
 #specialsboardb > .heading{padding-top:10px;font-size:30px;font-style: italic;line-height:40px;}
 #specialsboardb > .subheading{padding-top:5px;font-size:30px;font-style: italic;line-height:40px;}
 #specialsboardb > .details{padding-top:5px;font-size:30px;line-height:40px;}  


 
  #beer{padding-top:0px;margin-top:15px;}
 .beer-special-header{font-size:90px;text-align:center;margin-top:10px;}
 
 .sbeer-slide{color:#ffffff;clear:both;margin-top:25px;text-shadow: 0px 1px 0px #999, 0px 2px 0px #888, 0px 3px 0px #777, 0px 4px 0px #666, 0px 5px 0px #555, 0px 6px 0px #444, 0px 7px 0px #333, 0px 8px 7px #001135; background:transparent url(/images/caption-bg.png) 0 0 repeat;
	 padding:30px;
	 -webkit-border-radius:20px;
-khtml-border-radius:20px;
border-radius:20px;

 }
 .slabel-block img{width:250px;margin-right:25px;vertical-align:top;float:left;}
 .sbeer-name{font-size:80px;clear:both;color:#ffffff;}
  .sbeer-desc{max-height:200px;height:200px;}
 .sbeer-slide{font-size:40px;}
 .sbeer-style{font-size:70px;}
 .sbeer-abv{font-size:60px; margin-right:25px;}
 .sbeer-ibu{font-size:60px; margin-right:25px;}
 .sbrewery-block{margin-top:25px;}

 .sbrewery-block img{width:200px;margin-right:25px;vertical-align:top;float:left;}
 .sbrewery-name{font-size:60px;}
 .sbrewery-city{font-size:50px; margin-right:25px;}
 .sbrewery-url{font-size:50px; margin-right:25px;}
 
 .sprice-block{text-align:center;margin-top:25px;}
 .sbeer-glass{font-size:70px; margin-right:100px; }
 .sbeer-growler{font-size:70px;  }
 
 
 #eventlogo {
 text-align:center;margin:0 auto;

  -webkit-border-radius:20px;
-khtml-border-radius:20px;
border-radius:20px;
/*background:transparent url(/images/caption-bg.png) 0 0 repeat;*/
padding:25px;}

#eventlogo img{margin-top:125px;}
 
 #eventtext {
 position:relative;
 -webkit-border-radius:20px;
-khtml-border-radius:20px;
border-radius:20px;
 
height:500px;
background:transparent url(/images/caption-bg.png) 0 0 repeat;
padding:25px;}

/*#eventtext > h1, #eventtext > h2,#eventtext > h3 {
 position:relative;
 color:#ffcc00;
text-shadow: 0px 1px 0px #ff0000, 0px 2px 0px #ff0000, 0px 3px 0px #ff0000, 0px 4px 0px #ff0000, 0px 5px 0px #000000, 0px 6px 0px #000000, 0px 7px 0px #000000, 0px 8px 7px #000000;	  
 } */

 #eventtext > h4,#eventtext > h5 {
 position:relative;
 color:#ffffff;
text-shadow: 0px 1px 0px #999, 0px 2px 0px #888, 0px 3px 0px #777, 0px 4px 0px #666, 0px 5px 0px #555, 0px 6px 0px #444, 0px 7px 0px #333, 0px 8px 7px #222;	 	 
 }  
  		</style>
	       
<style type="text/css">
      .js #flash {display: none;}
    </style>
    <script type="text/javascript">
     
      document.documentElement.className = 'js';
    </script>		
</head>
<body style="background:#c7b299 url(/images/dartboard_bg.png) 0 0 no-repeat;overflow:hidden;">
       <!-- JQM PAGE-->
    <div data-role="page" id="listbeergrid" data-theme="d" style="background:#c7b299 url(/images/dartboard_bg.png) 0 0 no-repeat;" >
      <!--  <div data-role="header"  data-theme="b">
            <h1>Beers Display</h1>
        </div>-->
  
        <div data-role="content" style="background:#c7b299 url(/images/dartboard_bg.png) 0 0 no-repeat;padding:0px;" id="slides"> 
            
                         
            <div id="slideblock">
         	<div id="beers-gridview">
	         	<a href="#" data-inline="true" data-theme="b"  style="width:100%;"></a>
			</div> 
		  	
		  	 <div id="marqueescroll" class="marquee"></div> 		  	 		  	
		  	<div   id="specials-ad" class="in-slide-content" style="width:99%;"></div>
		  	
		  	<div id="ad-container">		
				<div id="ad-01-content" class="in-slide-content" style="margin:0px;padding:0px;float:none;position:relative;width:100%;"></div> 
			</div> 
			
			
			<div id="beerofday">
				 <div id="beer" class="in-slide-contentb" style=""></div>	
			</div>
			
			<div id="vendorblock" style="position:absolute;top:0px;left:0px;z-index:10000;"><!--<img alt="" src="../../images/datafog_logo_white.png" style="width:200px;margin-top:920px;margin-left:25px;z-index:10000;" />--><img alt="" src="../../images/poweredbyuntappd_a_white_small.png" style="width:150px;margin-top:1018px;margin-left:0px;z-index:10000;" /></div>
            </div> 
			<div id="logoblock" style="position:absolute;top:0px;left:0px;z-index:10000;"><!--<img alt="" src="../../images/datafog_logo_white.png" style="width:200px;margin-top:920px;margin-left:25px;z-index:10000;" />--><img alt="" src="../../images/alehaus/alehaus-logo-white.png" style="width:100px;margin-top:950px;margin-left:1800px;z-index:10000;" /></div>
            </div> 
            </div>
   <script src="/js/jquery-1.8.2.min.js"></script>

	 <script src="/js/jquery.mobile-1.3.0-rc.1.min.js"></script>
	 

     <script type="text/javascript" src="/js/jquery.dotdotdot.min.js"></script> 
      <script src="/js/jquery.marquee.js"  type="text/javascript"></script>       
      
  <script>
  				
  		 
  				
  				 	var seqarray= new Array(); 
  				 	 //loadscriptad(10);
	  				 // $("#logoblock").hide('fast');
	  				 //getAdList();
	  				 //currad=seqarray[0][0];
	  				 //if($.inArray(currad, ["1", "6", "9", "10"] >1)){alert('crap');}
	  				 	  looper();
  				function looper() {
	  				// Initailize Variables
	  				
	  				 getAdList();
  				    // alert(seqarray[0][0]);
  				    videooff=1;
  					 var slidecnt=0; 
       				 var slide='ads'; 
       				 var secs=5; 
       				 var temp=''; 
       				 var btemp=''; 
	   				 var currad=seqarray[0][0];
       			     var adnum=0;
       				 var isscript="";
	  			 
	  			 setInterval( function() {
					  secs--; 		// Decrement number of Seconds 
					  if(secs >0) { //  No Action Cycles to Display Ad
									}
					  else {
						    console.log('slidecnt--'+slidecnt+'  slide--'+slide+'  currad--'+currad+'  adnum--'+adnum+'  temp--'+temp+'  btemp--'+btemp+'  seqarraylengh--'+seqarray.length+'  sec--'+seqarray[adnum][1]+'isscript'+isscript);
						  
						   //if ( [ '1', '6', '9', '10' ].indexOf( currad ) > -1 ){
						   if ( [ 'Video', 'Module'].indexOf( seqarray[adnum][3] ) > -1 ){
						   seqarray[adnum][1]
							 loadscriptad(currad);temp=seqarray[adnum][2];secs=seqarray[adnum][1];adnum++;currad=temp;    
						   }
						   else{
							 loadad(currad);temp=seqarray[adnum][2];secs=seqarray[adnum][1];adnum++;currad=temp;       
						   }
						   if(adnum == seqarray.length){getAdList();slidecnt=0;currad=seqarray[0][0];temp=seqarray[0][0];adnum=0;}  
						   }
						   }
						   , 1000);  
					  
					  
					  // *********  GET AD LIST
 					
 						  
					  } 					   
	  			//runBeerInfo();
	  			 //listSpecials(); 
	  			 
	  			 //listBeerofDay();
	  			 //startVideo("Iam.mp4");
	  		 	// setTimeout('startVideo("kissing.mp4");', 20000);
	  		 	 
	  		 	 function startVideo(vidname) {
		  		 	$('#specials-ad').hide(10);	
	   			   $('#beers-gridview').hide(10);
	   			   $('#beer').hide(10);
	   			    $('#marqueescroll').hide(10);	 
		  		 $.ajax({
                    type: "POST",
                    url: "../startvideo.php",
                    cache: false,
                    //data: formData,
                     data: {vidname : vidname},
                    //data: {beer_view : "ACTIVE", beer_select : '',beer_sort : 'beer_name'},
                    dataType:"text",
                   // success: onSuccessVideo,
                   // error: onErrorVideo
                });	
                
                	 
	  		 	 }
// Update Running Ad List	  		 	 
	  		 	 
	  		 	 function getAdList(){ 
		 $.ajax({
                    type: "POST",
                    url: "../test.php",
                    cache: false,
                    async:false,
                    //data: {adlist : 'loadsingle',loadid : adid},
                    dataType:"json",
                    success: onSuccessAdList,
                    error: onErrorAdList,
                    complete: onupdateglobal
                });
    
		function onSuccessAdList(data, status) {
             //console.log(data); 
             var lastkey=''; 
             var lastid='';
             var lastsec='5';
             var firstkey;
             var x=0;
             var i=0;
            Object.keys(data).forEach(function(key) { 
             x++;
             if(x==1)firstkey=key; 
             if(x>1 && x < data.length+1){seqarray[i]=  Array(data[lastkey].id,data[lastkey].atiming,data[key].id,data[lastkey].atype);i++;}
             if(x == data.length){seqarray[i]=  Array(data[key].id,data[key].atiming,data[firstkey].id,data[key].atype);i++;}
             // console.log(seqarray);
             lastkey=key;
             lastid=data[key].id;
             lastsec=data[key].atiming;
            });
             console.log(seqarray);
             
          }        
          
         function onErrorAdList(data, status){}	
          function onupdateglobal(data, status){}	
	  }
		 
	  		 

	  		 	// function onSuccessVideo(data, status){}
	  		 	 //function onErrorVideo(data, status){}
	  		 	 
				 
	              
				  var on = true;
				function runBeerInfo() { 
				 setInterval( function() {
					  
					  if(on) {
						 listBeers('ACTIVE');
						on = false;  
					  }
					  else {
					   
						 //listBeerofDay();
						  listSpecials();
						on=true;
					  }
					  }
					  , 10000); 
					  
					  }
					  
			    function runads() { 
				
				setTimeout ( function() {   
       		         var adnum = 1;
       		         
       		       $('#specials-ad').hide(10);	
	   			   $('#beers-gridview').hide(10);
	   			   $('#beer').hide(10);
	   			    $('#marqueescroll').hide(10);			  

				  var slideint = setInterval( function() {
					   
						 loadad(adnum);
						 adnum++;
						  if(adnum==8) {clearInterval(slideint);setInterval('listBeers("ACTIVE")', 5000);}; 
					  }
					  , 5000);
					  }
					  ,60000);
				   
       		   }

       		   
       		   var ind=-1;
			   var flg='s';
			 

            function onError(data, status){/*alert('error_getBeer'+status);*/}   

		 

// *********  LOAD SCRIPTAC AD

 function loadscriptad(adid){ 
		 $.ajax({
                    type: "POST",
                    url: "../updatead.php",
                    cache: false,
                    data: {adlist : 'loadsingle',loadid : adid},
                    dataType:"json",
                    success: onSuccessLoadScriptAd,
                    error: onErrorLoadScriptAd
                });
                function onSuccessLoadScriptAd(data, status) {
             //var striptags=$(data[0].ad_content).text(); 
             //console.log(data[0].ad_content); 
             //console.log(striptags);  
			 //eval(striptags);
			 eval(data[0].ad_content);
			 }        
          
         function onErrorLoadScriptAd(data, status){}
				}
		 
		 //loadad(2);

		 

// *********  LOAD SINGLE AD

 function loadad(adid){ 
		 $.ajax({
                    type: "POST",
                    url: "../updatead.php",
                    cache: false,
                    data: {adlist : 'loadsingle',loadid : adid},
                    dataType:"json",
                    success: onSuccessAdLoad,
                    error: onErrorAdLoad
                });
                
            function onSuccessAdLoad(data, status) {
          $('#vendorblock').hide(10);       
          $('#marqueescroll').html(""); 
           $('#beer').html("");		
		   $('#beers-gridview').html("");
		   $('#specials-ad').html("");	
     	  $('#ad-01-content').html(data[0].ad_content);
          $('#ad-01-content').trigger('create').show(10);
           
          }        
          
         function onErrorAdLoad(data, status){}
				}
		 
		 //loadad(2);


		
// *********  BEER GRID		
		
		function listBeers(beerstatus){ 

				 
                $.ajax({
                    type: "POST",
                    url: "../a_listbeers.php",
                    cache: false,
                    async:false,
                    //data: formData,
                    //data: {beer_status : beerstatus},
                    data: {beer_view : "ACTIVE", beer_select : '',beer_sort : 'beer_name'},
                    dataType:"json",
                    success: onSuccessBeerList,
                    error: onError
                });
                
                 function onSuccessBeerList(data, status)
        {
			 
		/*	function roundNumber(number, digits) {
            var multiple = Math.pow(10, digits);
            var rndedNum = Math.round(number * multiple) / multiple;
            return rndedNum;
        }
        
            var totbeers = data.length;
            var totcycles = roundNumber((data.length/10),0);
            var lastcyclebeer = totcycles*10;
            var beerslastcycle = totbeers-(totcycles*10); */
           
				 
								 
				
				
// LOAD BUSINESS BRANDING BLOG INTO GRIDVIEW
        $('#vendorblock').show(10);
		$('#ad-01-content').html("");
		$('#beer').hide(10).html("");	
		$('#specials-ad').html("");	
     	$('#beers-gridview').html("");
     		             
           $('#beers-gridview').append('<a href="#" data-role="button" data-inline="true" data-theme="b" class="col1 company-block"><div id="test"><img class="ui-li-thumb phlogo" src="/images/logo_8st.png"/><img class="ui-li-thumb displayqr" src="/images/growler.png"/><h3 class="ui-li-heading">8th Street Ale Haus</h3><p class="beer-style">Sheboygan, Wisconsin</p><p  class="brewery-name">Beer Menu</p><p  class="brewery-city">30 Craft Beers on TAP!</p><!--<p  class="ui-li-desc beer-desc">The Pour House Grill is in Bend, Oregon</p><p class="ui-li-desc beer-abv"></p><p class="ui-li-desc beer-ibu"></p><p class="ui-li-desc beer-glass"> </p><p class="ui-li-desc beer-growler"> </p></div><div id="test2"><p  class="brewery-name">Sheboygan\'s Home for Great Beer!</p><p  class="brewery-city">... And Great Food To Match!</p><p  class="brewery-name">Try One of Our 1/2 Pound Burgers</p><p  class="brewery-city" style="font-size:80%">They\'re Becoming a Sheboygan Favorite!</p>--></div></a>'); 
			 		
			 					    					 
// LOAD BEERS INTO GRID AND SPLASH								   
            Object.keys(data).forEach(function(key) {
// LOAD BEERS INTO GRID  (images from original source url          
           // $('#beers-gridview').append('<a id="'+data[key].id+'" href="#" data-role="button" data-inline="true" data-theme="b" class="col1"  style="min-width:475px;"><img class="ui-li-thumb" src="'+data[key].beer_label_url+'"/><h3 class="ui-li-heading beernamex">'+data[key].beer_name+'</h3><p class="beer-style beershadow">'+data[key].beer_style+'</p><p  class="brewery-name beershadow">'+data[key].brewery_name+'</p><p  class="brewery-city beershadow">'+data[key].brewery_city+'</p><p  class="ui-li-desc brewery-durl  beershadow">'+data[key].brewery_url+'</p><p  class="ui-li-desc beer-desc">'+data[key].beer_desc+'</p><p class="ui-li-desc beer-abv">ABV: '+data[key].beer_abv+'%</p><p class="ui-li-desc beer-ibu">IBUs: '+data[key].beer_ibu+'</p><p class="ui-li-desc beer-glass">Pint: $'+data[key].beer_glass_price+'</p><p class="ui-li-desc beer-growler">Growler: $'+data[key].beer_growler_price+'</p></a>');
// LOAD BEERS INTO GRID  (images from local stored files based on beer id            
           $('#beers-gridview').append('<a id="'+data[key].id+'" href="#" data-role="button" data-inline="true" data-theme="b" class="col1"  style="min-width:475px;"><img class="ui-li-thumb" src="../beerimages/'+data[key].id+'.jpg"/><h3 class="ui-li-heading beernamex">'+data[key].beer_name+'</h3><p class="beer-style beershadow">'+data[key].beer_style+'</p><p  class="brewery-name beershadow">'+data[key].brewery_name+'</p><p  class="brewery-city beershadow">'+data[key].brewery_city+'</p><p  class="ui-li-desc brewery-durl  beershadow">'+data[key].brewery_url+'</p><p  class="ui-li-desc beer-desc">'+data[key].beer_desc+'</p><p class="ui-li-desc beer-abv">ABV: '+data[key].beer_abv+'%</p><p class="ui-li-desc beer-ibu">IBUs: '+data[key].beer_ibu+'</p><p class="ui-li-desc beer-glass">Pint: $'+data[key].beer_glass_price+'</p><p class="ui-li-desc beer-growler">Growler: $'+data[key].beer_growler_price+'</p></a>');
              
    
    });
$('#beers-gridview').trigger('create').show(10);
 $('.beer-desc').dotdotdot();
			
// ADJUST BEER DESCRIPTION TO FIT                   
             

		  
        }  
// LOAD MARQUEE

$.ajax({
                    type: "POST",
                    url: "../a_getspecials.php",
                    cache: false,
                   /* data: formData,*/
                    dataType:"json",
                    async:false,
                    success: onSuccessMarquee,
                    error: onErrorMarquee
                });
  
				 function onSuccessMarquee(data, status)
        {
         
        
				
			 
			 	  $('.marquee').html(data.marquee_text).show(10);
			 	 $('.marquee').marquee({
				  speed: 80000,
				  gap: 100,
				  delayBeforeStart: 0,
				  direction: 'left',
				  duplicated: true
				  }); 

       
        }
  
        function onErrorMarquee(data, status)
        {
            // handle an error
        }       

// END LOAD MARQUEE       
        
        
        
			}	
      
            //listBeers("ACTIVE");
		    
// *********  DAILY SPECIALS	

	   function listSpecials3()
	   {
				
			 
                  			 //LOAD SPECIALS SLIDE 
            					 
	 
				// var formData = $("#specialsForm").serialize();
  
                $.ajax({
                    type: "POST",
                    url: "../a_getspecials3.php",
                    cache: false,
                   /* data: formData,*/
                    dataType:"json",
                    success: onSuccessSpecials3,
                    error: onErrorSpecials3
                });
  
		function onSuccessSpecials3(data, status)
        {
         	$('#vendorblock').hide(10);  
         	$('#ad-01-content').html("");
             $('#beer').html(""); 
             $('#marqueescroll').html(""); 
           $('#beers-gridview').html("");	
           // $('#specials-ad').html("");	          
           $('#specials-ad').html('<div id="specialsboard" class="dropshad" style="margin:0px;padding:20px;float:left;"><h2 class="header  class="textshadow"" style="text-align:center">Check Your Calendar and Enjoy Our Special Events</h2><div id="specialsboarda"></div><div id="specialsboardb"></div></div>');

			var spec1 ='<h2 class="title  textshadow">'+data.special_1+'</h2><h3 class="heading">'+data.special_1h+'</h3><h4 class="subheading">'+data.special_1s+'</h4><p  class="details">'+data.special_1d+'</p>';
			$('#specialsboarda').append(spec1);
			var spec2 ='<h2 class="title textshadow">'+data.special_2+'</h2><h3 class="heading">'+data.special_2h+'</h3><h4 class="subheading">'+data.special_2s+'</h4><p  class="details">'+data.special_2d+'</p>';
			$('#specialsboarda').append(spec2);
			var spec3 ='<h2 class="title textshadow">'+data.special_3+'</h2><h3 class="heading">'+data.special_3h+'</h3><h4 class="subheading">'+data.special_3s+'</h4><p  class="details">'+data.special_3d+'</p>';
			$('#specialsboarda').append(spec3);
			var spec4 ='<h2 class="title textshadow">'+data.special_4+'</h2><h3 class="heading">'+data.special_4h+'</h3><h4 class="subheading">'+data.special_4s+'</h4><p  class="details">'+data.special_4d+'</p>';
			$('#specialsboardb').append(spec4);
			var spec5 ='<h2 class="title textshadow">'+data.special_5+'</h2><h3 class="heading">'+data.special_5h+'</h3><h4 class="subheading">'+data.special_5s+'</h4><p  class="details">'+data.special_5d+'</p>';
			$('#specialsboardb').append(spec5);
			var spec6 ='<h2 class="title textshadow">'+data.special_6+'</h2><h3 class="heading">'+data.special_6h+'</h3><h4 class="subheading">'+data.special_6s+'</h4><p  class="details">'+data.special_6d+'</p>';
			$('#specialsboardb').append(spec6);
			
			
			
			$('#specials-ad').trigger('create').show(10);

        }
  
        function onErrorSpecials3(data, status)
        {
            // handle an error
        }       
			
	
			}	 
	             
	   	   // listSpecials();

   function listSpecials()
	   {
				
			 
                  			 //LOAD SPECIALS SLIDE 
            					 
	 
				// var formData = $("#specialsForm").serialize();
  
                $.ajax({
                    type: "POST",
                    url: "../a_getspecials.php",
                    cache: false,
                   /* data: formData,*/
                    dataType:"json",
                    success: onSuccessSpecials,
                    error: onErrorSpecials
                });
  
		function onSuccessSpecials(data, status)
        {
         	$('#vendorblock').hide(10);  
         	$('#ad-01-content').html("");
             $('#beer').html(""); 
            $('#marqueescroll').html(""); 
           $('#beers-gridview').html("");	
           // $('#specials-ad').html("");	          
           $('#specials-ad').html('<div id="specials" class="dropshad" style="display:inline-block;float:left;"><h2 class="header" style="text-align:center">Today\'s Specials</h2></div><div style="display:inline-block;float:right;width:49%;margin-top:50px;"><h2 class="header" style="font-size:60px;font-style:italic;margin-top:0px;">Try Our Philly Cheese Steak!</h2><img src="/images/cheesesteak_large.png" style="margin-top:50px;border:5px solid #000000;"/></div>');

			var spec1 ='<h2 class="title textshadow">'+data.special_1+'</h2><h3 class="heading">'+data.special_1h+'</h3><h4 class="subheading">'+data.special_1s+'</h4><p  class="details">'+data.special_1d+'</p>';
			$('#specials').append(spec1);
			var spec2 ='<h2 class="title textshadow">'+data.special_2+'</h2><h3 class="heading">'+data.special_2h+'</h3><h4 class="subheading">'+data.special_2s+'</h4><p  class="details">'+data.special_2d+'</p>';
			$('#specials').append(spec2);
			var spec3 ='<h2 class="title textshadow">'+data.special_3+'</h2><h3 class="heading">'+data.special_3h+'</h3><h4 class="subheading">'+data.special_3s+'</h4><p  class="details">'+data.special_3d+'</p>';
			$('#specials').append(spec3);
			var spec4 ='<h2 class="title textshadow">'+data.special_4+'</h2><h3 class="heading">'+data.special_4h+'</h3><h4 class="subheading">'+data.special_4s+'</h4><p  class="details">'+data.special_4d+'</p>';
			$('#specials').append(spec4);
			$('#specials-ad').trigger('create').show(10);

        }
  
        function onErrorSpecials(data, status)
        {
            // handle an error
        }       
			
	
			}	 
	             
	   	   // listSpecials3();
	   	   

	   	   
// *********  BEER OF THE DAY	   	   
	   	   
	   function listBeerofDay() 
	   {
		   	  
		  // Get Beer Of the Day
		   $.ajax({
                    type: "POST",
                    url: "../a_getbeerspecials.php",
                    cache: false,
                    data: {beercount : 1},
                    dataType:"json",
                    //async: false,
                    success: onSuccessBeerSpecial,
                    error: onErrorBeerSpecial
                });

		   function onSuccessBeerSpecial(data, status) {getBeer2(data[0].id);}  
		   function onErrorBeerSpecial(data, status) {getBeer2(54971);} 
		// END BEER OF THE DAY		   
	   }
          //listBeerofDay();                         
     	// LOAD BEER SLIDE	
		function getBeer2(beerid){ 
								 
                $.ajax({
                    type: "POST",
                    url: "../a_getbeer.php",
                    cache: false,
                    //data: formData,
                    
                    data: {beerid_req : beerid},
                    dataType:"json",
                    success: onSuccessBeerView,
                    error: onErrorBeerView
                });
                
			}	
		
		function onErrorBeerView(data, status){
            // handle an error
        } 
			
		function onSuccessBeerView(data, status){ if(data != false){ 
               
			$('#ad-01-content').html("");
			$('#vendorblock').show(10); 
            $('#marqueescroll').html(""); 
           $('#beers-gridview').html("");	
           $('#specials-ad').html("");
          $('#beer').html("");
         $('#beer').append('<div class="beer-special-header textshadow">Craft Beer of the Day</div><div class="sbeer-slide" ><div class="slabel-block"><img src="../beerimages/'+data.id+'.jpg"/><p class="sbeer-style">'+data.beer_style+'</p><p class="sbeer-abv">ABV: &nbsp;'+data.beer_abv+'%</p><p class="sbeer-ibu">IBUs: '+data.beer_ibu+'</p></div><h3 class="sbeer-name">'+data.beer_name+'</h3><p  id="sbeer-desc" class="sbeer-desc">'+data.beer_desc+'</p><div class="sbrewery-block"><img class="sbrewery-label" src="../breweryimages/'+data.id+'.jpg"/><p  class="sbrewery-name">'+data.brewery_name+'</p><p class="sbrewery-city ">'+data.brewery_city+'</p><p class="sbrewery-url">'+data.brewery_url+'</p></div><div class="sprice-block"><span class="sbeer-glass">Pint: $3.50</span><span class="sbeer-growler">Growler: $'+data.beer_growler_price+'</span></div></div>');
    
    
    
	$('#beer').trigger('create').show(10);
	$('.sbeer-desc').dotdotdot({watch:true});
	  
         }
         }
// END LOAD BEER SLIDE
 
// *********   LIST ADS  

function listAds() { 
 $.ajax({
                    type: "POST",
                    url: "a_updatead.php",
                    cache: false,
                    data: {adlist : 'all'},
                    dataType:"json",
                    success: onSuccessAdLoad,
                    error: onErrorAdLoad
                });

             
         function onSuccessAdLoad(data, status) {
         
         $("#ad-message").html('<h5 style="text-align:center;">Select an Ad to Edit</h5>').show(10);
         $("#ad-id").val(data[0].id);
         $("#ad-title").val(data[0].ad_title);
         $("#ad-status").val(data[0].astatus);
         $("#ad-timing").val(data[0].atiming);
         $("#ad-order").val(data[0].aorder);
         // $("#splash-editor").text(data[0].ad_content);
          $("#splash-editor").val(data[0].ad_content);
         
          var selectlist = '<select data-inline="false" name="ad-list" id="ad-list">';
            
          Object.keys(data).forEach(function(key) {
            
              selectlist += '<option id="select_id'+data[key].id+'" value="'+data[key].id+'">'+data[key].id+' - '+data[key].ad_title+'</option>';
			  });
          
          selectlist += '</select>';

          $('#ad-select').append(selectlist);
          $('#ad-select').trigger('create');
           
          }        
           
        
           function onErrorAdLoad(data, status){}
 }
 
 
        </script>
                      
        
      
         
</body>
</html>

<?php
?>