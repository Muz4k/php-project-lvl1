<?php

namespace  BrainGames\GreatestCommonDivision;

use function BrainGames\Games\printGame;

function findGcd($firstNumber, $secondNumber)
{
    while ($firstNumber !== 0 && $secondNumber !== 0) {
        if ($firstNumber > $secondNumber) {
            $firstNumber = $firstNumber % $secondNumber;
        } else {
            $secondNumber = $secondNumber % $firstNumber;
        }
    }
    return $firstNumber + $secondNumber;
}

function goGcdGame()
{
    $gameData = function ($count = 0) use (&$gameData) {
        $firstNumber = rand(1,99);
        $secondNumber = rand(1,99);
        $expression = "{$firstNumber} {$secondNumber}";
        $correctAnswer = findGcd($firstNumber, $secondNumber);
        return printGame($expression, $correctAnswer, $count, $gameData);
    };

    return $gameData();
}
