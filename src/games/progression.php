<?php

namespace  Brain\Games\games\progression;

use function Brain\Games\startGame;

const TASK_PROGRESSION_GAME = "What number is missing in the progression?";
const PROGRESSION_LENGTH = 10;

function makeProgression($firstMember, $step, $progressionLength)
{
    $result = [];
    for ($memberCount = 0; $memberCount < $progressionLength; $memberCount++) {
        $result[] = $firstMember + $step * $memberCount;
    }
    return $result;
}

function makeQuestion($hiddenMemberSpace, $progression, $space = '..')
{
    $progression[$hiddenMemberSpace] = $space;
    return $progression;
}
function startProgressionGame()
{
    $getGameData = function () {
        $firstMember = rand(0, 5);
        $stepProgression = rand(2, 5);
        $hiddenMemberSpace = rand(0, PROGRESSION_LENGTH - 1);
        $progression = makeProgression($firstMember, $stepProgression, PROGRESSION_LENGTH);
        $correctAnswer = (string)$progression[$hiddenMemberSpace];
        $questionGame = implode(' ', makeQuestion($hiddenMemberSpace, $progression));
        return [$questionGame, $correctAnswer];
    };
    startGame($getGameData, TASK_PROGRESSION_GAME);
}
