<?php
/**
 * @author  Mário Almeida  <prog.almeida@gmail.com> 
 * @file config.inc.php 
 * @copyright 21/02/2013 - 08:24:03 
 */

spl_autoload_register('spl_autoload_custom');

/**
 * Does the same as spl_autoload, but without lowercasing
 */
function spl_autoload_custom($name) {
    $rc = FALSE;

    $exts = explode(',', spl_autoload_extensions());
    $sep = (substr(PHP_OS, 0, 3) == 'Win') ? ';' : ':';
    $paths = explode($sep, ini_get('include_path'));
    foreach ($paths as $path) {
        foreach ($exts as $ext) {
            $file = $path . DIRECTORY_SEPARATOR . $name . $ext;
            if (is_readable($file)) {
                require_once $file;
                $rc = $file;
                break;
            }
        }
    }

    return $rc;
}

class autoloader {

    public static $loader;

    public static function init() {
        if (self::$loader == NULL)
            self::$loader = new self();

        return self::$loader;
    }

    public function __construct() {
		
        set_include_path(
                get_include_path()
                . PATH_SEPARATOR . str_replace('/parkcar','',APP_ROOT) . 'library' . DS
                . PATH_SEPARATOR . str_replace('/parkcar','',APP_ROOT) . 'library' . DS . 'fpdf' . DS
                . PATH_SEPARATOR . str_replace('/parkcar','',APP_ROOT) . 'library' . DS . 'phpmailer' . DS
                . PATH_SEPARATOR . str_replace('/parkcar','',APP_ROOT) . 'class' . DS
        );

        spl_autoload_extensions(".inc,.php,.lib,.lib.php,.class.php");
        spl_autoload_register(array($this, 'loader'));
    }

    public function loader($class) {
       
        spl_autoload($class);
    }

}

//call
autoloader::init();
?>