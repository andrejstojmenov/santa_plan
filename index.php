<?php require('initialize.php');?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	
	<!-- JQuery UI CSS -->
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	
	<?php 
		include('includes/html/head-shared.php')
	?>
	</head>

	<body>
	
	<?php 
		$activePage = 'index';
		include('includes/html/main-header.php')
	?>
	
	<!-- END .header -->
	
	
	
	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
	
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
	<li data-target="#carousel-example-generic" data-slide-to="3"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
		<h3 class="text-center">ДОБРЕДОЈДОВТЕ ВО САНТА ПЛАН</h3>
		<p class="text-center">УСПЕШНИ СО НАЈУСПЕШНИТЕ</p>
		<img style="margin:0 auto" src="images/handshake.jpg" alt="...">
    </div>
    <div class="item">
		<h3 class="text-center">ПОВЕЌЕ ОД 15 ГОДИНИ УСПЕШНИ НА ПАЗАРОТ</h3>
		<p class="text-center">НАШИТЕ КЛИЕНТИ СЕ НАШЕ СЕМЕЈСТВО</p>
		<img style="margin:0 auto" src="images/time.jpg" alt="...">
    </div>
	<div class="item">
		<h3 class="text-center">ЗАДОВОЛСТВОТО НА КЛИЕНТИТЕ Е НАШЕТО БОГАТСТВО</h3>
		<p class="text-center"></p>
		<img style="margin:0 auto" src="images/clients.jpg" alt="...">
    </div>
	<div class="item">
		<h3 class="text-center">СТАНЕТЕ И ВИЕ ДЕЛ ОД УСПЕШНИТЕ ПРИКАЗНИ</h3>
		<p class="text-center"></p>
		<img style="margin:0 auto" src="images/santaplan_740x284.jpg" alt="...">
    </div>
    ...
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
	
	<div id="fh5co-main">
		<!-- Features -->

		<div id="fh5co-features">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-sm-6 fh5co-feature-border">
						<div class="fh5co-feature">
							<div class="fh5co-feature-icon to-animate">
								<i class="icon-bag"></i>
							</div>
							<div class="fh5co-feature-text">
								<h3>Сметководствена визија</h3>
								<ul style="list-style-type:square">
								<li style="margin: 0px;"> доверливост и загарантирана тајност </li>
                                <li style="margin: 0px;"> експедитивност </li>
                                <li style="margin: 0px;"> точност на информациите </li>
                                <li style="margin: 0px;"> навремена обработка на документи</li>
                                <li style="margin: 0px;"> навремено информирање за новините во законските прописи</li>
                                <li style="margin: 0px;"> максимална одговорност кон клиентот </li>
				             </div>
						</div>
						    <div class="fh5co-feature ">
							     <div class="fh5co-feature-icon to-animate">
								    <i class="icon-arrow-right"></i>
							     </div>
						        <h3>Курсна листа - НБРМ </h3>
									<h4><script> document.write(new Date().toLocaleDateString()); </script></h4>
								
							
								<?php
									try {
									// креираме објект од класата SoapClient 
									$client = new SoapClient("http://www.nbrm.mk/klservice/kurs.asmx?wsdl", array('trace' => true));
								 
									// ја иницијализираме променливата $startDate на денешната дата
									date_default_timezone_set('Europe/Skopje');
									$startDate = date('d.m.Y');
								 
									// го извршуваме барањето со методот GetExchangeRates при што 
									// му проследуваме 2 аргументи, 'StartDate' и 'EndDate' чии што
									// вредности се еднакви на променливата $startDate
									$response = $client->GetExchangeRates(array('StartDate' => $startDate, 'EndDate' => $startDate));
								 
									// ја користиме функцијата simplexml_load_string за добиениот XML
									// да го претвориме во објект и едноставно да го користиме
									$data = simplexml_load_string($response->GetExchangeRatesResult);
								 
									// за да видите што содржи променливата $data
									// одкоментирајте го следниот ред
									// var_dump($data);
									?>
								<!-- Фино форматиран, излезот го прикажуваме со HTML -->
									<table id="currency_table">
										<tr>
											<th>Ознака</th>
											<th>Држава</th>
											<th>Ном.</th>
											<th>Куповен</th>
											<th>Продажен</th>
										</tr>
										<?php foreach ($data->KursZbir as $object) { ?>
											<tr>
												<td><?php echo $object->Oznaka ?></td>
												<td><?php echo $object->Drzava ?></td>
												<td><?php echo (int) $object->Nomin ?></td>
												<td><?php echo number_format(round((float) $object->Kupoven, 4), 4) ?></td>
												<td><?php echo number_format(round((float) $object->Prodazen, 4), 4) ?></td>
											</tr> 
								 
										<?php } ?>
									</table>
									<?php
								} catch (SoapFault $e) {
									echo "Грешка: <br/>";
									echo $e->getMessage();
								}
								?>
								
							</div>
					</div>
					<div class="col-md-6 col-sm-6">
						
						<div class="fh5co-feature">
							<div class="fh5co-feature-icon to-animate">
								<i class="icon-user"></i>
							</div>
							<div class="fh5co-feature-text">
								<h3>Корисни линкови</h3>
								<ul style="list-style-type:disc">
								<li><p><a href="http://www.ujp.gov.mk/"target="_blank" >Управа за Јавни Приходи</a></p></li>
								<li><p><a href="http://www.finance.gov.mk/"target="_blank">Министерство за Финансии</a></p></li>
								<li><p><a href="http://www.crm.com.mk/DS/"target="_blank">Централен Регистар</a></p></li>
								<li><p><a href="http://avrm.gov.mk/"target="_blank">Агенција за вработување</a></p></li>
								<li><p><a href="http://www.piom.com.mk/"target="_blank">Фонд за Пензиско и Инвалидско Осигурување</a></p></li>
								<li><p><a href="http://www.dpi.gov.mk/"target="_blank">Државен Пазарен Инспекторат</a></p></li> </ul>
							</div>
						</div>
						
						<div class="fh5co-feature">
						     <div class="fh5co-feature-icon to-animate">
								<i class="icon-calendar"></i>
							</div>
							<div class="pull-left">
								<h3>Календар</h3>
								<div id="datepicker"></div>
							</div>
							<div style="clear: both"></div>
							<div style="margin-top: 20px;">
								<table style="width:100%;">
									<tbody>
										<tr style="border-bottom: 1px solid black;">
											<td style="cursor:pointer;background-color:#ff4d4d" width="5%"></td>
											<td style="text-align:left; padding-left: 10px" width="25%">Државен празник</td>
										</tr>
										<tr>
											<td style="cursor:pointer;background-color:#11DD0E" width="5%"></td>
											<td style="text-align:left; padding-left: 10px" width="25%">Рок за поднесување на пријава</td>
										</tr>
									</tbody>
								</table>			
							</div>
						
                        </div>    
					</div>
				</div>
			</div>
		</div>	
	</div>

	
	
	
	
	<footer id="fh5co-footer">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<div class="fh5co-footer-widget">
						<h2 class="fh5co-footer-logo"><font color="8A8685">Санта План</font></h2>
					</div>
					<div class="fh5co-footer-widget">
						<ul class="fh5co-social">
						
						<a href="http://www.accuweather.com/en/mk/kocani/228532/weather-forecast/228532" class="aw-widget-legal">
