<?php

class Calculator extends CI_Controller {
	private $data;

	public function index()
	{
		//see application/config/form_validation for validation rules
		$this->form_validation->set_error_delimiters('<li class="text-danger">', '</li>');
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
		$this->load->view('templates/header');
		$this->parser->parse('pages/calculator', $this->data);
		$this->load->view('templates/footer');
		
	}

	public function evaluate($operandA, $operandB, $operator){
		$result = null;
		switch ($operator) {
			case '+':
				$result = $operandA + $operandB;
			break;
			case '-':
				$result = $operandA - $operandB;
			break;
			case '*':
				$result = $operandA * $operandB;
			break;
			case '/':
				$result = $operandA / $operandB;
			break;
		}
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
	public function test(){
		$this->unit->run($this->evaluate(4, 4, "+"), 8, 'Evaluate 4 + 4');	
		$this->unit->run($this->evaluate(4, 4, "-"), 0, 'Evaluate 4 - 4');	
		$this->unit->run($this->evaluate(4, 4, "*"), 16, 'Evaluate 4 * 4');	
		$this->unit->run($this->evaluate(4, 4, "/"), 1, 'Evaluate 4 / 4');	

		$this->unit->run($this->valid_operator("+"), TRUE, '"+"" is a Valid operator');
		$this->unit->run($this->valid_operator("-"), TRUE, '"-" is a Valid operator');	
		$this->unit->run($this->valid_operator("*"), TRUE, '"*" is a Valid operator');
		$this->unit->run($this->valid_operator("/"), TRUE, '"/" is a Valid operator');

		$this->unit->run($this->valid_operator("++"), FALSE, '"++"" is a not Valid operator');
		$this->unit->run($this->valid_operator("-+"), FALSE, '"-+" is not a Valid operator');	
		
		echo $this->unit->report();
	}

}