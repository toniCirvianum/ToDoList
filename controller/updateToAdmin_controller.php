<?php
    session_start();
    if (!isset($_SESSION["user_logged"])) {
        header("Location: ../view/signin_view.php");
    } else {
        if (!$_SESSION["user_logged"]["rol"] == 'admin') {
            header("Location: ../view/userList_view.php");
        }
    }

    include_once("users_controller.php");
    $id = $_GET["id"];
    updateToAdmin ($id);
    header("Location: ../view/user_view.php");
