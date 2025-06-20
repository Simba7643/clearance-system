
        
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Welcome - Debre Birhan University Clearance</title>
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-theme.min.css">
  <style>
    body {
  /* Old background image removed */
  font-family: 'Roboto', sans-serif;
  margin: 0;
  padding: 0;
  overflow-x: hidden;
  position: relative;
}

.video-bg {
  position: fixed;
  top: 0; left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  z-index: -1;
  opacity: 0.7; /* Optional: makes form more visible */
}
    

    .marquee-bar {
      background: rgba(0, 0, 0, 0.6);
      padding: 10px 0;
      text-align: center;
      overflow: hidden;
      white-space: nowrap;
      box-shadow: 0 4px 10px rgba(0,0,0,0.3);
    }

    .marquee-bar span {
      display: inline-block;
      padding-left: 10%;
      animation: marquee 20s linear infinite;
      font-size: 1.1em;
      color: #f1f1f1;
      font-weight: bold;
    }

    @keyframes marquee {
      0%   { transform: translateX(0%); }
      100% { transform: translateX(-100%); }
    }

    .glass-container {
      position: absolute;
      top: 1000%;
      left: 50%;
      transform: translate(-50%, -50%);
      background: rgba(255, 255, 255, 0.15);
      border-radius: 15px;
      padding: 40px;
      text-align: center;
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
      width: 80%;
      max-width: 600px;
    }

    h1 {
      font-size: 2.5em;
      font-weight: bold;
      text-shadow: 0 0 10px rgba(0,0,0,0.5);
      margin-bottom: 15px;
    }

    .slider {
      font-size: 1.2em;
      font-weight: 600;
      margin-bottom: 30px;
      color: #eee;
    }

    .btn-clearance {
      width: 100%;
      padding: 15px;
      font-size: 1.15em;
      border-radius: 30px;
      margin-bottom: 20px;
      font-weight: bold;
      border: none;
      text-transform: uppercase;
      transition: all 0.3s ease;
      box-shadow: 0 5px 10px rgba(0,0,0,0.4);
    }

    .btn-admin {
      background: linear-gradient(to right, #2c3e50, #000000);
      color: #f9f9f9;
    }
    .btn-admin:hover {
      background: linear-gradient(to right, #000000, #2c3e50);
    }

    .btn-student {
      background: linear-gradient(to right, #1e1e1e, #3c3c3c);
      color: #ffffff;
    }
    .btn-student:hover {
      background: linear-gradient(to right, #000000, #1a1a1a);
    }

    footer {
      position: absolute;
      bottom: 20px;
      width: 100%;
      text-align: center;
      font-size: 0.9em;
      color: #f0f0f0;
      text-shadow: 0 0 5px rgba(0,0,0,0.4);
    }

    @media (max-width: 480px) {
      .glass-container {
        padding: 30px 20px;
      }
      h1 {
        font-size: 2em;
      }
    }
  </style>
</head>
<body>

  <div class="marquee-bar">
    <span>Welcome to Debre Birhan University — Excellence in Education, Innovation, and Community Service since 2007 E.C. 🌟</span>
  </div>

  <div class="glass-container">
    <h1>Debre Birhan University</h1>
    <div class="slider">Student Clearance System Portal</div>
    <a href="adminLogin.php" class="btn btn-clearance btn-admin">Login as Admin</a>
    <a href="loginStudent.php" class="btn btn-clearance btn-student">Login as Student</a>
  </div>
<video class="video-bg" autoplay muted loop>
  <source src="photo/ac.mp4" type="video/mp4">

</video>
  <footer>
    
  </footer>

  <script src="assets/jquery/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
