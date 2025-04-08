<?php

/**
 * Base Controller
 */

 namespace Core;

 use Exception;

 abstract class Controller 
 {
    protected array $routeParams = [];
    
    public function __construct(array $routeParams)
    {
        $this->routeParams = $routeParams;
    }

    /**
     * Summary of __call
     * @param string $name is the method name
     * @param array $args array of params
     * @return void
     */
    public function __call(string $name, array $args): void
    {
        $method = "{$name}Action";

        if (method_exists($this, $method)) {
            call_user_func_array([$this, $method], $args);
        } else {
            throw new Exception("Method $method not found in controller ", get_class($this));
        }
    }
 }