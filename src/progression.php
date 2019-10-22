<?php

namespace  BrainGames\Progression;

use function BrainGames\Games\printGame;

function makeProgression($member, $step, $numOfMembers, $result = [])
{
    if ($numOfMembers === 0) {
        return $result;
    }
    $result[] = $member;
    return makeProgression($member + $step, $step, $numOfMembers - 1, $result);
}

function makeSpace($memberSpace, $progression, $space = '..')
{
    $progression[$memberSpace] = $space;
    return $progression;
}

function goProgressionGame()
{
    $gameData = function ($count = 0) use (&$gameData) {
        $member = rand(0, 5);
        $step = rand(2, 5);
        $numOfMembers = 10;
        $memberSpace = rand(0, $numOfMembers - 1);
        $arrayMembers = makeProgression($member, $step, $numOfMembers);
        $correctAnswer = $arrayMembers[$memberSpace];
        $expression = implode(' ', makeSpace($memberSpace, $arrayMembers));
        return printGame($expression, $correctAnswer, $count, $gameData);
    };

    return $gameData();
}
