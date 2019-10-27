<?php

namespace  BrainGames\Even;

use function BrainGames\Games\goGame;

function isEven($number): bool
{
    return $number % 2 === 0;
}
function getEvenGame()
{
    $phraseGame = "Answer \"yes\" if the number is even, otherwise answer \"no\".";
    $currentData = function () use ($phraseGame) {
        $questionGame = rand(1, 99);
        $correctAnswer = isEven($questionGame) ? 'yes' : 'no';
        return [$phraseGame, $questionGame, $correctAnswer];
    };
     goGame($currentData);
}
