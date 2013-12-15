
<div class="col-sm-12">
	<h1>Calculator</h1>
</div>
</div><!--end row-->
<?php echo form_open('calculator', array('class'=> 'form-inline')) ?>
<div class="row">
	<div class="col-sm-4">
		<input type="text"  class="form-control"  name="operandA" placeholder="First Operand" value="{operandA}"/>
	</div>
	<div class="col-sm-2">
		<input type="text"  class="form-control" name="operator" placeholder="Operator (+, -, *, /)" value="{operator}"/>
	</div>
	<div class="col-sm-4">
		<input type="text"  class="form-control"  name="operandB" placeholder="Second Operand" value="{operandB}"/>

	</div>
	<div class="col-sm-2">
		<input type="submit" class="btn btn-default" name="submit" value="Evaluate" />
	</div>
</div>
</form>

<ul><?php echo validation_errors(); ?></ul>

<h3 class="text-success">Result: {result}</h3>

