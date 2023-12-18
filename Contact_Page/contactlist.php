<?php
session_start();

include "../connection.php";

if ($link->connect_error) {
  die("Connection failed: " . $link->connect_error);
} else {
  $sql = 'select * from contact_list_table';
  $res = mysqli_query($link, $sql);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact List</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="contactlist.css">
</head>

<body>
<nav class="navbar navbar-expand-md shadow-sm bg-white px-3 sticky-md-top" style="font-size: small; font-weight: bold; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
      <div class="container-fluid">
        <a class="navbar-brand" href="#Home">
          <img src="../logo/Futb_l-removebg-preview.png" alt="Futbol" height="50">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="true" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" style="display: flex; flex-direction: column; align-items: flex-end;" id="navbarNav">
          <ul class="navbar-nav nav-underline ">
            <li class="nav-item">
              <a class="nav-link" href="../aboutus.html" target="_blank">ABOUT US</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../addMatch.php">ADD MATCH</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../updateMatch.php">UPDATE MATCH</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../playerStats.php">PLAYER STATS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../fixture.php" target="_blank">FIXTURE</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../leaderboard.php" target="_blank">LEADERBOARD</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

  <section class="list d-flex flex-column align-items-center justify-content-center">
    
    <h1 class="mb-5 mt-5 text-white"> Contact List</h1>
    <div class="container">
      <div class="table-responsive">
        <table id="example" class="table table-striped">
          <thead>
            <tr>
              <th class="table-dark">#</th>
              <th class="table-primary">User Name</th>
              <th class="table-secondary">Email</th>
              <th class="table-success">Contact Number</th>
              <th class="table-danger">Message</th>
              <th class="table-secondary">Action</th>
            </tr>
            

          </thead>

          <tbody>

            <?php
            if (mysqli_num_rows($res) > 0) {
              $count = 1;
              while ($rows = mysqli_fetch_assoc($res)) {
                $id = $rows["contact_id"];
                echo ' <tr>
                <td>' . $count++ . '</td>
                <td>' . $rows["user_name"] . '</td>
                <td>' . $rows["email"] . '</td>
                <td>' . $rows["contact_number"] . '</td>
                <td>' . $rows["contact_message"] . '</td>
                <td class="table-secondary"><a class="btn btn-danger" href=' . "../php/contactdelete.php?id=" . $id . '>Delete</a></td>

            </tr>
                ';
              }
            }
            ?>

          </tbody>
        </table>
      </div>
    </div>



  </section>
</body>

</html>