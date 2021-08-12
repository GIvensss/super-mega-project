<?php

namespace Framework\Helpers\Autoloader;

class Autoloader
{
    public static function autoload($class)
    {
        $classMap = include("classMap.php");
        include($classMap[$class] . $class);
    }
}
