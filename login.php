<?php 
	require('initialize.php');



	if(isset($_SESSION['user_data']))
	{
		$user_data = $_SESSION['user_data'];
		unset($_SESSION['user_data']);
	}
	
	if(isset($_SESSION['validation_errors']))
	{
		$validation_errors = $_SESSION['validation_errors'];
		unset($_SESSION['validation_errors']);
	}
	
	if(isset($_SESSION['error_message']))
	{
		$error_message = $_SESSION['error_message'];
		unset($_SESSION['error_message']);
	}
	
	if(isset($_SESSION['success_message']))
	{
		$success_message = $_SESSION['success_message'];
		unset($_SESSION['success_message']);
	}



if(isset($_POST['submit']))
{

	require( __DIR__ . '/includes/validation/val_login.php');

	if(!isset($validation_errors))
	{
		// Success. Stavi gi korisnickite podatoci vo sesija i odnesi go korisnikot na profilnata stranica
		$_SESSION['user'] = $user;
		
		if($user['role_id'] == 1)
		{
			header('Location: vnesi_korisnik.php');
		}
		elseif($user['role_id'] == 2)
		{
			header('Location: index.php');
		}
		
	}
	else
	{

		if(isset($validation_errors['no_user']))
		{
			$_SESSION['error_message'] = 'Внесовте погрешно корисничко име или лозинка';
		}
		
		else 
		{
			$_SESSION['error_message'] = array_pop($validation_errors)[0];
		}
		
		$_SESSION['user_data'] = $user_data;
		// Redirect back
		header('Location: login.php');
		
	}

}


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

	</head>
	<body>
	
	<?php 
		$activePage = 'login';
		include('includes/html/main-header.php')
	?>
	<!-- END .header -->

	<div id="fh5co-features">
				
		<div class="container">	
			<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
				<div class="panel panel-info" >
						<div class="panel-heading">
							<div class="panel-title">Најава</div>
							<div style="float:right; font-size: 80%; position: relative; top:-10px; color:white">За промена на лозинка контактирајте не!</div>
						</div>     

						<div style="padding-top:30px" class="panel-body" >
							
							<?php if(isset($error_message)){?>
							<div class="alert alert-danger alert-dismissible" role="alert">
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							  <?php echo $error_message?>
							</div>
							<?php }?>
								
							<form action="login.php" method="post" id="loginform" class="form-horizontal" role="form">
										
								<div style="margin-bottom: 25px" class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
									<input id="login-username" type="text" class="form-control" name="username" value="" placeholder="Корисничко име">
								</div>
									
								<div style="margin-bottom: 25px" class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
									<input id="login-password" type="password" class="form-control" name="password" placeholder="Лозинка">
								</div>
										
								<div class="input-group">
								  <div class="checkbox">
									<label>
									  <input id="login-remember" type="checkbox" name="remember" value="1"> Запамети ме
									</label>
								  </div>
								</div>


								<div style="margin-top:10px" class="form-group">
									<div class="col-sm-12 controls">
										<input type="submit" name="submit" class="btn btn-success" value="Најави се" />
									</div>
								</div>  
							</form>     
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


<?php require('terminate.php') ?>