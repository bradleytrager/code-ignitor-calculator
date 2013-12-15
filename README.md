code-igniter-calculator
=======================

***A pure php application using the code igniter framework.  It adds, subtracts, multiplies or divides 2 numbers, validates user input and persists the input values after the form is submitted.***

The main functionality of this app is contained in `application > controllers > calculator.php`

Form validation configuration can be found in `application > config > form_validation.php`

Routing configuration can be found in `application > config > routes.php`

To install dependencies, intall composer and use `php composer.phar install` from the command line.

To run the calculator start a php server at the root directory

To run the tests which use the built-in code igniter testing functions, navigate to `http://localhost/index.php/calculator/test`

To run the phpunit tests make sure php unit is installed and execute `phpunit spec` from the command line in the root of the project.
