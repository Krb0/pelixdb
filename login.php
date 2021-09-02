<?php
    require_once('connection.php');
    $username = $_POST['user_name']; 
    $password = $_POST['user_pass'];

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $id = $row["ID"];
            $email = $row["email"];
            session_start();
            $_SESSION['id'] = $id;
            $_SESSION['user'] = $username;
        }
        header("Location:/pelix");
    }
    else{
        print_r('ACCOUNT DOESNT EXIST');
    }
?>