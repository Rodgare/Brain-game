<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

function greeting(string $gameCondition = null)
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    if (!is_null($gameCondition)) {
        line($gameCondition);
    }

    return $name;
}

function compareAnswers(mixed $correctAnswer, mixed $userAnswer, string $userName)
{
    if ($correctAnswer === $userAnswer) {
        line("Your answer: {$userAnswer}");
        line("Correct!");
    } else {
        line("Your answer: {$userAnswer}");
        line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'");
        line("Let's try again, {$userName}!");
    }
}
