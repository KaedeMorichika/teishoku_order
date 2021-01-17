<?php
require_once(__DIR__ . '/config/const.php');
require_once(__DIR__ . '/vendor/autoload.php');
require_once(__DIR__ . '/utils/auth_utils.php');

use auth\User;

if (!empty($_GET['action'])) {
    $action = sanitize_get($_GET['action']);
}

if (empty($_SESSION)) {

    session_start();
    if (!empty($_POST['user_id']) && !empty($_POST['password'])) {

        $user = User::login($_POST['user_id'], $_POST['password']);

        if (!empty($user)) {
            $_SESSION['id'] = $user->getId();
        } else {
            echo 'login_failed';
            exit();
            //TODO ログインに失敗した時の処理
        }

    } else {
        $action = 'login';
    }
}

if (empty($_SESSION['id'])) {
    require_once(__DIR__ . '/action/login.php');
} else {
    $id = $_SESSION['id'];
}

if (!empty($action)) {
    require_once(__DIR__ . '/action/' . $action . '.php');
} else {
    require_once(__DIR__ . '/action/top.php');
}
