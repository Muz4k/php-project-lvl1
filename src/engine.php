<?php

namespace BrainGames\Games;

use function cli\line;
use function cli\err;
use function cli\prompt;

function sayWelcomeGetName($phraseGame)
{
    line('Welcome to the Brain Game!');
    line($phraseGame);
    line();
    $nameGamer = prompt('May I have your name?');
    line("Hello, %s!", $nameGamer);
    return $nameGamer;
}

function printRounds($gameData)
{
    $gameRounds = 3;
    for ($roundCount = 0; $roundCount < $gameRounds; $roundCount++) {
        [, $questionGame, $correctAnswer] = $gameData();
        line("Question: %s", $questionGame);
        $userAnswer = prompt("Your answer");
        if ($userAnswer !== (string)$correctAnswer) {
            err("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $correctAnswer);
            return false;
        }
            line("Correct!");
    }
    return true;
}

function goGame($data)
{
    [$phraseGame, , ] = $data();
    $nameGamer = sayWelcomeGetName($phraseGame);
    $gameResult = printRounds($data);
    sayGoodbye($nameGamer, $gameResult);
}

function sayGoodbye($nameGamer, $gameResult)
{
    $phraseBye = $gameResult ? "Congratulations, %s!" : "Let's try again, %s!";
    line($phraseBye, $nameGamer);
}
