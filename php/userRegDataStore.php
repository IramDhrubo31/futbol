<?php
if(isset($_POST['submit'])) {
    $fname=$_POST['namee'];
    $uname=$_POST['userName'];
    $email=$_POST['email'];
    $contact=$_POST['contactNumber'];
    $upassword=$_POST['password'];
    $gender=$_POST['gender'];
    $bloodGroup=$_POST['bloodGroup'];
    $profileImage=$_POST['profileImage'];
    $c_password=$_POST['c_password'];


    echo $fname;
    echo $uname;
    echo $email;
    echo $contact;
    echo $upassword;
    echo $gender;
    echo $bloodGroup;
    echo $profileImage;

    $link = mysqli_connect("localhost", "root", "", "futbol");

    if($link == false) {
        die("ERROR: Could not connect. ". mysqli_connect_error());
    }

    $sql = "INSERT INTO user_table(name, user_name, email, contactNumber, password, gender, bloodGroup, picture) VALUES ('$fname', '$uname', '$email', '$contact', '$upassword', '$gender, '$bloodGroup', '$profileImage')";

    if ($upassword == $c_password) {
        echo "Passwords match!";
        if(mysqli_query($link, $sql)) {
            echo "Records added successfully.";
        }
        else {
            echo "ERROR: Could not able to execute $sql." . mysqli_error($link);
        }
       
    } else {
        echo "Passwords do not match. Please try again.";
        header('location: ../LoginFolder/signUp.html');
    }

    // if(mysqli_query($link, $sql)) {
    //     echo "Records added successfully.";
    // }
    // else {
    //     echo "ERROR: Could not able to execute $sql." . mysqli_error($link);
    // }


    mysqli_close($link);
}
?>