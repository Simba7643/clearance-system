<?php

include  'dbconn.php';



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username'] ?? '');
    $newPassword = trim($_POST['newPassword'] ?? '');

    if (empty($username) || empty($newPassword)) {
        die("<h3>Error: All fields are required.</h3>");
    }

    if (strlen($newPassword) < 8) {
        die("<h3>Error: New password must be at least 8 characters long.</h3>");
    }

    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    $sql = "UPDATE admins SET password = ? WHERE username = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ss", $hashedPassword, $username);

        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                 header("Location: adminlogin.php");
            } else {
                echo "<h3>Warning: No user found with that username, or the new password was identical to the old one.</h3>";
            }
        } else {
            error_log("Error executing password update statement: " . $stmt->error);
            echo "<h3>Error: Failed to update password. Please try again.</h3>";
        }
        $stmt->close();
    } else {
        error_log("Error preparing password update statement: " . $conn->error);
        echo "<h3>Error: A server error occurred. Please try again later.</h3>";
    }

    $conn->close();
} else {
    echo "<h3>Invalid request method. This page should be accessed via a form submission.</h3>";
}
?>