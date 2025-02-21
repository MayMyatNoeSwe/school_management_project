<?php
include "./database/db.php";

if (isset($_POST['reset'])) {
    $email = trim($_POST['email']);
    $token = trim($_POST['token']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    if (empty($email) || empty($token) || empty($password) || empty($confirm_password)) {
        $error = "All fields are required";
    } else if ($password !== $confirm_password) {
        $error = "Passwords do not match";
    } else {
        $query = "SELECT * FROM users WHERE email = ? AND reset_token = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$email, $token]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            $query = "UPDATE users SET password = ?, reset_token = ? WHERE email = ?";
            $stmt = $pdo->prepare($query);
            $stmt->execute([password_hash($password, PASSWORD_DEFAULT), null, $email]);
            header("Location: login.php");
            exit();
        } else {
            $error = "Invalid email or token";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>
    <h1>Reset Password</h1>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?= $error ?></p>
    <?php endif; ?>
    <form action="" method="post">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required><br>
        <label for="token">Token</label>
        <input type="text" id="token" name="token" required><br>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required><br>
        <label for="confirm_password">Confirm Password</label>
        <input type="password" id="confirm_password" name="confirm_password" required><br>
        <button type="submit" name="reset">Reset Password</button>
    </form>
</body>
</html>
