
<div class="col-sm-12">
	<h1>Calculator</h1>
</div>
</div><!--end row-->
<?php echo form_open('calculator', array('class'=> 'form-inline')) ?>
<div class="row">
	<div class="col-sm-4">
		<input type="text"  class="form-control"  name="operandA" placeholder="First Operand" value="<?php echo $operandA; ?>"/>
	</div>
	<div class="col-sm-2">
		<input type="text"  class="form-control" name="operator" placeholder="Operator (+, -, *, /)" value="<?php echo $operator; ?>"/>
	</div>
	<div class="col-sm-4">
		<input type="text"  class="form-control"  name="operandB" placeholder="Second Operand" value="<?php echo $operandB; ?>"/>

	</div>
	<div class="col-sm-2">
		<input type="submit" class="btn btn-default" name="submit" value="Evaluate" />
	</div>
</div>
</form>

<ul><?php echo validation_errors(); ?></ul>

<?php if(isset($result)){ ?>
<h3 class="text-success">Result: <?php echo $result; ?></h3>
<?php } ?>

