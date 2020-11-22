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
        $question = Question::create("¿Qué marca de Smart TV deseas consultar?")
            ->fallback('Lo siento, no sé como responderte')
            ->callbackId('ask_about_option')
            ->addButtons([
                Button::create('Samsung')->value('samsung'),
                Button::create('LG')->value('lg'),
                Button::create('TCL')->value('tcl'),
            ]);

        return $this->ask($question, function ( Answer $answer ) {
            switch ($answer->getValue()) {
                case 'samsung':
                    $this->bot->startConversation( new SamsungConversation() );
                break;
                case 'lg':
                    $this->bot->startConversation( new LgConversation() );
                break;
                case 'tcl':
                    $this->bot->startConversation( new TclConversation() );
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
