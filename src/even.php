<?php

namespace BrainGames\Even;

use function cli\line;
use function cli\err;
use function cli\prompt;

function isEven($num): bool
{
    return $num % 2 === 0;
}

function printEvenGame()
{
    for ($count = 0; $count !== 3;) {
        $number = rand(1, 99);
        line("Question: %s", $number);
        $userAnswer = prompt("Your answer");
        $correctAnswer = isEven($number) ? 'yes' : 'no';
        if ($userAnswer === $correctAnswer) {
            $count++;
            line("Correct!");
        } else {
            $count = 0;
            err("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $correctAnswer);
            line("Let's try again, %s!", NAME);
        }
    }
}
