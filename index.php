<?php
    require 'vendor/autoload.php';

    use App\Log;

    Log::info('é nóis');

    Flight::route('GET /', function() {
        $templates = new League\Plates\Engine('views');

        echo $templates->render('index', ['name' => 'Jonathan']);
    });

    Flight::start();