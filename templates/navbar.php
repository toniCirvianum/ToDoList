<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
    <!--
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">

    -->
    <link href="../css/bootstrap-icons.css" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    
    <script src="../css/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

</head>

<body>
    <!-- navbar -->
    <nav class="navbar bg-body-tertiary sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand fs-3 fw-bold" href="../view/user_view.php">
                <i class="bi bi-calendar" style="font-size: 2rem"></i>
                My ToDo list
            </a>
            <ul class="nav">
                <!-- si no estem logejats nomes motra botons de sign in i sign up -->
                <?php if (!isset($_SESSION['user_logged'])) { ?>
                    <li class="nav-item">
                        <a class="btn btn-primary me-2" href="../view/signin_view.php">Sign in</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary me-2" href="../view/signup_view.php">Sign up</a>
                    </li>
                <?php } else { ?>
                    <!-- si estem logejats nomes botons d'edicio i altres -->
                    <?php
                    $userRol = $_SESSION['user_logged']['rol'];
                    //per l'admin mostra més botons
                    if ($userRol == 'admin') { ?>
                        <li class="nav-item">
                            <!-- afegir usuaris -->
                            <a class="btn btn-info me-2" href="#"><i class="bi bi-person-plus-fill"></i></a>
                        </li>
                        <li class="nav-item">
                            <!-- editar usuaris -->
                            <a class="btn btn-info me-2" href="../view/userList_view.php"><i class="bi bi-people-fill"></i></a>
                        </li>
                    <?php }
                    //botons d'usuari normal 
                    ?>
                    <li class="nav-item">
                        <!-- afegir toDo -->
                        <a class="btn btn-primary me-2" href="../view/toDo_view.php"><i class="bi bi-plus-square"></i></a>
                    </li>
                    <li class="nav-item">
                        <!-- editar usuari -->
                        <a class="btn btn-primary me-2" href="../view/editUser_view.php"><i class="bi bi-person-fill"></i></a>
                    </li>
                    <li class="nav-item">
                        <!-- logout -->
                        <a class="btn btn-danger me-2" href="../controller/signout_controller.php"><i class="bi bi-box-arrow-right"></i></a>
                    </li>
                <?php } ?>

            </ul>

        </div>
    </nav>