<?php
    session_start();
    require 'db.php';

    $rating = $_POST['rating'];
    $review = $_POST['comment'];
    $name = $_SESSION['Name'];
    $pid = $_GET['pid'];

    // Prepare an SQL statement for execution
    $stmt = $conn->prepare("INSERT INTO review (pid, name, rating, comment) VALUES (?, ?, ?, ?)");

    // Bind variables to the prepared statement as parameters
    $stmt->bind_param("ssis", $pid, $name, $rating, $review);

    // Execute the prepared statement
    if ($stmt->execute()) {
        // Redirect on success
        header("Location: review.php?pid=".$pid);
    } else {
        // Print the error
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
?>
