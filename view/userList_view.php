<?php
session_start();
include('../templates/navbar.php');
?>
<div>
    <table class="table table-sm w-50 mx-auto" style="margin-top:25px" ;>
        <thead>
            <tr style="height: 50px;">
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Usernam</th>
                <th scope="col">Password</th>
                <th scope="col">Mail</th>
                <th scope="col">Rol</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($_SESSION['users'] as $key => $user) {
                echo "<tr style='height: 50px;'>";
                echo "<th scope='row'>" . $user['id'] . "</th>";
                echo "<td>" . $user['name'] . "</td>";
                echo "<td>" . $user['username'] . "</td>";
                echo "<td>" . $user['password'] . "</td>";
                echo "<td>" . $user['mail'] . "</td>";
                //nomes es poden fer admin els users
                if ($user['rol'] != 'admin') {
                    echo "<td><a class='btn btn-success' href='../controller/updateToAdmin_controller.php?id=" . $user['id'] . "'>To Admin </a></td>";
                } else {
                    echo "<td>admin</td>";
                }
                //usuari admin establert per hardcode
                if ($user['id'] != 0) {
                    echo "<td><a class='btn btn-danger' href='../controller/deleteUser_controller.php?id=" . $user['id'] . "'>Delete </a></td>";
                } else {
                    echo "<td></td>";
                }
                echo "<tr>";
            }
            ?>

        </tbody>
    </table>
</div>

</body>

</html>