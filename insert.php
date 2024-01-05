<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('connectiondb.php');
if(isset($_POST['register'])){
    $full_name = $_POST["full_name"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"]; 

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    $getUser = mysqli_query($conn,"SELECT * FROM users");
    if(mysqli_num_rows($getUser) < 1) {
        $sql = "INSERT INTO users (full_name, email, username, password,role) VALUES ('$full_name', '$email', '$username', '$hashed_password','1')";
        $query=mysqli_query($conn,$sql);
    }else{
        $sql = "INSERT INTO users (full_name, email, username, password) VALUES ('$full_name', '$email', '$username', '$hashed_password')";
        $query= mysqli_query($conn,$sql);
    }
    if($query){
        $_SESSION['loggedIn'] = true;
        $_SESSION['username'] = $username;
        header('location:index.php');
        exit();
    }else{
        echo "unable to signup";
    }
}

if(isset($_POST['logIn'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $hashed_password = $row["password"]; 
        if (password_verify($password, $hashed_password)) {
          $_SESSION['username'] = $username;
          $_SESSION['loggedIn'] = true;
        header('location:index.php');
          exit();
      } else {
          $error = "Invalid username or password.";
      }
  } else {
      $error = "Invalid username or password.";
  }
}


if (isset($_POST['bookNow'])) {
    // Retrieve the form data
    $userName = $_SESSION['username'];
    $roomtype = $_POST["roomtype"];
    $checkInDate = $_POST["check_in_date"];
    $checkOutDate = $_POST["check_out_date"];
    
    
    if (isset($_FILES["photo"])) {
        $photo = $_FILES["photo"]['name'];
        $file_temp = $_FILES['photo']['tmp_name'];
        $destination_path = 'image/'.$photo;
        move_uploaded_file($file_temp, $destination_path);   
    }
    if($userName){
        $mysqli = mysqli_query($conn,'INSERT INTO `bookings`(`roomtype`, `check_in_date`, `check_out_date`, `username`,`image`) VALUES ("$roomtype","$checkInDate","$checkOutDate","$userName","$photo")');
        $sql = "INSERT INTO `bookings`(`roomtype`, `check_in_date`, `check_out_date`, `username`, `image`) VALUES ('$roomtype','$checkInDate','$checkOutDate','$userName','$photo')";
        $query = mysqli_query($conn,$sql);
        
    }else{
        $_SESSION['error'] = 'Please login first before booking';
        header('location:login.html');
        exit;
    }
    if ($query) {
        $message = "Hello, " . $_SESSION['username'] . "! Your booking for '$roomtype' from $checkInDate to $checkOutDate has been successfully submitted.";
    } else {
        $error = "Error submitting booking:" . $stmt->error;
    }



    // $stmt->close();
}
$conn->close();
?>
    <style>
        body {
            font-family: Arial, sans-serif;
            width: 100vw;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
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
