<?php

namespace App\Conversations;

use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class WelcomeConversation extends Conversation
{
     /**
     * First question
     */
    public function askQuestion()
    {
        $question = Question::create("¿Qué sistema operativo estas utilizando ?")
            ->fallback('Unable to ask question')
            ->callbackId('ask_about_option')
            ->addButtons([
                Button::create('Windows')->value('windows'),
                Button::create('macOs')->value('macos'),
            ]);

        return $this->ask($question, function ( Answer $answer ) {
            switch ($answer->getValue()) {
                case 'win':
                case 'windows':
                    $this->bot->startConversation( new WindowsConversation() );
                break;
                case 'mac':
                case 'macos':
                    $this->bot->startConversation( new MacConversation() );
                break;
                
                default:
                    $this->askQuestion();
                break;
            }
        });
    }

    /**
     * Start the conversation
     */

     
    public function run()
    {
        $this->askQuestion();
    }
}
