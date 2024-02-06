<?php
    include('conn.php');
    session_start();
    function check_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = check_input($_POST['username']);
        
        if (!preg_match("/^[a-zA-Z0-9_]*$/", $username)) {
            $_SESSION['sign_msg'] = "¡El nombre de usuario no debe contener espacios ni caracteres especiales!"; 
            header('location: signup.php');
        } else {
            $fusername = $username;
            $password = check_input($_POST["password"]);
            $fpassword = md5($password);
            $fname = check_input($_POST["name"]);
            $photo = '/upload/profile.jpg'; // Ruta a la foto predeterminada.

            mysqli_query($conn, "INSERT INTO `user` (uname, username, password, access, photo) VALUES ('$fname', '$fusername', '$fpassword', '2', '$photo')");
            
            $_SESSION['msg'] = "Se ha registrado exitosamente. ¡Puedes iniciar sesión ahora!"; 
            header('location: index.php');
        }
    }
?>