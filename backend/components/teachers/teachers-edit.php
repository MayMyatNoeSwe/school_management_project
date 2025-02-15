<?php
include "../../database/db.php";

if (!isset($_GET['id'])) {
    header("Location: ../../teachers.php");
    exit();
}

$id = $_GET['id'];
$errors = [];

// Fetch existing teacher data
$qry = "SELECT * FROM teachers WHERE id = :id";
$stmt = $pdo->prepare($qry);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$teacher = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$teacher) {
    header("Location: ../../teachers.php");
    exit();
}

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email']; 
    $phone = $_POST['phone'];
    $department = $_POST['department'];
    $employment_status = $_POST['employment_status'];
    $salary = $_POST['salary'];
    $joining_date = $_POST['joining_date'];
    $qualification = $_POST['qualification'];
    $address = $_POST['address'];
    $specialization = $_POST['specialization'];
    $teaching_experience = $_POST['teaching_experience'];

    // Validation
    empty($name) ? $errors['name'] = "Name required" : "";
    empty($email) ? $errors['email'] = "Email required" : "";
    empty($phone) ? $errors['phone'] = "Phone required" : "";
    empty($department) ? $errors['department'] = "Department required" : "";
    empty($employment_status) ? $errors['employment_status'] = "Status required" : "";
    empty($salary) ? $errors['salary'] = "Salary required" : "";
    empty($joining_date) ? $errors['joining_date'] = "Date required" : "";
    empty($qualification) ? $errors['qualification'] = "Qualification required" : "";
    empty($address) ? $errors['address'] = "Address required" : "";
    empty($specialization) ? $errors['specialization'] = "Specialization required" : "";
    empty($teaching_experience) ? $errors['teaching_experience'] = "Experience required" : "";

    if ($teaching_experience <= 0 || $teaching_experience > 30) {
        $errors['teaching_experience'] = "Invalid year";
    }

    if (count($errors) === 0) {
        $qry = "UPDATE teachers SET 
            name = :name,
            email = :email,
            phone = :phone,
            department = :department,
            employment_status = :employment_status,
            salary = :salary,
            joining_date = :joining_date,
            qualification = :qualification,
            address = :address,
            specialization = :specialization,
            teaching_experience = :teaching_experience
            WHERE id = :id";

        $stmt = $pdo->prepare($qry);
        $stmt->bindParam(":name", $name, PDO::PARAM_STR);
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->bindParam(":phone", $phone, PDO::PARAM_STR);
        $stmt->bindParam(":department", $department, PDO::PARAM_STR);
        $stmt->bindParam(":employment_status", $employment_status, PDO::PARAM_STR);
        $stmt->bindParam(":salary", $salary, PDO::PARAM_STR);
        $stmt->bindParam(":joining_date", $joining_date, PDO::PARAM_STR);
        $stmt->bindParam(":qualification", $qualification, PDO::PARAM_STR);
        $stmt->bindParam(":address", $address, PDO::PARAM_STR);
        $stmt->bindParam(":specialization", $specialization, PDO::PARAM_STR);
        $stmt->bindParam(":teaching_experience", $teaching_experience, PDO::PARAM_STR);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            header("Location: ../../teachers.php");
            exit();
        }
    }
} 
?>
<?php include '../../layouts/header.php'; ?>
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h4>Edit Teacher</h4>
        </div>
        <div class="card-body">
            <?php include '../../errors.php'; ?>

            <form method="POST">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control"
                            value="<?= htmlspecialchars($teacher['name']) ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control"
                            value="<?= htmlspecialchars($teacher['email']) ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Phone</label>
                        <input type="text" name="phone" class="form-control"
                            value="<?= htmlspecialchars($teacher['phone']) ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Department</label>
                        <select name="department" class="form-select">
                            <option value="">Select Department</option>
                            <?php
                            $departments = ['Mathematics', 'Science', 'English', 'History', 'Computer Science'];
                            foreach ($departments as $dept) {
                                $selected = ($teacher['department'] == $dept) ? 'selected' : '';
                                echo "<option value='$dept' $selected>$dept</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Employment Status</label>
                        <select name="employment_status" class="form-select">
                            <option value="">Select Status</option>
                            <?php
                            $statuses = ['Full-time', 'Part-time', 'Contract'];
                            foreach ($statuses as $status) {
                                $selected = ($teacher['employment_status'] == $status) ? 'selected' : '';
                                echo "<option value='$status' $selected>$status</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Salary</label>
                        <input type="number" name="salary" class="form-control"
                            value="<?= htmlspecialchars($teacher['salary']) ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Joining Date</label>
                        <input type="date" name="joining_date" class="form-control"
                            value="<?= htmlspecialchars($teacher['joining_date']) ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Qualification</label>
                        <input type="text" name="qualification" class="form-control"
                            value="<?= htmlspecialchars($teacher['qualification']) ?>">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Address</label>
                        <textarea name="address" class="form-control"
                            rows="3"><?= htmlspecialchars($teacher['address']) ?></textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Specialization</label>
                        <input type="text" name="specialization" class="form-control"
                            value="<?= htmlspecialchars($teacher['specialization']) ?>">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Teaching Experience </label>
                        <select name="teaching_experience" class="form-select">
                            <option value="">Select Status</option>
                            <?php
                            $years = ['0-2 years', '3-5 years', '5+ years'];

                            foreach ($years as $year) {
                                $selected = ($teacher['teaching_experience'] == $year) ? 'selected' : '';
                                echo "<option value='$year' $selected>$year</option>";
                            }
                            ?>

                        </select>
                    </div>
                </div>
                <div class="mt-3">
                    <button type="submit" name="update" class="btn btn-primary">Update Teacher</button>
                    <a href="../../teachers.php" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include '../../layouts/footer.php'; ?>