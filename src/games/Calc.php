<?php

namespace BrainGames\Cli;

const MIN_EVEN_NUMBER = 1;
const MAX_EVEN_NUMBER = 100;

function calc(): void
{
    play('Answer the result of the calculation.', function () {
        $randomNum1 = (int)rand(1,100);
        $randomNum2 = (int)rand(1,100);

        $calculations = ['+','-','*'];
        $calculation = $calculations[array_rand($calculations)];

        $mathQuestion = "$randomNum1 $calculation $randomNum2";
        $correctanswer = 0;

        if ($calculation == '+') {
          $correctanswer = $randomNum1 + $randomNum2;
        } elseif ($calculation == '-') {
          $correctanswer = $randomNum1 - $randomNum2;
        } else {
          $correctanswer = $randomNum1 * $randomNum2;
        }
        return [
            'question' => $mathQuestion,
            'correct' => $correctanswer,
        ];
        });

}