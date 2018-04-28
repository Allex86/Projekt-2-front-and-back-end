<?php
/**
 * Created by PhpStorm.
 * User: alterwalker
 * Date: 27.02.2018
 * Time: 20:23
 */

namespace components;

use \Exception;

class Request
{
    protected $controller = 'IndexMagazin'; // index
    protected $action = 'index';
    protected $controllerNamespace = 'controllers';

    public $getParams = [];
    public $postParams = [];
    public $files = [];

    public function init() 
    {
        $url =  $_SERVER['REQUEST_URI'];

        $this->getParams = $_GET;
        $this->postParams = $_POST;
        $this->files = $_FILES;


        if( $cleanUrl = stristr($url, '?', true) ) {
            $path = explode('/',$cleanUrl);
        } else {
            $path = explode('/',$url);
        }

        if ( count($path) == 3 ) {
            $this->controller = $path[1];
            $this->action = $path[2];
        } elseif ( count($path) == 2 && !empty ( $path[1])) {
            $this->controller = $path[1];
        }

        // echo "<pre>";
        // echo'$_GET';
        // print_r($_GET);
        // echo'$_POST';
        // print_r($_POST);
        // echo'$_FILES';
        // print_r($_FILES);
        // echo'$_SESSION';
        // print_r($_SESSION);
        // echo'$_COOKIE';
        // print_r($_COOKIE);
        // // echo'$_SERVER';
        // // print_r($_SERVER);
        // echo "</pre>";

        $classController = $this->controllerNamespace . '\\' . ucfirst($this->controller) . 'Controller';
        // echo "$classController<br>";

        $action = 'action' . ucfirst($this->action);
        // echo "$action<br>";

        $template = $this->controller;


        if(class_exists($classController)) {
           $instanceController = new $classController($template, 
           new \components\renderers\TwigRenderer());
           if(method_exists($instanceController,$action)) {
               call_user_func_array([$instanceController,$action],[$this]);
           } else {
                throw new Exception(' Метод не существует!');
           }
        }
    }

    public function is_ajax() {

        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            return true;
        }
        return false;
    }

}