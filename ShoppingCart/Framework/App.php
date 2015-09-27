<?php
namespace Framework;
include_once 'Loader.php';

class App {
    private static $_instance = null;

    private function __construct() {
        Loader::registerNamespace('Framework', dirname(__FILE__).DIRECTORY_SEPARATOR);
        Loader::registerAutoLoad();
    }

    public function run() {

    }

    /**
     * @return App
     */
    public static function getInstance() {
        if (self::$_instance == null) {
            self::$_instance = new App();
        }

        return self::$_instance;
    }
}