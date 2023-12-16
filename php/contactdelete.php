<?php 
include "../connection.php";

if ($link->connect_error) {
  die("Connection failed: " . $link->connect_error);
}
else{
    $id = $_GET['id'];
    $sql = 'Delete from contact_list_table where contact_id='.$id;
    $res = mysqli_query($link,$sql);
    // echo "<script>alert('Deleted successfully')</script>";
    header('location: ../Contact_Page/contactlist.php');
}
?>