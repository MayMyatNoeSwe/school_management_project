<?php
include "../../database/db.php";

if (!isset($_GET['id'])) {
    header("Location: ../../users.php");
    exit();
}

$id = $_GET['id'];

// Fetch user data
$qry = "SELECT * FROM users WHERE id = :id";
$stmt = $pdo->prepare($qry);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    header("Location: ../../users.php");
    exit();
}
?>

<?php include '../../layouts/header.php'; ?>

<div class="container mt-4">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>User Details</h4>
            <div>
                <a href="user-edit.php?id=<?= $user['id'] ?>" class="btn btn-primary btn-sm">
                    <i class="bi bi-pencil"></i> Edit
                </a>
                <a href="../../users.php" class="btn btn-secondary btn-sm">
                    <i class="bi bi-arrow-left"></i> Back
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table">
                        <tr>
                            <th width="35%">User ID:</th>
                            <td><?= htmlspecialchars($user['id']) ?></td>
                        </tr>
                        <tr>
                            <th>Name:</th>
                            <td><?= htmlspecialchars($user['name']) ?></td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td><?= htmlspecialchars($user['email']) ?></td>
                        </tr>
                        <tr>
                            <th>Role:</th>
                            <td>
                                <?php if ($user['role'] == 'admin') { ?>
                                <span class="badge bg-danger"><?= htmlspecialchars($user['role']) ?></span>
                                <?php } elseif ($user['role'] == 'teacher') { ?>
                                <span class="badge bg-primary"><?= htmlspecialchars($user['role']) ?></span>
                                <?php } elseif ($user['role'] == 'student') { ?>
                                <span class="badge bg-success"><?= htmlspecialchars($user['role']) ?></span>
                                <?php } else { ?>
                                <span class="badge bg-secondary"><?= htmlspecialchars($user['role']) ?></span>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Status:</th>
                            <td>
                                <?php if ($user['status'] == 'active') { ?>
                                <span class="badge bg-success">Active</span>
                                <?php } else { ?>
                                <span class="badge bg-danger">Inactive</span>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Created At:</th>
                            <td><?= date('F d, Y', strtotime($user['created_at'])) ?></td>
                        </tr>
                        <tr>
                            <th>Last Login:</th>
                            <td><?= $user['last_login'] ? date('F d, Y H:i', strtotime($user['last_login'])) : 'Never' ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../../layouts/footer.php'; ?>