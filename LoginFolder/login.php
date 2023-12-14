<?php
if (isset($_POST['submit'])) {
    session_start();
    $username = $_POST['username'];
    $pass = $_POST['pass'];


    include "../connection.php";


    if ($link->connect_error) {
        die("Connection failed: " . $link->connect_error);
    }


    $sql = "SELECT * FROM user_table WHERE user_name = '$username' AND password = '$pass'";
    $result = $link->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        header('location: ../dashboard.php');
    } else {
        echo "Login unsuccessful. Please check your username and password.";
    }

    $link->close();
}
?>
