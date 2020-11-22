<?php

namespace App\Conversations;


use App\User;
use App\Interfaces\CurrencyInterface;
use App\Interfaces\AccountInterface;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class SamsungConversation extends Conversation
{
    /**
     * Start the conversation.
     *
     * @return mixed
     */

    public function askProblem($buttons)
    {
        $question = Question::create("¿Cuáles de estos problemas presenta tu Smart TV?")
            ->fallback('Lo siento, no sé como responderte')
            ->callbackId('ask_about_currency')
            ->addButtons($buttons);

        return $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                switch ($answer->getValue()) {
                    case 0:
                        $this->say('<p><strong>Para establecer conexion al Wi-Fi</strong></p>
                            <p>1. Accede al Men&uacute; pulsando el bot&oacute;n Home del mando a distancia.<br />
                            2. Ve a Red y despu&eacute;s selecciona Configuraci&oacute;n de red.<br />
                            3. Elige Conexi&oacute;n inal&aacute;mbrica.<br />
                            4. Busca tu red WIFI y la elijes.<br />
                            5. Pones la contrase&ntilde;a y ya estar&aacute; conectado.</p>');

                        break;
                    case 1:
                        $this->say('<p><strong>La TV no enciende</strong></p>
                            <p>1. Revise que est&eacute; conectada al toma corriente</p>
                            <p>2. Que haya energ&iacute;a el&eacute;ctrica.</p>
                            <p>3. Por ultimo que el control tenga bater&iacute;as.</p>');
                        break;
                    default:
                        # code...
                        break;
                }
                $this->say('Para realizar otra consulta ingrese la palabra <b>opciones</b> en el chat');
            } else {
                $this->run();
            }
        });
    }

    public function run()
    {
        $options = [
            ['Problemas de conexión a internet', 0],
            ['La TV no enciende', 1]
        ];


        foreach ($options as $option) {
            $buttons[] = Button::create($option[0])
                ->value($option[1]);
        }

        $this->askProblem($buttons);
    }
}
