<?php
namespace Framework;
use Framework\Routers\DefaultRouter;

class FrontController
{
    private static $_instance = null;
    private $ns = null;
    private $controller = null;
    private $method = null;

    private function __construct() {

    }

    public function dispatch() {
        $a = new DefaultRouter();
        $_uri = $a->getURI();
        $routes = App::getInstance()->getConfig()->routes;
        if (is_array($routes) && count($routes) > 0) {
            foreach ($routes as $k => $v) {
                if (stripos($_uri, $k) === 0 && $v['namespace']) {
                    $this->ns = $v['namespace'];
                    break;
                }
            }
        } else {
            throw new \Exception('Default route missing', 500);
        }

        if ($this->ns == null && $routes['*']['namespace']) {
            $this->ns = $routes['*']['namespace'];
        } else if ($this->ns == null && !$routes['*']['namespace']) {
            throw new \Exception('Default route missing', 500);
        }

        echo $this->ns;
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