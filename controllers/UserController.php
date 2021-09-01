<?php

namespace Controllers;

class User
{
    function index()
    {
        $userModel = new \Models\User();
        if (isset($_GET['id'])){
            $user = $userModel->find($_GET['id']);
            $view = 'User.php';
            return compact('view', 'user');
        }else{
            $users = $userModel->all();
            $view = 'users.php';
            return compact('view', 'users');
        }
    }
}