<!--
By accessing and/or using this code snippet, you agree to AccuWeather’s terms and conditions (in English) which can be found at http://www.accuweather.com/en/free-weather-widgets/terms and AccuWeather’s Privacy Statement (in English) which can be found at http://www.accuweather.com/en/privacy.
-->
</a><div id="awcc1486481817623" class="aw-widget-current"  data-locationkey="228532" data-unit="c" data-language="mk" data-useip="false" data-uid="awcc1486481817623"></div><script type="text/javascript" src="https://oap.accuweather.com/launch.js"></script>
						
							<li><a href="https://www.facebook.com/santaplan/"  target="_blank"><i class="icon-facebook" color="blue"></i></a></li>
							<li><a href="https://plus.google.com/104072795250535431891" target="_blank"><i class="icon-google"></i></a></li>
						</ul>
						<p align="left"><small> Санта План 2002 - 2017. Сите права задржани.</small></p>
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
					

					
					</div>
				</div>
			</div>
		</div>
	</footer>


	<!-- jQuery -->
	<script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script>
	<!-- jQuery UI -->
	<script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
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
	<script>
		$( function() {
			
			// An array of dates
			//var eventDates = {};
			var myDates =  [
				[new Date( '01/01/2017' ), 'Нова Година', 'highlighted-date-red', 'fixed'],
				[new Date( '01/07/2017' ), 'Божик', 'highlighted-date-red','fixed'],
				[new Date( '04/17/2017' ), 'Велигден', 'highlighted-date-red', 'fixed'],
				[new Date( '05/01/2017' ), 'Ден на Трудот', 'highlighted-date-red', 'fixed'],
				[new Date( '05/24/2017' ), 'Св. Кирил и Методиј', 'highlighted-date-red', 'fixed'],
				[new Date( '05/27/2017' ), 'Рамазан Бајрам', 'highlighted-date-red', 'fixed'],
				[new Date( '08/02/2017' ), 'Ден на Републиката', 'highlighted-date-red', 'fixed'],
				[new Date( '09/08/2017' ), 'Ден на независноста', 'highlighted-date-red', 'fixed'],
				[new Date( '10/11/2017' ), 'Ден на народното востание', 'highlighted-date-red', 'fixed'],
				[new Date( '10/23/2017' ), 'Ден на Македонската револуционерна борба', 'highlighted-date-red', 'fixed'],
				[new Date( '12/08/2016' ), 'Св. Климент Охридски', 'highlighted-date-red', 'fixed'],
				[new Date( '01/06/2017' ), 'Бадник', 'highlighted-date-red','fixed'],
				[new Date( '01/19/2017' ), 'Богојавление Водици', 'highlighted-date-red', 'fixed'],
				[new Date( '04/14/2017' ), 'Велики Петок', 'highlighted-date-red', 'fixed'],
				[new Date( '06/01/2017' ), 'Духовден', 'highlighted-date-red', 'fixed'],
				[new Date( '08/28/2017' ), 'Успение на Пресвета Богородица (Голема Богородица)', 'highlighted-date-red', 'fixed'],
				
				[new Date( '11/10/2016' ), '*Поднесување на МП-ИН', 'highlighted-date-blue', 'monthly'],
				[new Date( '11/15/2016' ), '*Плаќање на данок на добивка МДБ \r\*Плаќање по МП-ИН \r\*Поднесување на ДД-И - Извештај за уплатен данок по задршка' , 'highlighted-date-blue', 'monthly'],
				[new Date( '11/25/2016' ), 'ДДВ-04 Плаќање на ДДВ за месечни даночни обврзници', 'highlighted-date-blue', 'monthly'],
			 ];
			
			$( "#datepicker" ).datepicker({
				firstDay: 1,
				monthNames: [ "Јануари", "Февруари", "Март", "Април",
                   "Мај", "Јуни", "Јули", "Август", "Септември",
                   "Октомври", "Ноември", "Декември" ],
				dayNamesMin: ['Не', 'По', 'Вт', 'Ср', 'Че', 'Пе', 'Са'],
				beforeShowDay: function(date) {
					 
					 for (var i = 0; i < myDates.length; i++) {
						 
					  var dateType = myDates[i][3];
					  
					  if (dateType === 'fixed') 
						 {
							 if (date.getTime() === myDates[i][0].getTime()) 
							 { 
								return [true, myDates[i][2], myDates[i][1]];
							}  
						 }
						 if (dateType === 'monthly') {
						
							 if (date.getDate() === myDates[i][0].getDate()) {
								 return [true, myDates[i][2], myDates[i][1]];
							 }
						 }
					  
					 }
					 
					 
					  
					return [true,''];
				}
			});				
			
		} );
	</script>

	
	</body>
</html>
