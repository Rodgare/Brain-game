<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

function calculate($operand1, $operand2, $operator)
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

function greeting()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    return $name;
}

function compareAnswers($correctAnswer, $userAnswer, $userName)
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

function cycle($userName, $gameName)
{
    $operatorsList = ['+', '-', '*'];

    for ($i = 0; $i < 3; $i++) {
        $randomNumber = rand(1, 20);
        $operand1 = rand(1, 20);
        $operand2 = rand(1, 20);
        $operator = $operatorsList[rand(0, 2)];

        //Сюда ввести название игры и логику правильного ответа
        if ($gameName === 'brain-even') {
            $correctAnswer = $randomNumber % 2 === 0 ? 'yes' : 'no';
            $userAnswer = prompt("Question: {$randomNumber}");
        } elseif ($gameName === 'brain-calc') {
            $correctAnswer = calculate($operand1, $operand2, $operator);
            $userAnswer = prompt("Question: {$operand1} {$operator} {$operand2}");
        }

        compareAnswers($correctAnswer, $userAnswer, $userName);

        if ($correctAnswer !== $userAnswer) {
            break;
        }

        if ($i === 2) {
            line("Congratulations, {$userName}!");
        }
    }
}
