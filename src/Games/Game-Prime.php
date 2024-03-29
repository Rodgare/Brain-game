<?php

namespace Brain\Games\Games\Game\Prime;

use Brain\Games\Cli;
use Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

function startPrime()
{
    $userName = Engine\greeting();
    line('Answer "yes" if given number is prime. Otherwise answer "no".');

    Engine\cycle($userName, 'brain-prime');
}
