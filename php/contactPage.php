<?php
include "../connection.php";

if ($link->connect_error) {
  die("Connection failed: " . $link->connect_error);
}
else{
    if(isset($_POST['submit'])){
        $userName = $_POST['userName'];
        $email = $_POST['email']; 
        $contactNum = $_POST['contactNumber']; 
        $message = $_POST['message']; 

        $sql="INSERT INTO contact_list_table(`user_name`,`email`,`contact_number`,`contact_message`) VALUES ('$userName','$email', '$contactNum','$message')";
    
    
    if (mysqli_query($link, $sql)) {
    
      header('location:../Contact_Page/contact.html');

    } else {
      echo "<script>alert('Error: '.$sql.'<br>' . mysqli_error($link))</script>" ;
    }
    
    
    }

    $link->close();
}
?>