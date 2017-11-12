<?php
namespace App;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class Log
{
    private static $infoLogger;
    private static $debugLogger;
    private static $noticeLogger;
    private static $warningLogger;
    private static $errorLogger;
    private static $criticalLogger;
    private static $alertLogger;
    private static $emergencyLogger;

    public static function init($rootPath) {
        self::$infoLogger = new Logger('canrad');
        self::$infoLogger->pushHandler(new StreamHandler($rootPath.'/logs/info.log', Logger::INFO));

        self::$debugLogger = new Logger('canrad');
        self::$debugLogger->pushHandler(new StreamHandler($rootPath.'/logs/debug.log', Logger::DEBUG));

        self::$noticeLogger = new Logger('canrad');
        self::$noticeLogger->pushHandler(new StreamHandler($rootPath.'/logs/notice.log', Logger::NOTICE));

        self::$warningLogger = new Logger('canrad');
        self::$warningLogger->pushHandler(new StreamHandler($rootPath.'/logs/warning.log', Logger::WARNING));

        self::$errorLogger = new Logger('canrad');
        self::$errorLogger->pushHandler(new StreamHandler($rootPath.'/logs/error.log', Logger::ERROR));

        self::$criticalLogger = new Logger('canrad');
        self::$criticalLogger->pushHandler(new StreamHandler($rootPath.'/logs/critical.log', Logger::CRITICAL));

        self::$alertLogger = new Logger('canrad');
        self::$alertLogger->pushHandler(new StreamHandler($rootPath.'/logs/alert.log', Logger::ALERT));

        self::$emergencyLogger = new Logger('canrad');
        self::$emergencyLogger->pushHandler(new StreamHandler($rootPath.'/logs/emergency.log', Logger::EMERGENCY));
    }

    public static function info($message) {
        self::$infoLogger->info($message);
    }

    public static function debug($message) {
        self::$debugLogger->debug($message);
    }

    public static function notice($message) {
        self::$noticeLogger->notice($message);
    }

    public static function warning($message) {
        self::$warningLogger->warning($message);
    }

    public static function error($message) {
        self::$errorLogger->error($message);
    }

    public static function critical($message) {
        self::$criticalLogger->critical($message);
    }

    public static function alert($message) {
        self::$alertLogger->alert($message);
    }

    public static function emergency($message) {
        self::$emergencyLogger->emergency($message);
    }
}