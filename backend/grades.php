<?php
include './database/db.php';
include 'data.php';
include 'errors.php';
$errors = [];

// Add grade
if(isset($_POST['add_grade'])) {
    $enrollment_id = $_POST['enrollment_id'];
    $grade = $_POST['grade'];
    
    empty($enrollment_id) ? $errors['enrollment_id'] = "enrollment id required":"";
    empty($grade) ? $errors['grade'] = "grade required":"";
    
    // Validate grade is between 0 and 100
    if($grade < 0 || $grade > 100) {
        $errors['grade'] = "Grade must be between 0 and 100";
    }
    
    if(count($errors) === 0){
        $qry = "INSERT INTO grades (enrollment_id, grade) VALUES (:enrollment_id, :grade)";
        $stmt = $pdo->prepare($qry);
        $stmt->bindParam(':enrollment_id', $enrollment_id, PDO::PARAM_INT);
        $stmt->bindParam(':grade', $grade, PDO::PARAM_STR);
        $res = $stmt->execute();
        print_r($res);
    }
}

?>
<?php include './layouts/header.php';?>
<div class="wrapper">
    <!-- Sidebar -->
    <?php include './components/sidebar.php';?>
    <!-- Sidebar Ends -->

    <!-- Page Content -->
    <div id="content">

        <!-- Navbar -->
        <?php include './components/grades/info-card.php';?>

        <!-- Main Content -->
        <div class="container-fluid p-4">
            <!-- Header with Search and Add Grade Button -->
            <?php include './components/grades/header.php';?>
            <!-- Grades Table -->
            <?php include './components/grades/grade-table.php';?>
        </div>
    </div>
</div>

<!-- Add Grade Modal -->
<div class="modal fade" id="addGradeModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Grade</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="">
                    <div class="mb-3">
                        <label class="form-label">Enrollment ID</label>
                        <input type="number" name="enrollment_id" class="form-control" required>
                        <?php if(isset($errors['enrollment_id'])): ?>
                        <div class="text-danger"><?php echo $errors['enrollment_id']; ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Grade</label>
                        <input type="number" name="grade" class="form-control" min="0" max="100" step="0.01" required>
                        <div class="form-text">Enter grade as a decimal between 0 and 100</div>
                        <?php if(isset($errors['grade'])): ?>
                        <div class="text-danger"><?php echo $errors['grade']; ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" name="add_grade" class="btn btn-primary">Add Grade</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include './layouts/footer.php';?>