<?php
namespace Framework;
use Framework\Routers\DefaultRouter;
use Framework\Routers\IRouter;
use Framework\Sessions\DbSession;
use Framework\Sessions\ISession;
use Framework\Sessions\NativeSession;

include_once 'Loader.php';

class App {
    private static $_instance = null;
    private $_config = null;
    private $router = null;
    private $_dbConnections = array();
    private $_session = null;
    /**
     * @var FrontController
     */
    private $_frontController = null;

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

        $_sess = $this->_config->app['session'];
        if ($_sess['autostart']) {
            if ($_sess['type'] == 'native') {
                $_s = new NativeSession($_sess['name'], $_sess['lifetime'], $_sess['path'], $_sess['domain'], $_sess['secure']);
            } else if ($_sess['type'] == 'database') {
                $_s = new DbSession($_sess['dbConnection'],
                    $_sess['name'], $_sess['dbTable'], $_sess['lifetime'], $_sess['path'], $_sess['domain'], $_sess['secure']);
            } else {
                throw new \Exception('No valid session', 500);
            }
            $this->setSession($_s);
        }


        $this->_frontController->dispatch();
    }

    public function setSession(ISession $session) {
        $this->_session = $session;
    }

    /**
     * @return ISession
     */
    public function getSession() {
        return $this->_session;
    }

    public function getDbConnection($connection = 'default') {
        if (!$connection) {
            throw new \Exception('No connection identifier provided', 500);
        }
        if ($this->_dbConnections[$connection]) {
            return $this->_dbConnections[$connection];
        }
        $_cnf = $this->getConfig()->database;
        if (!$_cnf[$connection]) {
            throw new \Exception('No valid connection identifier is provided', 500);
        }
        $dbh = new \PDO($_cnf[$connection]['connection_uri'], $_cnf[$connection]['username'],
            $_cnf[$connection]['password'], $_cnf[$connection]['pdo_options']);
        $this->_dbConnections[$connection] = $dbh;
        return $dbh;
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