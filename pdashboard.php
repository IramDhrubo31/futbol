<?php
// $link = mysqli_connect("localhost", "root", "", "futbol");

// if($link == false) {
//     die("ERROR: Could not connect. ". mysqli_connect_error());
// }
// else {
//     $sql = 'SELECT * FROM user_table';
//     $result = mysqli_query($link, $sql) or die(mysqli_error());
// }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/pdashboard.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Dashboard</title>
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
                <a class="nav-link" href="fixture.php">FIXTURES</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="leaderboard.html">LEADERBOARD</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="pprofile.php">PROFILE</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.html">LOGOUT</a>
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
                    <div class="carousel-item">
                      <div class="d-flex justify-content-evenly">
        
                        <div class="p-2 py-5" style="color: white;">
                          <h2>Team 1</h2>
                          <p>aaaaa</p>
                        </div>
                        <div class="p-2 py-5" style="color: white;">
                          <h1>VS</h1>
                        </div>
                        <div class="p-2 py-5" style="color: white;">
                          <h2>Team 2</h2>
                          <p>bbbbb</p>
                        </div>
                      </div>
                
                    </div>
                    <div class="carousel-item active">
                      <div class="d-flex justify-content-evenly">
        
                        <div class="p-2 py-5" style="color: white;">
                          <h2>Team 1</h2>
                          <p>aaaaa</p>
                        </div>
                        <div class="p-2 py-5" style="color: white;">
                          <h1>VS</h1>
                        </div>
                        <div class="p-2 py-5" style="color: white;">
                          <h2>Team 2</h2>
                          <p>bbbbb</p>
                        </div>
                      </div>
                    </div>
                    
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
                <div class="row">
                 
                  <img>
                  
                </div>
                <div class="row mb-3">
                  <labe>Name:</labe>
                  <label></label>
              </div>
              <div class="row mb-3">
                  <labe>userID:</labe>
                  <label></label>
              </div>
              <div class="row">
                  <labe>Email:</labe>
                  <label></label>
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
                            <td></td>
                        </tr>
                        <tr>
                            <td>Assist</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Yellow Card</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Red Card</td>
                            <td></td>
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