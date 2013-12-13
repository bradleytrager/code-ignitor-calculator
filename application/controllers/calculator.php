<?php
class Calculator extends CI_Controller {
	private $data;

	public function index()
	{
		//see application/config/form_validation for validation rules
		$this->form_validation->run();

		//get input valuew
		$this->data['operator'] = $this->input->post('operator');
		$this->data['operandA'] = $this->input->post('operandA');
		$this->data['operandB'] = $this->input->post('operandB');
		
		//evaluate input
		$result = $this->evaluate($this->data['operandA'], $this->data['operandB'], $this->data['operator']);
		
		//set result on view
		$this->data['result'] = $result;

		//load view
		$this->load->view('templates/header', $this->data);
		$this->load->view('pages/calculator', $this->data);
		$this->load->view('templates/footer', $this->data);
		
	}

	public function evaluate($operandA, $operandB, $operator){
		$result = null;
		switch ($operator) {
			case '+':
				$result = $this->add($operandA, $operandB);
			break;
			case '-':
				$result = $this->subtract($operandA, $operandB);
			break;
			case '*':
				$result = $this->multiply($operandA, $operandB);
			break;
			case '/':
				$result = $this->divide($operandA, $operandB);
			break;
		}
		return $result;
	}

	public function add($operandA, $operandB){
		$result = $operandA + $operandB;
		return $result;
	}
	public function subtract($operandA, $operandB){
		$result = $operandA - $operandB;
		return $result;
	}
	public function multiply($operandA, $operandB){
		$result = $operandA * $operandB;
		return $result;
	}
	public function divide($operandA, $operandB){
		$result = $operandA / $operandB;
		return $result;
	}

	//Custom Validation Methods
	public function valid_operator($operatorInput){
		$this->form_validation->set_message('valid_operator','Please enter a valid operator (+, -, *, /)');

		$match = preg_match("/(^\+$|^\-$|^\/$|^\*$){1}/", $operatorInput);
		if($match == 1){
			return true;
		}
		
		return false;
	}

	//Tests
	public function testAdd(){
		$test = $this->add(1, 1);
		$expected_result = 2;
		$test_name = 'Adds one plus one';
		$this->unit->run($test, $expected_result, $test_name);	
	}

	public function testSubtract(){
		$test = $this->subtract(1, 1);
		$expected_result = 0;
		$test_name = 'Subtract one minus one';
		$this->unit->run($test, $expected_result, $test_name);	
	}
	public function testMultiply(){
		$test = $this->multiply(2, 2);
		$expected_result = 4;
		$test_name = 'Multiply 4 times 4';
		$this->unit->run($test, $expected_result, $test_name);	
	}
	public function testDivide(){
		$test = $this->divide(9, 3);
		$expected_result = 3;
		$test_name = 'Dived 9 by 3';
		$this->unit->run($test, $expected_result, $test_name);	
	}
	public function testEvaluate(){
		$test = $this->evaluate(4, 4, "+");
		$expected_result = 8;
		$test_name = 'Evaluate 4 + 4';
		$this->unit->run($test, $expected_result, $test_name);	
	}
	public function test(){
		$this->testAdd();
		$this->testSubtract();
		$this->testMultiply();
		$this->testDivide();
		$this->testEvaluate();
		echo $this->unit->report();
	}

}