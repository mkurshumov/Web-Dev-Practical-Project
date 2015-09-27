<?php
namespace Framework;


use Framework\Routers\DefaultRouter;

class FrontController
{
    private static $_instance = null;

    private function __construct() {

    }

    public function dispatch() {
        $a = new DefaultRouter();
        $a->parse();
        $controller = $a->getController();
        $method = $a->getMethod();
        if ($controller == null) {
            $controller = $this->getDefaultController();
        }
        if ($method == null) {
            $method = $this->getDefaultMethod();
        }
        echo $controller.'<br>'.$method;
    }

    public function getDefaultController() {
        $controller = App::getInstance()->getConfig()->app['default_controller'];
        if ($controller) {
            return $controller;
        }
        return 'Index';
    }

    public function getDefaultMethod() {
        $method = App::getInstance()->getConfig()->app['default_method'];
        if ($method) {
            return $method;
        }
        return 'index';
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