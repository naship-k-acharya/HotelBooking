<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('connectiondb.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST["full_name"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user data into the database with the hashed password
    $getUser = mysqli_query($conn,"SELECT * FROM users");
    if(mysqli_num_rows($getUser) < 1){
        $sql = "INSERT INTO users (full_name, email, username, password,role) VALUES ('$full_name', '$email', '$username', '$hashed_password','1')";
        $query=mysqli_query($conn,$sql);
    }else{
        $sql = "INSERT INTO users (full_name, email, username, password) VALUES ('$full_name', '$email', '$username', '$hashed_password')";
        $query= mysqli_query($conn,$sql);
    }
    

    if ($query) {
          $_SESSION['loggedIn'] = true;
          $_SESSION['username'] = $username;
          header('location:index.php');
          exit();
      } else {
          $error = "Invalid.";
      }

    // Close the database connection
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            color: #333;
        }
        p {
            font-size: 16px;
            margin: 10px 0;
        }
        .success {
            color: green;
        }
        .error {
            color: red;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <h1>  SORRY, <img src="" alt=""></h1>
    <?php if (isset($message)) : ?>
        <p class="success"><i class="fas fa-check-circle fa-3x"></i>
        <br> 
        <br>

        <?php echo $message; ?></p>
    <?php elseif (isset($error)) : ?>
        <p class="error"><i class="fas fa-times-circle fa-3x"></i> 
        <br>
        <br>
        <?php echo $error; ?></p>
    <?php endif; ?>
</body>
</html>
