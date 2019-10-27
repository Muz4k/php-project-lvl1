<?php

namespace  BrainGames\Calc;

use function BrainGames\Games\goGame;

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

function getCalcGame()
{
    $phraseGame = "What is the result of the expression?";
    $operators = ["+", "-", "*"];
    $currentGame = function () use ($operators, $phraseGame) {
        $firstNumber = rand(1, 99);
        $secondNumber = rand(1, 99);
        $currentOperator = $operators[array_rand($operators, 1)];
        $questionGame = "{$firstNumber} {$currentOperator} {$secondNumber}";
        $correctAnswer = calculateCorrectAnswer($currentOperator, $firstNumber, $secondNumber);
        return [$phraseGame, $questionGame, $correctAnswer];
    };

    goGame($currentGame);
}
