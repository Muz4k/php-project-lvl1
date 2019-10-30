<?php

namespace BrainGames;

use function cli\line;
use function cli\err;
use function cli\prompt;

function printRound($gameData)
{
    $maxQuestionGame = 3;
    for ($roundCount = 0; $roundCount < $maxQuestionGame; $roundCount++) {
        [$questionGame, $correctAnswer] = $gameData();
        line("Question: %s", $questionGame);
        $userAnswer = prompt("Your answer");
        if ($userAnswer !== $correctAnswer) {
            err("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $correctAnswer);
            return false;
        }
            line("Correct!");
    }
    return true;
}

function printGame($gameData, $gameTask)
{
    line("Welcome to the Brain Game!");
    line($gameTask);
    line();
    $nameGamer = prompt("May I have your name?");
    line("Hello, %s!", $nameGamer);

    $gameResult = printRound($gameData);

    line($gameResult ? "Congratulations, %s!" : "Let's try again, %s!", $nameGamer);
}
