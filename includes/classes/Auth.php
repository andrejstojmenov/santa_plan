<?php

class Auth
{
	public function __construct() { }
	
	// proveruva dali korisnikot e najaven
	public function check()
	{
		if(isset($_SESSION['user']))
			return true;
		
		else
			return false;
	}
	
	// proveruva dali korisnikot e najaven i e obicen(ne e admin)
	public function notLoggedIn()
	{
		
		if(isset($_SESSION['user']))
			return;
		
		else
		{
			$_SESSION['error_message'] = 'Немате пристап до страницата. Треба да се најавите';
			header('Location: login.php');
			die();
		}
		
	}
	
	// proveruva dali korisnikot e najaven i e obicen(ne e admin)
	public function user()
	{
		
		if(isset($_SESSION['user']) && $_SESSION['user']['role_id'] == 2)
			return;
		
		else
		{
			$_SESSION['error_message'] = 'Немате пристап до страницата. Треба да се најавите';
			header('Location: login.php');
			die();
		}
		
	}
	
	// proveruva dali korisnikot e najaven i e admin. Go nosi na home ako ne e
	public function admin()
	{
		
		if(isset($_SESSION['user']) && $_SESSION['user']['role_id'] == 1)
			return;
		else
		{
			$_SESSION['error_message'] = 'Најавете се како администратор за да имате пристап до страницата';
			header('Location: login.php');
			die();
		}
	
	}
	
	// proveruva dali korisnikot e najaven i e admin
	public function isAdmin()
	{
		
		if(isset($_SESSION['user']) && $_SESSION['user']['role_id'] == 1)
			return true;
		
		return false;
	
	}
	
	// proveruva dali korisnikot e najaven
	public function isUser()
	{
		
		if(isset($_SESSION['user']))
			return true;
		
		return false;
	
	}
	
	// proveruva dali korisnikot e najaven i ima odredeno EDB
	public function isUserWithEdb($edb_firma)
	{
		
		if(isset($_SESSION['user']))
		{
			$edb = $_SESSION['user']['firma_edb'];
			
			if($edb_firma == $edb)
			{
				return true;
			}
			
		}
			
		
		return false;
	
	}
	
	

}