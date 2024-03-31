<?php

namespace Brain\Games\Games\Game\Prime;

use Brain\Games\Cli;
use Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

function gamePrime()
{
    $gameCondition  = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $userName = Engine\greeting($gameCondition);

    for ($i = 0; $i < 3; $i++) {
        $isPrimeRandomNumber = rand(2, 100);
        $userAnswer = prompt("Question: {$isPrimeRandomNumber}");
        $correctAnswer = isPrime($isPrimeRandomNumber);
        Engine\compareAnswers($correctAnswer, $userAnswer, $userName);
        if ($correctAnswer !== $userAnswer) {
            break;
        }

        if ($i === 2) {
            line("Congratulations, {$userName}!");
        }
    }
}

function isPrime(int $number)
{
    if ($number <= 1) {
        return 'no';
    }

    if ($number % 2 === 0) {
        return $number === 2 ? 'yes' : 'no';
    }

    $limit = (int) sqrt($number);
    for ($i = 3; $i <= $limit; $i += 2) {
        if ($number % $i === 0) {
            return 'no';
        }
    }

    return 'yes';
}
