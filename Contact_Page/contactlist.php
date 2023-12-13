<?php
session_start();
if (!$_SESSION['name']=="admin"){
 header('location:login.html');
}

$servername = "localhost";
$username = "root";
$password = "";
$futbol = "contact_list_table";

$conn = new mysqli($servername, $username, $password, $futbol);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else{
    $sql = 'select * from contact';
    $res = mysqli_query($conn,$sql);
    echo mysqli_num_rows($res);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>List</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="contact.css">
</head>

<body>
  <section class="list d-flex flex-column align-items-center justify-content-center">
    <h1 class="mb-5 mt-5 text-white"> Contact List</h1>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <table id="example" class="table table-striped">
            <thead>
              <tr>
                <th class="table-dark">#</th>
                <th class="table-primary">User Name</th>
                <th class="table-secondary">User Id</th>
                <th class="table-success">Email</th>
                <th class="table-danger">Message</th>
                <th class="table-secondary">Action</th>
              </tr>

            </thead>

            <tbody>

        <?php
        if (mysqli_num_rows($res) > 0) {
            while ($rows = mysqli_fetch_assoc($res)) {
                $id = $rows["id"];
                echo ' <tr>
                <td>' .$rows["userName"].'</td>
                <td>' .$rows["email"].'</td>
                <td>' .$rows["contactNumber"].'</td>
                <td>' .$rows["message"].'</td>
                <td><a class="btn btn-danger" href='."contactdelete.php?id=".$id.'>Delete</a></td>

            </tr>
                ';
            }
        }
            ?>
           
<!-- <td class="table-secondary"><a class="btn ">Delete</a></td> -->
        
              

            </tbody>
          </table>
        </div>
      </div>
    </div>

  </section>
</body>

</html>