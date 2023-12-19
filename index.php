<?php 
  include "connection.php";

  if($link == false) {
      die("ERROR: Could not connect. ". mysqli_connect_error());
  }
  
  $sql = 'SELECT * FROM match_table';
  $result = mysqli_query($link, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Futbol</title>
    <link rel="icon" href="logo/football_1165249.png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="css/aboutus.css"> -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
  <nav class="navbar navbar-expand-lg shadow-sm bg-white px-3 sticky-md-top" style="font-size: small; font-weight: bold; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
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
            <a class="nav-link" href="members.php" target="_blank">MEMBERS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="fixture.php" target="_blank">FIXTURES</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Leaderboard.php" target="_blank">LEADERBOARD</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="LoginFolder/signUp.php">REGISTER</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

    <header class="first-section">
      <div class="container pt-5 px-4">
        <div class="row mt-5 pb-4 pt-5">
          <h1 style="color: white; font-weight: bold;">Want to be a part of the Futbol Club?<br>Register now!</h1>
        </div>
        <a href="LoginFolder/signUp.php" role="button" class="loginButton" style="margin-right: 1rem;"> Register</a>
        <a href="LoginFolder/login.html" role="button" class="loginButton"> Login</a>
        
      </div>

      <div class="updates" style="padding-top: 12rem;">
        <div class="container py-5 carousell" style="border: solid white;box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;background: linear-gradient(to bottom right, #020251 , #f74b0d);">
          <div class="row">
            <div id="exp" class="carousel slide pt-3 text-center" data-bs-ride="carousel">
              <!-- The slideshow/carousel -->
              <div class="carousel-inner py-3">
              <?php
              if (mysqli_num_rows($result) > 0) {
                $first = true;
                while ($row = mysqli_fetch_assoc($result)) {
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
              <button class="carousel-control-prev" type="button" data-bs-target="#exp" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#exp" data-bs-slide="next" >
                <span class="carousel-control-next-icon"></span>
              </button>
            </div>
            </div>
        </div>
      </div>
    
  </header>
  <div class="container">
    <div class="container py-5">
      <div class="row pb-5 pt-5">
  
        <div class="col-12">
          <h2 style="color: white; text-align: start;"><i class="fa-solid fa-angles-right fa-xl"
              style="color: #ff1100;"></i>Events</h2>
        </div>
      </div>
      <div class="row pb-5">
        <div class="col-md-6 col-sm-12 " style="text-align: justify;">
          <img src="images/friendlyMatch.JPG" class="img-fluid" width="450vw" style="border: solid white;">
        </div>
        <div class="col-md-6 col-sm-12 " style="text-align: justify;">
          <p class="lead" style="color: rgba(255, 255, 255, 0.816); font-size: larger;">As we embrace the excitement of
            the FIFA World Cup 2022, we're thrilled to announce a friendly match among the vibrant Clubs of the Department
            of Computer Science and Engineering at IUB. It's our pleasure to extend a warm invitation for you to be a part
            of this event, encouraging you to witness the game and contribute your support. Your presence will undoubtedly
            add to the festive atmosphere, creating a memorable experience as we unite to revel in the shared joy of
            football. Join us for an evening filled with camaraderie, skill, and the spirit of the beautiful game.</p>
        </div>
      </div>
    </div>
  
  
    <div class="container py-5">
      <div class="row pb-5">
        <div class="col-md-6 col-sm-12 " style="text-align: justify;">
          <img src="images/Futsal Fest.jpg" class="img-fluid" width="450vw" style="border: solid white;">
        </div>
        <div class="col-md-6 col-sm-12 " style="text-align: justify;">
          <p class="lead" style="color: rgba(255, 255, 255, 0.816); font-size: larger;"> Department of Computer Science
            and Engineering (CSE) has clinched victory at the inaugural Intra-IUB Departmental Futsal Fest 2023! We have
            won the final against IUB Alumni Superstars by 5 goals to 1! This triumph exemplifies our commitment not only
            to academic excellence but also to outstanding performance in extracurricular activities. To our exceptional
            students, your unwavering support throughout the tournament was invaluable. This win is a testament to the
            strength of our community and the unity of our CSE family. And finally, to our triumphant players, your
            passion and perseverance have made history and brought immense pride to our department.</p>
        </div>
      </div>
    </div>
    <div class="container py-5">
      <div class="row pb-5">
        <div class="col-md-6 col-sm-12 " style="text-align: justify;">
          <img src="images/loe1.jpg" class="img-fluid" width="450vw" style="border: solid white;">
        </div>
        <div class="col-md-6 col-sm-12 " style="text-align: justify;">
          <p class="lead" style="color: rgba(255, 255, 255, 0.816); font-size: larger;"> The League of Engineers orchestrated a
            riveting tournament spanning from March 16th to 18th at Offside. The event, brimming with exhilarating matches and
            intense competition, unfolded each day from 11 AM to 6:30 PM. Teams clashed on the football field, cultivating an
            electric atmosphere that allowed enthusiasts to not only exhibit their skills but also revel in the spirit of
            camaraderie. The vibrant showcase of talent, coupled with the thrill of the matches, turned this sporting spectacle
            into a memorable experience for all participants and attendees alike. The resounding cheers from the passionate crowd
            echoed through Offside, amplifying the excitement as each goal and strategic play unfolded on the field, contributing
            to the overall thrill of the tournament.</p>
        </div>
      </div>
    </div>
    <div class="container py-5">
      <div class="row pb-5">
        <div class="col-md-6 col-sm-12 " style="text-align: justify;">
          <img src="images/Losets2.jpg" class="img-fluid" width="450vw" style="border: solid white;">
        </div>
        <div class="col-md-6 col-sm-12 " style="text-align: justify;">
          <p class="lead" style="color: rgba(255, 255, 255, 0.816); font-size: larger;"> In the exhilarating "League of Engineers
            - Season 2," the spectacle unfolded from October 19th to 22nd at IUB Sports Complex. Notably, this season embraced
            inclusivity by introducing four women's teams, adding depth to the competition. The player auction heightened
            anticipation, setting the stage for intense matches and spirited rivalry. From 11 AM to 6:30 PM daily, teams fiercely
            contended for the coveted title of football champions. Beyond the competition, the event showcased unity and
            collaboration, embodying the League of Engineers' ethos. Open to all SETS students, it provided a dynamic platform for
            talent display, fostering camaraderie and etching this season as a landmark in the league's rich history.</p>
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