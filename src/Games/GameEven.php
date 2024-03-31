<?php

namespace Brain\Games\GameEven;

use Brain\Games\Cli;
use Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

function isEvenGame()
{
    $userName = Engine\greeting();
    line('Answer "yes" if the number is even, otherwise answer "no".');

    for ($i = 0; $i < 3; $i++) {
        $randomNumber = rand(1, 20);
        $correctAnswer = $randomNumber % 2 === 0 ? 'yes' : 'no';
        $userAnswer = prompt("Question: {$randomNumber}");
        Engine\compareAnswers($correctAnswer, $userAnswer, $userName);

        if ($correctAnswer !== $userAnswer) {
            break;
        }

        if ($i === 2) {
            line("Congratulations, {$userName}!");
        }
    }
}
