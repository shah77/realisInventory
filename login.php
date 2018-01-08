f<?php
session_start(); 
/* User login process, checks if user exists and password is correct */

// Escape email to protect against SQL injections
$username = $mysqli->escape_string($_POST['username']);
$password = $mysqli->escape_string(md5($_POST['password']));

$result = $mysqli->query("SELECT * FROM user WHERE username='$username' AND pass='$password' ");

if ( $result->num_rows == 0 ){ // User doesn't exist
    $_SESSION['message'] = "User with that username doesn't exist!";
    header("location: error.php");
}
else { // User exists
    $user = $result->fetch_assoc();

    if ( $_SESSION['password'] = $user['pass'] ) {
        
        $_SESSION['username'] = $user['username'];
        
        
        // This is how we'll know the user is logged in
        $_SESSION['logged_in'] = true;

        header("location: home.php");
    }
    else {
        $_SESSION['message'] = "You have entered wrong password, try again!";
        header("location: error.php");
    }
}

