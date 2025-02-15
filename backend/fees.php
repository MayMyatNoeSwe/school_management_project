<?php include './layouts/header.php' ?>
<div class="wrapper">
    <!-- Sidebar Starts-->
    <?php include './components/sidebar.php' ?>
    <!-- Sidebar Ends-->

    <!-- Page Content -->
    <div id="content">
        <!-- Navbar -->
        <!-- Info-card Starts -->
        <?php include './components/fees/info-card.php' ?>
        <!-- Info-card Ends -->

        <!-- Main Content -->
        <div class="container-fluid p-4">
            <!-- Fee Overview Cards Starts-->
            <?php include './components/fees/fee-overview.php' ?>
            <!-- Fee Overview Cards Ends-->
            <!-- Header Starts -->
            <?php include './components/fees/header.php' ?>
            <!-- Header Ends -->
            <!-- Filters Starts-->
            <?php include './components/fees/filter.php' ?>
            <!-- Filters Ends-->
            <!-- Fee Records Table Starts-->
            <?php include './components/fees/fee-table.php' ?>
            <!-- Fee Records Table Ends-->
        </div>
    </div>
</div>

<!-- Add Payment Modal Starts-->
<div class="modal fade" id="addPaymentModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Record New Payment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row g-3">
                        <!-- Student Information -->
                        <div class="col-md-6">
                            <label class="form-label">Student Name</label>
                            <select class="form-select" required>
                                <option value="">Select Student</option>
                                <option>John Doe</option>
                                <option>Jane Smith</option>
                                <option>Mike Johnson</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Class</label>
                            <select class="form-select" required>
                                <option value="">Select Class</option>
                                <option>X-A</option>
                                <option>X-B</option>
                                <option>IX-A</option>
                            </select>
                        </div>

                        <!-- Payment Details -->
                        <div class="col-md-6">
                            <label class="form-label">Fee Type</label>
                            <select class="form-select" required>
                                <option value="">Select Fee Type</option>
                                <option>Tuition Fee</option>
                                <option>Library Fee</option>
                                <option>Lab Fee</option>
                                <option>Transport Fee</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Amount</label>
                            <input type="number" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Payment Date</label>
                            <input type="date" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Payment Method</label>
                            <select class="form-select" required>
                                <option value="">Select Payment Method</option>
                                <option>Cash</option>
                                <option>Credit Card</option>
                                <option>Bank Transfer</option>
                                <option>Check</option>
                            </select>
                        </div>

                        <!-- Additional Information -->
                        <div class="col-12">
                            <label class="form-label">Notes</label>
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Record Payment</button>
            </div>
        </div>
    </div>
</div>
<!-- Add Payment Modal Ends-->


<?php include './layouts/footer.php' ?>