<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;

class AskNameConversation extends Conversation
{
    protected $name;

    public function askName()
    {
        $this->ask('What is your name?', function ($answer) {
            $this->name = $answer->getText();
            $this->say('Nice to meet you, ' . $this->name . '!');
        });
    }

    public function run()
    {
        $this->askName();
    }
}
