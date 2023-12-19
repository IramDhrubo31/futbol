<?php
  include "connection.php";
  if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
  } 
  else {
    $sql = 'SELECT * FROM player_table ORDER BY goal DESC';
    $topGoals = mysqli_query($link, $sql);
    
    $sql = 'SELECT * FROM player_table ORDER BY assist DESC';
    $topAssist = mysqli_query($link, $sql);
    
    $sql = 'SELECT * FROM player_table ORDER BY clean_sheet DESC';
    $topCleanSheet = mysqli_query($link, $sql);
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Leaderboard</title>
  <link rel="icon" href="logo/football_1165249.png">
  <link rel="stylesheet" href="css/leader.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>

  <div class="container">
    <h2 class="headline">
      <img src="images/headline.png" alt="Persons Icon" />
      <span style="background-color: rgb(227, 142, 15); padding: 10px; font-weight: 900;">TOP SCORERS</span>
      <img src="images/headline.png" alt="Persons Icon" />
    </h2>

    <div class="row">
      <table class="table table-striped pt-5">
        <thead>
          <tr>
            <th>Rank</th>
            <th>Player Name</th>
            <th>No of goals</th>
          </tr>
        </thead>

        <tbody>
          <?php
              if (mysqli_num_rows($topGoals) > 0) {
                $rank = 1;
                while ($rows = mysqli_fetch_assoc($topGoals)) {
                  echo ' <tr>
                  <td><img src="images/cup.png" alt="Persons Icon" />' . $rank++ . '</td>
                  <td><img src="images/playerIcon.png" alt="Persons Icon" />' . $rows["user_name"] . '</td>
                  <td>' . $rows["goal"] . '</td>
              </tr>
                  ';
                }
              }
          ?>
        </tbody>
        
      </table>
    </div>
  </div>

  <div class="container">

    <h2 class="headline">
      <img src="images/headline.png" alt="Persons Icon" />
      <span style="background-color: rgb(227, 142, 15); padding: 10px; font-weight: 900;">TOP ASSIST PROVIDER</span>
      <img src="images/headline.png" alt="Persons Icon" />
    </h2>

    <div class="row">
      <table class="table table-striped pt-3">
        <thead>
          <tr>
            <th>Rank</th>
            <th>Player Name</th>
            <th>No of Assist</th>
          </tr>
        </thead>

        <tbody>
          <?php
              if (mysqli_num_rows($topAssist) > 0) {
                $rank = 1;
                while ($rows = mysqli_fetch_assoc($topAssist)) {
                  echo ' <tr>
                  <td><img src="images/cup.png" alt="Persons Icon" />' . $rank++ . '</td>
                  <td><img src="images/playerIcon.png" alt="Persons Icon" />' . $rows["user_name"] . '</td>
                  <td>' . $rows["assist"] . '</td>
              </tr>
                  ';
                }
              }
          ?>
        </tbody>
      </table>
    </div>
  </div>


  <div class="container">
    <h2 class="headline">
      <img src="images/headline.png" alt="Persons Icon" />
      <span style="background-color: rgb(227, 142, 15); padding: 10px; font-weight: 900;">TOP CLEAN SHEET KEEPER</span>
      <img src="images/headline.png" alt="Persons Icon" />
    </h2>
    <div class="row">
      <table class="table table-striped pt-3">
        <thead>
          <tr>
            <th>Rank</th>
            <th>Player Name</th>
            <th>No of Clean Sheet</th>
          </tr>
        </thead>

        <tbody>
          <?php
                if (mysqli_num_rows($topCleanSheet) > 0) {
                  $rank = 1;
                  while ($rows = mysqli_fetch_assoc($topCleanSheet)) {
                    echo ' <tr>
                    <td><img src="images/cup.png" alt="Persons Icon" />' . $rank++ . '</td>
                    <td><img src="images/playerIcon.png" alt="Persons Icon" />' . $rows["user_name"] . '</td>
                    <td>' . $rows["clean_sheet"] . '</td>
                </tr>
                    ';
                  }
                }
          ?>
        </tbody>

      </table>
    </div>
  </div>


</body>

</html>