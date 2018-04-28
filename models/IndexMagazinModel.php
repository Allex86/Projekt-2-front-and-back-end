<?php
/**
 * Created by PhpStorm.
 * User: alterwalker
 * Date: 27.02.2018
 * Time: 20:54
 */

namespace models;


use components\Model;

class IndexMagazinModel extends Model
{

    public $table = 'goods';

    /*public $fields = [
      'good_name'  => 'text',
		  'good_price' => 'int',
		  'good_foto ' => 'text'
    ];*/


    public function getGoodsPreviwe()
    {
    	$closure = [
    		'orderby' => 'good_view DESC',
    		'limit'	 => 8
    	];

      return $this->select($closure);
    }
}