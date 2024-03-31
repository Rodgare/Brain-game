<?php

namespace Brain\Games\Games\Game\Gcd;

use Brain\Games\Cli;
use Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

function gameGcd()
{
    $gameCondition = 'Find the greatest common divisor of given numbers.';
    $userName = Engine\greeting($gameCondition);
    $correctAnswer = '';
    $userAnswer = '';

    for ($i = 0; $i < 3; $i++) {
        $divisibleNumber1 = rand(4, 200);
        $divisibleNumber2 = rand(4, 200);
        $maxNum = max($divisibleNumber1, $divisibleNumber2);

        for ($y = 1; $y <= $maxNum; $y++) {
            if ($divisibleNumber1 % $y === 0 && $divisibleNumber2 % $y === 0) {
                $correctAnswer = (string) $y;
            }
        }
        $userAnswer = prompt("Question: {$divisibleNumber1} {$divisibleNumber2}");
        Engine\compareAnswers($correctAnswer, $userAnswer, $userName);

        if ($correctAnswer !== $userAnswer) {
            break;
        }

        if ($i === 2) {
            line("Congratulations, {$userName}!");
        }
    }
}
