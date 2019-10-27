<?php

namespace  BrainGames\Prime;

use function BrainGames\Games\goGame;

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

function getPrimeGame()
{
    $phraseGame = "Answer \"yes\" if given number is prime. Otherwise answer \"no\".";
    $currentData = function () use ($phraseGame) {
        $questionGame = rand(1, 99);
        $correctAnswer = isPrime($questionGame) ? 'yes' : 'no';
        return [$phraseGame, $questionGame, $correctAnswer];
    };
    goGame($currentData);
}
