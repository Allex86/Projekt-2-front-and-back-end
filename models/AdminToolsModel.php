<?php
/**
 * Created by PhpStorm.
 * User: alterwalker
 * Date: 27.02.2018
 * Time: 20:54
 */

namespace models;


use components\Model;

class AdminToolsModel extends Model
{

    public $table = null;
    //public $table = 'goods';

    /* public $fields = [
      'good_name'  => 'text',
		  'good_price' => 'int',
		  'good_foto ' => 'text'
    ]; */


    public function getGoodsPreviweForAdmin()
    {
        $this->table = 'goods';

    	$closure = [
    		'orderby' => 'id desc'
    	];

      return $this->select($closure);
    }

    public function getGoodsCategory()
    {
        $this->table = 'goods_category';

        return $this->select();
    }

    public function goodUpdateById($id,$values)
    {
        $this->table = 'goods';

        $this->updateById($id,$values);
    }

    public function goodInsert($values)
    {
        $this->table = 'goods';

        $this->insert($values);
    }

    public function goodDeleteById($id)
    {
        $this->table = 'goods';

        $this->deleteById($id);
    }
}