<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f2f5; 
            font-family: 'Arial', sans-serif;
        }

        .container {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            background-color: #ffffff; 
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); 
            margin-top: 100px; 
        }

        h1 {
            text-align: center;
            color: #1877f2; 
            font-size: 2rem;
            font-weight: bold;
        }

        label {
            font-weight: bold;
            color: #555555;
        }

        .form-control {
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .btn-primary {
            background-color: #1877f2; 
            border: none;
            font-size: 1rem;
            font-weight: bold;
        }

        .btn-primary:hover {
            background-color: #145dbf; 
        }

        .text-center {
            margin-top: 10px;
        }

        .text-center a {
            color: #1877f2;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .text-center a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <form action="proses.php?aksi=login" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" id="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Login</button>
        </form>
        <div class="text-center">
            <a href="#">Lupa kata sandi?</a>
        </div>
    </div>
</body>
</html>
