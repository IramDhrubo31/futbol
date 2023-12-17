<?php
include "connection.php";


if($link == false) {
    die("ERROR: Could not connect. ". mysqli_connect_error());
}
else {
    $sql = 'SELECT * FROM match_table';
    $result = mysqli_query($link, $sql);
}
?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fixture.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Fixtures</title>
</head>
<body>
      <div class="container py-5">
        <div class="text-center mb-2">
          <h1 class="text-white"><u>FIXTURE</u></h1>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-success table-striped px-3">
                    <thead>
                      <tr>
                        <th scope="col">Match Number</th>
                        <th scope="col">Date</th>
                        <th scope="col">Time</th>
                        <th scope="col">Team A</th>
                        <th scope="col">Score</th>
                        <th scope="col">Team B</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      if(mysqli_num_rows($result)>0) {

                         while($row = mysqli_fetch_assoc($result)) {
                          echo '<tr>
                                <td>'.$row["match_number"].'</td>
                                <td>'.$row["match_date"].'</td>
                                <td>'.$row["match_time"].'</td>
                                <td>'.$row["team_one"].'</td>
                                <td>'.$row["score"].'</td>
                                <td>'.$row["team_two"].'</td>
                        
                        </tr>';
            }
          }
          ?>
                      
                    </tbody>
                  </table>
            </div>
        </div>
      </div>


      <footer style="height: 20vh; background-color: black;" class="fixed-bottom">
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