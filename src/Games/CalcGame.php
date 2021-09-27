<?php

namespace Brain\Games\CalcGame;

use function Brain\Games\Engine\checkResult;
use function Brain\Games\Engine\checkRound;
use function Brain\Games\Engine\congratulateWinner;
use function Brain\Games\Engine\getAnswer;
use function Brain\Games\Engine\makeQuestion;
use function Brain\Games\Engine\welcome;
use function cli\line;

function getRandomExpression()
{
    $firstNumber = rand(0, 100);
    $secondNumber = rand(0, 100);
    $operations = ["+", "-", "*"];
    $key = array_rand($operations);
    $operation = $operations[$key];
    $expression = "";
    $answerExpression = 0;

    switch ($operation) {
        case "+":
            $expression = "{$firstNumber} + {$secondNumber}";
            $answerExpression = $firstNumber + $secondNumber;
            break;
        case "-":
            $expression = "{$firstNumber} - {$secondNumber}";
            $answerExpression = $firstNumber - $secondNumber;
            break;
        case "*":
            $expression = "{$firstNumber} * {$secondNumber}";
            $answerExpression = $firstNumber * $secondNumber;
            break;
    }

    return [$expression, $answerExpression];
}

function calcGame()
{
    $answerCounter = 0;
    $userName = welcome();
    line("What is the result of the expression?");

    for ($i = 0; $i < 3; $i++) {
        [$expression, $result] = getRandomExpression();
        makeQuestion($expression);
        $userAnswer = getAnswer();
        $correctAnswer = checkResult($result, $userAnswer, $userName);
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
