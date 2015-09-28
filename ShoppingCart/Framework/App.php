<?php
namespace Framework;
use Framework\Routers\DefaultRouter;
use Framework\Routers\IRouter;

include_once 'Loader.php';

class App {
    private static $_instance = null;
    private $_config = null;
    /**
     * @var FrontController
     */
    private $_frontController = null;
    private $router = null;

    private function __construct() {
        Loader::registerNamespace('Framework', dirname(__FILE__).DIRECTORY_SEPARATOR);
        Loader::registerAutoLoad();
        $this->_config = Config::getInstance();
        if ($this->_config->getConfigFolder() == null) {
            $this->setConfigFolder('../config');
        }
    }

    public function setConfigFolder($path) {
        $this->_config->setConfigFolder($path);
    }

    public function getConfigFolder() {
        return $this->_configFolder;
    }

    public function getRouter()
    {
        return $this->router;
    }

    public function setRouter($router)
    {
        $this->router = $router;
    }
    
    /**
     * @return Config
     */
    public function getConfig() {
        return $this->_config;
    }

    public function run() {
        if ($this->_config->getConfigFolder() == null) {
            $this->setConfigFolder('../config');
        }
        $this->_frontController = FrontController::getInstance();
        if ($this->router instanceof IRouter) {
            $this->_frontController->setRouter($this->router);
        } else if ($this->router == 'JsonRPCRouter') {
            //LOAD RPC ROUTER
            $this->_frontController->setRouter(new DefaultRouter());
        } else if ($this->router == 'CLIRouter') {
            //LOAD CLI ROUTER
            $this->_frontController->setRouter(new DefaultRouter());
        } else {
            $this->_frontController->setRouter(new DefaultRouter());
        }
        $this->_frontController->dispatch();
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