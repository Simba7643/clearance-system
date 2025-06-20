<?php
session_start();
include 'dbconn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $studentId = $_POST['student_id'];
    $password = $_POST['password'];

    // Check student credentials
    $stmt = $conn->prepare("SELECT password, name FROM student_penalties WHERE student_id = ?");
    $stmt->bind_param("s", $studentId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $student = $result->fetch_assoc();

        // Plain text password check (replace with password_verify if using hashes)
        if ($password === $student['password']) {
            // Valid login
            $_SESSION['studentId'] = $studentId;
            $_SESSION['studentName'] = $student['name'];

            header("Location: studentChart.php");
            exit;
        } else {
            // Invalid password
            echo "<script>alert('Invalid Student ID or Password'); window.location.href='login.html';</script>";
            exit;
        }
    } else {
        // Invalid student ID
        echo "<script>alert('Invalid Student ID or Password'); window.location.href='loginStudent.php';</script>";
        exit;
    }
} else {
    header("Location: studentChart.php");
    exit;
}
?>
