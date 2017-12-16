# Canrad
[![devDependencies Status](https://david-dm.org/allangrds/canrad/dev-status.svg)](https://david-dm.org/allangrds/canrad?type=dev)
[![License](https://img.shields.io/github/license/mashape/apistatus.svg?maxAge=2592000)](https://github.com/allangrds/Canrad/blob/master/LICENSE)

### O que é Canrad?
Canrad é boilerplate que criei, após sofrer ao fazer projetos simples de sites estáticos. Sempre no começo era aquele sofrimento para configurar o projeto, dependências, configurar alguns scripts. Então pq não criar um **boilerplate** que facilitasse isso pra mim?

### O que ele tem?
Com o Conrad você tem/consegue:
* Compilar, minificar e limpar seu JS e CSS, criando sempre um novo arquivo com um hash no nome;
* Minificar suas imagens;
* Inserir o JS e HTML em seu arquivo .html base. Você não precisa inserir esses assets manualmente, ele faz isso pra você.
* Usar URLs amigáveis;
* Escrever CSS usando Stylus, e JS usando ES6;
* Usar `.env` para tratar informações de configuração que você acha importante.

### Comandos
`npm start` - Compila arquivos e roda o `watch` para esperar novas modificações;

`npm run watch` - Espera que arquivos dos assets sejam modificados para executar ações.

### Estrutura de pastas
```
├── app
│   ├── Log.php
├── src
│   ├── img
│   ├── js
│   ├── stylus
├── views
│   ├── index.php
│   ├── template.php
├── .env.sample
├── .htaccess
├── index.php
├── package.json
├── compose.json
├── gulpfile.babel.js
```

### Que dependências foram usadas?
  * [Flight PHP Framework](flightphp.com/learn/) - Framework
  * [Plates Template](http://platesphp.com/) - Template
  * [EasyCSRF](https://github.com/gilbitron/EasyCSRF) - CSRF
  * [Respect Validation](https://github.com/Respect/Validation) - Validação de dados
  * [Monolog](https://github.com/Seldaek/monolog) - Logs
  * [PHPDotEnv](https://github.com/vlucas/phpdotenv) - Para leitura de .env

### Código do index.php
```
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
```

### O que ainda queremos?
* Criação de controllers no workflow do projeto;
* Um modo mais simples e sofisticado de gerar os logs;
* Corrigir a compilação de JS e CSS.