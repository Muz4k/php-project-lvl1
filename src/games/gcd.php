<?php

namespace  BrainGames\games\gcd;

use function BrainGames\printGame;

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
    $getCurrentData = function () {
        $firstOperand = rand(1, 99);
        $secondOperand = rand(1, 99);
        $questionGame = "{$firstOperand} {$secondOperand}";
        $correctAnswer = findGcd($firstOperand, $secondOperand);
        return [$questionGame, $correctAnswer];
    };
    printGame($getCurrentData, TASK_GCD_GAME);
}
