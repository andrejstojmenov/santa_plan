<?php 
	require('initialize.php');
	$activePage = 'vnesi_korisnik';

	$auth->admin();
	
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






$userId = mysqli_real_escape_string($db, $_GET['id']);

$selectQuery = "
			SELECT * 
			FROM firmi
			WHERE id = $userId
			
		";
	
	mysqli_query($db, "SET NAMES utf8");
	
	if (!$firmi = mysqli_query($db, $selectQuery)) {
		$_SESSION['error_message'] = 'Се случи непредвидлив проблем 1';
	}
	
$user_data = mysqli_fetch_assoc($firmi);	


if(isset($_POST['submit']))
{
	require('includes/validation/val_promeni_korisnik.php');
	
	
	if(!isset($validation_errors)) // podatocite se dobri, unesi u baza
	{
			
			$user_data['username'] = mysqli_real_escape_string($db, $user_data['username']);
			//$user_data['password'] = mysqli_real_escape_string($db, $helper->createPasswordHash($user_data['password']));
			$user_data['firma_ime'] = mysqli_real_escape_string($db, $user_data['firma_ime']);
			$user_data['firma_edb'] = mysqli_real_escape_string($db, $user_data['firma_edb']);
			$user_data['firma_tel'] = mysqli_real_escape_string($db, $user_data['firma_tel']);
			
			$updateQuery = "
				UPDATE firmi SET 
					username = '{$user_data['username']}',
					firma_ime = '{$user_data['firma_ime']}',
					firma_edb = {$user_data['firma_edb']},
					firma_tel = '{$user_data['firma_tel']}'
				WHERE id = $userId
			";
			
			//die($insertQuery);
			
			mysqli_query($db, "SET NAMES utf8");
			
			if (!mysqli_query($db, $updateQuery)) {
				$_SESSION['error_message'] = 'Се случи непредвидлив проблем 2';
				header('Location: ' . $_SERVER['HTTP_REFERER']);
			} 
			else {  
				$_SESSION['success_message'] = 'Корисникот е успешно променет';
				header('Location: korisnici.php');
			}
			
	}
	else
	{
		// stavam error u sesija
		$_SESSION['error_message'] = array_pop($validation_errors)[0];
		$_SESSION['user_data'] = $user_data;
		header('Location: ' . $_SERVER['HTTP_REFERER']);
		
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
		include('includes/html/main-header.php')
	?>

	<div id="fh5co-features">	
		<div class="container">	
			<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
				<div class="panel panel-info" >
						<div class="panel-heading">
							<div class="panel-title">Промени корисник</div>
						</div>     

						<div style="padding-top:30px" class="panel-body" >
							
							<?php if(isset($error_message)){?>
							<div class="alert alert-danger alert-dismissible" role="alert">
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							  <?php echo $error_message?>
							</div>
							<?php }?>
							
							<?php if(isset($success_message)){?>
							<div class="alert alert-success alert-dismissible" role="alert">
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							  <?php echo $success_message?>
							</div>
							<?php }?>
								
							<form action="promeni_korisnik.php?id=<?php echo $userId?>" method="post" id="loginform" class="form-horizontal" role="form">
										
								<div style="margin-bottom: 25px" class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
									<input id="login-username" type="text" class="form-control" name="username" value="<?php echo sprintifset($user_data['username'])?>" placeholder="Корисничко име">
								</div>
								
								<div style="margin-bottom: 25px" class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
									<input type="text" class="form-control" name="firma_ime" value="<?php echo sprintifset($user_data['firma_ime'])?>" placeholder="Име на фирма">
								</div>
								
								<div style="margin-bottom: 25px" class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-star"></i></span>
									<input type="text" class="form-control" name="firma_edb" value="<?php echo sprintifset($user_data['firma_edb'])?>" placeholder="ЕДБ">
								</div>
								
								<div style="margin-bottom: 25px" class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-phone-alt"></i></span>
									<input type="text" class="form-control" name="firma_tel" value="<?php echo sprintifset($user_data['firma_tel'])?>" placeholder="Телефон">
								</div>

								<div style="margin-top:10px" class="form-group">
									<div class="col-sm-12 controls">
										<input type="submit" name="submit" class="btn btn-info pull-left" value="Промени" />
										<a href="izbrisi_korisnik.php?id=<?php echo $userId?>" id="deleteBtn"  class="btn btn-danger pull-right">Избриши</a>
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