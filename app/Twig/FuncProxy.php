<?php

namespace App\Twig;

class FuncProxy
{
    public function __call($func, $args)
    {
        if (function_exists($func)) {
            return $func(...$args);
        } else {
            // You might want to do something else here, like throw an exception.
            return null;
        }
    }
}
