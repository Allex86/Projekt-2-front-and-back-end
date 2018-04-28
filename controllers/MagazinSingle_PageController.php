<?php
/**
 * Created by PhpStorm.
 * User: alterwalker
 * Date: 27.02.2018
 * Time: 21:06
 */

namespace controllers;

use components\Controller;

class MagazinSingle_PageController extends Controller
{
	public function actionIndex() 
	{
		$data_for_render = 
		[
			'isAuth' => $this->isAuth,
			'isAdmin' => $this->isAdmin,
			'Login' => $this->Login,
			'basket' => $this->basket,
			'breadcrumb' => $this->breadcrumb
		];
		echo $this->render($this->template, $data_for_render, $params = []);
   }
}