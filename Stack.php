<?php

class Stack
{
	private array $stack;
	private int $limit;

	public function __construct(int $limit = 10, $default = array())
	{
		$this->stack = $default;
		$this->limit = $limit;
	}

	public function push($item)
	{
		if ($this->isFull()) {
            throw new RunTimeException('Stack is full!');
        }
		array_push($this->stack, $item);
	}

	public function pop()
	{
		if ($this->isEmpty()) {
            throw new RunTimeException('Stack is empty!');
        }
		return array_pop($this->stack);
	}

	public function isEmpty() {
        return empty($this->stack);
    }

    public function isFull() {
        return count($this->stack) >= $this->limit;
    }
}

$stack = new Stack(10, array(1, 2, 3, 4, 5));

for($i=6;$i<11;$i++){
	$stack->push($i);
}

while(! $stack->isEmpty()){
	echo $stack->pop(). "\n";
}
