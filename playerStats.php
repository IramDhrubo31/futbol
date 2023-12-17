<?php
    if(isset($_POST['submit'])){
        $playerName = $_POST['playerName'];
        $redCardInput = isset($_POST['redCard']) ? 1 : 0;
        $yellowCardInput = isset($_POST['yellowCard']) ? 1 : 0;
        $cleanSheetInput = isset($_POST['cleanSheet']) ? 1 : 0;
        $assistInput = (int)$_POST['assist'];
        $goalInput = (int)$_POST['goal'];

        include "connection.php";

        if ($link->connect_error) {
            die("Connection failed: " . $link->connect_error);
        }

        $sqlFetch = "SELECT * FROM player_table WHERE user_name = '$playerName'";
        $updatePlayerInfo = mysqli_query($link, $sqlFetch);
        $updatePlayerInfo = mysqli_fetch_assoc($updatePlayerInfo);

        $updatedGoal = $updatePlayerInfo['goal'] + $goalInput;
        $updatedAssist = $updatePlayerInfo['assist'] + $assistInput;
        $updatedCleanSheet = (int)($updatePlayerInfo['clean_sheet'] ?? 0)  + $cleanSheetInput;
        $updatedRedCard = (int)($updatePlayerInfo['red_card'] ?? 0) + $redCardInput;
        $updatedYellowCard = (int)($updatePlayerInfo['yellow_card'] ?? 0) + $yellowCardInput;

        $sql = "UPDATE player_table SET goal = '$updatedGoal', assist = '$updatedAssist', clean_sheet = '$updatedCleanSheet', red_card = '$updatedRedCard', yellow_card = '$updatedYellowCard'  WHERE user_name = '$playerName'";

        if(mysqli_query($link, $sql)) {
            //echo "Records updated successfully";
        }
        else {
            echo "ERROR: Could not able to execute $sql." . mysqli_error($link);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Player Stats</title>
    <link rel="stylesheet" href="css/addMatch.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
  <header>
    <nav class="navbar navbar-expand-md shadow-sm bg-white px-3 sticky-md-top">
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
              <a class="nav-link" href="addMatch.php">ADD MATCH</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="updateMatch.html">UPDATE MATCH</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="fixture.html">FIXTURE</a>
            </li>
            <li class="nav-item">
                  <a class="nav-link" href="Contact_Page/contactlist.html">CONTACT LIST</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <!-- <section> -->
    <div class="container mt-5 justify-content-between">
      <div class="row">
        <div class="col-12 text-black my-3 rounded-5 fs-4">
          <form action="playerStats.php" method="post">
            <h3 class="text-center mt-3">Edit a Player's Statistics</h3>
            
            <div class="my-3">
                <label for="playerName">Enter a player name</label>
                <input type="text" name="playerName" id="playerName" class="form-control" placeholder="Enter a player's name">
            </div>

            <div class="d-flex justify-content-between">
              <div class="my-4">
                  <label for="goal">Number of Goals</label>
                  <input type="number" name="goal" id="goal" placeholder="Enter no of goals">
              </div>

              <div class="my-4">
                  <label for="assist">Number of Assists</label>
                  <input type="number" name="assist" id="assist" placeholder="Enter no of assists">
              </div>
            </div>

            <div class="d-flex justify-content-between">
                <div class="my-4">
                    <label for="cleanSheet">CleanSheets</label>
                    <input type="checkbox" name="cleanSheet" id="cleanSheet">
                </div>
    
                <div class="my-4">
                    <label for="yellowCard">Yellow Card</label>
                    <input type="checkbox" name="yellowCard" id="yellowCard">
                </div>
    
                <div class="mt-3 mb-3">
                    <label for="redCard">Red Card</label>
                    <input type="checkbox" name="redCard" id="redCard">
                </div>
            </div>

            <div class="text-center mb-3">
                <input type="submit" class="submit px-3 py-1 rounded-4 mt-4" name="submit" value="UPDATE INFO">
            </div>
          </form>
        </div>
      </div>
    </div>
  <!-- </section> -->

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
  
</body>
</html>