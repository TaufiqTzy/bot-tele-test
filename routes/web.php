<?php

use Illuminate\Support\Facades\Route;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;

use BotMan\BotMan\Cache\LaravelCache;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::match(['get', 'post'], '/botman', function () {
    DriverManager::loadDriver(\BotMan\Drivers\Web\WebDriver::class);

    $config = [];

    $botman = BotManFactory::create($config, new LaravelCache());

    $botman->hears('hi|hello', function (BotMan $bot) {
        $bot->reply('Hello! How can I help you?');
    });

    $botman->listen();
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/botman/chat', function (){
    return view('botman.chat');
});
