<?php
// Include the database connection file
include_once 'db.php';

// Check if the form is submitted using the POST method
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve username and hash the password using password_hash
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Validate and sanitize input (Note: Implement input validation and sanitation)

    // Insert into the database
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    $conn = 1; // Placeholder for the database connection (Update this with your actual connection)

    // Execute the SQL query
    $result = mysqli_query($conn, $sql);

    // Check if the query was successful
    if ($result) {
        header("Location: ../pages/login.php"); // Redirect to the login page
        exit(); // Stop further execution
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn); // Display error message if the query fails
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
