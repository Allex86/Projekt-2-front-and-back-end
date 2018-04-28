<?php
/**
 * Created by PhpStorm.
 * User: alterwalker
 * Date: 03.03.2018
 * Time: 18:59
 */

namespace controllers;

use components\Controller;
use models\GoodsModel;
use models\BasketModel;

class BasketController extends Controller
{
    public function actionAddProduct()
    {   
        $id = (int) $_POST['product_id'];

        if (isset($_SESSION['basket']['product' . $id])) 
        {
            $_SESSION['basket']['product' . $id]['product_number'] += 1;
        } else {

            $get_product = new GoodsModel;
            $product = $get_product->getById($id);

            /* $product = [
                'product_id'     => $id,
                'product_name'   => $_POST['product_name'],
                'product_img'    => $_POST['product_img'],
                'product_number' => 1,
                'product_price'  => $_POST['product_price']
            ]; */

            $_SESSION['basket']['product' . $id] = $product;
            $_SESSION['basket']['product' . $id]['product_number'] = 1;
        }
    }

    public function actionRemoveProduct()
    {
        $id = (int) $_POST['product_id'];

        if (isset($_SESSION['basket']['product' . $id]) && ($_SESSION['basket']['product' . $id]['product_number'] > 1))
        {
            $_SESSION['basket']['product' . $id]['product_number'] -= 1;
        } else {
            unset($_SESSION['basket']['product' . $id]);
        }
    }

    public function actionClearBasket()
    {
       unset($_SESSION['basket']);
    }

}