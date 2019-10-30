<?php

namespace  BrainGames\games\calc;

use function BrainGames\printGame;

const TASK_CALC_GAME = "What is the result of the expression?";
const OPERATORS = ["+", "-", "*"];

function calculateCorrectAnswer($expressionOperator, $firstOperand, $secondOperand): string
{
    switch ($expressionOperator) {
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
    $getCurrentData = function () {
        $firstOperand = rand(1, 99);
        $secondOperand = rand(1, 99);
        $expressionOperator = OPERATORS[array_rand(OPERATORS, 1)];
        $questionGame = "{$firstOperand} {$expressionOperator} {$secondOperand}";
        $correctAnswer = calculateCorrectAnswer($expressionOperator, $firstOperand, $secondOperand);
        return [$questionGame, $correctAnswer];
    };

    printGame($getCurrentData, TASK_CALC_GAME);
}
