<?php
session_start();
require_once 'autoload.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $users = require 'users_data.php';
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (isset($users[$username]) && $users[$username]['password'] === $password) {
        $user = UserFactory::create($username, $users[$username]);
        $_SESSION['user'] = serialize($user);
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "❌ Incorrect username or password.";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body { font-family: Arial; background: #f2f2f2; display: flex; justify-content: center; align-items: center; height: 100vh; }
        form { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px #aaa; }
        input { display: block; margin-bottom: 10px; padding: 8px; width: 100%; }
        .error { color: red; margin-bottom: 10px; }
    </style>
</head>
<body>
    <form method="POST">
        <h2>🔐 Login</h2>
        <?php if ($error): ?>
            <div class="error"><?= $error ?></div>
        <?php endif; ?>
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
</body>
</html>
