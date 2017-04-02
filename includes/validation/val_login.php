<?php
	$user_data['username'] = trim($_POST['username']);
	$user_data['password'] = trim($_POST['password']);
	
	// Validate input => text => username
	if(isset($_POST['username']))
	{
		if(empty($user_data['username']))
			$validation_errors['username'][]='Внесете корисничко име';
	}
	
	// Validate input => text => password
	if(isset($_POST['password']))
	{
		if(empty($user_data['password']))
			$validation_errors['password'][] = 'Внесете лозинка';
	}
	
	if(!isset($validation_errors))
	{
		
		//$result = mysqli_query("SELECT * FROM `users`
		//						JOIN `roles`
		//						ON users.role_id = roles.id
		//					  ")
		//						or die(mysqli_error());
		
		$user_data['username'] = mysqli_real_escape_string($db, $user_data['username']);
		
		mysqli_query($db, "SET NAMES utf8");
		$result = mysqli_query($db, "SELECT * FROM `firmi` 
							   WHERE 
									`username` = '".$user_data['username'] ."'") 
		or die(mysqli_error($db));
		
		// ako ne postoi firma so vnesenoto korisnicko ime
		if(mysqli_num_rows($result) == 0)
		{
			$validation_errors['no_user']= 'true';
		}
		
		$user = mysqli_fetch_assoc($result);
		
		// ako e vnesen pogresen password
		if (!$helper->checkPasswordWithHash($user_data['password'], $user['password'])) {
			$validation_errors['no_user']= 'true';
		}
		
		
	}
	
	
	
	
	
	
	
	
?>