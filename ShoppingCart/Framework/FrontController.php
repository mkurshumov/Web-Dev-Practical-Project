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
        $_rc = null;
        if (is_array($routes) && count($routes) > 0) {
            foreach ($routes as $k => $v) {
                if (stripos($_uri, $k) === 0
                    && ($_uri == $k || stripos($_uri, $k.'/') === 0)
                    && $v['namespace']) {
                    $this->ns = $v['namespace'];
                    $_uri = substr($_uri, strlen($k) + 1);
                    $_rc = $v;
                    break;
                }
            }
        } else {
            throw new \Exception('Default route missing', 500);
        }

        if ($this->ns == null && $routes['*']['namespace']) {
            $this->ns = $routes['*']['namespace'];
            $_rc = $routes['*'];
        } else if ($this->ns == null && !$routes['*']['namespace']) {
            throw new \Exception('Default route missing', 500);
        }

        $_params = explode('/', $_uri);
        if ($_params[0]) {
            $this->controller = strtolower($_params[0]);
            //if we do not have controller and method, we do not have params
            if ($_params[1]) {
                $this->method = strtolower($_params[1]);
//                unset($_params[0],$_params[1]);
//                $input->setGet(array_values($_params));
            } else {
                $this->method=$this->getDefaultMethod();
            }
        } else {
            $this->controller= $this->getDefaultController();
            $this->method=$this->getDefaultMethod();
        }
        if(is_array($_rc) && $_rc['controllers']){
            if($_rc['controllers'][$this->controller]['methods'][$this->method]){
                $this->method=  strtolower($_rc['controllers'][$this->controller]['methods'][$this->method]);
            }
            if(isset($_rc['controllers'][$this->controller]['to'])){
                $this->controller=  strtolower($_rc['controllers'][$this->controller]['to']);
            }
        }
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