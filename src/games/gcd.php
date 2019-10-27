<?php

namespace  BrainGames\GreatestCommonDivision;

use function BrainGames\Games\printGame;
use function BrainGames\Games\sayGoodbye;
use function BrainGames\Games\sayWelcomeGetName;

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
    $name = sayWelcomeGetName("Find the greatest common divisor of given numbers.");

    $getGameData = function () {
        $firstNumber = rand(1, 99);
        $secondNumber = rand(1, 99);
        $questionGame = "{$firstNumber} {$secondNumber}";
        $correctAnswer = findGcd($firstNumber, $secondNumber);
        return [$questionGame, $correctAnswer];
    };

    $gameResult = printGame($getGameData);
    sayGoodbye($name, $gameResult);
}
