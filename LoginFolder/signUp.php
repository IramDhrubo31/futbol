
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signUp.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <title>Register</title>
    <link rel="icon" href="../logo/football_1165249.png">
</head>

<body>
    <div class="d-flex justify-content-between">
        <div>
            <a href="../index.php">
                <button class="btn text-warning fw-medium bg-danger bg-opacity-75">Back To Home Page</button>
            </a>
        </div>
        <div>
            <a href="../adminLogin.html">
                <button class="btn text-warning fw-medium bg-success bg-opacity-75">Move To Admin Login</button>
            </a>
        </div>
    </div>
    
    <div class="container">
        <div class="shadow-2-strong">
            <div class="dark d-flex align-items-center">
                <div class="container my-5">
                    <div class="row justify-content-center">
                        <div class="col-xl-5 col-md-8 ">
                        
                            <form action="../userRegDataStore.php" method="post" enctype="multipart/form-data"
                                class="bg-white  rounded-5 shadow-5-strong p-5">
                                <img src="../logo/Futb_l-removebg-preview.png" class="mx-auto d-block img-fluid" width="50%">
        
                                <div class="form-outline mb-4">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="input form-control" name="namee" id="name" required="" placeholder="Enter your full name">
                                </div>
        
                                <div class="form-outline mb-4">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="input form-control" name="userName" required="" id="username" placeholder="Enter your username">
                                </div>
                                <div class="form-outline mb-4">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="input form-control" name="email" id="email" required="" placeholder="Enter your email address">
                                </div>
                                <div class="form-outline mb-4">
                                    <label for="number" class="form-label">Contact Number</label>
                                    <input type="number" class="input form-control" name="contactNumber" required="" id="number" placeholder="Enter your contact number">
                                </div>
                                <div class="form-outline mb-4">
                                    <label for="pass" class="form-label">Password</label>
                                    <input type="password" class="input form-control" name="password" required="" id="pass" placeholder="***********">
                                </div>
                                <div class="form-outline mb-4">
                                    <label for="confirmPass" class="form-label">Confirm Password</label>
                                    <input type="password" class="input form-control" name="c_password" required="" id="confirmPass" oninput="checkPasswordMatch()" placeholder="***********">
                                    <span id="passwordMatchError" class="error-message"></span>
                                </div>
        
                                <div id="chechBox" class="d-flex justify-content-between">
                                    <div class="mb-5 w-50">
                                        <label for="gender">Gender</label>
                                        <select gender="gender" name="gender" id="gender" class="form-select-inline">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>

                                    <div class="mb-5 w-50 ">
                                        <label for="bloodGroup">Blood Group</label>
                                        <select gender="bloodGroup" name="bloodGroup" id="bloodGroup" class="form-select-inline">
                                            <option value="A+">A+</option>
                                            <option value="O+">O+</option>
                                            <option value="O-">O-</option>
                                            <option value="B+">B+</option>
                                            <option value="B-">B-</option>
    
                                        </select>
                                    </div>
                                </div>
        
        
                                <div class="mb-5 w-50">
                                    <label for="profileImage">Profile Image</label>
                                    <input type="file" id="profileImage" name="profileImage" accept="image/*">
                                </div>
        
                                <div class="input-field">
                                    <input type="submit" class="submit" name="submit" value="Sign Up">
                                </div>

                                <div class="row text-center mt-2">
                                    <span>Already have an account? <a href="login.html">Log in here</a></span>
                                </div>
        
                            </form>
                        </div>
                    </div>
                </div>
        
            </div>
    
    </div>

    <script>
        function checkPasswordMatch() {
            var password = document.getElementById("pass").value;
            var c_password = document.getElementById("confirmPass").value;
            var errorSpan = document.getElementById("passwordMatchError");
    
            if (password == c_password) {
                errorSpan.innerHTML = "Passwords match!";
               
            } else {
                errorSpan.innerHTML = "Passwords do not match.";
                
            }
        }
    </script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>


</html>