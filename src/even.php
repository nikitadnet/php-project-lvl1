<?php

namespace Brain\Games\Even;

use Brain\Games\Cli;

use function cli\line;
use function cli\prompt;

function even()
{
    $userName = Cli\welcome();

    $counter = 0;

    for ($i = 0; $i < 3; $i++) {
        $number = rand(1, 100);
        line("Question: {$number}");
        $answer = prompt("Your answer ");

        $correctAnswer = $number % 2 == 0 ? 'yes' : 'no';
        if ($correctAnswer === $answer) {
            line("Correct!");
            $counter++;
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
            break;
        }

        if ($counter === 3) {
            line("Congratulations, {$userName}!");
        }
    }
}
