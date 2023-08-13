<?php
// starting the session
session_start();
include("partials/connect.php");
if(isset($_POST['signin'])){
    $username=$_POST['username'];
    $password=$_POST['password'];

    // query
    $select_query="Select * from `user_data` where username='$username'";
    $result=mysqli_query($con,$select_query);
    $fetch_data=mysqli_fetch_assoc($result);
    // echo $fetch_data['username'];
    $num_rows=mysqli_num_rows($result);
    // echo $num_rows;
    if($num_rows>0){
        if(password_verify($password,$fetch_data['password'])){
            $_SESSION['username']=$username;
            echo "<script>alert('You have successfully logged in')</script>";
            echo "<script>window.open('home.php','_self')</script>";
        }else{
            echo "<script>alert('Invalid credentials')</script>";
            echo "<script>window.open('signin.php','_self')</script>";
        }
    }else{
        echo "<script>alert('Invalid credentials')</script>";
        echo "<script>window.open('signin.php','_self')</script>";
    }


}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- stylesheet -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container d-flex align-items-center justify-content-center">
        <div class="card signin_card">
            <!-- card header -->
            <div class="card-header">
                <h3 class="text-center">Sign In</h3>
            </div>
            <!-- card body -->
            <div class="card-body">
                <form action="" method="post">
                    <!-- first field -->
                    <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user"></i></span>
                            <input type="text" class="form-control" placeholder="Enter your username" required="required"  autocomplete="off" name="username" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <!-- second field -->
                    <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
                            <input type="password" class="form-control" placeholder="Enter your password" required="required"  autocomplete="off" name="password" aria-label="password" aria-describedby="basic-addon1">
                    </div>
                    <!-- signup button -->
                    <div class="form-group">
                        <input type="submit" name="signin" value="Sign In" class="btn registration_btn">
                    </div>
                </form>

            </div>
            <!-- card footer -->
            <div class="card-footer text-center text-light signin">
                Don't have an account? <a href="index.php">Sign Up</a>
            </div>
        </div>
    </div>
</body>
</html>