<?php

namespace Brain\Games\Games\Game\Calc;

use Brain\Games\Cli;
use Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

function Calc()
{
    $userName = Engine\greeting();
    line("What is the result of the expression?");

    Engine\gamesEngine($userName, 'brain-calc');
}
