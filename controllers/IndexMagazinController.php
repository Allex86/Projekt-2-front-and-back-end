<?php
/**
 * Created by PhpStorm.
 * User: alterwalker
 * Date: 27.02.2018
 * Time: 21:06
 */

namespace controllers;

use components\Controller;
use models\IndexMagazinModel;

class IndexMagazinController extends Controller
{
	public function actionIndex()
	{
		$preViweGoods = new IndexMagazinModel;

		$goods = $preViweGoods->getGoodsPreviwe();

		$data_for_render = [
			'isAuth' => $this->isAuth,
			'isAdmin' => $this->isAdmin,
			'Login' => $this->Login,
			'basket' => $this->basket,
			'breadcrumb' => $this->breadcrumb,
			'goods' => $goods
		];
		echo $this->render($this->template, $data_for_render, $params = []);

		// echo "<pre>";
		// var_dump($this->basket);
		// echo "</pre>";

		// echo "<pre>";
		// var_dump($preViweGoods->getGoodsPreviwe());
		// echo "</pre>";
   }
}