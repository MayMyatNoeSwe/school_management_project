<?php
include "../../database/db.php";

if (!isset($_GET['id'])) {
    header("Location: ../../teachers.php");
    exit();
}

$id = $_GET['id'];

// Fetch teacher data
$qry = "SELECT * FROM teachers WHERE id = :id";
$stmt = $pdo->prepare($qry);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$teacher = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$teacher) {
    header("Location: ../../teachers.php");
    exit();
}
?>

<?php include '../../layouts/header.php'; ?>

<div class="container mt-4">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>Teacher Details</h4>
            <div>
                <a href="teachers-edit.php?id=<?= $teacher['id'] ?>" class="btn btn-primary btn-sm">
                    <i class="bi bi-pencil"></i> Edit
                </a>
                <a href="../../teachers.php" class="btn btn-secondary btn-sm">
                    <i class="bi bi-arrow-left"></i> Back
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table">
                        <tr>
                            <th width="35%">License Number:</th>
                            <td><?= htmlspecialchars($teacher['teacher_license']) ?></td>
                        </tr>
                        <tr>
                            <th>Name:</th>
                            <td><?= htmlspecialchars($teacher['name']) ?></td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td><?= htmlspecialchars($teacher['email']) ?></td>
                        </tr>
                        <tr>
                            <th>Phone:</th>
                            <td><?= htmlspecialchars($teacher['phone']) ?></td>
                        </tr>
                        <tr>
                            <th>Department:</th>
                            <td><?= htmlspecialchars($teacher['department']) ?></td>
                        </tr>
                        <tr>
                            <th>Status:</th>
                            <td>

                                <?php if ($teacher['employment_status'] == 'Full-time') { ?>
                                <span
                                    class="badge bg-success"><?= htmlspecialchars($teacher['employment_status']) ?></span>
                                <?php } elseif ($teacher['employment_status'] == 'Part-time') { ?>
                                <span
                                    class="badge bg-warning"><?= htmlspecialchars($teacher['employment_status']) ?></span>
                                <?php } else { ?>
                                <span
                                    class="badge bg-danger"><?= htmlspecialchars($teacher['employment_status']) ?></span>
                                <?php } ?>

                            </td>
                        </tr>
                        <tr>
                            <th>Salary:</th>
                            <td>$<?= htmlspecialchars($teacher['salary']) ?></td>
                        </tr>
                        <tr>
                            <th>Qualification:</th>
                            <td><?= htmlspecialchars($teacher['qualification']) ?></td>
                        </tr>
                        <tr>
                            <th>Specialization:</th>
                            <td><?= htmlspecialchars($teacher['specialization']) ?></td>
                        </tr>
                        <tr>
                            <th>Experience:</th>
                            <td><?= htmlspecialchars($teacher['teaching_experience']) ?> years</td>
                        </tr>
                        <tr>
                            <th>Address:</th>
                            <td><?= htmlspecialchars($teacher['address']) ?></td>
                        </tr>
                    </table>


                </div>
                <!-- <div class="col-md-6">
                    <table class="table">
                        <tr>
                            <th width="35%">Salary:</th>
                            <td>$<?= number_format($teacher['salary'], 2) ?></td>
                        </tr>
                        <tr>
                            <th>Joining Date:</th>
                            <td><?= date('F d, Y', strtotime($teacher['joining_date'])) ?></td>
                        </tr>
                        <tr>
                            <th>Qualification:</th>
                            <td><?= htmlspecialchars($teacher['qualification']) ?></td>
                        </tr>
                        <tr>
                            <th>Specialization:</th>
                            <td><?= htmlspecialchars($teacher['specialization']) ?></td>
                        </tr>
                        <tr>
                            <th>Experience:</th>
                            <td><?= htmlspecialchars($teacher['teaching_experience']) ?> years</td>
                        </tr>
                        <tr>
                            <th>Address:</th>
                            <td><?= htmlspecialchars($teacher['address']) ?></td>
                        </tr>
                    </table>
                </div> -->
            </div>
        </div>
    </div>
</div>

<?php include '../../layouts/footer.php'; ?>