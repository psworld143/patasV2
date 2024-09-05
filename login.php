<?php
include 'includes/dbcon.php'; // Include database connection
session_start(); // Start the session

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize user input
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare the SQL query
    $query = "SELECT id FROM admin_users WHERE username = ? AND password = ?";

    // Initialize prepared statement
    if ($stmt = $con->prepare($query)) {
        // Bind parameters
        $stmt->bind_param("ss", $username, $password);

        // Execute the query
        $stmt->execute();

        // Bind result variables
        $stmt->bind_result($user_id);

        // Fetch the result
        if ($stmt->fetch()) {
            // Store user ID in session
            $_SESSION['id'] = $user_id;

            // Redirect to dashboard
            header('Location: tabulator/index.php');
            exit();
        } else {
            // Handle invalid credentials
            $_SESSION['error'] = "Invalid username or password.";
            header('Location: index.php'); // Redirect back to the login page
            exit();
        }

        // Close statement
        $stmt->close();
    } else {
        // Handle SQL prepare error
        $_SESSION['error'] = "Error preparing statement: " . $con->error;
        header('Location: index.php'); // Redirect back to the login page
        exit();
    }

    // Close connection
    $con->close();
}
?>
