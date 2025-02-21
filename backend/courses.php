<?php
include './database/db.php';
include 'data.php';
include 'errors.php';
$errors = [];

// Add course
if (isset($_POST['add_course'])) {
    $course_name = $_POST['course_name'];
    $course_description = $_POST['course_description'];
    $credits = $_POST['credits'];
    $teacher_id = $_POST['teacher_id'];

    empty($course_name) ? $errors['course_name'] = "course name required" : "";
    empty($credits) ? $errors['credits'] = "credits required" : "";

    $qry = "SELECT * FROM courses WHERE course_name = :course_name";
    $stmt = $pdo->prepare($qry);
    $stmt->bindParam(':course_name', $course_name, PDO::PARAM_STR);
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (count($res) > 0) {
        $errors['course_name'] = "course name already exists";
    }

    if (count($errors) === 0) {
        $qry = "INSERT INTO courses (course_name, course_description, credits, teacher_id) VALUES (:course_name, :course_description, :credits, :teacher_id)";
        $stmt = $pdo->prepare($qry);
        $stmt->bindParam(':course_name', $course_name, PDO::PARAM_STR);
        $stmt->bindParam(':course_description', $course_description, PDO::PARAM_STR);
        $stmt->bindParam(':credits', $credits, PDO::PARAM_INT);
        $stmt->bindParam(':teacher_id', $teacher_id, PDO::PARAM_INT);
        $res = $stmt->execute();
        print_r($res);
    }
}

?>

<?php include './layouts/header.php'; ?>
<div class="wrapper">
    <!-- Sidebar -->
    <?php include 'components/sidebar.php'; ?>
    <!-- Page Content -->
    <div id="content">
        <!-- Navbar -->
        <?php include 'components/courses/info-card.php'; ?>

        <!-- Main Content -->
        <div class="container-fluid p-4">
            <!-- Header with Search and Add Course Button -->
            <?php include 'components/courses/header.php'; ?>

            <!-- Course Statistics -->
            <?php include 'components/courses/course-overview.php'; ?>

            <!-- Filters -->
            <?php include 'components/courses/filters.php'; ?>

            <!-- Courses Table -->
            <?php include 'components/courses/course-table.php'; ?>
        </div>
    </div>
</div>

<!-- Add Course Modal -->
<div class="modal fade" id="addCourseModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Course</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="">
                    <div class="row g-3">
                        <!-- Basic Information -->
                        <div class="col-md-6">
                            <label class="form-label">Course Name</label>
                            <input type="text" name="course_name" class="form-control" required>
                            <?php if (isset($errors['course_name'])): ?>
                            <div class="text-danger"><?php echo $errors['course_name']; ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Credits</label>
                            <input type="number" name="credits" class="form-control" min="1" max="6" required>
                            <?php if (isset($errors['credits'])): ?>
                            <div class="text-danger"><?php echo $errors['credits']; ?></div>
                            <?php endif; ?>
                        </div>

                        <!-- Course Details -->
                        <div class="col-md-6">
                            <label class="form-label">Teacher ID</label>
                            <input type="number" name="teacher_id" class="form-control" required>
                        </div>

                        <!-- Additional Information -->
                        <div class="col-12">
                            <label class="form-label">Course Description</label>
                            <textarea name="course_description" class="form-control" rows="3" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" name="add_course">Add Course</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'layouts/footer.php'; ?>