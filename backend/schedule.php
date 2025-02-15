<?php include './layouts/header.php' ?>
<div class="wrapper">
    <!-- Sidebar Starts-->
    <?php include './components/sidebar.php'?>
    <!-- Sidebar Ends -->
    <!-- Page Content -->

    <div id="content">
        <!-- Info-card Starts -->

        <?php include './components/schedule/info-card.php' ?>
        <!-- Info-card Ends -->

        <!-- Main Content -->
        <div class="container-fluid p-4">
            <!-- Header Starts -->
            <?php include './components/schedule/header.php' ?>
            <!-- Header Ends -->

            <!-- Filters Starts-->
            <?php include './components/schedule/filter.php' ?>
            <!-- Filter Ends -->
            <!-- Schedule-table Starts -->
            <?php include './components/schedule/schedule-table.php' ?>
            <!-- Schedule-table Ends -->
        </div>
    </div>
</div>

<!-- Add Schedule Modal Starts -->
<div class="modal fade" id="addScheduleModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Schedule</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row g-3">
                        <!-- Class Information -->
                        <div class="col-md-6">
                            <label class="form-label">Class</label>
                            <select class="form-select" required>
                                <option value="">Select Class</option>
                                <option>Mathematics X-A</option>
                                <option>Physics IX-B</option>
                                <option>English X-B</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Teacher</label>
                            <select class="form-select" required>
                                <option value="">Select Teacher</option>
                                <option>Dr. Sarah Wilson</option>
                                <option>Prof. Michael Brown</option>
                                <option>Ms. Emily Davis</option>
                            </select>
                        </div>

                        <!-- Schedule Details -->
                        <div class="col-md-6">
                            <label class="form-label">Day</label>
                            <select class="form-select" required>
                                <option value="">Select Day</option>
                                <option>Monday</option>
                                <option>Tuesday</option>
                                <option>Wednesday</option>
                                <option>Thursday</option>
                                <option>Friday</option>
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
                        <div class="col-12">
                            <label class="form-label">Notes</label>
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="recurring">
                                <label class="form-check-label" for="recurring">
                                    Recurring Schedule
                                </label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Add Schedule</button>
            </div>
        </div>
    </div>
</div>
<!-- Add Schedule Modal Ends -->



<?php include './layouts/footer.php' ?>