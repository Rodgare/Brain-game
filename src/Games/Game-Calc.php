<?php

namespace Brain\Games\Games\Game\Calc;

use Brain\Games\Cli;
use Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

function Calc()
{
    $userName = Cli\greeting();
    $answer = 0;
    line("What is the result of the expression?");
    $operator = ['+', '-', '*'];

    for ($i = 0; $i < 3; $i++) {
        $operand1 = rand(1, 20);
        $operand2 = rand(1, 20);
        $newOperator = $operator[rand(0, 2)];
        $correctAnswer = Engine\calculate($operand1, $operand2, $newOperator);
        $answer = prompt("Question: {$operand1} {$newOperator} {$operand2}");
        if ((integer) $answer === $correctAnswer) {
            line("Correct!");
        }  else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'");
            line("Let's try again, {$userName}!");
            break;
        }
        if ($i === 2) {
            line("Congratulations, {$userName}!");
        }
    }
}