<?php

namespace  BrainGames\games\even;

use function BrainGames\printGame;

const TASK_EVEN_GAME = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven($operand): bool
{
    return $operand % 2 === 0;
}
function startEvenGame()
{
    $getCurrentData = function () {
        $questionGame = rand(1, 99);
        $correctAnswer = isEven($questionGame) ? 'yes' : 'no';
        return [$questionGame, $correctAnswer];
    };
     printGame($getCurrentData, TASK_EVEN_GAME);
}
