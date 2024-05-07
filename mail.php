<?php
use PHPMailer\PHPMailer\PHPMailer;

require_once 'PHPMailer\src\Exception.php';
require_once 'PHPMailer\src\PHPMailer.php';
require_once 'PHPMailer\src\SMTP.php';

$mail = new PHPMailer(true);

$alert = "";
$emailSent = false; // Variable to track if email is sent successfully

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Set parameters from form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $guest = $_POST["guest"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $message = $_POST["message"];

    // Connect to MySQL database
    $conn = new mysqli("localhost", "root", "", "mukase_db");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO reservations (name, email, phone, number_of_guests, reservation_date, reservation_time, message) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssisss", $name, $email, $phone, $guest, $date, $time, $message);

    // Execute statement
    if ($stmt->execute()) {
        // Form data successfully inserted into database, now send email
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'example@gmail.com'; //Add mail to send request
            $mail->Password = ''; // Add account password
            $mail->SMTPSecure = 'tls';
            $mail->Port = '587';

            $mail->setFrom('example@gmail.com'); //Add mail to send request
            $mail->addAddress('example@gmail.com'); //Add mail to send request

            $mail->isHTML(true);
            $mail->Subject = 'Booking Received: ' . $name;
            $mail->Body = "Name: $name <br> Phone: $phone <br> Email: $email <br> Number of guests: $guest<br> Date: $date<br> Time: $time <br> Message: $message";

            $mail->send();
            $emailSent = true;
            $alert = "<div class='alert-success'><span>Booking Made</span></div>";
        } catch (Exception $e) {
            $alert = "<div class='alert-error'><span>" . $e->getMessage() . "</span></div>";
        }
    } else {
        $alert = "Error: " . $conn->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();

    // Redirect to home page
    header("Location: index.php");
    exit(); // Stop further execution
}
?>
