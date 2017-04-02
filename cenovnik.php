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
	
	<link href="css/cenovnikform.css" rel="stylesheet" type="text/css" />
	
	</head>
	<body>
		
		<?php 
		$activePage = 'cenovnik';
		include('includes/html/main-header.php')
	?>
	<!-- END .header -->
	
	<aside class="fh5co-page-heading">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1 class="fh5co-page-heading-lead">
						ЦЕНОВНИК
						<span class="fh5co-border"></span>
					</h1>
					
				</div>
			</div>
		</div>
	</aside>
	
	<!-- kalkulator za cenovnik -->
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-sm-10">
	
	<form action="" id="cenovnikform" onsubmit="return false;">
        <div>
            <div class="cont_order">
               <fieldset>
                <legend>Санта План го задржува правото за промена на цените</legend>
                
                <label class='radiolabel'><input type="radio"  name="selectedprice" value="3500" onclick="calculateTotal()" />Фирма нерегистриран даночен обврзник со еден вработен (3500ден + ДДВ)</label><br/>
                <label class='radiolabel'><input type="radio"  name="selectedprice" value="4500" onclick="calculateTotal()" />Фирма регистриран даночен обврзник на 3-месеци со еден вработен и еден фискален апарат (4500ден + ДДВ)</label><br/>
                <label class='radiolabel'><input type="radio"  name="selectedprice" value="6500" onclick="calculateTotal()" />Фирма регистриран даночен обврзник на 1-месец со еден вработен и еден фискален апарат (6500ден + ДДВ)</label><br/>
                
                <br/>
                <label >Број на вработени</label>
         
                <select id="vraboteni_br" name='vraboteni' onchange="calculateTotal()">
                <option value="0">1</option>
                <option value="1000">1-5 (1000ден)</option>
                <option value="2000">5-10 (2000ден)</option>
                <option value="3000">10-15 (3000ден)</option>
                <option value="4000">15-25 (4000ден)</option>
                <option value="5000">25-35 (5000ден)</option>
                <option value="6000">35-50 (6000ден)</option>
				<option value="7000">50+ (над 7000ден)</option>
                
               </select>
                <br/>
                <p>
                <label for='platenpromet' class="inlinelabel">За превземање дејствија околу платниот промет (носење пари, пишување налози и сл. (1800ден)</label>
               <input type="checkbox" id="platenpromet" name='platenpromet' value="1800" onclick="calculateTotal()" /> <br />
			    <label for='obrasci' class="inlinelabel">За поплнување на статистички обрасци (300ден)</label>
               <input type="checkbox" id="obrasci" name='obrasci' value="300" onclick="calculateTotal()" />  <br />
			   </p>
			   <li style=margin:0px>Пополнување на обрасци за кредит за <u>фирма</u> (1000ден)</li>
			   <li style=margin:0px>Пополнување на обрасци за кредит за <u>лице во фирма</u> (300ден)</li>
               <li style=margin:0px>Пријава на работник 500ден</li>
			   <li style=margin:0px>Одјава на работник 300ден</li>
			   
                
                <div id="totalPrice"></div>
                
                </fieldset>
            </div>
            
        	<div id="totalPrice"></div>
            
        </div>  
       </form>
	
	
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
