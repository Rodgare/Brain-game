<?php

namespace Brain\Games\Games\Game\Calc;

use Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

function gameCalc()
{
    $gameCondition = "What is the result of the expression?";
    $userName = Engine\greeting($gameCondition);
    $operatorsList = ['+', '-', '*'];

    for ($i = 0; $i < 3; $i++) {
        $randomNumber1 = rand(1, 20);
        $randomNumber2 = rand(1, 20);
        $operator = $operatorsList[rand(0, 2)];
        $correctAnswer = calculate($randomNumber1, $randomNumber2, $operator);
        $userAnswer = prompt("Question: {$randomNumber1} {$operator} {$randomNumber2}");
        Engine\compareAnswers($correctAnswer, $userAnswer, $userName);
        if ($correctAnswer !== $userAnswer) {
            break;
        }

        if ($i === 2) {
            line("Congratulations, {$userName}!");
        }
    }
    
}

function calculate(int $operand1, int $operand2, string $operator): string
{
    $result = 0;

    if ($operator === '+') {
        $result = $operand1 + $operand2;
    } elseif ($operator === '-') {
        $result = $operand1 - $operand2;
    } elseif ($operator === '*') {
        $result = $operand1 * $operand2;
    }

    return (string) $result;
}