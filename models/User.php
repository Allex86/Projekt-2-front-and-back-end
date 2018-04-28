<?php
/**
 * Created by PhpStorm.
 * User: alterwalker
 * Date: 27.02.2018
 * Time: 21:21
 */

namespace models;


use components\Model;

class User extends Model
{

    public $table = 'users';

    public $fields = [
        'name' => 'text',
        'pass'  => 'text',
        'role' => 'text',
    ];

    public function getUserByLogin($login) {
        $result = $this->select(  ['where' => "login = '{$login}'",
            'limit' => '0, 1' ]);
        return $result[0];
    }

    public function getUserById($id = null) {

        $result = $this->select(  ['where' => "id = '{$id}'",
            'limit' => '0, 1' ]);

        return $result[0];
    }
}