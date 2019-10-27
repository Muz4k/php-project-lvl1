<?php

namespace  BrainGames\Progression;

use function BrainGames\Games\printGame;
use function BrainGames\Games\sayGoodbye;
use function BrainGames\Games\sayWelcomeGetName;

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
    $name = sayWelcomeGetName("What number is missing in the progression?");

    $getGameData = function () {
        $member = rand(0, 5);
        $step = rand(2, 5);
        $numOfMembers = 10;
        $memberSpace = rand(0, $numOfMembers - 1);
        $arrayMembers = makeProgression($member, $step, $numOfMembers);
        $correctAnswer = $arrayMembers[$memberSpace];
        $questionGame = implode(' ', makeSpace($memberSpace, $arrayMembers));
        return [$questionGame, $correctAnswer];
    };

    $gameResult = printGame($getGameData);
    sayGoodbye($name, $gameResult);
}
