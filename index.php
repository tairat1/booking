<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Reservation System</title>
</head>
<body>

<h2>Welcome to Room Reservation System</h2>

<!-- Display room information and reservation form -->
<?php
 session_start();
 if (isset($_SESSION["Username"])){
   
 
 ?>
 <span style="color: brown;">
 <?php echo $_SESSION["Username"]."<br>"; 
 echo $_SESSION["status"]."&nbsp;สถานะ"; ?>
 </span>
    <button ><a href="login/logout_db.php">logout</a></button>
 <?php
include 'functions.php';
// Display room information
displayRoomInformation();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process reservation
    processReservation();
}
 } else{
    Header("Location: ./login.php");
 }
?>

</body>
</html>