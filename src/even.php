<?php

namespace  BrainGames\Even;

use function BrainGames\Games\printGame;

function isEven($number): bool
{
    return $number % 2 === 0;
}

function goEvenGame()
{
    $gameData = function ($count = 0) use (&$gameData) {
        $expression = rand(1, 99);
        $correctAnswer = isEven($expression) ? 'yes' : 'no';
        return printGame($expression, $correctAnswer, $count, $gameData);
    };

    return $gameData();
}
