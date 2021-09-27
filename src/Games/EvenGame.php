<?php

namespace Brain\Games\EvenGame;

use function Brain\Games\Engine\checkResult;
use function Brain\Games\Engine\checkRound;
use function Brain\Games\Engine\congratulateWinner;
use function Brain\Games\Engine\getAnswer;
use function Brain\Games\Engine\makeQuestion;
use function Brain\Games\Engine\welcome;
use function cli\line;

function evenGame()
{
    $correctAnswer = '';
    $answerCounter = 0;
    $userName = welcome();
    line('Answer "yes" if the number is even, otherwise answer "no".');

    for ($i = 0; $i < 3; $i++) {
        $randomNumber = rand(1, 100);
        makeQuestion((string) $randomNumber);
        $userAnswer = getAnswer();
        $result = $randomNumber % 2 == 0 ? 'yes' : 'no';
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
