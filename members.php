<?php
include "connection.php";

if($link == false) {
    die("ERROR: Could not connect. ". mysqli_connect_error());
}
else {
    $sql = 'SELECT * FROM user_info';
    $result = mysqli_query($link, $sql) or die(mysqli_error());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/contact_fetch.css">
    <title>Contact Details</title>
</head>
<body class="bg-body-secondary">
    <h2 class="text-center my-4">Members</h2>
    <div class="container-fluid">
    <!-- <table class="table table-dark table-striped table-hover"> -->
    <!-- <thead>
        <tr>
        <th scope="col">User ID</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Email</th>
        <th scope="col">Phone Number</th>
        <th scope="col">Message</th>
        </tr>
    </thead>
    <tbody> -->
        <?php
        if(mysqli_num_rows($result)>0) {

            while($row = mysqli_fetch_assoc($result)) {
                echo '<div class="card" style="width: 14rem;">  
                <div class="card-body">  
                <div class="card-text text-center">  
                <h5 class="card-title text-bold">' . $newDate . '</h5>  
                <h5 class="card-title text-bold">' . $newTime . '</h5>  
                <h6 class="card-text text-bold">' . $clima->list[$i]->weather[0]->main . '</h6>  
                <h6 class="card-text">Temperature: ' . $clima->list[$i]->main->temp . '°C</h6>  
                <h6 class="card-text">Feels like: ' .$clima->list[$i]->main->feels_like . '</h6>   
                <h6 class="card-text">Humidity: ' . $clima->list[$i]->main->humidity . '</h6>  
                <h6 class="card-text">Min Temp: ' . $clima->list[$i]->main-> temp_min . '°C</h6> 
                <h6 class="card-text">Max Temp: ' . $clima->list[$i]->main-> temp_max . '°C</h6>  
                </div></div></div> '; 
            }
        }
        
        ?>
    <!-- </tbody>
    </table> -->
    </div>
</body>
</html>