<?php

namespace  BrainGames\games\progression;

use function BrainGames\printGame;

const TASK_PROGRESSION_GAME = "What number is missing in the progression?";

function makeProgression($firstMember, $step, $progressionLength)
{
    $result = [];
    for ($memberCount = 0; $memberCount < $progressionLength; $memberCount++) {
        $result[] = $firstMember + $step * $memberCount;
    }
    return $result;
}

function makeSpace($memberSpace, $progression, $space = '..')
{
    $progression[$memberSpace] = $space;
    return $progression;
}
function startProgressionGame()
{
    $getCurrentData = function () {
        $firstMember = rand(0, 5);
        $stepProgression = rand(2, 5);
        $progressionLength = 10;
        $memberSpace = rand(0, $progressionLength - 1);
        $progression = makeProgression($firstMember, $stepProgression, $progressionLength);
        $correctAnswer = (string)$progression[$memberSpace];
        $questionGame = implode(' ', makeSpace($memberSpace, $progression));
        return [$questionGame, $correctAnswer];
    };
    printGame($getCurrentData, TASK_PROGRESSION_GAME);
}
