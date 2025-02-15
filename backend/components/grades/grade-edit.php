<?php
include "../../database/db.php";

$id = $_GET['id'];

// Fetch grade data
$query = "SELECT * FROM grades WHERE grade_id = :id";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$grade = $stmt->fetch(PDO::FETCH_ASSOC);

// Handle form submission
if(isset($_POST['update_grade'])) {
    $enrollment_id = $_POST['enrollment_id'];
    $grade = $_POST['grade'];
    
    // Validate grade is between 0 and 100
    if($grade_value < 0 || $grade_value > 100) {
        $error = "Grade must be between 0 and 100";
    } else {
        $query = "UPDATE grades SET enrollment_id = :enrollment_id, grade = :grade WHERE grade_id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':enrollment_id', $enrollment_id, PDO::PARAM_INT);
        $stmt->bindParam(':grade', $grade_value, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if($stmt->execute()) {
            header("Location: ../../grades.php");
            exit();
        } else {
            $error = "Error updating grade";
        }
    }
}

include "../../layouts/header.php";
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Edit Grade</h4>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="mb-3">
                            <label class="form-label">Enrollment ID</label>
                            <input type="number" name="enrollment_id" class="form-control"
                                value="<?php echo htmlspecialchars($grade['enrollment_id']); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Grade</label>
                            <input type="number" name="grade" class="form-control"
                                value="<?php echo htmlspecialchars($grade['grade']); ?>" required>
                            <div class="form-text">Enter grade as a decimal between 0 and 100</div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="../../grades.php" class="btn btn-secondary">Cancel</a>
                            <button type="submit" name="update_grade" class="btn btn-primary">Update Grade</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "../../layouts/footer.php"; ?>