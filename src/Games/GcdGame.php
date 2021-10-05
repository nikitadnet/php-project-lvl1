<?php

namespace Brain\Games\Gcd;

use function Brain\Games\Engine\checkResult;
use function Brain\Games\Engine\checkRound;
use function Brain\Games\Engine\congratulateWinner;
use function Brain\Games\Engine\getAnswer;
use function Brain\Games\Engine\makeQuestion;
use function Brain\Games\Engine\welcome;
use function cli\line;

function getGcd($firstNumber, $secondNumber)
{
    $gcd = 0;

    if ($firstNumber > $secondNumber) {
        $temp = $firstNumber;
        $firstNumber = $secondNumber;
        $secondNumber = $temp;
    }

    for ($i = 1; $i < ($firstNumber + 1); $i++) {
        if ($firstNumber % $i == 0 && $secondNumber % $i == 0) {
            $gcd = $i;
        }
    }

    return $gcd;
}

function gcdGame()
{
    $answerCounter = 0;
    $userName = welcome();
    line("Find the greatest common divisor of given numbers.");

    for ($i = 0; $i < 3; $i++) {
        $firstNubmer = rand(1, 100);
        $secondNumber = rand(1, 100);
        $gcd = getGcd($firstNubmer, $secondNumber);
        makeQuestion("{$firstNubmer} {$secondNumber}");
        $userAnswer = getAnswer();
        $correctAnswer = checkResult($gcd, $userAnswer, $userName);
        if ($correctAnswer) {
            line("Correct!");
            $answerCounter++;
        } else {
            break;
        }
        if (checkRound($answerCounter)) {
            congratulateWinner($userName);
        }
    }
}
