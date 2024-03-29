<?php

namespace Brain\Games\Games\Game\Progression;

use Brain\Games\Cli;
use Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

function startGame()
{
    $userName = Engine\greeting();
    line('What number is missing in the progression?');
    Engine\cycle($userName, 'brain-progression');
}