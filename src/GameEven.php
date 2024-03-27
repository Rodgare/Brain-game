<?php

namespace Brain\Games\GameEven;

use Brain\Games\Cli;
use function cli\line;
use function cli\prompt;

function isEvenGame()
{
    $name = Cli\greeting();
    $answer = '';
    line('Answer "yes" if the number is even, otherwise answer "no".');
    
    for ($i = 0; $i < 3; $i++) {
        $currentNumber = rand(1, 20);
        $correctAnswer = $currentNumber % 2 === 0 ? 'yes' : 'no';
        $answer = prompt("Question: {$currentNumber}");

        if ($currentNumber % 2 === 0 && $answer === 'yes') {
            line('Correct!');
        } elseif ($currentNumber % 2 !== 0 && $answer === 'no') {
            line('Correct!');
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
            line("Let's try again, {$name}!");
            break;
        }
        if ($i === 2) {
            line("Congratulations, {$name}!");
        }
    }



}