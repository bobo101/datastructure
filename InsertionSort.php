<?php

require "RandomArray.php";

class InsertionSort
{
	private array $data = [];
	private int $sorted = 0;

	public function __construct(array $data)
	{
		$this->data = $data;
	}

	public function sortAsc()
	{
		return $this->sort('<');
	}

	public function sortDesc()
	{
		return $this->sort('>');
	}

	public function sort($direction)
	{
		for($i = 1 ; $i < count($this->data) ; $i++){
			for($j = 0 ; $j < $i ; $j++){
				if(eval('return '.$this->data[$i].$direction.$this->data[$j].';')){
					$this->swap($this->data[$i], $this->data[$j]);
				}
			}
		}

		return $this->data;
	}

	private function swap(&$x, &$y)
	{
		$tmp = $x;
		$x = $y;
		$y = $tmp;
	}
}

$testArray = (new RandomArray(10))->generate();
echo "beforeSort: \n";
print_r($testArray);
$insertionSort = new InsertionSort($testArray);

echo "sortAsc: \n";
print_r($insertionSort->sortAsc());
// echo "sortDesc: \n";
// print_r($insertionSort->sortDesc());

$testArray = (new RandomArray(1000))->generate();
$startTime = microtime(true);
$insertionSort = new InsertionSort($testArray);
$insertionSort->sortAsc();
echo 'time cost: '. (microtime(true) - $startTime). " sec.\n";
