<?php

class Helper
{
	public function __construct() { }
	
	public function createPasswordHash($rawPass)
	{
		
		// A higher "cost" is more secure but consumes more processing power
		$cost = 10;

		// Create a random salt
		$salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');

		// Prefix information about the hash so PHP knows how to verify it later.
		// "$2a$" Means we're using the Blowfish algorithm. The following two digits are the cost parameter.
		$salt = sprintf("$2a$%02d$", $cost) . $salt;

		// Value:
		// $2a$10$eImiTXuWVxfM37uY4JANjQ==

		// Hash the password with the salt
		$hash = crypt($rawPass, $salt);
		
		return $hash;
		
	}
	
	public function checkPasswordWithHash($rawPass, $hashedPass)
	{
		if ( hash_equals($hashedPass, crypt($rawPass, $hashedPass)) )
			return true;
		
		return false;

	}

}