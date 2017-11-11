<?php
namespace App;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class Log
{
    private static $logger = new Logger('my_logger');

    public static function info($message) {
        self::$logger->info($message);
    }
}