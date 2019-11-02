<?php

namespace  Brain\Games\games\prime;

use function Brain\Games\startGame;

const TASK_PRIME_GAME = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime($operand): bool
{
    if ($operand <= 1) {
        return false;
    }
    for ($divisor = 2; $divisor <= $operand / 2; $divisor++) {
        if ($operand % $divisor === 0) {
            return false;
        }
    }
    return true;
}

function startPrimeGame()
{
    $getGameData = function () {
        $questionGame = rand(1, 99);
        $correctAnswer = isPrime($questionGame) ? 'yes' : 'no';
        return [$questionGame, $correctAnswer];
    };
    startGame($getGameData, TASK_PRIME_GAME);
}
