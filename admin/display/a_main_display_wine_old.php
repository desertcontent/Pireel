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
	 <link rel="stylesheet" href="/css/display1_wine.css" /> 
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
				padding:0px;
				position:absolute;
				top:0;
				width:100%;
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
 #specials > .header{font-size:60px;font-weight:bold;vertical-align:top;margin-top:0px;padding-top:0px;color:#ffffff; }
 
 
 #specials > .title{margin-top:25px;font-size:45px;font-weight:bold;}
 #specials > .heading{padding-top:10px;font-size:30px;font-style: italic;}
 #specials > .subheading{padding-top:5px;font-size:30px;font-style: italic;}
 #specials > .details{padding-top:5px;font-size:30px;}  
 
#specialsboard {width:100%;background:transparent url(../../images/caption-bg.png) 0 0 repeat;-moz-border-radius:20px;
-webkit-border-radius:20px;
-khtml-border-radius:20px;
border-radius:20px;
/*padding:30px; */
/*max-width:1500px;*/
}
 
#specialsboard > h1,#specials > h2,#specials > h3,#specials > h4,#specials > h5,#specials > h6,#specials > p{color:#ffffff; font-weight:normal;margin:0px;} 
 #specialsboard > .header{font-size:70px;font-weight:bold;vertical-align:top;margin-top:0px;padding-top:0px;color:#ffffff; }
 
 #specialsboarda {margin-left:20px;margin-right:20px;clear:left;width:44%;display:inline;float:left; background:transparent url(/images/caption-bg.png) 0 0 repeat;padding10px;padding-left:75px;height:500px;margin-top:300px;}
 #specialsboardb {margin-right:20px;width:44%;display:inline;float:right; background:transparent url(/images/caption-bg.png) 0 0 repeat;padding:10px;padding-left:25px;height:400px;margin-top:500px;margin-right:150px;}
  
 #specialsboarda > .title{margin-top:25px;font-size:45px;font-weight:bold;}
 #specialsboarda > .heading{padding-top:10px;font-size:30px;font-style: italic;line-height:40px;}
 #specialsboarda > .subheading{padding-top:5px;font-size:30px;font-style: italic;line-height:40px;}
 #specialsboarda > .details{padding-top:5px;font-size:30px;font-style: italic;line-height:40px;}  
 
 #specialsboardb > .title{margin-top:25px;font-size:45px;font-weight:bold;}
 #specialsboardb > .heading{padding-top:10px;font-size:30px;font-style: italic;line-height:40px;}
 #specialsboardb > .subheading{padding-top:5px;font-size:30px;font-style: italic;line-height:40px;}
 #specialsboardb > .details{padding-top:5px;font-size:30px;font-style: italic;line-height:40px;}  



#adboard {width:100%;background:transparent url(/images/caption-bg.png) 0 0 repeat;-moz-border-radius:20px;
-webkit-border-radius:20px;
-khtml-border-radius:20px;
border-radius:20px;
/*padding:30px; */
/*max-width:1500px;*/
}
 
