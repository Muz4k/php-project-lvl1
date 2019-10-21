<?php

namespace BrainGames\Games;

use function cli\line;
use function cli\err;
use function cli\prompt;

function isEven($number): bool
{
    return $number % 2 === 0;
}

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

function printGame($nameOfGame)
{
    for ($count = 0; $count !== 3;) {
        switch ($nameOfGame) {
            case "even":
                $expression = rand(1, 99);
                $correctAnswer = isEven($expression) ? 'yes' : 'no';
                break;
            case "calc":
                $firstNumber = rand(1, 99);
                $secondNumber = rand(1, 99);
                $arrayOfOperators = ["+", "-", "*"];
                $currentOperator = $arrayOfOperators[array_rand($arrayOfOperators, 1)];
                $expression = "{$firstNumber} {$currentOperator} {$secondNumber}";
                $correctAnswer = calculateCorrectAnswer($currentOperator, $firstNumber, $secondNumber);
                break;
        }
        line("Question: %s", $expression);
        $userAnswer = prompt("Your answer");
        if ($userAnswer == $correctAnswer) {//евен -сравнение как строки со строй, калк - как строки с числом. подумать
            $count++;
            line("Correct!");
        } else {
            $count = 0;
            err("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $correctAnswer);
            line("Let's try again, %s!", NAME);
        }
    }
}
