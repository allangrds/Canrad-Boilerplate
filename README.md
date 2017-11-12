# Canrad
[![devDependencies Status](https://david-dm.org/allangrds/canrad/dev-status.svg)](https://david-dm.org/allangrds/canrad?type=dev)

### O que é Canrad?
Canrad é boirplate que criei, após sofrer ao fazer projetos simples de sites estáticos. Sempre no começo era aquele sofrimento para configurar o projeto, dependências, configurar alguns scripts. Então pq não criar um **boirplate** que facilitasse isso pra mim?

### O que ele tem?
Com o Conrad você tem/consegue:
* Compilar, minificar e limpar seu JS e CSS, criando sempre um novo arquivo com um hash no nome;
* Minificar suas imagens;
* Inserir o JS e HTML em seu arquivo .html base. Você não precisa inserir esses assets manualmente, ele faz isso pra você.
* Usar URLs amigáveis.

# Que dependências foram usadas?
* NPM
    * autoprefixer-stylus;
    * babel-cli;
    * babel-preset-env;
    * babel-preset-es2015;
    * gulp;
    * gulp-babel;
    * gulp-clean-css;
    * gulp-concat;
    * gulp-imagemin;
    * gulp-inject;
    * gulp-rev;
    * gulp-sourcemaps;
    * gulp-stylus;
    * gulp-uglify;
    * pump.
* Compose
  * [Flight PHP Framework](flightphp.com/learn/)
  * [Plates Template](http://platesphp.com/)
  * [Paragonie Anti-CSRF](https://github.com/paragonie/anti-csrf)
  * [Respect Validation](https://github.com/Respect/Validation)
  * [Monolog](https://github.com/Seldaek/monolog)

# O que ainda queremos?
* Criação de controllers no workflow do projeto;
* Um modo mais simples e sofisticado de gerar os logs.
