<?php

require "RandomArray.php";

class Node
{
	public $data;
	public $left;
	public $right;
	public $parent;

	public function __construct(int $data = null, Node $parent = null) { 
      	$this->data = $data;
      	$this->parent = $parent;
      	$this->left = null; 
      	$this->right = null;
    }
}

class BinarySearchTree
{
	public $root = null;

	public function __construct(int $data)
	{
		$this->root = new Node($data);
	}

	public function insert(int $data)
	{
		return $this->walk($this->root, $data);
	}

	private function walk(Node $node, int $data)
	{
		if ($data > $node->data) {
			return $this->walkSubTree($node, $data, 'right');
		}
		if ($data < $node->data) {
			return $this->walkSubTree($node, $data, 'left');
		}
	}

	private function walkSubTree(Node $node, int $data, string $direction)
	{
		if($node->$direction === null){
			$node->$direction = new Node($data, $node);

	        return $node->$direction;
		}

		return $this->walk($node->$direction, $data);
	}

	public function traverse(Node $node) { 
	    if ($node === null) {
	    	return;
	    }
        if ($node->left){ 
            $this->traverse($node->left); 
        }
        echo $node->data . "\n"; 
        if ($node->right){
            $this->traverse($node->right);
        }
	}

	public function find(Node $node, int $data) { 
	    if ($node === null) {
	    	return;
	    }
	    if ($data === $node->data){
            return $node;
        }
        if ($data > $node->data){ 
            return $this->find($node->right, $data); 
        }
        if ($data < $node->data){
            return $this->find($node->left, $data);
        }
	}
}

// $tree = new BinarySearchTree(10); 

// $tree->insert(12); 
// $tree->insert(6); 
// $tree->insert(3); 
// $tree->insert(8); 
// $tree->insert(15); 
// $tree->insert(13); 
// $tree->insert(36); 

// $tree->traverse($tree->root);
// print_r($tree->find($tree->root, 15));

$testArray = (new RandomArray(500000))->generate();
$startTime = microtime(true);
foreach ($testArray as $k => $value) {
	if($k === 0){
		$tree = new BinarySearchTree($value);
		continue;
	}
	$tree->insert($value); 
}
echo 'time cost: '. (microtime(true) - $startTime). " sec.\n";
print_r($tree->find($tree->root, 314159)->data);
// $tree->traverse($tree->root);
// print_r($tree->root);
