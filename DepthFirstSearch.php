<?php

class DepthFirstSearch
{
	protected $graph;
	public $visitedPoints = array();
	
	public function __construct($graph)
	{
		$this->graph = $graph;
	}

	public function depthFirstSearch($origin, $destination)
	{
		$current = $origin;
		$this->recursion($current, $destination);
	}

	private function recursion($current, $destination)
	{
		echo $current. "\n";
		$adjacencies = $this->graph[$current];
		$this->visitedPoints[] = $current;

		if($current === $destination){
			echo "200, Founded\n";
			return true;
		}

		foreach($adjacencies as $adjacency){
			if(! in_array($adjacency, $this->visitedPoints)){
				$this->recursion($adjacency, $destination);
			}	
		}
	}
}

echo "Graph2:\n";
$graph = array(
  	'A' => array('F'),
  	'B' => array('D', 'E'),
  	'C' => array('F'),
  	'D' => array('B', 'E'),
  	'E' => array('B', 'D', 'F'),
  	'F' => array('A', 'E', 'C'),
  	'G' => array('A'),
);
$g = new DepthFirstSearch($graph);
$g->depthFirstSearch('A','C');
print_r($g->visitedPoints);
print_r($g->path);
echo "\n\n";