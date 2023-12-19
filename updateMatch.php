<?php
    if(isset($_POST['submit'])){
        session_start();
        $matchNumber = $_POST['matchNumber'];
        // $teamA_name = $_POST['teamA'];
        // $teamB_name = $_POST['teamB'];
        $teamA_score = $_POST['scoreTeamA'];
        $teamB_score = $_POST['scoreTeamB'];
        $total_score = $teamA_score . '-' . $teamB_score;

        include "connection.php";

        if ($link->connect_error) {
            die("Connection failed: " . $link->connect_error);
        }

        $sqlFetch = "SELECT * FROM match_table WHERE match_number = '$matchNumber'";
        $updateInfo = mysqli_query($link, $sqlFetch);
        $updateInfo = mysqli_fetch_assoc($updateInfo);

        $updateInfo['score'] = $total_score;

        $sql = "UPDATE match_table SET score = '$total_score' WHERE match_number = '$matchNumber'";

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
    <title>Update Matches</title>
    <link rel="icon" href="logo/football_1165249.png">
    <link rel="stylesheet" href="css/updateMatch.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="bg-info bg-opacity-50">
    <nav class="navbar navbar-expand-md shadow-sm bg-white px-3 sticky-md-top" style="font-size: small; font-weight: bold; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#Home">
                <img src="logo/Futb_l-removebg-preview.png" alt="Futbol" height="50">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="true" aria-label="Toggle navigation">
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

    <section class="mb-2">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12">
                    <form action="updateMatch.php" method="post">
                        <h3 class="text-center">Update Match</h3>
                        <!-- <div class="my-2">
                            <label for="date" class="fs-5 my-1">Select Date</label>
                            <input type="date" name="date" id="date" class="rounded-2 px-2 py-1 my-1">
                        </div> -->
                        <div>
                            <label for="matchNumber" class="fs-5 my-1">Match Number</label>
                            <select name="matchNumber" id="matchNumber" class="form-select my-2" style="width: 25%;" aria-label="Default select example">
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
                            <div class="text-center mb-3">
                                <label for="teamA" class="fs-5 mb-2">Team A</label>
                                <select name="teamA" id="teamA" class="form-select" aria-label="Default select example">
                                    <option value="" disabled selected>Select an option</option>
                                    <option value="CSC101" selected>CSC101</option>
                                    <option value="CSC203">CSC203</option>
                                </select>
                            </div>

                            <div class="mt-2 fs-5">
                                <div class="mb-3">
                                    <label for="scoreTeamA">Team A Score</label>
                                    <input type="number" name="scoreTeamA" id="scoreTeamA" placeholder="Enter Score">
                                </div>
                            </div>
                        </div>

                        <div class="mt-2">
                            <div class="text-center mb-3">
                                <label for="teamB" class="fs-5 mb-2">Team B</label>
                                <select name="teamB" id="teamB" class="form-select" aria-label="Default select example">
                                    <!-- <option value="" disabled selected>Select an option</option> -->
                                    <option value="CSC101">CSC101</option>
                                    <option value="CSC203" selected>CSC203</option>
                                </select>
                            </div>

                            <div class="mt-2 fs-5">
                                <div class="mb-3">
                                    <label for="scoreTeamB">Team B Score</label>
                                    <input type="number" name="scoreTeamB" id="scoreTeamB" placeholder="Enter Score">
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <input type="submit" class="px-3 py-1 rounded-4 mt-4" name="submit" value="UPDATE MATCH">
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
                                        Score has been updated successfully!
                                    </div>
                                </div>
                                </div>';
                        }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script>
    // Activate the toast using Bootstrap's JavaScript
        var toastEl = document.querySelector('.toast');
        var toast = new bootstrap.Toast(toastEl);
        toast.show();
    </script>
</body>

</html>

