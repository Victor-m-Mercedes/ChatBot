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
                            $this->say('<p><strong>No hay suficiente espacio para instalar una actualizaci&oacute;n de Windows</strong></p>
                            <p>Si desea una forma r&aacute;pida de liberar decenas de gigabytes de espacio, le recomendamos&nbsp;&nbsp;<a href="https://macpaw.com/cleanmypc">CleanMyPC</a>&nbsp;.&nbsp;Desinstalar&aacute; las aplicaciones y todos sus archivos, limpiar&aacute; la base de datos del Registro de Windows y eliminar&aacute; los archivos temporales que a&uacute;n est&aacute;n por ah&iacute;.&nbsp;Puede eliminar archivos autom&aacute;ticamente, despu&eacute;s de escanear su PC, o puede optar por revisar los resultados del escaneo y decidir por s&iacute; mismo qu&eacute; eliminar.&nbsp;Puedes&nbsp;&nbsp;<a href="https://macpaw.com/cleanmypc">descargarlo gratis aqu&iacute;</a>&nbsp;.</p>
                            <p>Otra forma de lidiar con este problema es liberar espacio autom&aacute;ticamente en su disco duro o SSD.&nbsp;Una forma de hacerlo es utilizar la herramienta de limpieza de disco integrada.</p>
                            <ul>
                            <li>Haga clic en el men&uacute; Inicio</li>
                            <li>Elija todos los programas</li>
                            <li>Seleccione Accesorios, luego Herramientas del sistema</li>
                            <li>Haga clic en Liberador de espacio en disco</li>
                            <li>En el encabezado Archivos para eliminar, elija qu&eacute; tipos de archivos desea eliminar</li>
                            <li>Si no est&aacute; seguro de qu&eacute; tipos de archivos debe eliminar, seleccione cada uno de ellos y lea su descripci&oacute;n.</li>
                            <li>Cuando haya seleccionado los tipos de archivo para eliminar, haga clic en Aceptar</li>
                            </ul>
                            <p>Tambi&eacute;n puede liberar espacio archivando y eliminando manualmente archivos grandes y antiguos y desinstalando aplicaciones; sin embargo, le llevar&aacute; mucho tiempo.</p>');

                            break;
                        case 1: 
                            $this->say('<p><strong>La PC arranca</strong> <strong>lentamente</strong></p>
                            <p>Hay varias razones por las que Windows 10 podr&iacute;a iniciarse lentamente.&nbsp;Las dos primeras cosas que debe verificar son que Windows est&eacute; actualizado y no se haya infectado con malware.</p>
                            <p>Para buscar malware:</p>
                            <ul>
                            <li>Presione la tecla de Windows y "I"</li>
                            <li>Elija Actualizaci&oacute;n y seguridad</li>
                            <li>Seleccione Windows Defender</li>
                            <li>Haga clic en Abrir Windows Defender</li>
                            <li>Presione Escaneo completo y Escanear ahora&nbsp;</li>
                            </ul>
                            <p>Una vez que haya terminado de escanear, siga las instrucciones en pantalla.</p>
                            <p>Para buscar actualizaciones de Windows, vaya a Actualizaciones y seguridad y seleccione la opci&oacute;n para buscar actualizaciones o instalar actualizaciones disponibles.</p>');
                            break;
                        case 2:
                            $this->say('<p><strong>Demasiadas notificaciones</strong></p>
                            <p>El Centro de actividades de Windows 10 es excelente para mantener todas sus notificaciones en un solo lugar.&nbsp;Sin embargo, puede llenarse r&aacute;pidamente de mensajes que no le interesan de aplicaciones que casi nunca usa.&nbsp;Afortunadamente, puedes apagarlos.</p>
                            <ul>
                            <li>Vaya al men&uacute; Inicio y elija Configuraci&oacute;n</li>
                            <li>Haga clic en Sistema, luego elija Notificaciones y acciones</li>
                            <li>Utilice los interruptores de palanca para controlar c&oacute;mo y cu&aacute;ndo aparecen las notificaciones, o si aparecen.&nbsp;Adem&aacute;s de controlar las notificaciones a nivel del sistema, puede configurarlas por aplicaci&oacute;n.</li>
                            </ul>
                            <p>Si ya no necesita el programa con notificaciones molestas, puede desinstalarlo y olvidarse del dolor.&nbsp;<a href="https://macpaw.com/cleanmypc">Multi Uninstaller de CleanMyPC</a>&nbsp;es la herramienta adecuada para deshacerse de estas aplicaciones por completo y para siempre.</p>');
                            break;
                        case 3:
                            $this->say('<p><strong>Problema con la impresora</strong></p>
                            <p>Las impresoras son una fuente com&uacute;n de problemas, pero a menudo se pueden solucionar f&aacute;cilmente.&nbsp;</p>
                            <ul>
                            <li>Vaya al Panel de control, luego elija Dispositivos e impresoras.&nbsp;</li>
                            <li>Haz clic derecho en tu impresora y elige eliminarla.</li>
                            </ul>
                            <p>Ahora, vaya al sitio web del fabricante de su impresora y descargue los controladores m&aacute;s recientes para su impresora y siga las instrucciones para instalarlos.</p>
                            <p>Los problemas de Windows 10 no tienen por qu&eacute; causarte pesadillas.&nbsp;Si sigue los consejos aqu&iacute;, podr&aacute; resolver los m&aacute;s habituales de forma r&aacute;pida y sencilla.&nbsp;Y no olvide&nbsp;<a href="https://macpaw.com/download/cleanmypc">descargar CleanMyPC</a>&nbsp;y deje que le ayude a liberar espacio, acelerar su PC y solucionar otros problemas molestos de Windows 10.</p>');
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
            ['Poco espacio para actualizar Windows',0],
            ['La PC arranca lentamente',1],
            ['Demasiadas notificaciones',2],
            ['Problema con la impresora',3]
        ];

        
        foreach($options as $option)
        {
            $buttons[] = Button::create($option[0])
                               ->value($option[1]);
        }

        $this->askProblem($buttons);
    }
}