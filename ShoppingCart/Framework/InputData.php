<?php
namespace Framework;

class InputData
{
    private static $_instance = null;
    private $_get = array();
    private $_post = array();
    private $_cookies = array();

    private function __construct() {
        $this->_cookies = $_COOKIE;
    }

    public function setPost($ar)
    {
        if (is_array($ar)) {
            $this->_post = $ar;
        }
    }

    public function setGet($ar)
    {
        if (is_array($ar)) {
            $this->_get = $ar;
        }
    }

    public function hasGet($id) {
        return array_key_exists($id, $this->_get);
    }

    public function hasPost($name) {
        return array_key_exists($name, $this->_post);
    }

    public function hasCookies($name)
    {
        return array_key_exists($name, $this->_cookies);
    }

    public function get($id, $normalize = null, $default = null) {
        if ($this->hasGet($id)) {
            if ($normalize != null) {
                //Create class for normalizing input data
            }
            return $this->_get[$id];
        }
        return $default;
    }


    /**
     * @return InputData
     */
    public static function getInstance() {
        if (self::$_instance == null) {
            self::$_instance = new InputData();
        }

        return self::$_instance;
    }
}