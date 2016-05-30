<?php
/**
 * Created by PhpStorm.
 * User: antony
 * Date: 5/30/16
 * Time: 3:31 PM
 */
namespace Learn\Router;

class Router
{
    private $_uri = array();
    private $_controller = array();

    public function __construct()
    {
    }

    /**
     * Build a collection of internal URLs to look for
     * @param $uri
     * @param $controller
     */
    public function add($uri, $controller)
    {
        $this->_uri[] = $uri;
        $this->_controller[] = $controller;
    }

    public function submit()
    {
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        foreach ($this->_uri as $key => $value)
        {
            if (preg_match("#^$value$#", $path))
            {
//                echo $key . ' => ' . $value; //See what the $path returns
                //Instantiate Controller
                $controller = 'Learn\Controllers\\' . $this->_controller[$key];
                $controller = new $controller('Bunny');
                $controller->contactDetails();
            }
        }


        
    }
}