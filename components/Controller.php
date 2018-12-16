<?php
/**
 * Created by PhpStorm.
 * User: alterwalker
 * Date: 27.02.2018
 * Time: 20:20
 */

namespace components;

use \components\renderers\IRenderer;
use components\Request;
use components\Auth;

abstract class Controller
{
    private $defaultLayout = 'IndexMagazin';

    protected $template = null;
    protected $isAuth = null;
    protected $isAdmin = null;
    protected $Login = null;
    protected $breadcrumb = null;
    protected $basket = null;

    protected $renderer = null; // TwigRenderer or null

    public function __construct($template, IRenderer $renderer)
    {
        $this->renderer = $renderer;
        $this->template = $template;
        $this->breadcrumb = $template;

        $this->isAuth = Auth::check();
        $this->isAdmin = Auth::isAdmin();
        $this->Login = Auth::getLogin();

        if (isset($_SESSION['basket'])) {
            $this->basket = $_SESSION['basket'];
        }
    }

    public function render($template, $params = [])
    {

        return $this->renderer->render($template, $params);
    }

//    public function renderWithLayout($template, $params = [], $layout = null) {
//
//        $content = $this->render($template, $params);
//
//        $layout = empty($layout) ? $this->defaultLayout : $layout;
//
//        return $this->render($layout , ['content' => $content]);
//    }

    public function redirect($url)
    {

        header('Location:' . $url);
        exit;
    }
}
