<?php
include "../../database/db.php";

$id = $_GET['id'];

// Fetch grade data
$query = "SELECT g.*, e.student_id, e.course_id, s.first_name, s.last_name, c.course_name 
          FROM grades g
          JOIN enrollments e ON g.enrollment_id = e.enrollment_id
          JOIN students s ON e.student_id = s.student_id 
          JOIN courses c ON e.course_id = c.course_id
          WHERE g.grade_id = :id";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$grade = $stmt->fetch(PDO::FETCH_ASSOC);

include "../../layouts/header.php";
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Grade Details</h4>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Student Name:</label>
                        <p><?php echo $grade['first_name'] . ' ' . $grade['last_name']; ?></p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Course:</label>
                        <p><?php echo $grade['course_name']; ?></p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Grade:</label>
                        <p><?php echo $grade['grade']; ?></p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="../../grades.php" class="btn btn-secondary ">Back</a>
                        <div>
                            <a href="./grade-edit.php?id=<?= $grade['grade_id']; ?>"
                                class="btn btn-primary me-2">Edit</a>
                            <a href="./grade-delete.php?id=<?= $grade['grade_id']; ?>"
                                class="btn btn-danger delete">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "../../layouts/footer.php"; ?>