#adboard > h1,#adboard > h2,#adboard > h3,#adboard > h4,#adboard > h5,#adboard > h6,#adboard > p{color:#ffffff; font-weight:normal;margin:0px;} 
 #adboard > .header{font-size:70px;font-weight:bold;vertical-align:top;margin-top:0px;padding-top:0px;color:#ffffff; }
 
 #adboarda {clear:left;width:49%;display:inline;float:left;  padding-left:40px;}
 #adboardb {width:46%;display:inline;float:right;  }
  
 #adboarda > .title{margin-top:25px;font-size:45px;font-weight:bold;}
 #adboarda > .heading{padding-top:10px;font-size:30px;font-style: italic;line-height:40px;}
 #adboarda > .subheading{padding-top:5px;font-size:30px;font-style: italic;line-height:40px;}
 #adboarda > .details{padding-top:5px;font-size:30px;font-style: italic;line-height:40px;}  
 
 #adboardb > .title{margin-top:25px;font-size:45px;font-weight:bold;}
 #adboardb > .heading{padding-top:10px;font-size:30px;font-style: italic;line-height:40px;}
 #adboardb > .subheading{padding-top:5px;font-size:30px;font-style: italic;line-height:40px;}
 #adboardb > .details{padding-top:5px;font-size:30px;font-style: italic;line-height:40px;}  


 
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
 
   #wine{padding-top:0px;margin-top:15px;}
 .wine-special-header{font-size:90px;text-align:center;margin-top:10px;}
 
 .swine-slide{color:#ffffff;clear:both;margin-top:25px;text-shadow: 0px 1px 0px #999, 0px 2px 0px #888, 0px 3px 0px #777, 0px 4px 0px #666, 0px 5px 0px #555, 0px 6px 0px #444, 0px 7px 0px #333, 0px 8px 7px #001135; background:transparent url(/images/caption-bg.png) 0 0 repeat;
	 padding:30px;
	 -webkit-border-radius:20px;
-khtml-border-radius:20px;
border-radius:20px;

 }

 .swine-name{font-size:80px;clear:both;color:#ffffff;}
  .swine-desc{max-height:350px;height:350px;}
 .swine-slide{font-size:40px;}
 .swine-style{font-size:70px;}
 .swine-abv{font-size:60px; margin-right:25px;}
 .swine-ibu{font-size:60px; margin-right:25px;}
 .swinery-block{margin-top:25px;}

 .swinery-block img{width:200px;margin-right:25px;vertical-align:top;float:left;}
 .swinery-name{font-size:60px;}
 .swinery-city{font-size:50px; margin-right:25px;}
 .swinery-url{font-size:50px; margin-right:25px;}
 
 .swine-glass{font-size:70px; margin-right:100px; }
 .swine-growler{font-size:70px;  }
 

 
 
 
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
 
 #slidetext{
	 font-size:45px;
	 background-color:#ff0000;
	 height:100px;
	 width:500px;
	 position:absolute;
	 z-index:99;
	 left:0px;
	 	 top:0px;
	 
	 
 }
  		</style>
	       
<style type="text/css">
      .js #flash {display: none;}
    </style>
    <script type="text/javascript">
      document.documentElement.className = 'js';
    </script>		
