<?php

namespace  Brain\Games\games\calc;

use function Brain\Games\startGame;

const TASK_CALC_GAME = "What is the result of the expression?";
const OPERATORS = ["+", "-", "*"];

function calculate($operator, $firstOperand, $secondOperand): string
{
    switch ($operator) {
        case "+":
            return $firstOperand + $secondOperand;
        case "-":
            return $firstOperand - $secondOperand;
        case "*":
            return $firstOperand * $secondOperand;
    }
}

function startCalcGame()
{
    $getGameData = function () {
        $firstOperand = rand(1, 99);
        $secondOperand = rand(1, 99);
        $operator = OPERATORS[array_rand(OPERATORS, 1)];
        $questionGame = "{$firstOperand} {$operator} {$secondOperand}";
        $correctAnswer = calculate($operator, $firstOperand, $secondOperand);
        return [$questionGame, $correctAnswer];
    };

    startGame($getGameData, TASK_CALC_GAME);
}
