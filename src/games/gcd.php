<?php

namespace  Brain\Games\games\gcd;

use function Brain\Games\startGame;

const TASK_GCD_GAME = "Find the greatest common divisor of given numbers.";

function findGcd($firstOperand, $secondOperand): string
{
    while ($firstOperand !== 0 && $secondOperand !== 0) {
        if ($firstOperand > $secondOperand) {
            $firstOperand = $firstOperand % $secondOperand;
        } else {
            $secondOperand = $secondOperand % $firstOperand;
        }
    }
    return $firstOperand + $secondOperand;
}

function startGcdGame()
{
    $getGameData = function () {
        $firstOperand = rand(1, 99);
        $secondOperand = rand(1, 99);
        $questionGame = "{$firstOperand} {$secondOperand}";
        $correctAnswer = findGcd($firstOperand, $secondOperand);
        return [$questionGame, $correctAnswer];
    };
    startGame($getGameData, TASK_GCD_GAME);
}
