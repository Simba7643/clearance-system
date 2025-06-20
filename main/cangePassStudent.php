<?php
session_start();
require 'dbconn.php';

if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
    header("Location: admin_login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_number = trim($_POST['id_number'] ?? '');
    $newPassword = trim($_POST['newPassword'] ?? '');

    if (empty($id_number) || empty($newPassword)) {
        die("<h3>Error: Both ID Number and new password are required.</h3>");
    }

    if (strlen($newPassword) < 8) {
        die("<h3>Error: New password must be at least 8 characters long.</h3>");
    }

    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    $sql = "UPDATE admins SET password = ? WHERE id_number = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ss", $hashedPassword, $id_number);

        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                echo "<h3>Password updated successfully!</h3>";
            } else {
                echo "<h3>Warning: No user found with that ID Number, or the new password was identical to the old one.</h3>";
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
