<?php include './layouts/header.php' ?>
<div class="wrapper">
    <!-- Sidebar Starts -->
    <?php include './components/sidebar.php'?>
    <!-- Sidebar Ends -->

    <!-- Page Content -->
    <div id="content">
        <!-- Navbar Starts-->
        <?php include './components/classes/info-card.php'?>
        <!-- Navbar Ends -->

        <!-- Main Content -->
        <div class="container-fluid p-4">
            <!-- Header Starts -->
            <?php include './components/classes/header.php'?>
            <!-- Header Ends -->

            <!-- Class Overview Starts -->
            <?php include './components/classes/class-overview.php'?>
            <!-- Class Overview Ends -->

            <!-- Filters Starts-->
            <?php include './components/classes/filters.php'?>
            <!-- Filter Ends -->

            <!-- Classes Table Starts-->
            <?php include './components/classes/class-table.php'?>
            <!-- Class Table Ends -->
        </div>
    </div>
</div>

<!-- Add Class Modal Starts-->
<div class="modal fade" id="addClassModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Class</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row g-3">
                        <!-- Basic Information -->
                        <div class="col-md-6">
                            <label class="form-label">Class Name</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Subject</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Grade Level</label>
                            <select class="form-select" required>
                                <option value="">Select Grade</option>
                                <option>Grade 9</option>
                                <option>Grade 10</option>
                                <option>Grade 11</option>
                                <option>Grade 12</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Section</label>
                            <select class="form-select" required>
                                <option value="">Select Section</option>
                                <option>Section A</option>
                                <option>Section B</option>
                                <option>Section C</option>
                            </select>
                        </div>

                        <!-- Schedule Information -->
                        <div class="col-md-6">
                            <label class="form-label">Teacher</label>
                            <select class="form-select" required>
                                <option value="">Select Teacher</option>
                                <option>Dr. Sarah Wilson</option>
                                <option>Prof. Michael Brown</option>
                                <option>Ms. Emily Davis</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Room</label>
                            <select class="form-select" required>
                                <option value="">Select Room</option>
                                <option>Room 101</option>
                                <option>Room 102</option>
                                <option>Lab 201</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Start Time</label>
                            <input type="time" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">End Time</label>
                            <input type="time" class="form-control" required>
                        </div>

                        <!-- Additional Information -->
                        <div class="col-md-6">
                            <label class="form-label">Maximum Capacity</label>
                            <input type="number" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Subject Type</label>
                            <select class="form-select" required>
                                <option value="">Select Type</option>
                                <option>Core</option>
                                <option>Elective</option>
                                <option>Extra-curricular</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Add Class</button>
            </div>
        </div>
    </div>
</div>
<!-- Add Class Modal Ends-->


<?php include './layouts/footer.php' ?>