</head>
<body style="background:transparent url(/images/randalls/logo_splash.jpg) 0 0 no-repeat;overflow:hidden;">
       <!-- JQM PAGE-->
    <div data-role="page" id="listbeergrid" data-theme="d" style="background: #000000;" >
      <!--  <div data-role="header"  data-theme="b">
            <h1>Beers Display</h1>
        </div>-->
  
        <div data-role="content" style="padding:0px;" id="slides"> 
            
                         
            <div id="slideblock">
         	<div id="beers-gridview">
	         	<a href="#" data-inline="true" data-theme="b"  style="width:100%;"></a>
			</div> 
			
			<div id="wines-gridview">
	         	<a href="#" data-inline="true" data-theme="b"  style="width:100%;"></a>
			</div> 
		  	
		  	 <div id="marqueescroll" class="marquee"></div> 		  	 		  	
		  	<div   id="specials-ad" class="in-slide-content" style="width:100%;"></div>
		  	
		  	<div id="ad-container" >		
				<div id="ad-01-content" class="in-slide-content" style="margin:0px;padding:0px;float:none;position:relative;width:100%;"></div> 
			</div> 
			<div id="wineofday">
				 <div id="wine" class="in-slide-contentb" style=""></div>	
			</div>
			
			<div id="beerofday">
				 <div id="beer" class="in-slide-contentb" style=""></div>	
			</div>
			
			<div id="slideshow">	   
			</div>
			
			 <div id="vendorblock" style="position:absolute;top:0px;left:0px;z-index:10000;display:none;"><img alt="" src="../../images/randalls/randalls_logo_white.png" style="width:150px;margin-top:1000px;margin-left:25px;z-index:10000;" /> </div>
            </div>  
			<div id="logoblock" style="position:absolute;top:0px;left:0px;z-index:10000;"><!--<img alt="" src="../../images/datafog_logo_white.png" style="width:200px;margin-top:920px;margin-left:25px;z-index:10000;" />--><img alt="" src="/images/randalls/randalls_logo_white.png" style="width:150px;margin-top:1025px;margin-left:1750px;z-index:10000;" /></div>
			
			<img src="/admin/ckeditor/kcfinder/upload/images/pireel_logo.png" style="display:none;"/>
			<img src="/admin/ckeditor/kcfinder/upload/images/Badgers_1.png" style="display:none;"/>
			<img src="/images/urbane_logo.png" style="display:none;"/>
			<img src="/images/specials_bg.png" style="display:none;"/>
			<img src="/images/dartboard_bg.png" style="display:none;"/>
			<img src="/images/splash.png" style="display:none;"/>
			<img src="/images/collage.png" style="display:none;"/>
			<img src="/images/couple.png" style="display:none;"/>
			<img src="/images/wedding.png" style="display:none;"/>
			<img src="/images/cuban_cigars.jpeg" style="display:none;"/>
			<img src="/images/trivianight.png" style="display:none;"/>
			<img src="/images/cocktails.png" style="display:none;"/>
			<img src="/images/fruit.png" style="display:none;"/>
			<img src="/images/urbane_holiday_greetings.png" style="display:none;"/>
			<img src="/images/background_stars.png" style="display:none;"/>
			<img src="/images/gone_mobile.png" style="display:none;"/>
			<img src="/images/background_wine2.png" style="display:none;"/>
			<img src="/images/newyears.png" style="display:none;"/>

            </div>  
            </div>
   <script src="/js/jquery-1.8.2.min.js"></script>

	 <script src="/js/jquery.mobile-1.3.0-rc.1.min.js"></script>
	 

     <script type="text/javascript" src="/js/jquery.dotdotdot.min.js"></script> 
      <script src="/js/jquery.marquee.js"  type="text/javascript"></script>       
      
  <script>
  					function slideshow() {
  					$('#ad-01-content').html("");
  					//$('#vendorblock').show(10); 
  					$('#marqueescroll').html("");
  					$('#wines-gridview').html("");  
  					$('#beers-gridview').html("");	
  					$('#specials-ad').html("");
  					$('#wine').css('background','transparent').html('').hide(10);
  					$('#beer').css('background','transparent').html('').hide(10);
  					     var slides ='<div><img src="../beerimages/201.jpg"></div>';
  					     slides += '<div><img src="../beerimages/1827.jpg"></div>';
  					     slides += '<div><img src="../beerimages/2447.jpg"></div>';
   
	  				     $('#slideshow').append(slides);
	  					$("#slideshow > div:gt(0)").hide();

						setInterval(function() { 
						  $('#slideshow > div:first')
						    .fadeOut(500)
						    .next()
						    .fadeIn(500)
						    .end()
						    .appendTo('#slideshow');
						},  3000);
						
						setTimeout(function() { 
						  $("#slideshow").after('<div id="slidetext">THIS IS THE TEXT</div>').trigger('create');
						 	$("#slidetext").animate({
							  left:'500px',
							   height:'250px',
							   width:'700px' 
				  },1000);
						},  3000);
	
	  					}		
  		 
  				
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
	   			   $('#wines-gridview').hide(10);
	   			   $('#beer').css('background','transparent').html('').hide(10);
	   			   $('#wine').css('background','transparent').html('').hide(10);
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
	   			   $('#wines-gridview').hide(10);
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
          //$('#vendorblock').hide(10);       
          $('#marqueescroll').html(""); 
           $('#beer').css('background','transparent').html('').hide(10);
           $('#wine').css('background','transparent').html('').hide(10);		
		   $('#beers-gridview').html("");
		   $('#wines-gridview').html("");
		   $('#specials-ad').html("");	
     	  $('#ad-01-content').html(data[0].ad_content);
          $('#ad-01-content').trigger('create').show(10);
           
          }        
          
         function onErrorAdLoad(data, status){}
				}
		 
		 //loadad(2);

