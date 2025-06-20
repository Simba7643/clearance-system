<?php
include 'dbconn.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Admin Login - Debre Birhan University</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    * {
      box-sizing: border-box;
    }
    html, body {
      height: 100%;
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      overflow: hidden;
    }

    #bg-video {
      position: fixed;
      top: 0;
      left: 0;
      min-width: 100%;
      min-height: 100%;
      width: auto;
      height: auto;
      z-index: -2;
      object-fit: cover;
      filter: brightness(0.6);
    }

    body::before {
      content: "";
      position: fixed;
      top: 0; left: 0; right: 0; bottom: 0;
      background: rgba(0, 0, 0, 0.5);
      z-index: -1;
    }

    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .login-box {
      background: rgba(255, 255, 255, 0.08);
      border-radius: 15px;
      padding: 40px;
      width: 360px;
      text-align: center;
      color: white;
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.2);
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.5);
      z-index: 1;
    }

    .login-box h2 {
      margin-bottom: 25px;
      font-weight: bold;
      font-size: 24px;
      letter-spacing: 1px;
    }

    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 12px 20px;
      margin: 10px 0;
      border-radius: 30px;
      border: none;
      background: rgba(255, 255, 255, 0.1);
      color: white;
      font-weight: bold;
      font-size: 15px;
      outline: none;
    }

    input::placeholder {
      color: #ddd;
    }

    input:focus {
      background: rgba(255, 255, 255, 0.2);
      box-shadow: 0 0 5px rgba(255, 255, 255, 0.6);
    }

    button {
      width: 100%;
      padding: 14px;
      margin-top: 15px;
      border: none;
      border-radius: 30px;
      background: linear-gradient(135deg, #0072ff, #00c6ff);
      color: white;
      font-weight: bold;
      font-size: 16px;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    button:hover {
      background: linear-gradient(135deg, #00c6ff, #0072ff);
    }

    .footer {
      margin-top: 20px;
      font-size: 13px;
      color: #bbb;
    }
  </style>
</head>
<body>

  <!-- Background video -->
  <video autoplay muted loop playsinline id="bg-video">
    <source src="photo/ac.mp4" type="video/mp4" />
    Your browser does not support the video tag.
  </video>

  <div class="login-box">
    <h2>Admin Login</h2>
    <form action="adminLogin2.php" method="POST">
      <input type="text" name="adminName" placeholder="ADMIN NAME" required autocomplete="off" />
      <input type="password" name="adminPassword" placeholder="ADMIN PASSWORD" required autocomplete="off" />
      <button type="submit">Login</button>
    </form>
    <div class="footer">Debre Birhan University &copy; 2025</div>
  </div>

</body>
</html>
