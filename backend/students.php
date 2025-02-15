<?php
include './database/db.php'; 
include 'data.php';


$errors = [];


?>

<?php include './layouts/header.php'?>
<div class="wrapper">
    <!-- Sidebar -->
    <?php include './components/sidebar.php' ?>
    <!-- Sidebar Ends -->

    <!-- Page Content -->
    <div id="content">
        <!-- Navbar Starts-->
        <?php include './components/students/info-card.php' ?>
        <!-- Navbar Ends -->

        <!-- Main Content -->
        <div class="container-fluid p-4">
            <!-- Header with Search and Add Student Button -->
            <!-- Header Starts -->
            <?php include './components/students/header.php' ?>
            <!-- Header Ends -->

            <!-- Filters Starts-->
            <?php include './components/students/filter.php' ?>
            <!-- Filter Ends -->

            <!-- Students Table Starts-->
            <?php include './components/students/student-table.php' ?>
            <!-- Students Table Ends-->
        </div>
    </div>
</div>
<?php include 'errors.php'?>
<!-- Add Student Modal Starts -->
<div class="modal fade" id="addStudentModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row g-3">
                        <!-- Personal Information -->
                        <div class="col-md-6">
                            <label class="form-label">First Name</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <!-- <div class="col-md-6">
                            <label class="form-label">Last Name</label>
                            <input type="text" class="form-control" required>
                        </div> -->
                        <div class="col-md-6">
                            <label class="form-label">Date of Birth</label>
                            <input type="date" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Gender</label>
                            <select class="form-select" required>
                                <option value="">Select Gender</option>
                                <option>Male</option>
                                <option>Female</option>
                                <option>Other</option>
                            </select>
                        </div>

                        <!-- Academic Information -->
                        <div class="col-md-6">
                            <label class="form-label">Class</label>
                            <select class="form-select" required>
                                <option value="">Select Class</option>
                                <option>X-A</option>
                                <option>X-B</option>
                                <option>IX-A</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Section</label>
                            <select class="form-select" required>
                                <option value="">Select Section</option>
                                <option>A</option>
                                <option>B</option>
                                <option>C</option>
                            </select>
                        </div>

                        <!-- Parent Information -->
                        <div class="col-md-6">
                            <label class="form-label">Parent/Guardian Name</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Contact Number</label>
                            <input type="tel" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Address</label>
                            <textarea class="form-control" rows="2" required></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Emergency Contact</label>
                            <input type="tel" class="form-control" required>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Add Student</button>
            </div>
        </div>
    </div>
</div>
<!-- Add Student Modal Ends -->

<?php include './layouts/footer.php' ?>