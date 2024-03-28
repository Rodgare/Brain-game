<?php

namespace Brain\Games\Games\Game\Gcd;

use Brain\Games\Cli;
use Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

function gcdGame()
{
    $userName = Engine\greeting();
    line('Find the greatest common divisor of given numbers.');

    Engine\cycle($userName, 'brain-gcd');
}