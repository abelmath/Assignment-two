<?php
// Include the database connection file
include_once 'db.php';

// Check if the form is submitted using the POST method
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate and sanitize input (Note: Implement input validation and sanitation)

    // Check user credentials in the database
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $conn = 1; // Placeholder for the database connection (Update this with your actual connection)

    // Execute the SQL query
    $result = mysqli_query($conn, $sql);

    // Check if the query was successful and if the user exists
    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch the user data
        $row = mysqli_fetch_assoc($result);

        // Verify the password using password_verify
        if (password_verify($password, $row['password'])) {
            // Successful login
            session_start(); // Start a new session
            $_SESSION['username'] = $username; // Store the username in the session
            header("Location:dashboard.php"); // Redirect to the dashboard page
            exit(); // Stop further execution
        } else {
            echo "Incorrect password"; // Display error message for incorrect password
        }
    } else {
        echo "User not found"; // Display error message for user not found
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
