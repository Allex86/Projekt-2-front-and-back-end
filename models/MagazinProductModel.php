<?php
/**
 * Created by PhpStorm.
 * User: alterwalker
 * Date: 27.02.2018
 * Time: 20:54
 */

namespace models;


use components\Model;

class MagazinProductModel extends Model
{

    public $table = 'goods';

    /* public $fields = [
      'good_name'  => 'text',
		  'good_price' => 'int',
		  'good_foto ' => 'text'
    ]; */


    public function getGoodsPreviwe()
    {
    	$closure = [
    		'orderby' => 'id asc',
        'limit'  => 6
    	];

      return $this->select($closure);
    }

    public function viewAllGoods()
    {
      $closure = [
        'orderby' => 'id asc',
      ];

      return $this->select($closure);
    }
}