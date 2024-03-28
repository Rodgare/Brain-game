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

    Engine\cycle($userName, 'brain-even');
}
