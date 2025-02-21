<?php
session_start();
include "./database/db.php";
$now = new DateTime('now');
$now = $now->format('Y-m-d H:i:s');
$errors = [];

if (isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    empty($email) ? $errors[] = "Email Required" : "";
    empty($password) ? $errors[] = "Password Required" : "";
    if (count($errors) === 0) {
        $existUser = "SELECT * FROM users WHERE email=:email";
        $statement = $pdo->prepare($existUser);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        // print_r($row);
        // die();
        if ($row) {
            
                if ($email === $row['email'] && password_verify($password, $row['password'])) {
                    $_SESSION['user_id'] = $row['user_id'];
                    $_SESSION['name'] = $row['name']; //login user's name
                    
                    header("Location: index.php");
                } else {

                    $errors[] = "Wrong Password";
                }
            
        } else {
            $errors[] = "Email Not Found";
        }
    } else {
        $errors[] = "Email Not Found";
    }
}





include 'layouts/header.php';
include 'components/nav.php';

include 'components/login.php';

include 'layouts/footer.php';