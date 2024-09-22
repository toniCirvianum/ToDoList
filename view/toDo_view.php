<?php
session_start();
include('../templates/navbar.php');

if (!isset($_SESSION['user_logged'])) {
    header('Location: ../index.php');
    exit();
}
//percontrolar si estem editant o afegint
$edit = false;
//inicialitzem priority a un valor impossible per al select
$priority=-1;
if ($_SERVER['REQUEST_METHOD']) {
    if (isset($_GET['id'])) {
        $edit = true;
        foreach ($_SESSION['todoList'] as $key => $toDo) {
            if ($toDo['id'] == $_GET['id']) {
                $name = $toDo['name'];
                $description = $toDo['description'];
                $priority=$toDo['priority'];
                echo $priority;
                $_SESSION['id_toDo'] = $_GET['id']; //es crea quan editem una toDo
            }
        }
    }
    
}


?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <h2 class="text-center mb-4">
                <!-- cambio el titol si estic afegint o editant-->
                <?php echo $edit ? "Edit To Do" : "Add To Do" ?>
            </h2>
            <form action="../controller/toDo_controller.php" method="POST" class="border p-4 bg-light">
                <div class="mb-3">
                    <label for="name" class="form-label">Name: </label>
                    <!--si estic editant poso el nom i si no en blanc -->
                    <input type="text" name="name" class="form-control"
                        value="<?php echo $edit ? $name : "" ?>" rrequired>
                </div>
                <div class="mb-3">
                    <label for="textarea" class="form-label">Description: </label>
                    <!--si estic editant poso el text i si no en blanc -->
                    <textarea name="description" class="form-control text-start" rows="8"><?php echo $edit ? $description : "" ?> 
                    </textarea>
                </div>
                <div class="mb-3">
                    <label for="priority">Priority: </label>
                    <!-- Al editar posem selected segons prioritat -->
                    <select class="form-select" name="priority"  aria-label="Default select example">
                        <option <?php echo $priority==0 ? "selected " : "" ?>value="0">Low</option>
                        <option <?php echo $priority==1 ? "selected " : "" ?>value="1">Medium</option>
                        <option <?php echo $priority==2 ? "selected " : "" ?>value="2">High</option>
                    </select>
                </div>

                <div class="gap-4 d-flex justify-content-center">
                    <a href="user_view.php" class="btn btn-danger mx-2">Cancel</a>
                    <input type="submit" class="btn btn-success" value="Save">
                </div>
                <!-- control error -->
                <div class="mt-3 text-center">
                    <p class="from-label mb-3 text-danger fw-bold fs-4">
                        <?php
                        if ($_SESSION['REQUEST_METHOD'] = 'GET') {
                            if (isset($_GET['error']) && $_GET['error'] == 1) echo "Error adding To Do";
                        }
                        ?>
                    </p>

                </div>
            </form>
        </div>
    </div>
</div>