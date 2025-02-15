<?php
include './database/db.php'; 
include 'data.php';

//print_r($schoolDepartments);
$errors = [];
if(isset($_POST['submit'])){
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
    
    empty($name) ? $errors['name'] = "name required":"";
    empty($email) ? $errors['email'] = "email required":"";
    empty($phone) ? $errors['phone'] = "phone required":"";
    empty($department) ? $errors['department'] = "department required":"";
    empty($employment_status) ? $errors['employment_status'] = "status required":"";
    empty($salary) ? $errors['salary'] = "salary required":"";
    empty($joining_date) ? $errors['joining_date'] = "date required":"";
    empty($qualification) ? $errors['qualification'] = "qualification required":"";
    empty($address) ? $errors['address'] = "address required":"";
    empty($specialization) ? $errors['specialization'] = "specialization required":"";
    empty($teaching_experience) ? $errors['teaching_experience'] = "experience required":"";
    

    //check experience must be between 1 year and 30years.
    if($teaching_experience <= 0 || $teaching_experience > 30){
        $errors['teaching_experience'] = "Invalid year";
    }
    //generate teacher license id
    // Query to get the last teacher license number from database
    $qry = "SELECT teacher_license FROM teachers ORDER BY id DESC LIMIT 1";
    $stmt = $pdo->prepare($qry);
    $stmt->execute();
    $lastId = $stmt->fetch();
    
    // If there are existing teachers
    if($lastId){
        // Extract the numeric portion after 'TCH' from last license
        $lastNumber = substr((string)$lastId['teacher_license'], offset: 3);
        // Increment the number by 1
        $newNumber = intval($lastNumber) + 1;
        // Create new license ID with 'TCH' prefix and padded zeros
        $license_id = 'TCH' . str_pad($newNumber, 3, '0', STR_PAD_LEFT);
    }else{
        // If no existing teachers, start with TCH001
        $license_id = 'TCH001';
    }
    // Assign generated license ID
    $teacher_license = $license_id;
    // Validate license is not empty
    empty($teacher_license) ? $errors['teacher_license'] = "license required":"";


    if(count($errors) === 0){
        //echo "submitted";
        $qry = "INSERT INTO teachers (name,email,phone,department,employment_status,salary,joining_date,qualification,address,specialization,teaching_experience,teacher_license) VALUES (:name,:email,:phone,:department,:employment_status,:salary,:joining_date,:qualification,:address,:specialization,:teaching_experience,:teacher_license)";
        
        $stmt = $pdo->prepare($qry);
        $stmt->bindParam(":name", $name, PDO::PARAM_STR);
        $stmt->bindParam(":email",$email,PDO::PARAM_STR);
        $stmt->bindParam(":phone",$phone,PDO::PARAM_STR);
        $stmt->bindParam(":department", $department, PDO::PARAM_STR);
        $stmt->bindParam(":employment_status",$employment_status,PDO::PARAM_STR);
        $stmt->bindParam(":salary",$salary,PDO::PARAM_STR);
        $stmt->bindParam(":joining_date",$joining_date,PDO::PARAM_STR);
        $stmt->bindParam(":qualification",$qualification,PDO::PARAM_STR);
        $stmt->bindParam(":address", $address, PDO::PARAM_STR);
        $stmt->bindParam(":specialization",$specialization,PDO::PARAM_STR);
        $stmt->bindParam(":teaching_experience",$teaching_experience,PDO::PARAM_STR);
        $stmt->bindParam(":teacher_license",$teacher_license,PDO::PARAM_STR);
        $res = $stmt->execute();
        //$res = $stmt->fetch();
        //print_r($res);

    }
}
?>

<div class="wrapper">
    <?php include './layouts/header.php' ?>

    <!-- Sidebar Starts -->
    <?php include './components/sidebar.php' ?>
    <!-- Sidebar Ends -->

    <!-- Page Content -->
    <div id="content">
        <!-- Info-card Starts-->
        <?php include './components/teachers/info-card.php' ?>
        <!-- Info-card Ends-->

        <!-- Main Content -->
        <div class="container-fluid p-4">
            <!-- Header with Search and Add Teacher Button -->
            <!-- Header Starts -->
            <?php include './components/teachers/header.php' ?>
            <!-- Header Ends -->

            <!-- Filters Starts -->
            <?php include './components/teachers/filter.php' ?>
            <!-- Filters Ends -->

            <!-- Teachers Table Starts-->
            <?php include './components/teachers/teacher-table.php' ?>
            <!-- Teachers Table Ends-->
        </div>
    </div>
</div>

<?php include 'errors.php'?>
<!-- Add Teacher Modal Starts -->
<div class="modal fade" id="addTeacherModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Teacher</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form aciton="" method="POST">
                    <div class="row g-3">
                        <!-- Personal Information -->
                        <div class="col-md-6">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" required name="name">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Contact Number</label>
                            <input type="tel" class="form-control" name="phone" required>
                        </div>

                        <!-- Professional Information -->
                        <div class="col-md-6">
                            <label class="form-label">Department</label>
                            <select class="form-select" required name="department">
                                <option value="">Select Department</option>
                                <?php foreach ($schoolDepartments as $key => $val) { ?>


                                <option value="<?= $val['name'] ?>"><?= $val['name'] ?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Employment Status</label>
                            <select class="form-select" name="employment_status" required>
                                <option value="">Select Status</option>
                                <option>Full-time</option>
                                <option>Part-time</option>
                                <option>Contract</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Teaching Experience (Years)</label>
                            <select class="form-select" name="teaching_experience" required>
                                <option value="">Select Status</option>
                                <option vlaue="0-2 years">0-2 years</option>
                                <option vlaue="3-5 years">3-5 years</option>
                                <option vlaue="5+ years">5+ years</option>
                            </select>

                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Salary</label>
                            <input type="number" class="form-control" required name="salary">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Joining Date</label>
                            <input type="date" class="form-control" required name="joining_date">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Qualification</label>
                            <input type="text" class="form-control" required name="qualification">
                        </div>

                        <!-- Additional Information -->
                        <div class="col-12">
                            <label class="form-label">Address</label>
                            <textarea class="form-control" rows="2" required name="address"></textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Specialization</label>
                            <input type="text" class="form-control" required name="specialization">
                        </div>

                    </div>
                    <input type="submit" name="submit" class="btn btn-primary m-3">

                </form>
            </div>

        </div>
    </div>
</div>
<!-- Add Teacher Modal Ends -->


<?php include './layouts/footer.php' ?>