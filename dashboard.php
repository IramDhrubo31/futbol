<?php
  session_start();
  $username = $_SESSION['username'];
  include "connection.php";

  if($link == false) {
      die("ERROR: Could not connect. ". mysqli_connect_error());
  }
  else {
      $sql = 'SELECT * FROM user_table';
      $result = mysqli_query($link, $sql);
  }
  $sql = "SELECT * FROM user_table WHERE user_name ='$username'";
  $userInfo = mysqli_query($link, $sql);
  $userInfo = mysqli_fetch_assoc($userInfo);


  $msql = 'SELECT * FROM match_table';
  $mresult = mysqli_query($link, $msql);

  $sqlFetch = "SELECT * FROM player_table WHERE user_name ='$username'";
  $statsInfo = mysqli_query($link, $sqlFetch);
  $statsInfo = mysqli_fetch_assoc($statsInfo);

  // if($statsInfo['goal'] = null){
  //   $sql = "UPDATE player_table SET goal = '0' WHERE user_name = '$playerName'";
  //   if(mysqli_query($link, $sql)) {
  //     //echo "Records updated successfully";
  //   }
  //   else {
  //       echo "ERROR: Could not able to execute $sql." . mysqli_error($link);
  //   }

  // }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Dashboard</title>
    <link rel="icon" href="logo/football_1165249.png">
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
            <ul class="navbar-nav nav-underline " style="font-size: small; font-weight: bold; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
              <li class="nav-item">
                <a type="button" class="nav-link" href="aboutus.html" target="_blank" id="about">ABOUT US</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="Contact_Page/contact.html" target="_blank">CONTACT US</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="members.php" target="_blank">MEMBERS</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="fixture.php" target="_blank">FIXTURES</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="leaderboard.php" target="_blank">LEADERBOARD</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="pprofile.php">PROFILE</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php">LOGOUT</a>
              </li>
              
            </ul>
          </div>
        </div>
      </nav>

    <div class="container mt-2  py-5">
      <div class="row pb-2 pt-3 text-center">
        <h1 style="color: white;"><u>Dashboard</u></h1>

      </div>
        <div class="row mb-3">
          <div class="col-8">
            <div class="container carousell" style="border: solid white;box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;background: linear-gradient(to bottom right, #020251 , #f74b0d);">
              <div class="row">
                <div id="exp" class="carousel slide pt-5 text-center" data-bs-ride="carousel">
                  
                
                  <!-- The slideshow/carousel -->
                  <div class="carousel-inner py-3">
              <?php
              if (mysqli_num_rows($mresult) > 0) {
                $first = true;
                while ($row = mysqli_fetch_assoc($mresult)) {
                  echo '
                              <div class="carousel-item' . ($first ? ' active' : '') . '">
                                <div class="text-center text-white fs-2">'
                                    . $row['match_number'] . '
                                </div>
                                <div class="d-flex justify-content-evenly">
      
                                  <div class="p-2 py-5" style="color: white;">
                                    <h2>' . $row['team_one'] . '</h2>
                                  </div>
                                  <div class="p-2 py-5" style="color: white;">
                                    <h1>VS</h1>
                                  </div>
                                  <div class="p-2 py-5" style="color: white;">
                                    <h2>' . $row['team_two'] . '</h2>
                                  </div>
                                </div>
                                <div class="pt-2 text-white fs-4">
                                  <div>'. $row['match_date'] . '</div>
                                  <div>'. $row['match_time'] . '</div>
                                </div>
                              </div>
                            ';
                  $first = false;
                }
              }
                ?>
                </div>
                
                  <!-- Left and right controls/icons -->
                  <button class="carousel-control-prev" type="button" data-bs-target="#exp" data-bs-slide="prev" style="height: 40vh;">
                    <span class="carousel-control-prev-icon"></span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#exp" data-bs-slide="next" style="height: 40vh;">
                    <span class="carousel-control-next-icon"></span>
                  </button>
                </div>
                </div>
            </div>
          </div>
          <div class="col-4">
            <div class="row pt-5 text-center">
              <a type="button" class="btn py-3 btn-success" href="matchreg.php" style=" color: white;">Register Match</a>
            </div>
          </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4 col-sm-12 py-5" style="font-family: Verdana, Geneva, Tahoma, sans-serif; border-radius: 3px; border: solid gray; background-color: whitesmoke; border-radius: 5px; box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
        
              <div class="row mb-3 text-center">
                <img class="img-fluid" src="<?php echo "upload/".$userInfo['picture']; ?>" width=70px alt="Image">
                
                </div>
                <div class="row mb-2">
                  <label>Name: <?php echo $userInfo['name'];?></label>
                 
              </div>
              <!-- <div class="row mb-3">
                  <label>userID:</label>
                  <label></label>
              </div> -->
              <div class="row mb-2">
                  <label>user name: <?php echo $username;?></label>
                  
              </div>
              <div class="row mb-2 ">
                  <label>Email: <?php echo $userInfo['email']; ?></label>
                  
              </div>
              <div class="row  mb-2">
                  <label>Gender: <?php echo $userInfo['gender']; ?></label>
                  
              </div>
              <div class="row mb-2">
                  <label>Blood Group: <?php echo $userInfo['bloodGroup']; ?></label>
                 
              </div>
              
            </div>
            <div class="col-md-8 col-sm-12 py-5 "  style="border-radius: 3px; background-color: #020251; border: solid whitesmoke;">
              <div class="row my-3 text-center" style="color: white;">
                <h3>Statistics</h3>
            </div>

            <div class="row">
                <table class="table table-dark table-striped table-hover table-bordered border-white">

                    <tbody>
                        <tr>
                            <td>Goal</td>
                            <td>
                              <?php
                                  if($statsInfo == null){
                                    echo '0';
                                  }
                                  else{
                                    echo $statsInfo['goal'];
                                  }
                              ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Assist</td>
                            <td>
                              <?php
                                if($statsInfo == null){
                                  echo '0';
                                }
                                else{
                                  echo $statsInfo['assist'];
                                }
                              ?>
                            </td>
                        </tr>
                        <tr>
                            <td>CleanSheet</td>
                            <td>
                              <?php
                                if($statsInfo == null){
                                  echo '0';
                                }
                                else{
                                  echo $statsInfo['clean_sheet'];
                                }
                              ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Yellow Card</td>
                            <td>
                              <?php
                                if($statsInfo == null){
                                  echo '0';
                                }
                                else{
                                  echo $statsInfo['yellow_card'];
                                } 
                              ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Red Card</td>
                            <td>
                              <?php
                                if($statsInfo == null){
                                  echo '0';
                                }
                                else{
                                  echo $statsInfo['red_card'];
                                }
                              ?>
                            </td>
                        </tr>
                    </tbody>

                </table>
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