<?php
/**
 * Created by PhpStorm.
 * User: alterwalker
 * Date: 20.02.2018
 * Time: 20:59
 */

namespace components;


class Db
{


    private $pdo = null;
    public $dbname = 'internet_magazin_localhost';
    public $dbuser = 'root';
    public $dbpass = '';
    public $dbhost = 'localhost';
    public $charset = 'utf8';
    public $options = [
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC, // по умолчанию ассоциативный массив
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION // ошибки бросают исключения
    ];

    use \components\traits\SingletonTrait;

    public function init() {
       $this->getPDO();
    }

    public function getPDO() {

        if(empty($this->pdo)) {
            $this->pdo = new \PDO("mysql:host={$this->dbhost};dbname={$this->dbname};charset={$this->charset}",
                $this->dbuser,
                $this->dbpass,
                $this->options);
        }

        return $this->pdo;
    }
}