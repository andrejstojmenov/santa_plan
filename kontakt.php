<?php require('initialize.php');?>


<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<?php 
		include('includes/html/head-shared.php')
	?>
	</head>
	<body>
		
	<?php 
		$activePage = 'kontakt';
		include('includes/html/main-header.php')
	?>
	
	<aside class="fh5co-page-heading">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1 class="fh5co-page-heading-lead">
						Контакт
						<span class="fh5co-border"></span>
					</h1>
					
				</div>
			</div>
		</div>
	</aside>
	
	<div id="fh5co-main">
		
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-push-4">
					
	<style>
       #map {
        height: 400px;
        width: 100%;
       }
    </style>
 
    <h4>Адреса: Никола Карев бр.3-1/2, Кочани</h4>
    <div id="map"></div>
    <script>
      function initMap() {
        var uluru = {lat: 41.915181, lng: 22.412584,};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 17,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDMq2C5PR01wMrSVp1VaNs9c0jktFuekXM&callback=initMap">
    </script>
				</div>


				<div class="col-md-4 col-md-pull-8">
					<ul style="list-style-type:disc">
                   <li><p style="margin: 0px;"><b>Телефон: 033-277-174</b></p></li>
                   <li><p style="margin: 0px;"><b>Мобилен: 070-309-765; 078-309-765</b></p></li>
				   <li><p style="margin: 0px;"><b>Email: santaplan@yahoo.com</b></p></li>
				   <li><a href="https://www.facebook.com/santaplan/" target="_blank"><font color="8A8685"><b>Facebook: Санта План Дооел</b></font></a></li>
				   <li><p style="margin: 0px;"><b>Работно време:</b></p></li></ul>
				     <ul>      <style type="text/css">
                            .tg  {border;border-spacing:0;}
                            .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
                            .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
                            .tg .tg-yw4l{vertical-align:top}
                           </style>
<table class="tg">

  <tr>
    <th class="tg-031e"><font color="grey">Понеделник</th>
    <th class="tg-yw4l">07:00 - 17:00</th>
  </tr>
  <tr>
    <td class="tg-yw4l"><font color="grey">Вторник</td>
    <td class="tg-yw4l">07:00 - 17:00</td>
  </tr>
  <tr>
    <td class="tg-yw4l"><font color="grey">Среда</td>
    <td class="tg-yw4l">07:00 - 17:00</td>
  </tr>
  <tr>
    <td class="tg-yw4l"><font color="grey">Четврток</td>
    <td class="tg-yw4l">07:00 - 17:00</td>
  </tr>
  <tr>
    <td class="tg-yw4l"><font color="grey">Петок</td>
    <td class="tg-yw4l">07:00 - 17:00</td>
  </tr>
  <tr>
    <td class="tg-yw4l"><font color="grey">Сабота</td>
    <td class="tg-yw4l">07:00 - 13:00</td>
  </tr>
</table>
				    </ul>
				</div>
			</div>
		</div>
	</div>

			

				<iframe src='contact/contactform.php' frameborder='0' width='100%' height='600' ></iframe>
	
	
	
	
	
	
<			<div class="container">
				<div class="row fh5co-row-padded fh5co-copyright">
					<div class="col-md-5">
					<p><small> Санта План 2002 - 2017. Сите права задржани.</small></p>
					</div>
				</div>
			</div>
	
	


	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Owl carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<!-- Main JS -->
	<script src="js/main.js"></script>

	
	</body>
</html>
