<?php 
    if(isset($_POST['submit'])){
        session_start();
        $matchNumber=$_POST['matchNumber'];
        $teamOne=$_POST['teamOne'];
        $teamTwo=$_POST['teamTwo'];
        $date=$_POST['date'];
        $time=$_POST['timeSlot'];
        $score=$_POST['score'];

        include "connection.php";
        
        if($link == false) {
            die("ERROR: Could not connect. ". mysqli_connect_error());
        }

        $sql = "INSERT INTO match_table(match_number, team_one, team_two, match_date, match_time, score) VALUES ('$matchNumber', '$teamOne', '$teamTwo', '$date', '$time', '$score')";

        if(mysqli_query($link, $sql)) {
          
        }
        else {
            echo "ERROR: Could not able to execute $sql." . mysqli_error($link);
        }
        mysqli_close($link);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Match</title>
    <link rel="stylesheet" href="css/addMatch.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="bg-info bg-opacity-50">
  <header>
    <nav class="navbar navbar-expand-md shadow-sm bg-white px-3 sticky-md-top" style="font-size: small; font-weight: bold; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
      <div class="container-fluid">
        <a class="navbar-brand" href="#Home">
          <img src="logo/Futb_l-removebg-preview.png" alt="Futbol" height="50">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="true" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" style="align-items: end;" id="navbarNav">
          <ul class="navbar-nav nav-underline ">
            <li class="nav-item">
              <a class="nav-link" href="adminPortal.html">ADMIN PORTAL</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="updateMatch.php">UPDATE MATCH</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="playerStats.php">PLAYER STATS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="fixture.php" target="_blank">FIXTURE</a>
            </li>
            <li class="nav-item">
                  <a class="nav-link" href="leaderboard.php" target="_blank">LEADERBOARD</a>
            </li>
            <li class="nav-item">
                  <a class="nav-link" href="Contact_Page/contactlist.php">CONTACT LIST</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <!-- <section> -->
    <div class="container mt-5">
      <div class="row">
        <div class="col-12">
          <form action="addMatch.php" method="post">
            <h3 class="text-center">Create a Match</h3>
            
            <div class="d-flex justify-content-evenly mb-2">
              <div>
                <label for="date" class="fs-5 my-1">Select Date</label>
                <input type="date" name="date" id="date" class="rounded-2 px-2 py-1 my-1">
              </div>
              <div>
                <label for="timeSlot" class="fs-5 my-1">Time Slot</label>
                <input type="time" id="timeSlot" name="timeSlot" class="rounded-2 px-2 py-1 my-1">
              </div>
            </div>
            
            <div class="">
              <label for="matchNumber" class="fs-5 my-1">Match Number</label>
              <select name="matchNumber" id="matchNumber" class="form-select my-1" aria-label="Default select example">
                <option value="Match 1">Match 1</option>
                <option value="Match 2">Match 2</option>
                <option value="Match 3">Match 3</option>
                <option value="Match 4">Match 4</option>
                <option value="Match 5">Match 5</option>
                <option value="Match 6">Match 6</option>
                <option value="Match 7">Match 7</option>
                <option value="Match 8">Match 8</option>
                <option value="Match 9">Match 9</option>
              </select>
            </div>

            <div class="mt-2">
              <label for="teamOne" class="fs-5">Team One</label>
              <select name="teamOne" id="teamOne" class="form-select" aria-label="Default select example">
                <option value="CSC101" selected>CSC101</option>
                <option value="CSC203">CSC203</option>
              </select>
            </div>

            <div class="mt-2">
              <label for="teamTwo" class="fs-5">Team Two</label>
              <select name="teamTwo" id="teamTwo" class="form-select" aria-label="Default select example">
                <option value="CSC101">CSC101</option>
                <option value="CSC203" selected>CSC203</option>
              </select>
            </div>

            <div class="mt-2">
              <label for="score" class="fs-5">Score</label>
              <select name="score" id="score" class="form-select" aria-label="Default select example">
                <option value="0-0" selected>0-0</option>
              </select>
            </div>

            <div class="text-center">
              <!-- <button class="px-3 py-1 rounded-4 mt-4">CREATE MATCH</button> -->
              <input type="submit" class="submit px-3 py-1 rounded-4 mt-4" name="submit" value="CREATE MATCH">
            </div>
          </form>
          <?php 
            if(isset($_POST['submit'])){
              echo '<div class="d-flex justify-content-end">
                      <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header bg-success bg-opacity-100 text-white">
                            <strong class="me-auto">Success</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body bg-success bg-opacity-75 text-white fw-bold">
                            Match has been added successfully!
                        </div>
                      </div>
                    </div>';
            }
          ?>
          <!-- <button type="button" class="btn btn-primary" id="liveToastBtn">Show live toast</button> -->

          <!-- <div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
              <div class="toast-header">
                <img src="..." class="rounded me-2" alt="...">
                <strong class="me-auto">Bootstrap</strong>
                <small>11 mins ago</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
              </div>
              <div class="toast-body">
                Hello, world! This is a toast message.
              </div>
            </div>
          </div> -->
        </div>
      </div>
    </div>
  <!-- </section> -->

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Activate the toast using Bootstrap's JavaScript
    var toastEl = document.querySelector('.toast');
    var toast = new bootstrap.Toast(toastEl);
    toast.show();
  </script>
</body>
</html>