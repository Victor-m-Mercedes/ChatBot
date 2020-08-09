<?php

namespace App\Conversations;


use App\User;
use App\Interfaces\CurrencyInterface;
use App\Interfaces\AccountInterface;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class MacConversation extends Conversation
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
                            $this->say('<b>Problemas para iniciarla</b> <br> 
                            <p>Si tu Mac no se inicia correctamente y te encuentras frente a una pantalla en blanco o una pantalla gris en lugar de tu escritorio, 
                            entonces tienes que arrancarla en Modo Seguro. En Modo Seguro, tu MacOS arrancará con el mínimo de software y operaciones necesarias, 
                            pero además ejecutará una revisión de tu disco de inicio y reparará cualquier problema en el directorio que pueda ser la causa de los problemas.</p> <br>
                            <p>Para iniciar en Modo Seguro, inicia tu Mac y luego mantén presionada la tecla de mayúsculas (Shift). Aparecerá el logotipo de Apple y luego la pantalla
                            de inicio de sesión. Puedes soltar la tecla Shift cuando el logotipo de Apple desaparezca y veas la pantalla de inicio de sesión. Pueden pasar unos minutos
                            antes de que llegue a la pantalla de inicio de sesión ya que MacOS ejecuta sus diagnósticos en tu disco duro. Para salir del Modo Seguro y activar tu Mac de
                            forma habitual, solo reinicia tu Mac sin tener que mantener ninguna tecla.</p> <br>');
                            break;
                        case 1: 
                            $this->say('<b>Elementos de inicio de sesión incompatibles</b> <br>
                            <p>Si te encuentras frente a una pantalla azul cuando enciendes tu Mac, podría significar que uno de tus elementos de inicio ––apps que se inician automáticamente
                             cuando prendes tu Mac–– es incompatible con MacOS. Con un poco de prueba y error, puedes identificar qué app es la hija problemática.</p> <br>

                             <p>Puedes eliminar los elementos de inicio de sesión de uno en uno e iniciar tu Mac después de cada eliminación para ver si el problema se ha ido. Para hacerlo,
                              ve a&nbsp;<strong>Preferencias del sistema &gt; Usuarios y Grupos</strong> y haz clic en tu nombre a la izquierda debajo de Usuario Actual. A continuación,
                              haz clic en la pestaña <strong>Elementos de Inicio de Sesión</strong> que se encuentra arriba de la ventana a la derecha. Resalta una app y luego haz clic
                              en el signo "-" a continuación. Se eliminará de la lista de Elementos de Inicio de sesión y podrás reiniciar tu Mac para ver si se ha solucionado el problema de encendido.
                              De lo contrario, puedes regresar a la lista y eliminar otra aplicación, y continuar así hasta que encuentres al culpable. Puedes volver a agregar elementos a la lista Elementos
                              de Inicio presionando el botón "+" y seleccionando elementos de la carpeta Aplicaciones.</p>

                             
                            <a target="_blank" href="https://s3.amazonaws.com/www.iotransfer.net/upload/blog/image/20180814/1534235596841184.jpg">
                            <img width="262px" class="media__image media__element b-lazy b-responsive blazy--on b-loaded" src="https://s3.amazonaws.com/www.iotransfer.net/upload/blog/image/20180814/1534235596841184.jpg" title="Los 11 problemas de Windows 10 más comunes y su solución"> </a>');
                            break;
                        case 2:
                            $this->say('<b>App que no responde</b> <br>
                            <p>Es posible que una app ocasionalmente haga que tu Mac se desconecte o se quede bloqueada. Y cuando una app se bloquea, congela tu sesión y no te deja hacer nada,
                             incluso salir de ella. Ingresa: Forzar Salida. Puedes abrir el menú Forzar Salida desde el ícono de Apple en la esquina superior izquierda o presionando
                              <strong>Comando-Opción-Escape</strong>. Simplemente resalta la app que no responde y presiona el botón <strong>Forzar Salida</strong>.
                               (También puedes seleccionar varias apps para forzar la salida usando las teclas Comando o Shift al hacer tus selecciones).</p>
                             <a target="_blank" href="https://9to5mac.com/wp-content/uploads/sites/6/2018/07/how-to-force-quit-mac-apps.jpg?quality=82&strip=all">
                            <img width="262px" class="media__image media__element b-lazy b-responsive blazy--on b-loaded" src="https://9to5mac.com/wp-content/uploads/sites/6/2018/07/how-to-force-quit-mac-apps.jpg?quality=82&strip=all" title="Los 11 problemas de Windows 10 más comunes y su solución"> </a>');
                            break;
                        case 3:
                            $this->say('<b>La famosa pelotita giratoria</b> <br>
                            <p>Si estás viendo la pelota de playa girando con mucha regularidad, entonces es hora de echar un vistazo a lo que podría estar causando la desaceleración.
                             Abre el Monitor de Actividad (buscándolo o ubícalo en la carpeta Utilidades, que se encuentra dentro de la carpeta Aplicaciones) para ver cuánto impacto
                              tienen las apps que estás ejecutando actualmente en los recursos de tu sistema. En la ventana del Monitor de Actividad puedes ver estadísticas en tiempo real
                               sobre la cantidad de recursos de CPU y memoria que usa cada app. También puedes usar el Monitor de Actividad para salir de cualquier app que use una cantidad
                                de recursos excesiva. Simplemente resalta una app de la lista, haz click en el botón <strong>X</strong> en la esquina superior izquierda y luego
                                 elige&nbsp;<strong>Salir </strong>o <strong>Forzar Salida</strong>.</p>
                                 <a target="_blank" href="https://support.apple.com/library/content/dam/edam/applecare/images/es_ES/osx/yosemite-activity_monitor-cpu.png">
                                 <img width="262px" class="media__image media__element b-lazy b-responsive blazy--on b-loaded" src="https://support.apple.com/library/content/dam/edam/applecare/images/es_ES/osx/yosemite-activity_monitor-cpu.png" title="Los 11 problemas de Windows 10 más comunes y su solución"> </a>
                            ');
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


    public function run()
    {
        $options = [
            ['Problemas para iniciarla',0],
            ['Elementos de inicio de sesión incompatibles',1],
            ['App que no responde',2],
            ['La famosa pelotita giratoria',3]
        ];

        
        foreach($options as $option)
        {
            $buttons[] = Button::create($option[0])
                               ->value($option[1]);
        }

        $this->askProblem($buttons);
    }
}