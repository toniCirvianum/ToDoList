<?php
session_start();
include('../templates/navbar.php');

$userLogged = false;
if (!$_SESSION['user_logged']) {
    header('Location: ../index.php');
    exit();
} else {
    $userLogged = true;
}



?>


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <h2 class="text-center mb-4">Edit user</h2>
            <form action="../controller/editUser_controller.php" method="POST" class="border p-4 bg-light">
                <div class="mb-3">
                    <label for="name" class="form-label">Full name: </label>
                    <input type="text" name="name" class="form-control" placeholder="Only numbers and lower letters"
                        value="<?php echo $userLogged ? $_SESSION['user_logged']['name'] . " " : " " ?>" required>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username: </label>
                    <input type="text" name="username" class="form-control" placeholder="Only numbers and lower letters"
                        value="<?php echo $userLogged ? $_SESSION['user_logged']['username'] : " " ?>" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="pass1" class="form-control" placeholder="Al least one number, lower and capital letter and symbol"
                        value="<?php echo $userLogged ? $_SESSION['user_logged']['password'] . " " : " " ?>" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password (repeat)</label>
                    <input type="password" name="pass2" class="form-control" placeholder="Al least one number, lower and capital letter and symbol"
                        value="<?php echo $userLogged ? $_SESSION['user_logged']['password'] . " " : " " ?>" required>
                </div>
                <div class="mb-3">
                    <label for="mail" class="form-label">Email: </label>
                    <input type="text" name="mail" class="form-control"
                        value="<?php echo $userLogged ? $_SESSION['user_logged']['mail'] : " " ?>" required>
                </div>
                <div class="mb-3">
                    <label for="rol" class="form-label">Rol: </label>
                    <input type="text" name="rol" class="form-control"
                        value="<?php echo $userLogged ? $_SESSION['user_logged']['rol'] . " " : " " ?>" disabled>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">
                        <?php echo $userLogged ? "Update" : "Submit" ?>
                    </button>
                </div>
                <!-- control error -->
                <div class="mt-3 text-center">
                    <p class="from-label mb-3 text-danger fw-bold fs-4">
                        <?php
                        if ($_SESSION['REQUEST_METHOD'] = 'GET') {
                            if (isset($_GET['error']) && $_GET['error'] == 1) echo "Les contrasenyes no coincideixen";
                            if (isset($_GET['error']) && $_GET['error'] == 2) echo "El nom d'usuari nomes pot tenir minuscuel, numeros i 10 caratters com a maxim";
                            if (isset($_GET['error']) && $_GET['error'] == 3) echo "El format de mail no es correcte";
                            if (isset($_GET['error']) && $_GET['error'] == 4) echo "L'usuari ja existeix";
                        }
                        ?>
                    </p>
                    <p class="from-label mb-3 text-success fw-bold fs-4">
                        <?php
                        if ($_SESSION['REQUEST_METHOD'] = 'GET') {
                            if (isset($_GET['error']) && $_GET['error'] == 0) echo "User updated";
                        }
                        ?>
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>

</body>

</html>