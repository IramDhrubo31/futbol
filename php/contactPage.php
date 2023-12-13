<?php
$servername = "localhost";
$username = "root";
$password = "";
$futbol = "futbol";

$conn = new mysqli($servername, $username, $password, $futbol);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else{
    if(isset($_POST['submit'])){
        $userName = $_POST['userName'];
        $email = $_POST['email']; 
        $contactNum = $_POST['contactNumber']; 
        $message = $_POST['message']; 

        $sql="INSERT INTO contact_list_table(`user_name`,`email`,`contact_number`,`contact_message`) VALUES ('$userName','$email', '$contactNum','$message')";
    
    
    if (mysqli_query($conn, $sql)) {
      echo 'hii';
      //header('location:../Contact_Page/contactPage.php');

    } else {
      echo "<script>alert('Error: '.$sql.'<br>' . mysqli_error($conn))</script>" ;
    }
    
    
    }

    $conn->close();
}
?>