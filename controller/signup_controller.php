<?php
session_start();
include ('../controller/users_controller.php');

function errorControl($error)
//control numeric de l'error
{
    if ($error == 1) {
        //les contrsenyes no coincideixen
        header('Location: ../view/signup_view.php?error=1');
        exit();
    }
    if ($error == 2) {
        //error el nom d'usuari
        header('Location: ../view/signup_view.php?error=2');
        exit();
    }
    if ($error == 3) {
        //format mail incorrecte
        header('Location: ../view/signup_view.php?error=3');
        exit();
    }
    if ($error == 4) {
        //usuari ja existeix
        header('Location: ../view/signup_view.php?error=4');
        exit();
    }
    if ($error == 0) {
        //exit
        header('Location: ../view/signup_view.php?error=0');
        exit();
    }
}


if ($_SERVER['REQUEST_METHOD']=='POST') {
    if ( isset($_POST['name']) && isset($_POST['username']) &&
        isset($_POST['pass1']) && isset($_POST['pass2']) &&
        isset($_POST['mail']) ) 
    {
        //Desem en variables les respostes del formulari
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = $_POST['pass1'];
        $passwordCheck = $_POST['pass2'];
        $mail = $_POST['mail'];
        //Validem possibles errors
        if (!passwordCorrect($password)) errorControl(1);
        if (!usernameCorrect($username)) errorControl(2);
        if (!mailCorrect($mail)) errorControl(3);
        //Desem usuari
        if (isset($_SESSION['users'])) {
            if (userRepeat($_SESSION['users'],$username)) errorControl(4);
            //Desem a la variables de sessio users les dades d'usuari
            $newUSer = [
                "id" => getUserId(),
                "name"=> $name,
                "username" => $username,
                "password" => $password,
                "mail" => $mail,
                "rol" => "user"
            ];
            array_push($_SESSION['users'],$newUSer); //afegim usuari al array d'usaris
            errorControl(0); //Mostrem missatge usuari creat
        }
    }
}


