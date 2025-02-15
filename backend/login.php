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
    if (count($errors) === 0) {
        $existUser = "SELECT * FROM users WHERE email=:email";
        $statement = $pdo->prepare($existUser);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        // print_r($row);
        // die();
        if ($row) {
            if ($email === "admin@admin.com" && password_verify($password, $row['password'])) {
                $_SESSION['admin'] = "Admin";
                $_SESSION['name'] = 'Admin'; //login user's name
                header("Location: admin-dashboard.php");
            } else {
                if (password_verify($password, $row['password'])) {
                    $_SESSION['user_id'] = $row['user_id'];
                    $_SESSION['name'] = $row['name']; //login user's name
                    
                    header("Location: index.php");
                } else {

                    $errors[] = "Wrong Password";
                }
            }
        } else {
            $errors[] = "Email Not Found";
        }
    } else {
        $errors[] = "Email Not Found";
    }
}

include "./layouts/header.php";
//include "./layouts/nav.php";
// include "./layouts/carousel.php";
?>
<main>
    <form action="login.php" method="post" class="w-50 my-5 m-auto shadow p-4 rounded">
        <h3 class="text-center">Login</h3>
        <?php include("./errors.php") ?>

        <div class="mb-3">
            <input type="email" placeholder="Email..." name="email" class="form-control">
        </div>
        <div class="mb-3">
            <input type="password" placeholder="Password..." name="password" class="form-control">
        </div>
        <input type="submit" class="btn btn-primary" name="login">

    </form>
</main>

<?php include './layouts/footer.php'  ?>