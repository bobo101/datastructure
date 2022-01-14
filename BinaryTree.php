<?php 

class BinaryNode
{
	public $data;
	public $left;
	public $right;

	public function __construct(string $data = NULL) { 
      	$this->data = $data; 
      	$this->left = NULL; 
      	$this->right = NULL;
    }
}

class BinaryTree
{
	public $root = null;

	public function __construct(string $data)
	{
		$this->root = new BinaryNode($data);
	}

	public function getRoot()
	{
		return $this->root;
	}

	public function addLeft(BinaryNode $parent, string $data) {
		$node = new BinaryNode($data);
		$parent->left = &$node;
    }

    public function addRight(BinaryNode $parent, string $data) {
		$node = new BinaryNode($data);
		$parent->right = &$node;
    }

	public function print(BinaryNode $node, int $level = 0) 
	{ 
    	if ($node) { 
          	

          	if ($node->left){
            	$this->print($node->left, $level + 1); 
          	}

          	if ($node->right){
            	$this->print($node->right, $level + 1); 
          	}
          	echo str_repeat("-", $level); 
          	echo $node->data . "\n"; 

         } 
    }
}

$binaryTree = new BinaryTree('root');
$root = $binaryTree->getRoot();
$binaryTree->addLeft($root, 'left');
$binaryTree->addRight($root, 'right');
$binaryTree->addLeft($root->left, 'left_left');
$binaryTree->addRight($root->left, 'left_right');
$binaryTree->addLeft($root->right, 'right_left');
$binaryTree->addRight($root->right, 'right_right');
$binaryTree->addLeft($root->left->left, 'left_left_left');
$binaryTree->addRight($root->left->left, 'left_left_right');
$binaryTree->addLeft($root->left->right, 'left_right_left');
$binaryTree->addRight($root->left->right, 'left_right_right');
$binaryTree->addLeft($root->right->left, 'right_left_left');
$binaryTree->addRight($root->right->left, 'right_left_left');
$binaryTree->addLeft($root->right->right, 'right_right_left');
$binaryTree->addRight($root->right->right, 'right_right_right');
$binaryTree->addLeft($root->left->left->left, 'left_left_left_left');
$binaryTree->addRight($root->left->left->left, 'left_left_left_right');
$binaryTree->addLeft($root->left->left->right, 'left_left_right_left');
$binaryTree->addRight($root->left->left->right, 'left_left_right_right');
$binaryTree->addLeft($root->left->right->left, 'left_right_left_left');
$binaryTree->addRight($root->left->right->left, 'left_right_left_right');
$binaryTree->addLeft($root->left->right->right, 'left_right_right_left');
$binaryTree->addRight($root->left->right->right, 'left_right_right_right');
$binaryTree->addLeft($root->right->left->left, 'right_left_left_left');
$binaryTree->addRight($root->right->left->left, 'right_left_left_right');
$binaryTree->addLeft($root->right->left->right, 'right_left_right_left');
$binaryTree->addRight($root->right->left->right, 'right_left_right_right');
$binaryTree->addLeft($root->right->right->left, 'right_right_left_left');
$binaryTree->addRight($root->right->right->left, 'right_right_left_right');
$binaryTree->addLeft($root->right->right->right, 'right_right_right_left');
$binaryTree->addRight($root->right->right->right, 'right_right_right_right');

echo "DFS:\n";
$binaryTree->print($binaryTree->getRoot());
// print_r( $binaryTree->getRoot());
