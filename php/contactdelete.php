<?php 
include "connection.php";

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else{
    $id = $_GET['contact_id'];
    $sql = 'Delete from contact where id='.$id;
    $res = mysqli_query($conn,$sql);
    echo "<script>alert('Deleted successfully')</script>";
    header('location:contactlist.php');
}
?>