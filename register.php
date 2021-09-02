<?php
    require_once('connection.php');
    $username = $_POST['user_name']; 
    $password = $_POST['user_pass'];
    $email = $_POST['user_email'];


    $sqlCheck = "SELECT * FROM users WHERE username='$username' OR email='$email'";
    $resultCheck = mysqli_query($conn, $sqlCheck);
    if(mysqli_num_rows($resultCheck) == 0){
        $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
        $result = mysqli_query($conn, $sql);
    }
    else{
        echo 'USER ALREADY EXISTS';
    }
    if(isset($result)){
        header("Location:/pelix");
    }
    
?>