<?php
use RandomLib\Factory;
// use 

class Hashing
{
	private $factory, $generator;
	function __construct(){
		$this->factory = new Factory;
		$this->generator = $this->factory->getGenerator(new SecurityLib\Strength(SecurityLib\Strength::MEDIUM));
	}

	function randomnumberpassword()
	{
		$letters = range('A', 'Z');
		$numbers = range(0, 9);

		$letters_combined = implode("", $letters);
		$numbers_combined = implode("", $numbers);

		$letters_numbers_combined = $letters_combined . $numbers_combined;

		$password = $this->generator->generateString(6, $letters_numbers_combined);

		return $password;
	}

	function createActivationHash()
	{
		return $this->generator->generate(32);
	}

	
}