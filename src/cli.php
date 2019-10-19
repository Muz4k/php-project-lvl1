<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

function welcome($phraseGame = null)
{
    line('Welcome to the Brain Game!');
    line($phraseGame);
    $name = prompt('May I have your name?');
    define("NAME", $name);
    line("Hello, %s!", NAME);
}

function farewell()
{
    line('Congratulations, %s!', NAME);
}
