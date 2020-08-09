<?php

namespace App\Conversations;


use App\User;
use App\Interfaces\CurrencyInterface;
use App\Interfaces\AccountInterface;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class WindowsConversation extends Conversation
{
    /**
     * Start the conversation.
     *
     * @return mixed
     */


    


    public function askProblem($buttons)
    {
        $question = Question::create("¿Cuáles de estos problemas presenta tu maquina? ")
        ->fallback('currency_question')
        ->callbackId('ask_about_currency')
        ->addButtons($buttons);

        return $this->ask($question, function ( Answer $answer ) {
            if ( $answer->isInteractiveMessageReply() ) {
                    switch ($answer->getValue()) {
                        case 0:
                            $this->say('<b>Problemas con Instalación</b> <br> <p>Es posible que tengas Windows 7 o Windows 8.1 legal y
                            actualizado, pero por alguna razón <span class="bold">no te aparece
                            la notificación para actualizar a Windows 10.</span></p> <br> <p>En primer lugar hay que activar las actualizaciones automáticas de Windows Update,
                            requisito indispensable para actualizar el ordenador a Windows 10. Así que acude a Windows Update o Buscar Actualizaciones en Windows 7 u 8.1, y marca
                            la opción de actualizaciones automáticas.</p> <br>
                            <p>Windows 10 será detectado automáticamente por Windows Update y comenzará a descargarse</p> <br>
                            <a target="_blank" href="https://cdn.computerhoy.com/sites/navi.axelspringer.es/public/styles/480/public/media/image/2015/10/127211-11-problemas-windows-10-mas-comunes-su-solucion.jpg?itok=dIAyqZpq">
                            <img width="262px" class="media__image media__element b-lazy b-responsive blazy--on b-loaded" src="https://cdn.computerhoy.com/sites/navi.axelspringer.es/public/styles/480/public/media/image/2015/10/127211-11-problemas-windows-10-mas-comunes-su-solucion.jpg?itok=dIAyqZpq" title="Los 11 problemas de Windows 10 más comunes y su solución"> </a>');

                            break;
                        case 1: 
                            $this->say('<b>Actualizar Windows 10 sin Internet</b> <br> <p> </Si no tienes acceso online en un determinado PC, puedes actualizar a Windows 10 usando una ISO del sistema almacenada en un disco DVD o en un pendrive USB.
                             Ten en cuenta que es posible que durante la instalación te pida la clave de Windows 7 o Windows 8.1, así que tenla a mano.> <br>
                             <p>Lo que tienes que hacer es descargar la ISO en otro ordenador con Internet, o pedir a un conocido que lo haga por tí.
                             Hay que acceder a la web de Descarga de Windows 10 a través de  <a href="https://www.microsoft.com/es-es/software-download/windows10ISO" target="_blank" >este enlace</a>
                             y descargar la ISO. Verás que hay una herramienta de descarga que te guía durante todo el proceso. Coge la versión de 64 bits si tienes un PC con menos de 2 años. En caso contrario, la de 32 bits.</p> <br>
                            <a target="_blank" href="https://cdn.computerhoy.com/sites/navi.axelspringer.es/public/styles/855/public/media/image/2015/10/127205-11-problemas-windows-10-mas-comunes-su-solucion.jpg?itok=J309WbIT">
                            <img width="262px" class="media__image media__element b-lazy b-responsive blazy--on b-loaded" src="https://cdn.computerhoy.com/sites/navi.axelspringer.es/public/styles/855/public/media/image/2015/10/127205-11-problemas-windows-10-mas-comunes-su-solucion.jpg?itok=J309WbIT" title="Los 11 problemas de Windows 10 más comunes y su solución"> </a>');
                            break;
                        case 2:
                            $this->say('<b>Problemas en el arranque</b> <br>
                            <p>Es posible que tengas algún programa que se instala en memoria cuando se inicia Windows y consume recursos que interfieren con otra aplicación.
                             Hay una gran cantidad de software que se instala en memoria sin tu permiso de forma permanente,
                             incluso aunque sólo uses ese programa una o dos veces al mes... Adobe, iTunes, Nero, suelen utilizar estas prácticas.</p> <br>
                             
                             <p>Por medio de las herramientas del sistema de Windows 10 podemos eliminar del arranque estas aplicaciones que no usamos a menudo,
                             o aplazar su puesta en marcha unos minutos para que no interfieran con el inicio del ordenador.</p> <br>
                             <b>Desactiva programas en el arranque</b> <br>
                             <a target="_blank" href="https://cdn.computerhoy.com/sites/navi.axelspringer.es/public/styles/855/public/media/image/2015/09/120977-como-acelerar-windows-10-estos-trucos.jpg?itok=ab5tChGQ">
                            <img width="262px" class="media__image media__element b-lazy b-responsive blazy--on b-loaded" src="https://cdn.computerhoy.com/sites/navi.axelspringer.es/public/styles/855/public/media/image/2015/09/120977-como-acelerar-windows-10-estos-trucos.jpg?itok=ab5tChGQ" title="Los 11 problemas de Windows 10 más comunes y su solución"> </a>');
                            break;
                        case 3:
                            $this->say('<b>El ordenador no arranca</b> <br>
                            <p>Has instalado un nuevo driver o programa, y ahora el PC se bloquea y reinicia, o directamente no arranca, o muestra una pantalla en negro. ¿Qué podemos hacer?</> 
                            <p>Un elemento bloquea el uso o inicio de Windows 10, así que hay que repararlo. Para ello debes hacer lo siguiente:</p>
                            <ul>
                                <li>En otro ordenador que funcione, ve al sitio web Descarga de software de Microsoft y descarga la herramienta de instalación de Windows 10 en un pendrive o un disco DVD.<li>
                                <li>Inserta dicho pendrive o USB en el ordenador estropeado y, a continuación, reinicia el equipo.<li>
                                <li>En la pantalla Instalar Windows, selecciona Reparar el equipo.<li>
                                <li>Abre el Administrador de dispositivos escribiendo administrador de dispositivos en el cuadro de búsqueda en la barra de tareas, selecciona Administrador de dispositivos y la flecha para ampliar los Adaptadores de pantalla. <li>
                                <li>Reinicia el equipo para que los cambios surtan efecto.<li>
                            </ul>');
                            break;
                        default:
                            # code...
                            break;
                    }
                    $this->say('Para realizar otra consulta ingrese la palabra opciones en el chat');
                    // $this->bot->startConversation( new WelcomeConversation() );

            } else {
                $this->run();
            }
        });

    }

    public function askAmount()
    {
        $question = Question::create("Insert the amount to withdraw")
        ->fallback('amount_question')
        ->callbackId('ask_about_currency');

        return $this->ask($question, function ( Answer $answer ) {
            if (filter_var($answer->getText(), FILTER_VALIDATE_FLOAT)) {
                $this->amount = $answer->getValue();
                $withdraw = $this->accountRepo->withdraw($this->user->account->id, $this->currency, $answer->getValue());
                $this->say($withdraw);
                $this->bot->startConversation( new OptionConversation($this->user) );
            } else {
                $this->say("Not a valid amount. Try again");
                $this->askAmount();
            }
        });

    }

    public function run()
    {
        $options = [
            ['Problemas con Instalación',0],
            ['Actualizar Windows 10 sin Internet',1],
            ['Problemas con el arranque',2],
            ['El ordenador no arranca',3]
        ];

        
        foreach($options as $option)
        {
            $buttons[] = Button::create($option[0])
                               ->value($option[1]);
        }

        $this->askProblem($buttons);
    }
}