<?php
    require __DIR__ . '/vendor/autoload.php';

    use App\Log as Log;

    Log::init(__DIR__);

    Flight::route('GET /', function() {
        $templates = new League\Plates\Engine('views');

        echo $templates->render('index', ['name' => 'Jonathan']);
    });

    Flight::start();