<?php
/**
 * Created by PhpStorm.
 * User: alterwalker
 * Date: 27.02.2018
 * Time: 21:06
 */

namespace controllers;

use components\Controller;
use models\MagazinProductModel;

class MagazinProductController extends Controller
{
	public function actionIndex() 
	{
		$preViweGoods = new MagazinProductModel;

		// echo "<pre>";
		// var_dump($preViweGoods->getGoodsPreviwe());
		// echo "</pre>";

		$goods = $preViweGoods->getGoodsPreviwe();

		$data_for_render = 
		[
			'isAuth' => $this->isAuth,
			'isAdmin' => $this->isAdmin,
			'Login' => $this->Login,
			'basket' => $this->basket,
			'breadcrumb' => $this->breadcrumb,
			'goods' => $goods
		];
		echo $this->render($this->template, $data_for_render, $params = []);
   }

   public function actionViewAll() 
	{
		$preViweGoods = new MagazinProductModel;

		// echo "<pre>";
		// var_dump($preViweGoods->viewAllGoods());
		// echo "</pre>";

		$goods = $preViweGoods->viewAllGoods();

		$viewAll = true;

		$data_for_render = 
		[
			'isAuth' => $this->isAuth,
			'isAdmin' => $this->isAdmin,
			'Login' => $this->Login,
			'basket' => $this->basket,
			'breadcrumb' => $this->breadcrumb,
			'goods' => $goods,
			'viewAll' => $viewAll
		];
		echo $this->render($this->template, $data_for_render, $params = []);
   }
}