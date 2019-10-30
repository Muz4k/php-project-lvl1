<?php

namespace  BrainGames\games\prime;

use function BrainGames\printGame;

const TASK_PRIME_GAME = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime($operand): bool
{
    if ($operand === 1) {
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
    $getCurrentData = function () {
        $questionGame = rand(1, 99);
        $correctAnswer = isPrime($questionGame) ? 'yes' : 'no';
        return [$questionGame, $correctAnswer];
    };
    printGame($getCurrentData, TASK_PRIME_GAME);
}
