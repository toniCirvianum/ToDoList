<?php
    session_start();
    // Si no estem loggejats en dirigeix al login
    if (!isset($_SESSION['user_logged'])) {
        header('Location: signin_view.php');
        exit();
    }
    include('../controller/users_controller.php');
    include('../controller/toDoList_controller.php');
    include('../templates/navbar.php');
    

    $toDoList=$_SESSION['todoList'];
    $rol = $_SESSION['user_logged']['rol'];
    $idUser = $_SESSION['user_logged']['id'];
    //si no som admin carrega a $toDoList les toDo de l'usuari actual
    if ($rol!='admin') {
        $toDoList= [];
        foreach ($_SESSION['todoList'] as $toDo) {
            
            if ($toDo['id_user']==$idUser) {
                array_push($toDoList,$toDo);
            }
        }
    } 

?>

<div class="container mx-auto mt-3 my-6">
    <div class="row mb-4">
        <?php foreach ($toDoList as $toDo) { ?>
            <div class="col-md-3 md-2">
            
                <div class="card my-3 <?php echo getToDoBgColor($toDo) ?>" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title fw-bold"><?php echo $toDo["name"] ?> </h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary fw-light">
                            <?php echo ($rol == 'admin') ? "User: " . getUserById($toDo['id_user']) : ""; ?>
                        </h6>
                        <p class="card-text overflow-hidden " style="height:10rem; "> <?php echo $toDo['description'] ?> </p>
                        <div class="d-flex justify-content-center">
                            <a href="<?php echo '../view/toDo_view.php?id='.$toDo['id']?>" class="btn btn-success mx-2">Edit</a>
                            <a href="<?php echo '../controller/deleteToDo_controller.php?id='.$toDo['id']?>" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

</div>