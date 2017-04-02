<?php


$user_data['password'] = trim($_POST['new_password']);

// Validate input => text => password
if(isset($_POST['new_password']))
{
	if(empty($user_data['password']))
		$validation_errors['password'][]='Внесете лозинка';
	
}else{
	$validation_errors['password'][]='Недостасува полето "Лозинка". HMMMMMMM!';
}

