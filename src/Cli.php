<?php

namespace Brain\Games\Cli;

use Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

function greeting()
{
    Engine\greeting();
}
