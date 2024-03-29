<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

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

function greeting()
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

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

function gamesEngine(string $userName, string $gameName)
{
    $operatorsList = ['+', '-', '*'];
    $correctAnswer = '';
    $userAnswer = '';

    for ($i = 0; $i < 3; $i++) {
        //Переменных с ответом пользователя ($userAnswer) и правильного ответа ($correctAnswer) в зависимости от игры
        if ($gameName === 'brain-even') {
            $randomNumber = rand(1, 20);
            $correctAnswer = $randomNumber % 2 === 0 ? 'yes' : 'no';
            $userAnswer = prompt("Question: {$randomNumber}");
        } elseif ($gameName === 'brain-calc') {
            $randomNumber1 = rand(1, 20);
            $randomNumber2 = rand(1, 20);
            $operator = $operatorsList[rand(0, 2)];
            $correctAnswer = calculate($randomNumber1, $randomNumber2, $operator);
            $userAnswer = prompt("Question: {$randomNumber1} {$operator} {$randomNumber2}");
        } elseif ($gameName === 'brain-gcd') {
            $divisibleNumber1 = rand(4, 200);
            $divisibleNumber2 = rand(4, 200);
            $maxNum = max($divisibleNumber1, $divisibleNumber2);
            for ($y = 1; $y <= $maxNum; $y++) {
                if ($divisibleNumber1 % $y === 0 && $divisibleNumber2 % $y === 0) {
                    $correctAnswer = (string) $y;
                }
            }
            $userAnswer = prompt("Question: {$divisibleNumber1} {$divisibleNumber2}");
        } elseif ($gameName === 'brain-progression') {
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
        } elseif ($gameName === 'brain-prime') {
            $isPrimeRandomNumber = rand(2, 100);
            $userAnswer = prompt("Question: {$isPrimeRandomNumber}");
            $correctAnswer = isPrime($isPrimeRandomNumber);
        }

        //Вычисление правильный ли ответ, и вывод соответствующих сообщений в консоль
        compareAnswers($correctAnswer, $userAnswer, $userName);

        if ($correctAnswer !== $userAnswer) {
            break;
        }

        if ($i === 2) {
            line("Congratulations, {$userName}!");
        }
    }
}