// *********  WINE GRID	*********
		function listWines(beerstatus){ 

				 
                $.ajax({
                    type: "POST",
                    url: "../a_listwines.php",
                    cache: false,
                    async:false,
                    //data: formData,
                    //data: {wine_status : winestatus},
                    data: {wine_view : "ACTIVE", wine_select : '',wine_sort : 'wine_name'},
                    dataType:"json",
                    success: onSuccesswineList,
                    error: onError
                });
                
                 function onSuccesswineList(data, status)
        {
			 
						
				
// LOAD BUSINESS BRANDING BLOG INTO GRIDVIEW
       // $('#vendorblock').show(10);
		$('#ad-01-content').html("");
		$('#wine').hide(10).html("");	
		$('#specials-ad').html("");	
		$('#beers-gridview').html("");
     	$('#wines-gridview').html("");
     		             
            $('#wines-gridview').append('<a href="#" data-role="button" data-inline="true" data-theme="b" class="col1 company-block" style="background:transparent url(/images/winelist_logo.png) 210px 10px no-repeat;background-size:562px 125px;"><div id="test" style="display:none;"><!--<h3 class="ui-li-heading" style="margin-left:25px;">Urbane Hospitality</h3><p style="margin-left:25px;"class="wine-style">Sheboygan, Wisconsin</p><p  style="margin-left:25px;"class="brewery-name">Our Fine Wine List</p><p  style="margin-left:25px;"class="brewery-city">Select Wines For Your Meal</p><p  class="ui-li-desc wine-desc">The Pour House Grill is in Bend, Oregon</p><p class="ui-li-desc wine-abv"></p><p class="ui-li-desc wine-ibu"></p><p class="ui-li-desc wine-glass"> </p><p class="ui-li-desc wine-growler"> </p></div><div id="test2"><p  class="brewery-name">Sheboygan\'s Home for Great wine!</p><p  class="brewery-city">... And Great Food To Match!</p><p  class="brewery-name">Try One of Our 1/2 Pound Burgers</p><p  class="brewery-city" style="font-size:80%">They\'re Becoming a Sheboygan Favorite!</p>--></div></a>'); 

 //$('#wines-gridview').append('<a href="#" data-role="button" data-inline="true" data-theme="b" class="company-block"><h2>wine Menu</h2></a>'); 
			 		
			 					    					 
// LOAD BEERS INTO GRID AND SPLASH								   
            Object.keys(data).forEach(function(key) {
// LOAD wineS INTO GRID  (images from original source url          
           // $('#wines-gridview').append('<a id="'+data[key].id+'" href="#" data-role="button" data-inline="true" data-theme="b" class="col1"  style="min-width:475px;"><img class="ui-li-thumb" src="'+data[key].wine_label_url+'"/><h3 class="ui-li-heading winenamex">'+data[key].wine_name+'</h3><p class="wine-style wineshadow">'+data[key].wine_style+'</p><p  class="winery-name wineshadow">'+data[key].winery_name+'</p><p  class="winery-city wineshadow">'+data[key].winery_city+'</p><p  class="ui-li-desc winery-durl  wineshadow">'+data[key].winery_url+'</p><p  class="ui-li-desc wine-desc">'+data[key].wine_desc+'</p><p class="ui-li-desc wine-abv">ABV: '+data[key].wine_abv+'%</p><p class="ui-li-desc wine-ibu">IBUs: '+data[key].wine_ibu+'</p><p class="ui-li-desc wine-glass">Pint: $'+data[key].wine_glass_price+'</p><p class="ui-li-desc wine-growler">Growler: $'+data[key].wine_growler_price+'</p></a>');
// LOAD wineS INTO GRID  (images from local stored files based on wine id            
            $('#wines-gridview').append('<a id="'+data[key].id+'" href="#" data-role="button" data-inline="true" data-theme="b" class="col1"  style="min-width:475px;"><img class="ui-li-thumb" src="../wineimages/'+data[key].id+'.jpg"/><h3 class="ui-li-heading winenamex">'+data[key].wine_name+'</h3><p class="wine-style wineshadow">'+data[key].wine_style+' &middot;'+data[key].wine_ibu+'</p><p  class="winery-name wineshadow">'+data[key].winery_name+'</p><p  class="winery-city wineshadow">'+data[key].winery_city.replace(/>/g,"&middot;")+'</p><!--<p  class="ui-li-desc winery-durl  wineshadow">'+data[key].winery_url+'</p>--><p  class="ui-li-desc wine-desc">'+data[key].wine_desc+'</p><!--<p class="ui-li-desc wine-abv">ABV: '+data[key].wine_abv+'%</p><p class="ui-li-desc wine-ibu">IBUs: '+data[key].wine_ibu+'</p><p class="ui-li-desc wine-glass">Pint: $'+data[key].wine_glass_price+'</p><p class="ui-li-desc wine-growler">Growler: $'+data[key].wine_growler_price+'</p>--></a>');
          
              
    
    });
$('#wines-gridview').trigger('create').show(10);
 $('.wine-desc').dotdotdot({watch:true});
			
// ADJUST BEER DESCRIPTION TO FIT                   
             

		  
        }  
// LOAD MARQUEE


// END LOAD MARQUEE       
        
        
        
			}	

