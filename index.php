<?php
    session_start();
    include('./model/users_model.php');
    include('./model/lists_model.php');
    if (!isset($_SESSION['user_logged'])) {
        header('Location: ./view/signin_view.php');
        exit();
        
    } else {
        header('Location: ./view/user_view.php');
        exit();

    }

?>

