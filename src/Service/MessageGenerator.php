<?php

namespace App\Service;

class MessageGenerator
{
    public function getHappyMessage(): string
    {
        $messages = [
            'You did it! Great job!',
            'Keep going, success is near!',
            'You are awesome!',
        ]

        return $messages[array_rand($messages)];
    }
}