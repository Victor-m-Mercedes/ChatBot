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
                            $this->say('<b>Problemas de arranque / Inicia lento o despacio</b>
                            <br> 
                            <p><b>Causas:</b> PRAM es una memoria no volátil que utilizan las computadoras Apple para almacenar información de configuración.
                            Sin embargo, ciertos cambios pueden permanecer estancados en la memoria residual, lo que puede conducir a comportamientos extraños.
                            </p>
                            <br>
                            <p><b>Solución:</b> apague su computadora. Luego encienda el dispositivo mientras mantiene presionadas simultáneamente
                            las teclas [comando] + [opción] + [P] + [R]. Debería escuchar el timbre de Apple antes de que la computadora se reinicie. 
                            Continúe presionando las teclas hasta que escuche el segundo timbre de Apple para borrar el PRAM.</p> <br>');
                            break;
                        case 1: 
                            $this->say('<b>La computadora no se inicia en el escritorio.</b> <br>
                            <p><b>Causas:</b> cuando las extensiones impiden que una computadora se inicie, con frecuencia se debe a una aplicación que se 
                            instaló o una aplicación de inicio de sesión que está causando el bloqueo.</p> <br>

                            <p><b>Solución:</b> encienda o reinicie la computadora mientras mantiene presionada la tecla [shift]. Continúe presionando la tecla para deshabilitar 
                            las extensiones y los elementos de inicio de sesión para que no se carguen durante el proceso de inicio. Desde un escritorio con extensiones 
                            deshabilitadas, el "modo seguro" permitirá al usuario final eliminar la aplicación ofensiva y arrancar normalmente.</p>');
                            break;
                        case 2:
                            $this->say('<b>La computadora no inicia o carga una imagen basada en la red.</b> <br>
                            <p>
                                <b>Causas:</b> el uso más común para el arranque en red es junto con un servidor OS X que ejecuta el servicio NetBoot o al implementar / capturar una imagen de un sistema de referencia OS X.
                            </p>
                            <p>
                                <b>Solución:</b> encienda o reinicie la computadora mientras mantiene presionada la letra [N]. El proceso de inicio iniciará un inicio de red y buscará cualquier Mac que ejecute OS X Server o cualquier Mac que ejecute una aplicación o servicio de clonación basado en red que esté transmitiendo.
                            </p>');
                            break;
                        case 3:
                            $this->say('<b>La contraseña vinculada a mi computadora Apple se ha olvidado o no está disponible.</b> <br>
                            <p>
                                <b>Causas:</b> Las Mac son resistentes pero aún propensas a la corrupción de datos y los mismos errores basados ​​en el usuario que cualquier otro sistema operativo debido a un uso inadecuado. Dos ejemplos comunes de esto son un usuario que olvida su contraseña o los archivos del sistema se corrompen hasta el punto en que el usuario no puede iniciar sesión en el sistema. En ambos escenarios, el usuario final no puede acceder a sus documentos.
                            </p>
                            <p>
                                <b>Solución:</b> encienda o reinicie la computadora mientras mantiene presionada la tecla [opción] para acceder a la partición de recuperación - o [comando] + [R]. Una vez que se haya cargado el entorno de la partición de recuperación, seleccione Utilidades | Terminal desde el menú para cargar la aplicación Terminal. Escriba "resetpassword" (sin comillas) en la pantalla del terminal y presione la tecla [enter] para cargar la utilidad Reset Password. A partir de ahí, se debe seleccionar primero el volumen en el que reside la cuenta de usuario, y luego seleccionar el nombre en el menú desplegable de la cuenta de usuario que desea restablecer. Una vez hecho esto, ingrese la nueva contraseña en ambos campos para reconfirmar la contraseña y haga clic en el botón Guardar para confirmar los cambios. Para probar los cambios, reinicie la Mac e ingrese las nuevas credenciales para la cuenta modificada en la pantalla de inicio de sesión.
                            </p>');
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
            ['Tengo problemas de arranque', 0],
            ['La computadora no inicia en el escritorio', 1],
            ['Tengo problemas con el arranque de la red', 2],
            ['Se me olvidó la contraseña', 3]
        ];

        
        foreach($options as $option)
        {
            $buttons[] = Button::create($option[0])
                               ->value($option[1]);
        }

        $this->askProblem($buttons);
    }
}