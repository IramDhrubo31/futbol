<?php
include "connection.php";

if($link == false) {
    die("ERROR: Could not connect. ". mysqli_connect_error());
}
else {
    $sql = 'SELECT * FROM user_table';
    $result = mysqli_query($link, $sql) or die(mysqli_error());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/members.css">
    <title>Contact Details</title>
</head>
<body class="bg-body-secondary">
    <h1 class="text-center my-5 text-white"><u>Members</u></h1>
    <div class="container-fluid">
    
        <?php
        echo '<div class="container gap-5 mb-5 d-flex flex-wrap justify-content-center"> ';
        if(mysqli_num_rows($result)>0) {
            $count=1;
            while($row = mysqli_fetch_assoc($result)) {
                
                echo '<div class="card" style="width: 15rem;">  
                <div class="card-body text-center">  
                <img class= "img-fluid" src=" "upload/"'.$row['picture'].'" width=70px alt="Image">
                </div>
                <h5 class="card-title text-center">'.$row['name'].'</h5>
                <h6 class="card-subtitle mb-2 text-body-secondary text-center"> Member no. ' . $count++.'</h6>
                </div>'; 
               
            }
        }
        echo '</div>'
        
        ?>

    </div>
    <footer style="height: 20vh; background-color: black;">
        <div class="container">
            <div class="row">
              <div class="col-6 pt-5">
                <p style="color: white;"><i class="fa-regular fa-copyright" style="color: #ffffff;"></i>2023 Futbol</p>
    
              </div>
              <div class="col-6 pt-5" style="text-align: end;">
                <a href="https://www.facebook.com"><i class="fa-brands fa-facebook"></i></a>
                <a href="https://www.instagram.com"><i class="fa-brands fa-instagram"></i></a>
                <a href="https://www.linkedin.com"><i class="fa-brands fa-linkedin"></i></a>
                <a href="https://gmail.com"><i class="fa-regular fa-envelope"></i></a>
              </div>
            
            </div>
          </div>
      </footer>




      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>