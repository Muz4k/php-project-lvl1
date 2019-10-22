<?php

namespace  BrainGames\Prime;

use function BrainGames\Games\printGame;

function isPrime($number): bool
{
    if ($number === 1) {
        return false;
    }
    for ($divisor = 2; $divisor <= $number / 2; $divisor++) {
        if ($number % $divisor === 0) {
            return false;
        }
    }
    return true;
}

function goPrimeGame()
{
    $gameData = function ($count) use (&$gameData) {
        $expression = rand(1, 99);
        $correctAnswer = isPrime($expression) ? 'yes' : 'no';
        return printGame($expression, $correctAnswer, $count, $gameData);
    };

    return $gameData($count = 0);
}
