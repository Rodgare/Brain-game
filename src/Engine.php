<?php

namespace Brain\Games\Engine;

function calculate($operand1, $operand2, $operator)
{
    if ($operator === '+') {
        return $operand1 + $operand2;
    } elseif ($operator === '-') {
        return $operand1 - $operand2;
    } elseif ($operator === '*') {
        return $operand1 * $operand2;
}
}
