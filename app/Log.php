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

    public static function init() {
        $rootPath = $_SERVER['DOCUMENT_ROOT'];

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
        if(!self::$infoLogger) self::init();
        self::$infoLogger->info($message);
    }

    public static function debug($message) {
        if(!self::$infoLogger) self::init();
        self::$debugLogger->debug($message);
    }

    public static function notice($message) {
        if(!self::$infoLogger) self::init();
        self::$noticeLogger->notice($message);
    }

    public static function warning($message) {
        self::$warningLogger->warning($message);
    }

    public static function error($message) {
        if(!self::$infoLogger) self::init();
        self::$errorLogger->error($message);
    }

    public static function critical($message) {
        if(!self::$infoLogger) self::init();
        self::$criticalLogger->critical($message);
    }

    public static function alert($message) {
        if(!self::$infoLogger) self::init();
        self::$alertLogger->alert($message);
    }

    public static function emergency($message) {
        if(!self::$infoLogger) self::init();
        self::$emergencyLogger->emergency($message);
    }
}