// *********  WINE GRID	 END*********
		
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
       // $('#vendorblock').show(10);
		$('#ad-01-content').html("");
		$('#beer').hide(10).html("");
		$('#wine').hide(10).html("");		
		$('#specials-ad').html("");	
		$('#wines-gridview').html("");
     	$('#beers-gridview').html("");
     		             
            $('#beers-gridview').append('<a href="#" data-role="button" data-inline="true" data-theme="b" class="col1 company-block"><div id="test"><h3 class="ui-li-heading" style="margin-left:25px;">Urbane Hospitality</h3><p style="margin-left:25px;"class="beer-style">Sheboygan, Wisconsin</p><p  style="margin-left:25px;"class="brewery-name">Craft Beer Menu</p><p  style="margin-left:25px;"class="brewery-city">Craft Beers on TAP!</p><!--<p  class="ui-li-desc beer-desc">The Pour House Grill is in Bend, Oregon</p><p class="ui-li-desc beer-abv"></p><p class="ui-li-desc beer-ibu"></p><p class="ui-li-desc beer-glass"> </p><p class="ui-li-desc beer-growler"> </p></div><div id="test2"><p  class="brewery-name">Sheboygan\'s Home for Great Beer!</p><p  class="brewery-city">... And Great Food To Match!</p><p  class="brewery-name">Try One of Our 1/2 Pound Burgers</p><p  class="brewery-city" style="font-size:80%">They\'re Becoming a Sheboygan Favorite!</p>--></div></a>'); 

 //$('#beers-gridview').append('<a href="#" data-role="button" data-inline="true" data-theme="b" class="company-block"><h2>Beer Menu</h2></a>'); 
			 		
			 					    					 
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
            
            
            
            // *********  Single AD Text

	   function listAd1(bgimg,adtitle,pos,set)
	   {
				
			 
                  			 //LOAD SPECIALS SLIDE 
            					 
	 
				// var formData = $("#specialsForm").serialize();
  
                $.ajax({
                    type: "POST",
                    url: "../a_getspecials3.php",
                    cache: false,
                   /* data: formData,*/
                    dataType:"json",
                    success: onSuccessAd1,
                    error: onErrorAd1
                });
  
		function onSuccessAd1(data, status)
        {
         	//$('#vendorblock').hide(10);  
         	$('#ad-01-content').html("");
             $('#beer').css('background','transparent').html('').hide(10);
             $('#wine').css('background','transparent').html('').hide(10);
             $('#marqueescroll').html("");
             $('#wines-gridview').html(""); 
           $('#beers-gridview').html("");	
           // $('#specials-ad').html("");	          
           $('#specials-ad').html('<div id="adboard" class="dropshad" style="min-height:1080px;margin:0px;padding:0px;float:left;background: transparent url('+bgimg+') 0 0 no-repeat"><h2 class="header  class="textshadow"" style="text-align:center">'+adtitle+'</h2><div id="adboarda"></div><div id="adboardb"></div></div>');
		   
		    var spec1 ='<h2 class="title  textshadow">'+data.special_1+'</h2><h3 class="heading textshadow">'+data.special_1h+'</h3><h4 class="subheading textshadow">'+data.special_1s+'</h4><p  class="details textshadow">'+data.special_1d+'</p>';
			if(set == 1){spec1 ='<h2 class="title  textshadow">'+data.special_1+'</h2><h3 class="heading textshadow">'+data.special_1h+'</h3><h4 class="subheading textshadow">'+data.special_1s+'</h4><p  class="details textshadow">'+data.special_1d+'</p>';}
			if(set == 2){spec1 ='<h2 class="title  textshadow">'+data.special_2+'</h2><h3 class="heading textshadow">'+data.special_2h+'</h3><h4 class="subheading textshadow">'+data.special_2s+'</h4><p  class="details textshadow">'+data.special_2d+'</p>';}
			if(set == 3){spec1 ='<h2 class="title  textshadow">'+data.special_3+'</h2><h3 class="heading textshadow">'+data.special_3h+'</h3><h4 class="subheading textshadow">'+data.special_3s+'</h4><p  class="details textshadow">'+data.special_3d+'</p>';}
			if(set == 4){spec1 ='<h2 class="title  textshadow">'+data.special_4+'</h2><h3 class="heading textshadow">'+data.special_4h+'</h3><h4 class="subheading textshadow">'+data.special_4s+'</h4><p  class="details textshadow">'+data.special_4d+'</p>';}
			if(set == 5){spec1 ='<h2 class="title  textshadow">'+data.special_5+'</h2><h3 class="heading textshadow">'+data.special_5h+'</h3><h4 class="subheading textshadow">'+data.special_5s+'</h4><p  class="details textshadow">'+data.special_5d+'</p>';}
			if(set == 6){spec1 ='<h2 class="title  textshadow">'+data.special_6+'</h2><h3 class="heading textshadow">'+data.special_6h+'</h3><h4 class="subheading textshadow">'+data.special_6s+'</h4><p  class="details textshadow">'+data.special_6d+'</p>';}
			
			
			
			
			 $('#adboard'+pos+'').append(spec1);
			//if(pos=='a'){$('#adboarda').append(spec1);}
			//if(pos=='b'){$('#adboarda').append(spec1);}
						
			$('#specials-ad').trigger('create').show(10);

        }
  
        function onErrorAd1(data, status)
        {
            // handle an error
        }       
			
	
			}	 

		    
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
         	//$('#vendorblock').hide(10);  
         	$('#ad-01-content').html("");
            $('#beer').css('background','transparent').html('').hide(10);
            $('#wine').css('background','transparent').html('').hide(10);
             $('#marqueescroll').html("");
             $('#wines-gridview').html(""); 
           $('#beers-gridview').html("");	
           // $('#specials-ad').html("");	
           	           
           $('#specials-ad').html('<div id="specialsboard" class="dropshad" style="min-height:1080px;margin:0px;padding:0px;float:left;background: transparent url(/images/collage.png) 0 0 no-repeat;"><h2 class="header  class="textshadow"" style="text-align:center;padding-top:50px;"></h2><h2 class="header  class="textshadow"" style="text-align:center;padding-top:0px;margin-top:0px;"></h2><!--<div id="specialsboarda" class="rounded"></div>--><div id="specialsboardb" class="rounded"></div></div>');

			var spec1 ='<h2 class="title  textshadow">'+data.special_1+'</h2><h3 class="heading">'+data.special_1h+'</h3><h4 class="subheading">'+data.special_1s+'</h4><p  class="details">'+data.special_1d+'</p>';
			//$('#specialsboarda').append(spec1);
			 var spec2 ='<h2 class="title textshadow">'+data.special_2+'</h2><h3 class="heading">'+data.special_2h+'</h3><h4 class="subheading">'+data.special_2s+'</h4><p  class="details">'+data.special_2d+'</p>';
			//$('#specialsboarda').append(spec2);
			 var spec3 ='<h2 class="title textshadow">'+data.special_3+'</h2><h3 class="heading">'+data.special_3h+'</h3><h4 class="subheading">'+data.special_3s+'</h4><p  class="details">'+data.special_3d+'</p>';
			//$('#specialsboarda').append(spec3);
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
         	//$('#vendorblock').hide(10);  
         	$('#ad-01-content').html("");
             $('#beer').css('background','transparent').html('').hide(10);
              $('#wine').css('background','transparent').html('').hide(10);
            $('#marqueescroll').html(""); 
            $('#wines-gridview').html(""); 
           $('#beers-gridview').html("");	
           // $('#specials-ad').html("");
           	$('#specials-ad').css("background","transparent url(/images/specials_bg.png) 0 0 no-repeat");          
           $('#specials-ad').html('<div id="specials" class="dropshad" style="display:inline-block;float:left;background: transparent url(/images/caption-bg.png) 0 0 repeat"><h2 class="header" style="text-align:center;padding-top:25px;">Today\'s Specials</h2></div><div style="display:inline-block;float:right;width:49%;margin-top:50px;"><h2 class="header" style="font-size:60px;font-style:italic;margin-top:0px;">Try Our Cuban Cigars!!</h2><img src="/images/cuban_cigars.jpeg" style="margin-top:50px;border:5px solid #000000;width:800px;"/><h2 class="header" style="font-size:60px;font-style:italic;margin-top:50px;text-align:center;">You Can\'t Smoke Them!! <br />You Eat Them!</h2></div>');

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
	   	   
