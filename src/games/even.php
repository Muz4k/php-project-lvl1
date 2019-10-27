<?php

namespace  BrainGames\Even;

use function BrainGames\Games\printGame;
use function BrainGames\Games\sayGoodbye;
use function BrainGames\Games\sayWelcomeGetName;

function isEven($number): bool
{
    return $number % 2 === 0;
}
function goEvenGame()
{
    $name = sayWelcomeGetName("Answer \"yes\" if the number is even, otherwise answer \"no\".");

    $getGameData = function () {
        $questionGame = rand(1, 99);
        $correctAnswer = isEven($questionGame) ? 'yes' : 'no';
        return [$questionGame, $correctAnswer];
    };

    $gameResult = printGame($getGameData);
    sayGoodbye($name, $gameResult);
}
