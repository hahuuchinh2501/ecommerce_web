<?php include('../includes/connect.php');?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>admin registration</title>
    <style>
        body {
            overflow: hidden;
        }
        
    </style>
</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5"> Admin Registration</h2>
    </div>
    <div class="row d-flex justify-content-center">
    <div class="col-lg-6 col-xl-5">
        <img src="../images/bg_ad.jpg" alt="Admin Registration" class="img-fluid">
    </div>
    <div class="col-lg-6 col-xl-4">
        <form action="" method="post">
            <div class="form-outline mb-4">
                <label for="username" class="form-label">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required="required" class="form-control">
            </div>
            <div class="form-outline mb-4">
                <label for="email" class="form-label">Email</label>
                <input type="text" id="email" name="email" placeholder="Enter your email" required="required" class="form-control">
            </div>
            <div class="form-outline mb-4">
    <label for="password" class="form-label">Password</label>
    <input type="password" id="password" name="password" placeholder="Enter your password" required="required" class="form-control">
</div>
<div class="form-outline mb-4">
    <label for="confirm_password" class="form-label">Confirm Password</label>
    <input type="password" id="confirm_password" name="confirm_password" placeholder="Enter your confirm_password" required="required" class="form-control">
</div>
<div>
    <input type="submit" class="bg-info py-2 px-3 border-0" name="admin_registration" value="Register">
    <p class="small">Don't you have an account? <a href="admin_login.php">Login</a></p>
</div>
        </form>
    </div>
</div>
</body>
</html>

<?php
// Add this to admin_registration.php after the form HTML

if(isset($_POST['admin_registration'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Validate password and confirm password match
    if($password != $confirm_password) {
        echo "<script>alert('Passwords do not match')</script>";
        exit();
    }

    // Check if username already exists
    $select_query = "SELECT * FROM admin_table WHERE admin_name = '$username' OR admin_email = '$email'";
    $result = mysqli_query($con, $select_query);
    $rows_count = mysqli_num_rows($result);
    
    if($rows_count > 0) {
        echo "<script>alert('Username or Email already exists')</script>";
    } else {
        // Insert new admin
        $insert_query = "INSERT INTO admin_table (admin_name, admin_email, admin_password) 
                         VALUES ('$username', '$email', '$hashed_password')";
        $sql_execute = mysqli_query($con, $insert_query);
        
        if($sql_execute) {
            echo "<script>alert('Admin registered successfully')</script>";
            echo "<script>window.open('admin_login.php', '_self')</script>";
        } else {
            echo "<script>alert('Registration failed: " . mysqli_error($con) . "')</script>";
        }
    }
}
?>