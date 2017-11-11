<?php
    require 'vendor/autoload.php';


    Flight::route('GET /', function(){
        $templates = new League\Plates\Engine('views');

        echo $templates->render('index', ['name' => 'Jonathan']);
    });

    Flight::start();