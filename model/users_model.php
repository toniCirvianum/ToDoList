<?php
$users = [ [
         "id"=> 0,
         "name"=> "Toni Fernandez",
         "username" => "admin",
         "password" => "P@ssw0rd",
         "mail" => "toni.fernandez@cirvianum.cat",
         "rol" => "admin"
     ],[
         "id"=> 1,
         "name"=> "Raquel Boronat",
         "username" => "raquel",
         "password" => "P@ssw0rd",
         "mail" => "raquel.boronat@cirvianum.cat",
         "rol" => "user" ]
];
$_SESSION['users']=$users;



?>