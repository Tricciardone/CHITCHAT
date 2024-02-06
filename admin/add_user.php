<?php
    include('session.php');
    if(isset($_POST['adduser'])){
        $name = $_POST['Nombre'];
        $username = $_POST['Usuario'];
        $password = md5($_POST['Contraseña']);
        $access = $_POST['Acceso'];
        $photo = '/upload/profile.jpg'; 

        mysqli_query($conn, "insert into `user` (uname, username, password, access, photo) values ('$name', '$username', '$password', '$access', '$photo')");
    }
?>