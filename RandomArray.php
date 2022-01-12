<?php

class RandomArray
{
	private array $array;

	public function __construct($size)
	{
		$this->array = range(1, $size);
	}

	public function generate()
	{
		shuffle($this->array);
		
		return $this->array;
	}

}