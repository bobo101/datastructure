<?php

require "RandomArray.php";

class QuickSort
{
	private array $array;

	public function __construct($array)
	{
		$this->array = $array;
	}

	public function sort()
	{
		return $this->qSort($this->array);
	}

	private function qSort($array)
	{
		$size = count($array);
		if($size < 2){
			return $array;
		}

		$pivot = array_pop($array);
		$leftHalf = [];
		$rightHalf = [];

		foreach ($array as $key => $value) {
			if($value < $pivot){
				$leftHalf[] = $value;
				continue;
			}
			$rightHalf[] = $value;
		}

		return array_merge($this->qSort($leftHalf), [$pivot], $this->qSort($rightHalf));
	}
}

// $testArray = (new RandomArray(20))->generate();
// echo "beforeSort: \n";
// print_r($testArray);
// $quickSort = new QuickSort($testArray);
// print_r($quickSort->sort());

$testArray = (new RandomArray(5000000))->generate();
$startTime = microtime(true);
$quickSort = new QuickSort($testArray);
$quickSort->sort();
echo 'time cost: '. (microtime(true) - $startTime). " sec.\n";

$testArray = (new RandomArray(5000000))->generate();
$startTime = microtime(true);
sort($testArray);
echo 'time cost: '. (microtime(true) - $startTime). " sec.\n";
