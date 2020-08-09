<?php
use App\Http\Controllers\BotManController;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;

$botman = resolve('botman');

// $botman->hears('Hi', function ($bot) {
//     $bot->reply('Hello!');
// });

// $botman->hears('What is your name', function ($bot) {
//     $bot->reply('My name is Cristian!');
// });

// $botman->hears('age', function ($bot) {
//     $bot->reply('21');
// });




$botman->fallback(function ($bot) {
    $bot->reply("Sorry i can't understand!");
});



// $botman->hears('Start conversation', BotManController::class.'@startConversation');
