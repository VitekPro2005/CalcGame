<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

function welcome(): void
{
    printWelcome();
    $name = getName();
    printHelloName($name);
}

function printWelcome(): void
{
    line('Welcome to the Brain Games!');
}

function getName(): string
{
    return prompt('May I have your name?');
}

function printHelloName(string $name): void
{
    line("Hello, %s!", $name);
}
