<?php
session_start();
include('toDoList_controller.php');
include('users_controller.php');
if (!$_SESSION['user_logged']) {
    header('Location: ../view/signin_view.php');
}

if ($_SERVER['REQUEST_METHOD']) {
    if (isset($_POST['name']) && isset($_POST['description']) && isset($_POST['priority']) ) {
        //estem editant
        if (isset($_SESSION['id_toDo'])) {
            foreach ($_SESSION['todoList'] as $key => $toDo) {
                if ($toDo['id'] == $_SESSION['id_toDo']) {
                    $_SESSION['todoList'][$key]['name'] = $_POST['name'];
                    $_SESSION['todoList'][$key]['description'] = $_POST['description'];
                    echo "priority=".$_POST['priority']."<br>";
                    $_SESSION['todoList'][$key]['priority']= $_POST['priority'];
                    unset($_SESSION['id_toDo']);
                    header('Location: ../view/user_view.php');
                    exit();
                }
                
            }
        } else {
            //estem afegint
            $toDo = [];
            $toDo['id'] = getToDoId();
            $toDo['id_user'] = $_SESSION['user_logged']['id'];
            $toDo['name'] = $_POST['name'];
            $toDo['description'] = $_POST['description'];
            $toDo['priority'] = $_POST['priority'];

            if (array_push($_SESSION['todoList'], $toDo)) {
                header('Location: ../view/user_view.php');
                exit();
            } else {
                header('Location: ../view/toDo_view.php?error=1');
                exit();
            }
        }
    }
}
