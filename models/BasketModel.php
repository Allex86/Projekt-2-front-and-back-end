<?php

namespace models;


use components\Model;

class BasketModel extends Model
{

    public $table = 'basket';

    /* public $fields = [
        'id_user'    => 'int',
        'goods_is'  => 'text',
        'views'    => 'int'
    ]; */


    public function addToBasket ($goodsId, $amount = 1) {


    }
}