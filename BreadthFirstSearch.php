<?php

class BreadthFirstSearch
{
	protected $graph;
	public $visited = array();
	public $visitedPoints = array();
	public $level = 0;
	
	public function __construct($graph)
	{
		$this->graph = $graph;
		$this->level = 1;
		foreach($this->graph as $vertex => $adjacencies){
			foreach($adjacencies as $adjacency){
				$this->visited
			}
		}
	}

	public function breadthFirstSearch($origin, $destination)
	{
		$current = $origin;
	}

	private function recursion($current, $destination)
	{
		
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
);
$g = new BreadthFirstSearch($graph);
$g->breadthFirstSearch('A','C');
print_r($g->visitedPoints);
print_r($g->path);
echo "\n\n";