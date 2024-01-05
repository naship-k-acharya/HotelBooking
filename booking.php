<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('connectiondb.php');

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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Booking Confirmation</title>
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
    <h1>  Booking Confirmation <img src="" alt=""></h1>
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
