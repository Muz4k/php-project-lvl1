<?php

namespace BrainGames\Games;

use function cli\line;
use function cli\err;
use function cli\prompt;

function sayWelcome($phraseGame = null)
{
    line('Welcome to the Brain Game!');
    line($phraseGame);
    $name = prompt('May I have your name?');
    define("NAME", $name);
    line("Hello, %s!", NAME);
}


function printGame($expression, $correctAnswer, $count, $currentGame)
{

    line("Question: %s", $expression);
    $userAnswer = prompt("Your answer");
    if ($userAnswer === (string)$correctAnswer) {
        line("Correct!");
        $count++;
        if ($count === 3) {
            line("Congratulations, %s!", NAME);
            return true;
        }
        return $currentGame($count);
    }
    err("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $correctAnswer);
    line("Let's try again, %s!", NAME);

    return false;
}
