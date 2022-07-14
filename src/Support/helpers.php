<?php

use elbaz\View\View;
use elbaz\Application;
use elbaz\Support\Hash;

if (!function_exists('env'))
{
    function env ($key, $defaut = null)
    {
        return $_ENV[$key] ?? value($defaut);
    }
}

if (!function_exists('value'))
{
    function value ($value)
    {
        return ($value instanceof Closure) ? $value() : $value;
    }
}

if (!function_exists('base_path'))
{
    function base_path()
    {
        return dirname(__DIR__) . '/../';
    }
}

if (!function_exists('config_path'))
{
    function config_path()
    {
        return base_path() . '/config';
    }
}

if (!function_exists('config')) {
    function config($key = null, $default = null)
    {
        if (is_null($key)) {
            // return instance of config if the key is null
            return app()->config;
        }
        if (is_array($key)) {
            // return instance of config and set key
            return app()->config->set($key);
        }
        // return instance of config and set key
        return app()->config->get($key, $default);
    }
}

if (!function_exists('view_path'))
{
    function view_path ()
    {
        return base_path() . '/Views/';
    }
}

if (!function_exists('view')) {
    function view($view, $params = [])
    {
        echo View::make($view, $params);
    }
}

if (!function_exists('app')) {
    function app()
    {
        static $instance = null;

        if (!$instance) {
            $instance = new Application;
        }

        return $instance;
    }
}

if (!function_exists('bcrypt')) {
    function bcrypt($passwd)
    {
        return Hash::password($passwd);
    }
}

if(!function_exists('class_basename')) {
    function class_basename($class) {
        // return class name
        $class = is_object($class) ? get_class($class) : $class;
        return basename(str_replace('\\', '/', $class));
    }
}