<?php

namespace App\Conversations;


use App\User;
use App\Interfaces\CurrencyInterface;
use App\Interfaces\AccountInterface;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class TclConversation extends Conversation
{
    /**
     * Start the conversation.
     *
     * @return mixed
     */

    public function askProblem($buttons)
    {
        $question = Question::create("¿Cuáles de estos problemas presenta tu Smart TV? ")
        ->fallback('Lo siento, no sé como responderte')
        ->callbackId('ask_about_currency')
        ->addButtons($buttons);

        return $this->ask($question, function ( Answer $answer ) {
            if ( $answer->isInteractiveMessageReply() ) {
                    switch ($answer->getValue()) {
                        case 0:
                            $this->say('<h2>C&oacute;mo conectar su TCL Roku TV a WiFi o Ethernet (si corresponde)</h2>
                            <p>&nbsp;</p>
                            <p>Para disfrutar de los beneficios de transmisi&oacute;n de su TCL Roku TV, debe conectarse a Internet. Esto puede hacerse a trav&eacute;s de Wi-Fi o cable Ethernet (modelos TCL Roku 4K TV).</p>
                            <p>&nbsp;</p>
                            <p>Presiona el bot&oacute;n de encendido en el control remoto TCL Roku para encender su televisor.</p>
                            <p>&nbsp;</p>
                            <p>Cuando encienda el televisor por primera vez, tardar&aacute; unos segundos en prepararse. Notaras que suceden las siguientes cosas:</p>
                            <p>&nbsp;</p>
                            <p>El indicador de estado parpadea cada vez que el televisor est&aacute; realizando alg&uacute;n tipo de b&uacute;squeda; en este caso est&aacute; encendiendo y prepar&aacute;ndose para ti.</p>
                            <p>&nbsp;</p>
                            <p>Aparece la pantalla de encendido y la luz de estado parpadea lentamente durante algunos segundos m&aacute;s. La pantalla de encendido muestra un logotipo TCL &bull; Roku TV mientras se enciende el televisor.</p>
                            <p>&nbsp;</p>
                            <ol>
                            <li>
                            <p>Con la primera pantalla de configuraci&oacute;n guiada en su TV, siga estos sencillos pasos para configurarla:</p>
                            </li>
                            </ol>
                            <p>Utiliza los botones Arriba o Abajo para seleccionar su idioma preferido.</p>
                            <p>&nbsp;</p>
                            <p>Presione el bot&oacute;n OK para ir a la siguiente pantalla.</p>
                            <p>&nbsp;</p>
                            <p>Pulsa OK para seleccionar configurar para uso dom&eacute;stico. El modo de inicio es la opci&oacute;n correcta para disfrutar de su televisor. Proporciona opciones de ahorro de energ&iacute;a, as&iacute; como acceso a todas las funciones de la TV.</p>
                            <p>&nbsp;</p>
                            <p>Nota: El modo Store configura el televisor para la visualizaci&oacute;n minorista y no se recomienda para ning&uacute;n otro uso. En el modo de almacenamiento, algunas caracter&iacute;sticas del televisor faltan o est&aacute;n limitadas.</p>
                            <p>&nbsp;</p>
                            <p>. Despu&eacute;s de seleccionar Configurar para uso dom&eacute;stico, el televisor buscar&aacute; las redes Wi-Fi dentro del alcance y las mostrar&aacute; en orden, las se&ntilde;ales m&aacute;s fuertes primero o en el caso de nuestros modelos 4K, se le pedir&aacute; que seleccione el m&eacute;todo que va a utilizar para conectarse a Internet.</p>
                            <p>&nbsp;</p>
                            <p>2a. Si decides conectar tu televisor a Internet mediante un cable Ethernet, conecta el cable Ethernet que viene desde tu enrutador o m&oacute;dem al televisor y selecciona cableado (Ethernet). El televisor verificar&aacute; la conectividad a tu red local, y luego a Internet. Si la verificaci&oacute;n es correcta, el televisor saltar&aacute; a enlazar tu cuenta de Roku</p>
                            <p>&nbsp;</p>
                            <p>3. Pulsa el bot&oacute;n Arriba o Abajo para resaltar tu red inal&aacute;mbrica y, a continuaci&oacute;n, pulse el bot&oacute;n OK para seleccionarlo.</p>
                            <p>&nbsp;</p>
                            <p>Como alternativa, se muestran otras opciones para ayudarte a conectarse a Wi-Fi, en caso de que lo necesite. Sus funciones se explican a continuaci&oacute;n:</p>
                            <p>&nbsp;</p>
                            <p>Escanea de nuevo para ver todas las redes: esta opci&oacute;n depende del n&uacute;mero de redes inal&aacute;mbricas dentro del rango de alcance.&nbsp;</p>
                            <p>&nbsp;</p>
                            <p>Aparecer&aacute; de nuevo la exploraci&oacute;n si la lista ya muestra todas las redes inal&aacute;mbricas disponibles dentro del alcance. Si no ves el nombre de la red inal&aacute;mbrica en la lista, puede ser que tengas que ajustar la ubicaci&oacute;n del enrutador inal&aacute;mbrico o del televisor, encender el enrutador o realizar otros cambios. Cuando todo est&eacute; listo, seleccione escanear de nuevo para ver si el nombre de red aparece ahora en la lista.</p>
                            <p>&nbsp;</p>
                            <p>Escanea de nuevo para ver todas las redes, si el televisor encuentras m&aacute;s de siete redes Wi-Fi. Si no ves el nombre de la red inal&aacute;mbrica en la lista, esta opci&oacute;n muestra la lista completa. Si a&uacute;n no ves el nombre de tu red, es posible tu enrutador &nbsp;este configurado para proporcionar el servicio inal&aacute;mbrico como una "red privada".</p>
                            <p>&nbsp;</p>
                            <p>Sugerencia: Al resaltar cualquiera de estas opciones se muestra un panel informativo con la direcci&oacute;n MAC &uacute;nica de su Roku TV. Necesitaras la direcci&oacute;n MAC si tu enrutador inal&aacute;mbrico est&aacute; configurado para usar el filtrado de direcciones MAC.</p>
                            <p>&nbsp;</p>
                            <p>Red privada: si el nombre de tu red inal&aacute;mbrica est&aacute; oculta, no aparecer&aacute; en la lista.</p>
                            <p>&nbsp;</p>
                            <p>Para realizar el ajuste, selecciona Red privada para mostrar un teclado en pantalla y util&iacute;celo para introducir el nombre de su red.</p>
                            <p>&nbsp;</p>
                            <p>Nota: Las redes inal&aacute;mbricas protegidas por contrase&ntilde;a muestran un icono de "candado" adyacente al nombre.</p>
                            <p>&nbsp;</p>
                            <p>3. Si tu red est&aacute; protegida por contrase&ntilde;a, aparecer&aacute; un teclado en pantalla. Utiliza el teclado para introducir la contrase&ntilde;a de red.</p>
                            <p>&nbsp;</p>
                            <p>4. Despu&eacute;s de enviar tu contrase&ntilde;a de red, el televisor muestra mensajes de progreso, ya que se conecta a tu red inal&aacute;mbrica, tu red local e Internet.</p>
                            <p>&nbsp;</p>
                            <p>5. Una vez que tu televisor est&eacute; conectado a Wi-Fi, autom&aacute;ticamente buscar&aacute; y descargar&aacute; cualquier actualizaci&oacute;n de software disponible.</p>
                            <p>&nbsp;</p>
                            <p>Nota: El televisor comprueba peri&oacute;dicamente las actualizaciones. Estas actualizaciones proporcionan nuevas caracter&iacute;sticas y mejoran tu experiencia con el televisor. Despu&eacute;s de una actualizaci&oacute;n, es posible que notes que se han movido algunas opciones y que hay nuevas opciones o caracter&iacute;sticas.</p>');

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

        
        foreach($options as $option)
        {
            $buttons[] = Button::create($option[0])
                               ->value($option[1]);
        }

        $this->askProblem($buttons);
    }
}