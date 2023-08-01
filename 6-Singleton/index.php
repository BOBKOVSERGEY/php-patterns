<?php
namespace Singleton;

use Exception;

final class President
{
    private static $instance;

    private function __construct()
    {
        // Hide the constructor
    }

    public static function getInstance(): President
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    private function __clone()
    {
        // Disable cloning
    }

    /**
     * @throws Exception
     */
    public function __wakeup()
    {
        throw new Exception("Cannot unserialize singleton");
    }
}
$president1 = President::getInstance();
$president2 = President::getInstance();

var_dump($president1 === $president2); // true