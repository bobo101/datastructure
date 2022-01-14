<?php

class Graph
{
	protected $graph;
	public $visitedPoints = array();
	public $path = array();

	public function __construct($graph)
	{
		$this->graph = $graph;
	}

	public function depthFirstSearch($origin, $destination)
	{
		$current = $origin;
		
		while($current){

			$this->visitedPoints[] = $current;
			$this->path[] = $current;

			if($destination === $current){
				echo "200, Founded.\n";
				return;
			}

			$next = $this->pickNext($current);
			
			$current = $this->findUnvisited($next);
		}

		echo "404, Not Found.\n";
	}

	private function pickNext($current)
	{
		foreach($this->graph[$current] as $vertex){

			if(! in_array($vertex, $this->visitedPoints)){

				return $vertex;
			}
		}
	}

	private function findUnvisited($next)
	{
		if($next !== null){
			return $next;
		}

		for($i = count($this->visitedPoints) - 2 ; $i >= 0 ; $i --) {
			$lastVisited = $this->visitedPoints[$i];
			array_pop($this->path);
			$unvisitedVertex = $this->pickNext($lastVisited);
			if($unvisitedVertex !== null){
				return $unvisitedVertex;
			}
		}

		return null;
	}
}

echo "Graph1:\n";
$graph = array(
  	'A' => array('B', 'F'),
  	'B' => array('A', 'D', 'E'),
  	'C' => array('F','G'),
  	'D' => array('B', 'E'),
  	'E' => array('B', 'D', 'F'),
  	'F' => array('A', 'E', 'C'),
  	'G' => array('C','H'),
  	'H' => array('G'),
);
$g = new Graph($graph);
$g->depthFirstSearch('A','H');
print_r($g->visitedPoints);
print_r($g->path);
echo "\n\n";

// echo "Graph2:\n";
// $graph = array(
//   	'A' => array('F'),
//   	'B' => array('D', 'E'),
//   	'C' => array('F'),
//   	'D' => array('B', 'E'),
//   	'E' => array('B', 'D', 'F'),
//   	'F' => array('A', 'E', 'C'),
// );
// $g = new Graph($graph);
// $g->depthFirstSearch('A','C');
// print_r($g->visitedPoints);
// print_r($g->path);
// echo "\n\n";

// echo "Graph3:\n";
// $graph = array(
//   	'A' => array('F'),
//   	'B' => array('D', 'E'),
//   	'C' => array('F'),
//   	'D' => array('B', 'E'),
//   	'E' => array('B', 'D', 'F'),
//   	'F' => array('A', 'E', 'C'),
//   	'G' => array('H'),
//   	'H' => array('G'),
// );
// $g = new Graph($graph);
// $g->depthFirstSearch('A','G');
// print_r($g->visitedPoints);
// print_r($g->path);
// echo "\n\n";

// echo "Directed Graph:\n";
// $graph = array(
//   	'A' => array('B', 'F'),
//   	'B' => array('D'),
//   	'C' => array('F'),
//   	'D' => array('B', 'E'),
//   	'E' => array('B', 'D', 'F'),
//   	'F' => array('A', 'E', 'C'),
// );
// $g = new Graph($graph);
// $g->depthFirstSearch('E','A');
// print_r($g->visitedPoints);
// print_r($g->path);
// echo "\n\n";
