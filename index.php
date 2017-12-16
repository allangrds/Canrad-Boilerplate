<?php
require __DIR__ . '/vendor/autoload.php';

use App\Log as Log;
use Dotenv\Dotenv as Dotenv;

session_start();

//Para leitura do .env
$dotenv = new Dotenv(__DIR__);
$dotenv->load();

//Informa ao Plates a pasta com os templates
$templates = new League\Plates\Engine('views');

//Instância a classe do Anti-CSRF
$sessionProvider = new EasyCSRF\NativeSessionProvider();
$easyCSRF = new EasyCSRF\EasyCSRF($sessionProvider);

Flight::route('GET /', function () {
    $token = $GLOBALS['easyCSRF']->generate('my_token');

    echo $GLOBALS['templates']->render('index', [
        'name' => getenv('MAILER_USERNAME'),
        'token' => $token
    ]);

    Log::info('/ route has been called');
});

Flight::route('POST /', function () {
    try {
        $GLOBALS['easyCSRF']->check('my_token', $_POST['token'], 120);

        echo 'Valid!';
    } catch (Exception $e) {
        echo $e->getMessage();
    }
});

Flight::start();