<?php

namespace  BrainGames\Calc;

use function BrainGames\Games\printGame;

function calculateCorrectAnswer($operator, $firstNumber, $secondNumber)
{
    switch ($operator) {
        case "+":
            return $firstNumber + $secondNumber;
        case "-":
            return $firstNumber - $secondNumber;
        case "*":
            return $firstNumber * $secondNumber;
    }
}

function goCalcGame()
{
    $gameData = function ($count = 0) use (&$gameData) {
        $firstNumber = rand(1, 99);
        $secondNumber = rand(1, 99);
        $arrayOfOperators = ["+", "-", "*"];
        $currentOperator = $arrayOfOperators[array_rand($arrayOfOperators, 1)];
        $expression = "{$firstNumber} {$currentOperator} {$secondNumber}";
        $correctAnswer = calculateCorrectAnswer($currentOperator, $firstNumber, $secondNumber);
        return printGame($expression, $correctAnswer, $count, $gameData);
    };

    return $gameData();
}
