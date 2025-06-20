<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password - Debre Birhan University</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Inter', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
            box-sizing: border-box;
        }
        .change-password-box {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            max-width: 450px;
            width: 100%;
            border: 1px solid #e0e0e0;
        }
        .change-password-box h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
            font-weight: 600;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            font-weight: 500;
            color: #555;
            margin-bottom: 8px;
        }
        .form-control {
            border-radius: 8px;
            padding: 12px 15px;
            height: auto;
            font-size: 16px;
            border: 1px solid #ced4da;
            box-shadow: inset 0 1px 2px rgba(0,0,0,0.075);
            transition: border-color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }
        .form-control:focus {
            border-color: #80bdff;
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            font-weight: bold;
            padding: 12px 25px;
            border-radius: 25px;
            width: 100%;
            font-size: 18px;
            transition: background-color 0.3s ease, border-color 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 10px rgba(0, 123, 255, 0.2);
        }
        .btn-primary:hover,
        .btn-primary:focus {
            background-color: #0056b3;
            border-color: #004085;
            box-shadow: 0 6px 15px rgba(0, 123, 255, 0.3);
        }
        @media (max-width: 768px) {
            .change-password-box {
                margin: 10px;
                padding: 25px;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="change-password-box">
            <h2>Change Password</h2>
            <form action="changepassword2.php" method="POST">
                <div class="form-group">
                    <label for="id_number">ID Number</label>
                    <input
                        type="text"
                        class="form-control"
                        id="id_number"
                        name="id_number"
                        placeholder="Enter your ID number"
                        required
                        autofocus
                    />
                </div>
                <div class="form-group">
                    <label for="newPassword">New Password</label>
                    <input
                        type="password"
                        class="form-control"
                        id="newPassword"
                        name="newPassword"
                        placeholder="Enter new password"
                        required
                        minlength="8"
                    />
                </div>
                <button type="submit" class="btn btn-primary">Update Password</button>
            </form>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
