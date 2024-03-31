<?php

namespace Brain\Games\Game\Even;

use Brain\Games\Cli;
use Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

function gameEven()
{
    $gameCondition = 'Answer "yes" if the number is even, otherwise answer "no".';
    $userName = Engine\greeting($gameCondition);
    
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
