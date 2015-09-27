<?php
namespace Framework;

class App {
    private static $_instance = null;

    public function run() {
        echo "working";
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