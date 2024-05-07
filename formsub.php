<?php
$alert = "";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to MySQL database
    $conn = new mysqli("localhost", "root", "", "mukase_db");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO reservations (name, email, phone, number_of_guests, reservation_date, reservation_time, message) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssisss", $name, $email, $phone, $guests, $date, $time, $message);

    // Set parameters
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $guests = $_POST["guest"];
    $date = date("Y-m-d", strtotime($_POST["date"]));
    $time = $_POST["time"];
    $message = $_POST["message"];

    // Execute statement
    if ($stmt->execute()) {
        $alert = "Reservation successfully submitted!";
        
        // Close statement and connection
        $stmt->close();
        $conn->close();

        // Redirect to mail.php with form data
        header("Location: mail.php?name=$name&email=$email&phone=$phone&guest=$guests&date=$date&time=$time&message=$message");
        exit();
    } else {
        $alert = "Error: " . $conn->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
