<?php
/**
 * Created by PhpStorm.
 * User: alterwalker
 * Date: 27.02.2018
 * Time: 21:18
 */

namespace components;


use components\traits\SingletonTrait;
use models\User;

class Auth
{

    use SingletonTrait;
    private $user;


    public function getUser()
    {
        return $this->user;
    }

    public static function check() {
        return !empty(self::getInstance()->getUser());
    }

    public static function getLogin() {

        if(!self::check()) {
            return null;
        }

        $user = self::getInstance()->getUser();

        return $user['login'];


    }

    public static function isAdmin() {

        $user = self::getInstance()->getUser();

        if(!empty($user['role']) && $user['role'] == 'admin') {
            return true;
        }

        return false;
    }

    public function init() {

        $this->user = null;

        $userModel = new User();

        if(!empty($_SESSION['user']['id'])){
            $this->user = $userModel->getUserById($_SESSION['user']['id']);

        }



        //$this->user = $userModel->getUser();

    }



}