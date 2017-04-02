<?php 
	
	require('initialize.php');
	
	$auth->admin();
	
	$userId = mysqli_real_escape_string($db ,$_GET['id']);
	
	$deleteQuery = "
				DELETE FROM firmi
				WHERE id = $userId
			";
	
	mysqli_query($db, "SET NAMES utf8");
			
	if (!mysqli_query($db, $deleteQuery)) {
		$_SESSION['error_message'] = 'Се случи непредвидлив проблем 5';
	} 
	else {
		$_SESSION['success_message'] = 'Корисникот е успешно избришан';
		
		header('Location: korisnici.php');
		
	}
	
?>