<?php

namespace Brain\Games\Games\Game\Progression;

use Brain\Games\Cli;
use Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

function gameProgression()
{
    $gameCondition = 'What number is missing in the progression?';
    $userName = Engine\greeting($gameCondition);

    for ($i = 0; $i < 3; $i++) {
        $result = [];
        $start = rand(2, 10);
        $step = rand(2, 5);
        $randomIndex = rand(0, 9);

        for ($z = 0, $x = $start; $z < 10; $z++, $x += $step) {
            $result[] = $x;
        }
        $correctAnswer = (string) $result[$randomIndex];
        $result[$randomIndex] = '..';
        $string = implode(' ', $result);
        $userAnswer = prompt("Question: {$string}");
        Engine\compareAnswers($correctAnswer, $userAnswer, $userName);

        if ($correctAnswer !== $userAnswer) {
            break;
        }

        if ($i === 2) {
            line("Congratulations, {$userName}!");
        }
    }
}
