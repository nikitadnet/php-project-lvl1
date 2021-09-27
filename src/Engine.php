<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

const MAX_ROUND = 3;

function welcome(): string
{
    line('Welcome to the Brain Games!');
    $userName = prompt('May I have your name?');
    line("Hello, {$userName}!");

    return $userName;
}

function makeQuestion(string $question): void
{
    line("Question: {$question}");
}

function getAnswer(): string
{
    return prompt("Your answer ");
}

function checkResult(string $correctAnswer, string $userAnswer, string $userName): bool
{
    if ($correctAnswer == $userAnswer) {
        return true;
    } else {
        line(
            "'{$userAnswer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.
            \nLet's try again, {$userAnswer}! "
        );
        return false;
    }
}

function checkRound(int $round): bool
{
    if ($round === MAX_ROUND) {
        return true;
    } else {
        return false;
    }
}

function congratulateWinner(string $userName): void
{
    line("Congratulations, {$userName}!");
}
