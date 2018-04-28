<?php

namespace controllers;

use components\Controller;
use components\Request;
use models\AdminToolsModel;
use models\GoodsModel;

class AdminToolsController extends Controller
{
    public function actionIndex() 
	  {

		    $get_goods_admin = new AdminToolsModel();
        $goods_admin = $get_goods_admin->getGoodsPreviweForAdmin();
		    $goods_category = $get_goods_admin->getGoodsCategory();

		$data_for_render = 
		[
			'isAuth' => $this->isAuth,
			'isAdmin' => $this->isAdmin,
			'Login' => $this->Login,
			'basket' => $this->basket,
      'breadcrumb' => $this->breadcrumb,
			'goods_category' => $goods_category,
			'goods_admin' => $goods_admin
		];
		echo $this->render($this->template, $data_for_render, $params = []);

    // echo "<pre>";
		// var_dump($goods_category);
		// echo "</pre>";
   }

   public function actionAdminToolsRemoveProduct()
   {

    $id = (int) $_POST['product_id'];

    $get_product = new GoodsModel;
    $product = $get_product->getById($id);

   	$src = $product['good_foto'];

    $img = explode('/',$src);
    unlink('img/'.$img[count($img)-1]);

   	$remove_product = new AdminToolsModel();

   	$remove_product->goodDeleteById($id);
   }

    public function actionAdminToolsEditProduct(Request $request)
    {		
		    $id = (int) $_GET['product_id'];

        if(!empty($request->postParams)) {

            $good_foto = $_POST['good_foto_hidden'];

            if (!empty($_FILES['good_foto']['name'])) 
              {
                $img = explode('/',$good_foto);

                unlink('img/'.$img[count($img)-1]);

                $good_foto = $this->addFile();
              }

            $edit_product = new AdminToolsModel();

            $data_for_edit = [
                'good_name'     => $_POST['good_name'],
                'good_price'   => $_POST['good_price'],
                'good_id_category'    => $_POST['good_id_category'],
                'good_foto'    => $good_foto,
                'good_status'    => $_POST['good_status'],
                'description'    => $_POST['description'],
                'good_short_description'    => $_POST['good_short_description']
                
            ];

            $edit_product->goodUpdateById($id,$data_for_edit);

           $this->redirect('/AdminTools');
        }
          // echo "<pre>";
		      // var_dump($request->postParams);
		      // echo "</pre>";
    }

           public function actionAdminToolsAddProduct(Request $request)
           {
           	if(!empty($request->postParams)) 
            {
              $good_foto = null;

              if (!empty($_FILES)) {$good_foto = $this->addFile();}

                  $data_for_add = [
                        'good_name'     => $_POST['good_name'],
                        'good_price'   => $_POST['good_price'],
                        'good_id_category'    => $_POST['good_id_category'],
                        'good_foto'    => $good_foto,
                        'good_status'    => $_POST['good_status'],
                        'description'    => $_POST['description'],
                        'good_short_description'    => $_POST['good_short_description']
                        
                    ];

                    $blogModel = new AdminToolsModel();

                    $blogModel->goodInsert($data_for_add);

            
        }
        $this->redirect('/AdminTools');
    }

   protected function addFile()
   {
                // Проверка файла на соответствие
            $types = array('image/gif', 'image/png', 'image/jpeg', 'image/pjpeg');
              // размер файла не более 5 мегабайт
            if ($_FILES['good_foto']['size'] > 5242880)
            { // размер файла не более 5 мегабайт
              echo "<script>alert('Файл слишком большого размера!')</script>";
              return $good_foto = null;
            } elseif (!in_array($_FILES['good_foto']['type'], $types)){
              echo "<script>alert('Неверный тип файла! Загрузите файл в формате *.gif, *.png или *.jpg !')</script>"; // bmp почему-то выдаёт ошибку
              return $good_foto = null;
            } elseif (($_FILES['good_foto']['error'] != 0) || (!is_file($_FILES['good_foto']['tmp_name']))){
              echo "<script>alert('Ошибка загрузки файла!')</script>";
              return $good_foto = null;
            } else {

                  // Рандомизация и создание имени файла
            $time = (integer)microtime(true);
            // $file_name = md5($file_name).rand(999,100000); // второй вариант рандомизации
            $file_name = "$time" . "-" . $_FILES['good_foto']['name'];
            //$file_size = ($_FILES['good_foto']['size'] / 1024); // размер файла в килобайтах


                  // Места хранения файлов
            $dir_big_img = "img/"; // 'img/big/'
            //$dir_small_img = 'img/small/';
            $good_foto = '/' . "$dir_big_img" . "$file_name";

                  // перемещение файла из временной директории
            $destination = $dir_big_img."$file_name";
            move_uploaded_file($_FILES['good_foto']['tmp_name'],$destination);

            return $good_foto;
          }
    }
}