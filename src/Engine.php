<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

const GAME_ATTEMPTS = 3;

function play(string $description, callable $game): void
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    line($description);

    writeToLog("--------------------");
    writeToLog("User $name started $description!");

    for ($i = 0; $i < GAME_ATTEMPTS; $i++) {

        /**
         * $response['question'];
         * $response['correct'];
         */
        $response = $game();

        $answer = prompt("Question: {$response['question']}\nYour answer");

        writeToLog("-------");
        writeToLog("Attempt #" . $i + 1);
        writeToLog("Question: {$response['question']}");
        writeToLog("Correct: {$response['correct']}");
        writeToLog("Answer: $answer");
        writeToLog("-------");

        if ($answer == $response['correct']) {
            writeToLog("Answer was right");

            line('Correct!');
        } else {
            writeToLog("Answer was wrong");
            writeToLog("User $name lost!");
            writeToLog("--------------------");

            line("'{$answer}' is wrong answer. Correct answer was '{$response['correct']}'.");
            line("Let's try again, $name!");
            return;
        }
    }

    writeToLog("User $name won!");
    writeToLog("--------------------");

    line("Gratz, $name!");
}

function writeToLog(string $message): void
{
    file_put_contents('log/games.log', $message . PHP_EOL, FILE_APPEND);
}
