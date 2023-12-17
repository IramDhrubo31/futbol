<?php
if(isset($_POST['submit'])) {
    $fname=$_POST['namee'];
    $uname=$_POST['userName'];
    $email=$_POST['email'];
    $contact=$_POST['contactNumber'];
    $upassword=$_POST['password'];
    $gender=$_POST['gender'];
    $bloodGroup=$_POST['bloodGroup'];
    $profileImage=$_FILES['profileImage']['name'];
    $c_password=$_POST['c_password'];


    // echo $fname;
    // echo $uname;
    // echo $email;
    // echo $contact;
    // echo $upassword;
    // echo $gender;
    // echo $bloodGroup;
    // echo $profileImage;

    

    include "connection.php";

    if($link == false) {
        die("ERROR: Could not connect. ". mysqli_connect_error());
    }

    $sql = 'SELECT user_name FROM user_table';
    $result = mysqli_query($link, $sql);
    $bool=0;
    if(mysqli_num_rows($result)>0) {
        
        while($row = mysqli_fetch_assoc($result)) {
            if($row['user_name'] == $uname) {
                $bool = 1;
                
                break;
            }
        }

    }

   if($bool = 1) {
        $_SESSION['status'] = "Username already taken";
        header('location: LoginFolder/signUp.php');
   }
   else {
       if ($upassword == $c_password) {
        // echo "Passwords match!";
        $sql = "INSERT INTO user_table(name, user_name, email, contactNumber, password, gender, bloodGroup, picture) VALUES ('$fname', '$uname', '$email', '$contact', '$upassword', '$gender', '$bloodGroup', '$profileImage')";
        if(mysqli_query($link, $sql)) {
            // echo "Records added successfully.";
            move_uploaded_file($_FILES['profileImage']['tmp_name'], "upload/".$profileImage);
            header('location:LoginFolder/login.html');
        }
        else {
            echo "ERROR: Could not able to execute $sql." . mysqli_error($link);
        }
       
        } else {
            echo "Passwords do not match. Please try again.";
            header('location: ../LoginFolder/signUp.html');
            
        }
   }

    
    

    mysqli_close($link);
}
?>