// WINE OF THE DAY

    	   
	   	   
	   function listWineofDay() 
	   {
		   	  
		  // Get Wine Of the Day
		   $.ajax({
                    type: "POST",
                    url: "../a_getwinespecials.php",
                    cache: false,
                    data: {winecount : 1},
                    dataType:"json",
                    //async: false,
                    success: onSuccessWineSpecial,
                    error: onErrorWineSpecial
                });

		   function onSuccessWineSpecial(data, status) {getWine2(data[0].id);}  
		   function onErrorWineSpecial(data, status) {getWine2('santa-margherita-pinot-grigio-2011');} 
	 		   
	   }
          //listWineofDay();                         
     	// LOAD WINE SLIDE	
		function getWine2(wineid){ 
								 
                $.ajax({
                    type: "POST",
                    url: "../a_getwine.php",
                    cache: false,
                    //data: formData,
                    
                    data: {wineid_req : wineid},
                    dataType:"json",
                    success: onSuccessWineView,
                    error: onErrorWineView
                });
                
			}	
		
		function onErrorWineView(data, status){
            // handle an error
        } 
			
		function onSuccessWineView(data, status){ if(data != false){ 
               
			$('#ad-01-content').html("");
			//$('#vendorblock').show(10); 
            $('#marqueescroll').html("");
            $('#wines-gridview').html("");  
           $('#beers-gridview').html("");	
           $('#specials-ad').html("");
          $('#wine').css('background','transparent').html('').hide(10);
           $('#wine').css("background","transparent url(/images/background_wine2.png) 0 0 no-repeat"); 
          //$('#wine').css("background","#000000");        
         $('#wine').html('<div class="wine-special-header textshadow">Our Wine of the Day</div><div class="swine-slide" ><div class="slabel-block"><img src="../wineimages/'+data.id+'.jpg"/><p class="swine-style">'+data.wine_style+' &middot; '+data.wine_ibu+'</p><p class="swine-abv"> &nbsp;'+data.winery_name+'</p><p class="swine-ibu">'+data.winery_city.replace(/>/g,"&middot;")+'</p></div><h3 class="swine-name">'+data.wine_name+'</h3><p  id="swine-desc" class="swine-desc">'+data.wine_desc+'</p><!--<div class="swinery-block"><img class="swinery-label" src="../wineryimages/'+data.id+'.jpg"/><p  class="swinery-name">'+data.winery_name+'</p><p class="swinery-city ">'+data.winery_city.replace(/>/g,"&middot;")+'</p><!--<p class="swinery-url">'+data.winery_url+'</p>--></div><div class="sprice-block"><span class="swine-glass">Glass: $6.50</span><span class="swine-growler">Bottle: $'+data.wine_growler_price+'</span></div></div>');
    
    
    
	$('#wine').trigger('create').show(10);
	 $('.swine-desc').dotdotdot({watch:true});
	  
         }
         }




