<?php
/**
 * Created by PhpStorm.
 * User: alterwalker
 * Date: 03.03.2018
 * Time: 18:59
 */

namespace controllers;

use components\Controller;
use \components\Request;
use \models\User;

class AccountController extends Controller
{
    public function actionLogin( Request $request ) 
    {
        if(!empty($request->postParams)){
            $modelUser = new User();

            $user = $modelUser->getUserByLogin($request->postParams['login']);

            if(!empty($user) && $user['password'] == md5($request->postParams['password'])) {
                $_SESSION['user'] = $user;
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false]);
            }
        }
    }

    public function actionLogout( ) {
        unset($_SESSION['user']);
        $this->redirect('/IndexMagazin');
    }

    public function actionRegistrate(Request $request)
    {
    if(!empty($request->postParams)) {

            $modelUser = new User();
            
            $values = [
                'user_name' => $request->postParams['user_name'],
                'login' => $request->postParams['login'],
                'password' => md5($request->postParams['password'])
            ];

            $modelUser->insert($values);

            $this->redirect('/IndexMagazin');
        }
   }

}