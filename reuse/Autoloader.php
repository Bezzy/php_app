<?php
namespace Reuse;
class Autoloader{
    static function register(){
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    /**
     * Include the corresponding file based on the name of the class
     * @param $class string
     */
    static function autoload($class){
        if (strpos($class, __NAMESPACE__ . '\\') === 0){
            $class = str_replace(__NAMESPACE__ . '\\', '', $class);
            $class = str_replace('\\', '/', $class);
            require __DIR__.'/' . $class . '.php';
        }
    }

}