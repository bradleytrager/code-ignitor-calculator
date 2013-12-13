
<div class="col-sm-12">
	<h1>Calculator</h1>

	<?php echo validation_errors(); ?>

	<?php echo form_open('calculator') ?>
		<input type="text"  class="col-sm-2"  name="operandA" placeholder="First Operand" value="<?php echo $operandA; ?>"/>
		<input type="text"  class="col-sm-2" name="operator" placeholder="Operator (+, -, *, /)" value="<?php echo $operator; ?>"/>
		<input type="text"  class="col-sm-2"  name="operandB" placeholder="Second Operand" value="<?php echo $operandB; ?>"/>
		<input type="submit" class="btn btn-default" name="submit" value="Evaluate" />
	</form>
	
	<?php if(isset($result)){ ?>
	<h3>Result: <?php echo $result; ?></h3>
	<?php } ?>
</div>
