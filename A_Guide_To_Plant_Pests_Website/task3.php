<?php
function displayResult($operation, $operand1, $operand2, $result) {
    echo "{$operand1} {$operation} {$operand2} = {$result}<br>";
}

$operand1 = 10;
$operand2 = 5;

$sum = $operand1 + $operand2;
displayResult('+', $operand1, $operand2, $sum);

$difference = $operand1 - $operand2;
displayResult('-', $operand1, $operand2, $difference);

$product = $operand1 * $operand2;
displayResult('*', $operand1, $operand2, $product);

$quotient = $operand1 / $operand2;
displayResult('/', $operand1, $operand2, $quotient);

$power = pow($operand1, $operand2);
displayResult('^', $operand1, $operand2, $power);
?>