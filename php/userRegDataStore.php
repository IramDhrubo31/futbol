<?php
if(isset($_POST['submit'])) {
    $name=$_POST['name'];
    $uname=$_POST['userName'];
    $email=$_POST['email'];
    $contact=$_POST['contactNumber'];
    $password=$_POST['password'];
    $gender=$_POST['gender'];
    $bloodGroup=$_POST['bloodGroup'];
    $profileImage=$_POST['profileImage'];

    echo $name;
    echo $uname;
    echo $email;
    echo $contact;
    echo $password;
    echo $gender;
    echo $bloodGroup;
    echo $profileImage;

    $link = mysqli_connect("localhost", "root", "", "futbol");

    if($link == false) {
        die("ERROR: Could not connect. ". mysqli_connect_error());
    }

    $sql = "INSERT INTO contact_info(firstName, lastName, email, phoneNumber, messages) VALUES ('$fname', '$lname', '$email', '$phone', '$message')";
    if(mysqli_query($link, $sql)) {
        echo "Records added successfully.";
    }
    else {
        echo "ERROR: Could not able to execute $sql." . mysqli_error($link);
    }

    mysqli_close($link);
}
?>