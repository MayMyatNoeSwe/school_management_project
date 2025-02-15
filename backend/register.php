<?php
include './database/db.php';
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
    $cpassword = trim($_POST['cpassword']);
    if (strcmp($password, $cpassword) == 0) {
        $password = password_hash($password, PASSWORD_BCRYPT);
    } else {
        $errors['confirm-password'] = "Password do not match";
    }
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address']);
    empty($name) ? $errors['name'] = "Name Required" : "";
    empty($email) ? $errors['email'] = "Email Required" : "";
    empty($phone) ? $errors['phone'] = "Phone Required" : "";
    empty($address) ? $errors['address'] = "Address Required" : "";
    if (count($errors) === 0) {
        $existUser = "SELECT * FROM users WHERE email=:email";
        $statement = $pdo->prepare($existUser);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $errors[] = "Email already exists";
        } else {
            $sql = "INSERT INTO users (name, email, password, phone, address, created_at)
            VALUES (:name, :email, :password, :phone, :address, :created_at)";
            $statement = $pdo->prepare($sql);
            $statement->bindParam(':name', $name, PDO::PARAM_STR);
            $statement->bindParam(':email', $email, PDO::PARAM_STR);
            $statement->bindParam(':password', $password, PDO::PARAM_STR);
            $statement->bindParam(':phone', $phone, PDO::PARAM_STR);
            $statement->bindParam(':address', $address, PDO::PARAM_STR);
            $statement->bindParam(':created_at', $now, PDO::PARAM_STR);

            $res = $statement->execute();
            if ($res) {
                header("Location: login.php");
            } else {
                die('server error');
            }
            exit();
        }
    } else {
        $errors[] = "Insert Error";
    }
}


include './layouts/header.php';

?>
<main>
    <form action="register.php" method="post" class="w-50 my-5 m-auto shadow p-4 rounded">
        <h3 class="text-center">Register page</h3>
        <?php include "./errors.php" ?>
        <div class="mb-3">
            <input type="text" placeholder="Name..." name="name" class="form-control">

            <span class="text-danger"> <?= $errors['name'] ?? " " ?></span>
        </div>
        <div class="mb-3">
            <input type="email" placeholder="Email..." name="email" class="form-control">
        </div>
        <div class="mb-3">
            <input type="password" placeholder="Password..." name="password" class="form-control">
        </div>
        <div class="mb-3">
            <input type="password" placeholder="Confirm Password..." name="cpassword" class="form-control">
        </div>

        <span class="text-danger"> <?= $errors['confirm-password'] ?? " " ?></span>
        <select class="form-select mb-3" required>
            <option value="">Select Role</option>
            <option>admin</option>
            <option>teacher</option>
            <option>student</option>
            <option>parent</option>
        </select>
        <div class="mb-3">
            <input type="tel" placeholder="Phone..." name="phone" class="form-control">
        </div>
        <div class="mb-3">
            <textarea name="address" class="form-control" placeholder="Your Address"></textarea>
        </div>
        <input type="submit" class="btn btn-primary" name="register">

    </form>
</main>

<?php include './layouts/footer.php' ?>