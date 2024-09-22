<?php
session_start();
include('../templates/navbar.php');
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <h2 class="text-center mb-4">Log in</h2>
            <form action="../controller/signin_controller.php" method="POST" class="border p-4 bg-light">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" id="username" name="username" class="form-control" placeholder="Only numbers and lower letters" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Al least one number, lower and capital letter and symbol" required>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="mt-3 text-center">
                    <p>Don't have an account? <a href="signup_view.php">Sign up here</a></p>
                </div>
                <div class="mt-3 text-center">
                    <p class="from-label mb-3 text-danger fw-bold fs-4">
                        <?php
                        if ($_SESSION['REQUEST_METHOD'] = 'GET') {
                            if (isset($_GET['error']) && $_GET['error'] == 1) echo "User doesn't exist";
                            if (isset($_GET['error']) && $_GET['error'] == 2) echo "Incorrect password";
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