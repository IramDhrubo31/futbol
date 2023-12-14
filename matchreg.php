<?php 
    if(isset($_POST['submit'])){
      session_start();
        $username=$_POST['username'];
        $matchNumber=$_POST['matchNum'];
        $teamName=$_POST['teamname'];
        $position=$_POST['position'];

        include "connection.php";
        
        if($link == false) {
            die("ERROR: Could not connect. ". mysqli_connect_error());
        }

        $sql = "INSERT INTO player_table(user_name, match_num, team_name, position) VALUES ('$username', '$matchNumber', '$teamName', '$position')";

        if(mysqli_query($link, $sql)) {
            // header('location: aboutus.html');
        }
        else {
            echo "ERROR: Could not able to execute $sql." . mysqli_error($link);
        }

        $sqlFetch = "SELECT * FROM player_table WHERE user_name = '$username'";
        $userInfo = mysqli_query($link, $sqlFetch);
        $userInfo = mysqli_fetch_assoc($userInfo);

        $sqlFetch2 = "SELECT * FROM match_table WHERE match_number = '$matchNumber'";
        $matchInfo = mysqli_query($link, $sqlFetch2);
        $matchInfo = mysqli_fetch_assoc($matchInfo);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/matchreg.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Match Registration</title>
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
            <a class="nav-link" href="#Leaderboard">LEADER BOARD</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.html">LOGOUT</a>
          </li>
          
        </ul>
      </div>
    </div>
  </nav>
  
  <div class="container p-5 my-5" >
    <div class="row">
      <div class="col-md-4 col-sm-12"
        style="border: solid whitesmoke; background: linear-gradient(90deg, rgba(40,38,38,1) 10%, rgba(50,46,46,1) 33%, rgba(57,53,53,1) 49%, rgba(84,84,87,0.9725140056022409) 100%);">
        <div class="row my-3 text-center" style="color: white;">
        <form action="matchreg.php" method="post">
          <h4>Match Registration</h4>
          </div>
          <div class="row ">
            <div class="col-12">
              <label style="color: white; margin-bottom: 3px; margin-top: 3px; font-size: large;" for="username">Username:</label>
              <input required type="text" class="form-control shadow-sm" placeholder="Enter your Username"
                aria-label="username" name="username" id="username" autocomplete="off">

              <label for="matchNum" style="color: white; margin-bottom: 3px; margin-top: 5px; font-size: large;">Match Number</label>
              <select name="matchNum" id="matchNum" class="form-select" aria-label="Default select example">
                <option value="" disabled selected>Select an option</option>  
                <option value="Match 1">Match 1</option>
                <option value="Match 2">Match 2</option>
              </select> 

              <label for="teamname" style="color: white; margin-bottom: 3px; margin-top: 5px; font-size: large;">Choose Team</label>
              <select name="teamname" id="teamname" class="form-select" aria-label="Default select example">
                <option value="" disabled selected>Select an option</option>
                <option value="CSC101">CSC101</option>
                <option value="CSC203">CSC203</option>
              </select> 

              <label for="position" style="color: white; margin-bottom: 3px; margin-top: 5px; font-size: large;">Choose Position</label>
              <select name="position" id="position" class="form-select" aria-label="Default select example">
                <option value="" disabled selected>Select an option</option>
                <option value="Striker">Striker</option>
                <option value="Forward">Forward</option>
                <option value="Midfilder">Midfilder</option>
                <option value="Defender">Defender</option>
                <option value="Goalkeeper">Goalkeeper</option>
              </select> 
            </div>
          </div>
          <div class="m-4 text-center">
            <input type="submit" class="btn btn-success" name="submit" value="Register">
          </div>

          
            <?php
              if(isset($_POST['submit'])){
                echo '<div class="text-white text-center mb-2 text-success">Match Registration Successful!</div>';
              }
            ?>
          
          
        </form>
      </div>

      <div class="col-md-8 col-sm-12"
        style="background-color: #020251; border: solid whitesmoke;">
        <div class="row my-3 text-center" style="color: white;">
          <h4>Team Details</h4>
        </div>
        
        <div class="row">
          <table class="table table-dark table-striped table-hover table-bordered border-white">

            <tbody>
              <tr>
                <td>Match Number</td>
                <td><?php echo $userInfo['match_num']; ?></td>
              </tr>
              <tr>
                <td>Team Name</td>
                <td><?php echo $userInfo['team_name']; ?></td>
              </tr>
              <tr>
                <td>Match Date</td>
                <td><?php echo $matchInfo['match_date']; ?></td>
              </tr>
              <tr>
                <td>Match Time</td>
                <td><?php echo $matchInfo['match_time']; ?></td>
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script> -->
</body>
</html>