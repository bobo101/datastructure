<?php

class ListNode
{
	public $data;
	public $next;

	function __construct($data)
	{
		$this->data = $data;
		$this->next = null;
	}
}

class LinkList
{
	private $firstNode;
	private $lastNode;

	function __construct()
	{
		$this->firstNode = null;
		$this->lastNode = null;
	}

	public function insert($data)
	{
		if($this->firstNode === null){
			$this->insertFirst($data);
			return;
		}

		$this->insertLast($data);
	}

	private function insertFirst($data)
	{
		$node = new ListNode($data);
		$this->firstNode = &$node;
		$this->lastNode = &$node;
	}

	private function insertLast($data)
	{
		$node = new ListNode($data);
		$this->lastNode->next = &$node;
		$this->lastNode = &$node;
	}

	public function insertAfter($key, $data)
	{
		$this->readList(function ($current) use($key, $data){
			if($current->data !== $key){
				return;
			}
			$nextNode = $current->next;

			$node = new ListNode($data);
			$current->next = &$node;
			$node->next = $nextNode;
			if($nextNode === null){
				$this->lastNode = &$node;
			}
		});
	}

	public function readList($callback)
	{
		$current = $this->firstNode;
		while($current !== null){
			$callback($current);
			$current = $current->next;
		}
	}

	public function getFirst()
	{
		return $this->firstNode->data;
	}

	public function getLast()
	{
		return $this->lastNode->data;
	}

	public function update($key, $data)
	{
		$this->readList(function ($current) use($key, $data){
			if($current->data !== $key){
				return;
			}
			$current->data = $data;
		});
	}

	public function delete($key)
	{
		$this->readList(function ($current) use($key){
			$nextNode = $current->next;
			if($nextNode === null){
				return;
			}
			if($nextNode->data !== $key){
				return;
			}
			$current->next = $nextNode->next;
			if($current->next === null){
				$this->lastNode = &$current;
			}
			unset($nextNode);
		});
	}

	public function count()
	{
		$count = 0;
		$this->readList(function ($current) use(&$count){
			$count++;
		});
		
		return $count;
	}
}

$list = new LinkList();
$list->insert('How are you?');
$list->insert('Hi,');
$list->insert('Thank you.');
$list->insertAfter('Hi,', 'I\'m fine.');
$list->insertAfter('Thank you.', 'And you?');
$list->update('I\'m fine.', 'Not bad.');
$list->delete('Thank you.');
$list->insert('What\'s up.');
$list->delete('What\'s up.');

$list->readList(function($current){
	echo $current->data. "\n";
});

echo $list->count(). "\n";

// echo $list->getFirst(). ' ' . $list->getLast();
