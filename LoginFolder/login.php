<?php
if(isset($_POST['submit'])){
    session_start();
    $name = $_POST['name'];
    $pass = $_POST['pass'];
    if ($name=='admin' && $pass='3333'){
        $_SESSION['name']=$name;
        header('location:contactlist.php');
    }
}
?>