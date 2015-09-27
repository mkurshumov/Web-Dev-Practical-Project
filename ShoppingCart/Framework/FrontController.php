<?php
namespace Framework;


class FrontController
{
    private static $_instance = null;

    private function __construct() {

    }

    public function dispatch() {

    }

    /**
     * @return FrontController
     */
    public static function getInstance() {
        if (self::$_instance == null) {
            self::$_instance = new FrontController();
        }
        return self::$_instance;
    }
}