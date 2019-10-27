<?php

namespace  BrainGames\Prime;

use function BrainGames\Games\printGame;
use function BrainGames\Games\sayGoodbye;
use function BrainGames\Games\sayWelcomeGetName;

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
    $name = sayWelcomeGetName("Answer \"yes\" if given number is prime. Otherwise answer \"no\".");

    $getGameData = function () {
        $questionGame = rand(1, 99);
        $correctAnswer = isPrime($questionGame) ? 'yes' : 'no';
        return [$questionGame, $correctAnswer];
    };

    $gameResult = printGame($getGameData);
    sayGoodbye($name, $gameResult);
}
