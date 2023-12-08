<?php
function displayRoomInformation() {
    // Assume this function retrieves room information from the database
    // and displays it in a form for the user to choose
    echo '<form method="post" action="">';
    echo '<label for="checkin">Check-in date:</label>';
    echo '<input type="date" id="checkin" name="checkin" required><br>';

    echo '<label for="checkout">Check-out date:</label>';
    echo '<input type="date" id="checkout" name="checkout" required><br>';

    echo '<label for="roomType">Room Type:</label>';
    echo '<select id="roomType" name="roomType" required>';
    echo '<option value="standard">Standard</option>';
    echo '<option value="deluxe">Deluxe</option>';
    echo '<option value="suite">Suite</option>';
    echo '</select><br>';

    echo '<label for="quantity">Quantity:</label>';
    echo '<input type="number" id="quantity" name="quantity" min="1" value="1" required><br>';

    echo '<label for="name">Name:</label>';
    echo '<input type="text" id="name" name="name" required><br>';

    echo '<label for="email">Email:</label>';
    echo '<input type="email" id="email" name="email" required><br>';

    echo '<input type="submit" value="Reserve">';
    echo '</form>';
}

function processReservation() {
    // Assume this function processes the reservation and saves it to the database
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $roomType = $_POST['roomType'];
    $quantity = $_POST['quantity'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Implement reservation processing logic and database insertion here
    // ...

    // Display confirmation message
    echo '<h3>Reservation Confirmed</h3>';
    echo '<p>Name: ' . $name . '</p>';
    echo '<p>Email: ' . $email . '</p>';
    echo '<p>Check-in Date: ' . $checkin . '</p>';
    echo '<p>Check-out Date: ' . $checkout . '</p>';
    echo '<p>Room Type: ' . $roomType . '</p>';
    echo '<p>Quantity: ' . $quantity . '</p>';
}
?>
