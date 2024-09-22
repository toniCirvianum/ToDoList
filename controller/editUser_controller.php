<?php
session_start();
if (!isset($_SESSION['user_logged'])) {
    header('Location: ../view/signin.php');
    exit();
}
include('../controller/users_controller.php');
//include('../templates/navbar.php');

function errorControl($error)
//control numeric de l'error
{
    if ($error == 1) {
        //les contrsenyes no coincideixen
        header('Location: ../view/editUser_view.php?error=1');
        exit();
    }
    if ($error == 2) {
        //error el nom d'usuari
        header('Location: ../view/editUser_view.php?error=2');
        exit();
    }
    if ($error == 3) {
        //format mail incorrecte
        header('Location: ../view/editUser_view.php?error=3');
        exit();
    }
    if ($error == 4) {
        //usuari ja existeix
        header('Location: ../view/editUser_view.php?error=4');
        exit();
    }
    if ($error == 0) {
        //exit
        header('Location: ../view/editUser_view.php?error=0');
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (
        isset($_POST['name']) && isset($_POST['username']) &&
        isset($_POST['pass1']) && isset($_POST['pass2']) &&
        isset($_POST['mail'])
    ) {
        //Desem en variables les respostes del formulari
        $id = $_SESSION['user_logged']['id']; //Agafem el id de l'usari logejat
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = $_POST['pass1'];
        $passwordCheck = $_POST['pass2'];
        $mail = $_POST['mail'];
        $rol = $_SESSION['user_logged']['rol']; //Agafem el rol de l'usari logejat

        //Validem possibles errors
        if (!passwordCorrect($password)) errorControl(1);
        if (!usernameCorrect($username)) errorControl(2);
        if (!mailCorrect($mail)) errorControl(3);
        //si es modifica el nom d'usuari comprova que no existeixi a la base de dades
        foreach ($_SESSION['users'] as $user) {
            if ($username === $user['username'] && $username != $_SESSION['user_logged']['username']) errorControl(4);
        }

        //Busquem usuari que estem editant a $_SESSIO['users']
        foreach ($_SESSION['users'] as $key => $user) {
            if ($id == $user['id']) {
                $_SESSION['users'][$key]['id'] = $id;
                $_SESSION['users'][$key]['name'] = $name;
                $_SESSION['users'][$key]['username'] = $username;
                $_SESSION['users'][$key]['password'] = $password;
                $_SESSION['users'][$key]['mail'] = $mail;
                $_SESSION['users'][$key]['rol'] = $rol;
                //Actualitzem l'suuari logejat
                unset($_SESSION['user_logged']);
                $_SESSION['user_logged'] = $_SESSION['users'][$key];
                //Mostrem missatge d'usuari actualitzat
                errorControl(0);

                

            }
        }
    }
}
