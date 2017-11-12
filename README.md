# Canrad
[![devDependencies Status](https://david-dm.org/allangrds/canrad/dev-status.svg)](https://david-dm.org/allangrds/canrad?type=dev)
[![License](https://img.shields.io/github/license/mashape/apistatus.svg?maxAge=2592000)](https://github.com/allangrds/Canrad/blob/master/LICENSE)

### O que é Canrad?
Canrad é boirplate que criei, após sofrer ao fazer projetos simples de sites estáticos. Sempre no começo era aquele sofrimento para configurar o projeto, dependências, configurar alguns scripts. Então pq não criar um **boirplate** que facilitasse isso pra mim?

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
├── .env
├── .htaccess
├── index.php
├── package.json
├── compose.json
├── gulpfile.babel.js
```

### Que dependências foram usadas?
  * [Flight PHP Framework](flightphp.com/learn/)
  * [Plates Template](http://platesphp.com/)
  * [Paragonie Anti-CSRF](https://github.com/paragonie/anti-csrf)
  * [Respect Validation](https://github.com/Respect/Validation)
  * [Monolog](https://github.com/Seldaek/monolog)
  * [PHPDotEnv](https://github.com/vlucas/phpdotenv)

### Código do index.php
```
<?php
    require __DIR__ . '/vendor/autoload.php';

    use App\Log as Log;
    use Dotenv\Dotenv as Dotenv;

    //Para ler o .env
    $dotenv = new Dotenv(__DIR__);
    $dotenv->load();

    //Inicia a configuração para lançar os logs
    Log::init(__DIR__);

    Flight::route('GET /', function() {
        $templates = new League\Plates\Engine('views');
        echo $templates->render('index', ['name' => 'Jonathan']);
    });

    Flight::start();
```

### O que ainda queremos?
* Criação de controllers no workflow do projeto;
* Um modo mais simples e sofisticado de gerar os logs.
