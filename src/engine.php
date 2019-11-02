<?php

namespace Brain\Games;

use function cli\line;
use function cli\err;
use function cli\prompt;

const ROUNDS_COUNT = 3;

function startGame($gameData, $gameTask)
{
    line("Welcome to the Brain Game!");
    line($gameTask);
    line();
    $nameGamer = prompt("May I have your name?");
    line("Hello, %s!", $nameGamer);

    for ($roundsCounter = 0; $roundsCounter < ROUNDS_COUNT; $roundsCounter++) {
        [$questionGame, $correctAnswer] = $gameData();
        line("Question: %s", $questionGame);
        $userAnswer = prompt("Your answer");
        if ($userAnswer !== $correctAnswer) {
            err("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $correctAnswer);
            line("Let's try again, %s!", $nameGamer);
            return false;
        }
        line("Correct!");
    }
    line("Congratulations, %s!", $nameGamer);
    return true;
}
