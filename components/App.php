<?php


namespace components;


class App
{

    use \components\traits\SingletonTrait;

    public $request = null;
    public $auth = null;
    public $db = null;

    public function init()
    {
        // $this->db =   \components\Db::getInstance();
        // $this->auth = \components\Auth::getInstance();

        $this->request = new Request();
        $this->request->init();

    }

    public static function getAppRootDir() {
        return $_SERVER['DOCUMENT_ROOT'] . '/../';
    }
}