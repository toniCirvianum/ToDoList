<?php

function checkSamePassword($pass1, $pass2)
//comprova si les os cotrasenyes introduides son iguals
{
    $r = ($pass1 === $pass2) ? true : false;
    return $r;
}

function checkUser($username, $password)
//retorna l'usuari si les credencials son valides
//retorna 2 (password incorrecte)
//retorna 1 (usuari no existeix)
{
    $users = $_SESSION['users'];
    foreach ($users as $user) {
        if ($username == $user['username']) {
            if ($password == $user['password']) {
                return $user; //credencials correctes
            }
            else {
                return 2; //password incorrecte
            }
        } 
    }
    return 1; //usuari no existeix
}

function getUserId()
//retorna el nombre d'usuaris
{
    $users = $_SESSION['users'];
    $lastUser=end($users);
    return $lastUser['id']+1;
}

function getUserById($id) {
    $users=$_SESSION['users'];
    foreach ($users as $user) {
        if ($id==$user['id']) {
            return $user['name'];
        }
    }
}

function usernameCorrect($username){
    $regexUser='/^[a-z0-9]{1,10}$/';
    if (preg_match($regexUser,$username)) {
        return 1;
    }
    return 0;

}

function passwordCorrect($password) {
    $regexPassword='/^[a-z0-9]{1,10}$/';
    if (preg_match($regexPassword,$password)) {
        return 1;
    }
    return 0;
}

function mailCorrect($mail) {
    $regexMail = '/^[a-z0-9_-]+(\.[a-z0-9_-]+)*@[a-z0-9-]+(\.[a-z0-0-]+)*(\.[a-z]{2,3})$/';
    if (preg_match($regexMail,$mail)) {
        return 1;
    }
    return 0;
}

function userRepeat ($users,$username) {
    foreach ($users as $key => $user) {
        if ($username==$user['username']) {
            return 1;
        }

    }
    return 0;
}

function deleteUser($id){
    foreach ($_SESSION['users'] as $key => $user) {
        if($user['id'] == $id){
          unset($_SESSION['users'][$key]);
          return 1;
        }
      }
      return 0;
}

function updateToAdmin($id) {
    foreach ($_SESSION["users"] as $key => $user) {
        if($user["id"] == $id){
          $_SESSION["users"][$key]['rol'] = 'admin';
          return 1;
        }
      }
      return 0;
}