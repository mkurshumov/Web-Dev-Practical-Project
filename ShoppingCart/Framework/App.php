<?php
namespace Framework;
include_once 'Loader.php';

class App {
    private static $_instance = null;
    private $_config = null;

    private function __construct() {
        Loader::registerNamespaces('Framework', dirname(__FILE__).DIRECTORY_SEPARATOR);
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