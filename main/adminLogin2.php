<?php
session_start();
include 'dbconn.php'; // Make sure this connects to your database correctly

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $adminName = $_POST['adminName'];
    $adminPassword = $_POST['adminPassword'];

    // Use prepared statement for safety
    $stmt = $conn->prepare("SELECT * FROM admins WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $adminName, $adminPassword);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Valid admin
        $_SESSION['adminName'] = $adminName;
        header("Location: adminChart2.php");
        exit();
    } else {
        // Invalid login
        echo "<script>alert('Invalid Admin Name or Password'); window.location.href = 'adminLogin.php';</script>";
        exit();
    }
} else {
    header("Location: adminLogin2.php");
    exit();
}
?>
