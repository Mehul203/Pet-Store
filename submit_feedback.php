<?php
// Start the session for displaying success/error messages
session_start();

// Database connection details
$servername = "localhost";  // Change if your database server is different
$username = "root";         // Your database username
$password = "";             // Your database password
$dbname = "pet_shop_db";    // The name of the database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize the message variable for success/error
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data from the POST request
    $name = $_POST['name'];
    $email = $_POST['email'];
    $feedback = $_POST['feedback'];

    // Prepare an SQL statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO feedback (name, email, feedback) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $feedback);  // "sss" means string data type for name, email, and feedback

    // Execute the statement and check if successful
    if ($stmt->execute()) {
        // Set a success message in the session
        $_SESSION['message'] = "Feedback submitted successfully!";
    } else {
        // Set an error message in the session if the query fails
        $_SESSION['message'] = "There was an error submitting your feedback.";
    }

    // Close the prepared statement
    $stmt->close();

    // Redirect to the same page to prevent form resubmission on refresh
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();  // Make sure to stop further script execution after the redirect
}

// Close the database connection
$conn->close();
?>

<h5 class="text-primary mb-4">Feedback</h5>

<!-- Show the success or error message here if it exists -->
<?php
// Check if there's a message in the session and display it
if (isset($_SESSION['message'])) {
    echo "<div id='message' class='alert alert-success'>" . $_SESSION['message'] . "</div>";

    // Clear the message from the session after displaying it
    unset($_SESSION['message']);
}
?>

<form action="submit_feedback.php" method="POST">
    <div class="form-group">
        <input type="text" name="name" class="form-control border-0" placeholder="Your Name" required="required" />
    </div>
    <div class="form-group">
        <input type="email" name="email" class="form-control border-0" placeholder="Your Email" required="required" />
    </div>
    <div class="form-group">
        <textarea name="feedback" class="form-control border-0" placeholder="Your Feedback" required="required"></textarea>
    </div>
    <div>
        <button class="btn btn-lg btn-primary btn-block border-0" type="submit">Submit Feedback</button>
    </div>
</form>
