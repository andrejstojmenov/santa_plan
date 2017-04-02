<?php

$user_data['username'] = trim($_POST['username']);
$user_data['firma_ime'] = trim($_POST['firma_ime']);
$user_data['firma_edb'] = trim($_POST['firma_edb']);
$user_data['firma_tel'] = trim($_POST['firma_tel']);


// Validate input => text => username
if(isset($_POST['username']))
{
	if(empty($user_data['username']))
		$validation_errors['username'][]='Внесете корисничко име';
}
else{
	$validation_errors['username'][]='Недостасува полето "Корисничко име".';
}

// Validate input => text => firma_ime
if(isset($_POST['firma_ime']))
{
	if(empty($user_data['firma_ime']))
		$validation_errors['firma_ime'][]='Внесете име на фирма';
}else{
	$validation_errors['username'][]='Недостасува полето "Име на фирма".';
}

// Validate input => text => firma_edb
if(isset($_POST['firma_edb']))
{
	if(empty($user_data['firma_edb']))
		$validation_errors['firma_edb'][]='Внесете единствен даночен број';
	
	if(!empty($user_data['firma_edb']) && (!is_numeric($user_data['firma_edb'])))
		$validation_errors['firma_edb'][]='Полето ЕДБ може да содржи само цифри';
}else{
	$validation_errors['username'][]='Недостасува полето "ЕДБ".';
}

// Validate input => text => firma_tel
if(isset($_POST['firma_tel']))
{
	if(empty($user_data['firma_tel']))
		$validation_errors['firma_tel'][]='Внесете телефон';
}else{
	$validation_errors['username'][]='Недостасува полето "Телефон".';
}

