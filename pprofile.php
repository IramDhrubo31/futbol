<?php
  session_start();
  $username = $_SESSION['username'];
  include "connection.php";

  if($link == false) {
      die("ERROR: Could not connect. ". mysqli_connect_error());
  }
  else {
      $sql = 'SELECT * FROM user_table';
      $result = mysqli_query($link, $sql) or die(mysqli_error());
  }
  $sql = "SELECT * FROM user_table WHERE user_name ='$username'";
  $userInfo = mysqli_query($link, $sql);
  $userInfo = mysqli_fetch_assoc($userInfo);

  $psql= "SELECT * FROM player_table WHERE user_name ='$username'";
  $playerInfo = mysqli_query($link, $psql);
  $playerInfo = mysqli_fetch_assoc($playerInfo);

?>

<?php 
  
  if (isset($_POST['subupPositionmit'])) {
    session_start();
    $updateposition = $_POST['updateposition'];
   
    include "connection.php";

    if($link == false) {
      die("ERROR: Could not connect. ". mysqli_connect_error());
  }
  $usql= "INSERT INTO ";
  // $uRes= mysqli_query($link, $usql);

  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/pprofile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Profile</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg shadow-sm bg-white px-3 sticky-md-top">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <img src="logo/Futb_l-removebg-preview.png" alt="Futbol" height="50">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="true" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" style="align-items: end;" id="navbarNav">
            <ul class="navbar-nav nav-underline ">
              <li class="nav-item">
                <a type="button" class="nav-link" href="aboutus.html" target="_blank" id="about">ABOUT US</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="Contact_Page/contact.html" target="_blank">CONTACT US</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#Players">PLAYERS</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="fixture.html">FIXTURES</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#Leaderboard">LEADERBOARD</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.html">PROFILE</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.html">LOGOUT</a>
              </li>
              
            </ul>
          </div>
        </div>
      </nav>


    <div class="container" style=" border: solid gray; border-radius: 5px; box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px; margin-top: 2rem; margin-bottom: 2rem;">
       
        <div class="row pt-2 py-1 text-center" style="background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(255,59,0,1) 100%); border-bottom: solid whitesmoke;">
            <h2 style="color: white;">Profile</h2>

        </div>
        <div class="row pb-3"
            style=" background: linear-gradient(90deg, rgba(40,38,38,1) 10%, rgba(50,46,46,1) 33%, rgba(57,53,53,1) 49%, rgba(84,84,87,0.9725140056022409) 100%); border-bottom: solid whitesmoke;">
            <div class="col-md-4 col-sm-12 py-5 text-center" >
              <img src="<?php echo "upload/".$userInfo['picture']; ?>" width=300rem alt="Image">
    
            </div>
            <div class="col-md-8 col-sm-12 py-5"  style="color: white;">
                <div class="row mb-3">
                    <label>Name: <span class="lead info ps-2"><?php echo $userInfo['name'];?></span></label>
                </div>

                <div class="row mb-3">
                    <label>user name: <span class="lead info ps-2"> <?php echo $username;?></span></label>
                </div>
                <!-- <div class="row mb-3">
                    <labe>userID:</labe>
                    <label></label>
                </div> -->
                <div class="row mb-3">
                    <label>Email: <span class="lead info ps-2"><?php echo $userInfo['email']; ?></span?</label>
                </div>
                <div class="row">
                    <labe>Position:<span class="lead info ps-2"><?php echo $playerInfo['position'] ?></span></labe>
                   
                </div>
            </div>
    
        </div>

        <div class="row pt-3 text-center" style="background: linear-gradient(90deg, rgba(40,38,38,1) 10%, rgba(50,46,46,1) 33%, rgba(57,53,53,1) 49%, rgba(84,84,87,0.9725140056022409) 100%);">
            <h3 style="color: white;"><u>Update Profile</u></h3>
        </div>
        <div class="row py-5 text-center" style="background: linear-gradient(90deg, rgba(40,38,38,1) 10%, rgba(50,46,46,1) 33%, rgba(57,53,53,1) 49%, rgba(84,84,87,0.9725140056022409) 100%);">
            <div class="col-7">
                <div class="row justify-content-end mb-3">
                    <input required type="text" class="form-control shadow-sm" placeholder="Enter Updated Name" aria-label="updatename" name="updatename" style="width: 25rem;">
                </div>
                <!-- <div class="row justify-content-end mb-3">
                    <input required type="text" class="form-control shadow-sm" placeholder="Enter Updated user Name" aria-label="updateusername" name="updateusername" style="width: 25rem;">
                </div> -->
                <div class="row justify-content-end mb-3">
                    <input required type="text" class="form-control shadow-sm" placeholder="Enter Updated Password" aria-label="updatepass" name="updatepass" style="width: 25rem;">
                </div>
                <div class="row justify-content-end mb-3">
                    <input required type="text" class="form-control shadow-sm" placeholder="Enter Updated Position" aria-label="updateposition" name="updateposition" style="width: 25rem;">
                </div>
            </div>
            <div class="col-5 ps-5">
                <div class="row ">
                    <button type="button" class="btn btn-success mb-3"  style="border-radius: 10rem; width: 20rem; color: white;" name="upName">Update Name</button>
                </div>
                <!-- <div class="row ">
                    <button type="button" class="btn btn-success mb-3"  style="border-radius: 10rem; width: 20rem; color: white;" name="upName">Update User Name</button>
                </div> -->
                <div class="row ">
                    <button type="button" class="btn btn-success mb-3"  style="border-radius: 10rem; width: 20rem; color: white;" name="upPass">Password</button>
                </div>
                <div class="row ">
                    <button type="button" class="btn btn-success mb-3"  style="border-radius: 10rem; width: 20rem; color: white;" name="upPosition">Position</button>
                </div>
            </div>
        </div>
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