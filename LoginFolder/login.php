<?php
if (isset($_POST['submit'])) {
    session_start();
    $name = $_POST['name'];
    $pass = $_POST['pass'];


    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "futbol";


    $conn = new mysqli($servername, $username, $password, $dbname);


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $sql = "SELECT * FROM user_table WHERE user_name = '$name' AND password = '$pass'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['name'] = $name;
        header('location: ../pdashboard.html');
    } else {
        echo "Login unsuccessful. Please check your username and password.";
    }

    $conn->close();
}
