<?php
$config = array(
               array(
                     'field'   => 'operandA', 
                     'label'   => 'First Operand', 
                     'rules'   => 'required|numeric'
                  ),
               array(
                     'field'   => 'operandB', 
                     'label'   => 'Second Operand', 
                     'rules'   => 'required|numeric'
                  ),
               array(
                     'field'   => 'operator', 
                     'label'   => 'Operator', 
                     'rules'   => 'trim|required|callback_valid_operator'
                  )
            );