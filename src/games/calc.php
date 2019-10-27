<?php

namespace  BrainGames\Calc;

use function BrainGames\Games\printGame;
use function BrainGames\Games\sayGoodbye;
use function BrainGames\Games\sayWelcomeGetName;

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
    $name = sayWelcomeGetName("What is the result of the expression?");
    $operators = ["+", "-", "*"];
    $getGameData = function () use ($operators) {
        $firstNumber = rand(1, 99);
        $secondNumber = rand(1, 99);
        $currentOperator = $operators[array_rand($operators, 1)];
        $questionGame = "{$firstNumber} {$currentOperator} {$secondNumber}";
        $correctAnswer = calculateCorrectAnswer($currentOperator, $firstNumber, $secondNumber);
        return [$questionGame, $correctAnswer];
    };

    $gameResult = printGame($getGameData);
    sayGoodbye($name, $gameResult);
}
