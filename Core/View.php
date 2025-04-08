<?php

namespace Core;

use Exception;

class View 
{
    public static function render(string $view, array $args = []): void
    {
        // Extracts the keys from an associative array and turns them into variables.
        extract($args, EXTR_SKIP);

        if (!isset($pageTitle)) {
            $pageTitle = "App";
        }

        $file = "../App/Views/$view";

        if (is_readable($file)) {
            require $file;
        } else {
            throw new Exception("File $file not found");
        }
    } 
}