<?php require('initialize.php');
	$auth->notLoggedIn();
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<?php 
		include('includes/html/head-shared.php')
		
	?>
	
		<link href="css/cenovnikform.css" rel="stylesheet" type="text/css" />
		<link href="kalkulator.plata/style.css" rel="stylesheet" type="text/css">
		<link href="kalkulator.plata/print.css" rel="stylesheet" type="text/css" media="print">
		
		
		<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.0.7/angular.min.js"></script>
		<script src="kalkulator.plata/controllers.js"></script>
	</head>
	<body ng-app="">
		
		<?php 
		$activePage = 'presmetka_plata';
		include('includes/html/main-header.php')
	?>
	<!-- END .header -->
	
	<aside class="fh5co-page-heading">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1 class="fh5co-page-heading-lead">
						Пресметка на бруто и нето плата
						<span class="fh5co-border"></span>
					</h1>
					
				</div>
			</div>
		</div>
	</aside>
	
	<!-- kalkulator za cenovnik -->
		<div class="container">
			<div class="row">

   <form name="myForm" ng-controller="Calculator">
   <table id="form">
      <tr>
         <td>Бруто:</td>
         <td>
            <input type="number" name="bruto" ng-model="bruto" placeholder="бруто"
               ng-change="bruto_change()" min="{{min_bruto_plata}}"/>
            <span class="error" ng-show="myForm.bruto.$error.number">Не е број!</span>
            <span class="error" ng-show="myForm.bruto.$error.min">Минимум бруто плата е {{min_bruto_plata}}!</span>
            <span class="error" ng-hide="myForm.bruto.$valid">Невалиден број!</span>
         </td>
      </tr>
      <tr>
         <td>Нето:</td>
         <td>
            <input type="number" name="neto" ng-model="neto" placeholder="нето"
               ng-change="neto_change()" min="{{min_neto_plata}}"/>
            <span class="error" ng-show="myForm.neto.$error.number">Не е број!</span>
            <span class="error" ng-show="myForm.neto.$error.min">Минимум нето плата е {{min_neto_plata}}!</span>
            <span class="error" ng-hide="myForm.neto.$valid">Невалиден број!</span>
         </td>
      </tr>
   </table>


   <table id="results">
      <tbody><tr>
         <td>Бруто плата</td>
         <td></td>
         <td>{{bruto}}</td>
      </tr><tr>
         <td>Придонес за пензискo осигурување</td>
         <td>{{k.penzisko * 100}}%</td>
         <td>{{penzisko}}</td>
      </tr><tr>
         <td>Придонес за здравствено осигурување</td>
         <td>{{k.zdravstveno * 100}}%</td>
         <td>{{zdravstveno}}</td>
      </tr><tr>
         <td>Придонес за вработување</td>
         <td>{{k.pridones * 100}}%</td>
         <td>{{pridones}}</td>
      </tr><tr>
         <td>Придонес за професионално заболување</td>
         <td>{{k.boluvanje * 100}}%</td>
         <td>{{boluvanje}}</td>
      </tr><tr>
         <td>Вкупно придонеси</td>
         <td></td>
         <td>{{pridonesi}}</td>
      </tr><tr>
         <td>Бруто - придонеси</td>
         <td></td>
         <td>{{bruto_minus_pridonesi}}</td>
      </tr><tr>
         <td>Даночно ослободување</td>
         <td></td>
         <td>{{danocno_osloboduvanje}}</td>
      </tr><tr>
         <td>Даночна основа</td>
         <td></td>
         <td>{{osnovica_za_danok}}</td>
      </tr><tr>
         <td>Персонален данок</td>
         <td>{{k.personalen * 100}}%</td>
         <td>{{personalec}}</td>
      </tr><tr>
         <td>Вкупно придонеси и данок</td>
         <td></td>
         <td>{{personalec + pridonesi}}</td>
      </tr><tr>
         <td>Нето плата</td>
         <td></td>
         <td>{{neto}}</td>
      </tr>
   </tbody></table>
   </form>

					
				
			</div>
		</div>	
	
	
	
	<!-- kraj kalkulator za cenovnik -->
			
			
			<footer id="fh5co-footer">
		
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<div class="fh5co-footer-widget">
						<h2 class="fh5co-footer-logo"><font color="8A8685">Санта План</font></h2>
					</div>
					<div class="fh5co-footer-widget">
						<ul class="fh5co-social">
							<li><a href="https://www.facebook.com/santaplan/"  target="_blank"><i class="icon-facebook" color="blue"></i></a></li>
							<li><a href="https://plus.google.com/104072795250535431891" target="_blank"><i class="icon-google"></i></a></li>
						</ul>
					</div>
				</div>

			
			<div class="col-md-5 col-sm-6" >
				<div class="fh5co-footer-widget ">
						<h3 class="fh5co-footer-lead "><h1><font color="8A8685">Контакт</font></h1></h3>
						<ul>
							<li><a href="https://www.google.mk/maps/place/SANTA+PLAN+Dooel/@41.9137798,22.4128048,16z/data=!4m5!3m4!1s0x0:0xd6b2c3ae5aa59d31!8m2!3d41.91518!4d22.4125546?hl=en"target="_blank"><font color="8A8685">Адреса: Никола Карев бр.3/1-2 , 2300 Кочани, Македонија</font></a></li>
							<li style="margin: 0px;">Телефон: 033-277-174</li>
							<li style="margin: 0px;">Мобилен: 070-309-765; 078-309-765</li>
							<li style="margin: 0px;">Email: santaplan@yahoo.com</li>
							<li><a href="https://www.facebook.com/santaplan/" target="_blank"><font color="8A8685">Facebook: Санта План Дооел </font></a></li></ul>
					<div class="fb-like" data-href="https://www.facebook.com/santaplan/?ref=aymt_homepage_panel" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
				</div>		
			</div>

				<div class="row fh5co-row-padded fh5co-copyright">
					<div class="col-md-5">
					<p><small> Санта План 2002 - 2017. Сите права задржани.</small></p>
					</div>
				</div>
			</div>
		</div>
	</footer>
	
	<!-- Owl Carousel -->
		<!-- Important Owl stylesheet -->
		<link rel="stylesheet" href="owl.carousel/owl-carousel/owl.carousel.css">
	 
		<!-- Default Theme -->
		<link rel="stylesheet" href="owl.carousel/owl-carousel/owl.theme.css">
		 
		<!--  jQuery 1.7+  -->
		<script src="owl.carousel/assets/js/jquery-1.9.1.min.js"></script>
		
		<!-- jQuery Easing -->
		<script src="js/jquery.easing.1.3.js"></script>
	 
		<!-- Include js plugin -->
		<script src="owl.carousel/owl-carousel/owl.carousel.js"></script>
	
	<!-- End Owl Carousel -->
	
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<!-- Main JS -->
	<script src="js/main.js"></script>
	
	</body>
</html>
