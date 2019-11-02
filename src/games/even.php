<?php

namespace  Brain\Games\games\even;

use function Brain\Games\startGame;

const TASK_EVEN_GAME = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven($operand): bool
{
    return $operand % 2 === 0;
}
function startEvenGame()
{
    $getGameData = function () {
        $questionGame = rand(1, 99);
        $correctAnswer = isEven($questionGame) ? 'yes' : 'no';
        return [$questionGame, $correctAnswer];
    };
     startGame($getGameData, TASK_EVEN_GAME);
}