// END WINE OF THE DAY
	   	   
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
			//$('#vendorblock').show(10); 
            $('#marqueescroll').html("");
            $('#wines-gridview').html("");  
           $('#beers-gridview').html("");	
           $('#specials-ad').html("");
          $('#beer').css('background','transparent').html('').hide(10);
          $('#beer').css("background","transparent url(/images/dartboard_bg.png) 0 0 no-repeat");        
         $('#beer').html('<div class="beer-special-header textshadow">Craft Beer of the Day</div><div class="sbeer-slide" ><div class="slabel-block"><img src="../beerimages/'+data.id+'.jpg"/><p class="sbeer-style">'+data.beer_style+'</p><p class="sbeer-abv">ABV: &nbsp;'+data.beer_abv+'%</p><p class="sbeer-ibu">IBUs: '+data.beer_ibu+'</p></div><h3 class="sbeer-name">'+data.beer_name+'</h3><p  id="sbeer-desc" class="sbeer-desc">'+data.beer_desc+'</p><div class="sbrewery-block"><img class="sbrewery-label" src="../breweryimages/'+data.id+'.jpg"/><p  class="sbrewery-name">'+data.brewery_name+'</p><p class="sbrewery-city ">'+data.brewery_city+'</p><p class="sbrewery-url">'+data.brewery_url+'</p></div><div class="sprice-block"><span class="sbeer-glass">Pint: $3.50</span><span class="sbeer-growler">Growler: $'+data.beer_growler_price+'</span></div></div>');
    
    
    
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