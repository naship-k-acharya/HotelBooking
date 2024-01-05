<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
require_once('connectiondb.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    

    // Query the database to find the user
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $hashed_password = $row["password"]; // Retrieve the stored hashed password

        // Verify the password using password_verify()
        if (password_verify($password, $hashed_password)) {
          
          $_SESSION['username']=$username;
          $message = "Login successful. Redirecting to index.html...";
        //   echo "<script>alert('$message'); window.location.href = 'index.php';</script>";
        header('location:index.php');
        $_SESSION['success'] = 'You are logged in successfully';
          exit();
      } else {
          $error = "Invalid username or password.";
      }
  } else {
      $error = "Invalid username or password.";
  }

    // Close the database connection
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Confirmation</title>
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
