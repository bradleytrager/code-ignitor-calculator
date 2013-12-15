<?php
require_once "/Users/bradleytrager/Desktop/Workspace/code-ignitor-calculator/spec/CI_Bootstrap.php";
require_once "/Users/bradleytrager/Desktop/Workspace/code-ignitor-calculator/src/controllers/Calculator.php";

class CalculatorTest extends PHPUnit_Framework_TestCase
{
	protected $calculator;
 
    protected function setUp()
    {
        $this->calculator = new Calculator();
    }
 
    public function testEvaluate()
    {
        $this->assertEquals(8, $this->calculator->evaluate(4, 4, '+'));
        $this->assertEquals(0, $this->calculator->evaluate(4, 4, '-'));
        $this->assertEquals(16, $this->calculator->evaluate(4, 4, '*'));
        $this->assertEquals(1, $this->calculator->evaluate(4, 4, '/'));
 
    }
    public function testValidOperator(){
    	$this->assertEquals(TRUE, $this->calculator->valid_operator('+'));
    	$this->assertEquals(TRUE, $this->calculator->valid_operator('-'));
    	$this->assertEquals(TRUE, $this->calculator->valid_operator('*'));
    	$this->assertEquals(TRUE, $this->calculator->valid_operator('/'));

    	$this->assertEquals(FALSE, $this->calculator->valid_operator('++'));
    	$this->assertEquals(FALSE, $this->calculator->valid_operator('--'));
    	$this->assertEquals(FALSE, $this->calculator->valid_operator('**'));
    	$this->assertEquals(FALSE, $this->calculator->valid_operator('//'));
    }
}
?>