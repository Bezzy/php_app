<?php 

use \Reuse\Config;
use \Reuse\Database\Database;

// NOTE(mohamed): This class is a factory and a singleton. Which means we can
// use it to create different instance of objects (Table) and get useful methods
// accessible where we want. It's act like crossroad for others components of
// the application.

// The general patterns is wenether we need it we get the instance and use
// the useful methods associated.
// App::get_instance->do_useful_thing();

class App {
    private static $instance;
    private $db_instance;

    //NOTE(mohamed): Maybe const that ?

    public static function load() {
        session_start();
        //-Autoloader Initialization
        require ROOT . "/app/Autoloader.php";
        App\Autoloader::register();

        require ROOT . "/reuse/Autoloader.php";
        Reuse\Autoloader::register();
    }

    public static function get_instance() {
        if (!self::$instance) {
            self::$instance = new App(); 
        }
        return self::$instance;
    }

    //NOTE(mohamed): This method let everyone get the database while assuring
    // that there is only one instance of Database running.
    public function get_db() {
        $config = Config::get_instance(ROOT . "/config/config.php");
        if (is_null($this->db_instance)) {
            $this->db_instance = new Database($config->get("db_name"),
                                           $config->get("db_user"),
                                           $config->get("db_pass"),
                                           $config->get("db_host"));
        }
        return $this->db_instance;
    }

    // NOTE(mohamed): This function is a factory. It's a nice and convenient
    // way to initialize objects and keep their instance across the application.
    // We inject the db instance so we can construct an instance of table with
    // the database methods needed to query the given database.
    public function get_table($name) {
        $class_name = "\\App\\Table\\" . ucfirst($name) . "Table";
        $class_obj = new $class_name($this->get_db());
        return $class_obj;
    }
}