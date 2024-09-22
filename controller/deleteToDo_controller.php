<?php
session_start();
include('toDoList_controller.php');
include('users_controller.php');
if (!$_SESSION['user_logged']) {
    header('Location: ../view/signin.php');
} else {
    $idToDo = $_GET['id'];
    foreach ($_SESSION['todoList'] as $toDo) {
        if ($idToDo == $toDo['id'])
            if (deleteToDo($idToDo)) {
                header('Location: ../view/user_view.php');
            }
    }
}
