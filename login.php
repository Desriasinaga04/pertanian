<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: center;
            width: 300px;
        }
        .container h2 {
            margin-bottom: 20px;
        }
        .container input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .container button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            border: none;
            color: #ffffff;
            border-radius: 4px;
            cursor: pointer;
        }
        .container button:hover {
            background-color: #218838;
        }
        .message {
            margin-bottom: 15px;
            color: red;
        }
        .toggle-link {
            color: #007bff;
            cursor: pointer;
        }
    </style>
    <script>
        function toggleForm(form) {
            document.getElementById('login-form').style.display = form === 'login' ? 'block' : 'none';
            document.getElementById('register-form').style.display = form === 'register' ? 'block' : 'none';
        }
    </script>
</head>
<style>
    body{
        background: linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)), url('image/pertanian1.webp');
        height: 80vh;
    }
    .container{
        background: azure;
    }
    </style>
<body>
    <div class="container">
        <?php
        if (isset($_GET['message'])) {
            echo "<p class='message'>" . htmlspecialchars($_GET['message']) . "</p>";
        }
        ?>
        <div id="login-form">
            <h2>Login</h2>
            <form action="login1.php" method="post">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Login</button>
            </form>
            <p>Don't have an account? <span class="toggle-link" onclick="toggleForm('register')">Register</span></p>
        </div>
        <div id="register-form" style="display: none;">
            <h2>Register</h2>
            <form action="register.php" method="post">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Register</button>
            </form>
            <p>Already have an account? <span class="toggle-link" onclick="toggleForm('login')">Login</span></p>
        </div>
    </div>
</body>
</html>