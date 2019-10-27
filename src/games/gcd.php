<?php

namespace  BrainGames\GreatestCommonDivision;

use function BrainGames\Games\goGame;

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

function getGcdGame()
{
    $phraseGame = "Find the greatest common divisor of given numbers.";
    $currentData = function () use ($phraseGame) {
        $firstNumber = rand(1, 99);
        $secondNumber = rand(1, 99);
        $questionGame = "{$firstNumber} {$secondNumber}";
        $correctAnswer = findGcd($firstNumber, $secondNumber);
        return [$phraseGame, $questionGame, $correctAnswer];
    };
    goGame($currentData);
}
