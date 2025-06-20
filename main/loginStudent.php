<?php
session_start();
include 'dbconn.php'; // ✅ Must come before any HTML output or echo
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Student Login - Debre Birhan University</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet" />

  <style>
    * {
      box-sizing: border-box;
    }

    body, html {
      margin: 0;
      padding: 0;
      height: 100%;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: #fff;
      overflow: hidden;
      position: relative;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    #bg-video {
      position: fixed;
      top: 70%;
      left: 50%;
      min-width: 100%;
      min-height: 100%;
      width: auto;
      height: auto;
      z-index: -1;
      transform: translate(-50%, -50%);
      object-fit: cover;
      filter: brightness(0.6);
    }

    .login-box {
      background: rgba(255, 255, 255, 0.15);
      border-radius: 20px;
      padding: 40px 30px;
      width: 100%;
      max-width: 400px;
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.3);
      text-align: center;
      animation: slideIn 0.8s ease-out forwards;
      z-index: 10;
      position: relative;
    }

    @keyframes slideIn {
      from {
        transform: translateY(-50px);
        opacity: 0;
      }
      to {
        transform: translateY(0);
        opacity: 1;
      }
    }

    .login-box h2 {
      font-size: 2.2em;
      margin-bottom: 20px;
      font-weight: bold;
      text-shadow: 0 0 8px rgba(0, 0, 0, 0.3);
    }

    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 12px 20px;
      margin-bottom: 20px;
      border-radius: 30px;
      border: none;
      background: rgba(0, 123, 255, 0.15);
      color: #fff;
      font-weight: bold;
      font-size: 15px;
      outline: none;
      box-shadow: inset 0 2px 5px rgba(0, 123, 255, 0.3);
    }

    input::placeholder {
      color: #cce6ff;
    }

    input:focus {
      background: rgba(0, 123, 255, 0.25);
      box-shadow: 0 0 8px rgba(0, 174, 255, 0.6);
    }

    button[type="submit"] {
      width: 100%;
      padding: 14px;
      margin-top: 15px;
      border: none;
      border-radius: 30px;
      background: linear-gradient(135deg, #00bfff, #007bff);
      color: white;
      font-weight: bold;
      font-size: 16px;
      cursor: pointer;
      transition: background 0.3s ease, box-shadow 0.3s ease;
      box-shadow: 0 6px 12px rgba(0, 123, 255, 0.4);
    }

    button[type="submit"]:hover {
      background: linear-gradient(135deg, #007bff, #00bfff);
      box-shadow: 0 8px 16px rgba(0, 174, 255, 0.5);
    }

    .footer-text {
      margin-top: 20px;
      font-size: 0.9em;
      color: #ddd;
    }
  </style>
</head>
<body>

  <!-- Background video -->
  <video autoplay muted loop playsinline id="bg-video">
    <source src="photo/ad.mp4" type="video/mp4" />
    Your browser does not support the video tag.
  </video>

  <!-- Login Box -->
  <div class="login-box">
    <h2>Student Login</h2>
    <form action="loginStudent2.php" method="POST">
      <input type="text" name="student_id" placeholder="Student ID" required />
      <input type="password" name="password" placeholder="Password" required />
      <button type="submit">Login</button>
    </form>

    <div class="footer-text">
      &copy; 2025 Debre Birhan University
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</body>
</html>
