<?php 

namespace Reuse;


// NOTE(mohamed):
// if you want to use methods of this class always use get_instance first to get
// the instance of the oject. This is a singleton. I'm not sure I would let
// things like that. But it's simple to use at that stage of the development
// of the application.
class Config {
    private $settings = [];
    private static $instance;

    public function __construct($file) {
        $this->settings = require($file);
    }

    public static function get_instance($file) {
        if (is_null(self::$instance)) {
            self::$instance = new Config($file);
        }
        return self::$instance;
    }

    public function get($key) {
        if (isset($this->settings[$key])) {
            return $this->settings[$key];
        }
        return null;
    }
}

?>