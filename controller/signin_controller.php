<?php
session_start();
include('users_controller.php');



if ($_SERVER['REQUEST_METHOD']=='POST') {
    IF (isset($_POST['username']) && $_POST['password']) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        // codis error
        // 1-> Usuari no existeix
        // 2 -> Password incorrect
        if (checkUser($username,$password)==1) {
            header('Location: ../view/signin_view.php?error=1');
            exit();
        } elseif (checkUser($username,$password)==2) {
            header('Location: ../view/signin_view.php?error=2');
            exit();
        }
        else {
            $_SESSION['user_logged'] = checkUser($username,$password);
            header('Location: ../view/user_view.php');
            exit();
        }


    } 
}
