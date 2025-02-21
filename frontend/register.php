<?php
include './database/db.php';
//include 'errors.php';
$now = new DateTime('now');
$now = $now->format('Y-m-d H:i:s');
$errors = [];
if (isset($_POST['register'])) {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    if (strlen($password) < 5) {
        $errors[] = "Passwords must be greater than 5 characters";
    }
    $cpassword = isset($_POST['confirmPassword']) ? trim($_POST['confirmPassword']) : '';
    if (strcmp($password, $cpassword) == 0) {
        $password = password_hash($password, PASSWORD_BCRYPT);
    } else {
        $errors['confirm-password'] = "Password do not match";
    }
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address']);
    $role = trim($_POST['role']);

    empty($name) ? $errors['name'] = "Name Required" : "";
    empty($email) ? $errors['email'] = "Email Required" : "";
    empty($phone) ? $errors['phone'] = "Phone Required" : "";
    empty($address) ? $errors['address'] = "Address Required" : "";
    empty($role) ? $errors['role'] = "Role Required" : "";

    if (count($errors) === 0) {
        $existUser = "SELECT * FROM users WHERE email=:email";
        $statement = $pdo->prepare($existUser);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $errors[] = "Email already exists";
        } else {
            $sql = "INSERT INTO users (name, email, password, phone, address, role, created_at)
            VALUES (:name, :email, :password, :phone, :address, :role, :created_at)";
            $statement = $pdo->prepare($sql);
            $statement->bindParam(':name', $name, PDO::PARAM_STR);
            $statement->bindParam(':email', $email, PDO::PARAM_STR);
            $statement->bindParam(':password', $password, PDO::PARAM_STR);
            $statement->bindParam(':phone', $phone, PDO::PARAM_STR);
            $statement->bindParam(':address', $address, PDO::PARAM_STR);
            $statement->bindParam(':role', $role, PDO::PARAM_STR);
            $statement->bindParam(':created_at', $now, PDO::PARAM_STR);

            $res = $statement->execute();
            if ($res) {
                header("Location: login.php");
                exit();
            } else {
                $errors[] = "Server error occurred";
            }
        }
    }
}

include 'layouts/header.php';
include 'components/nav.php';

include 'components/register.php';
        
include 'layouts/footer.php';