<?php
/**
 * Created by PhpStorm.
 * User: alterwalker
 * Date: 27.02.2018
 * Time: 21:06
 */

namespace controllers;


use components\Controller;


class IndexController extends Controller
{
    public function actionIndex() {


        echo $this->renderWithLayout ('index/index');
    }

}