<?php include './layouts/header.php'?>
<div class="wrapper">

    <?php include './components/sidebar.php' ?>
    <!-- Page Content -->
    <div id="content">
        <!-- Navbar -->
        <?php include './components/users/info-card.php' ?>

        <!-- Main Content -->
        <div class="container-fluid p-4">
            <!-- Header with Search and Add User Button -->
            <?php include './components/users/header.php' ?>

            <!-- User Statistics -->
            <?php include './components/users/user-overview.php' ?>

            <!-- Users Table -->
            <?php include './components/users/user-table.php' ?>
        </div>
    </div>
</div>

<!-- Add User Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Role</label>
                        <select class="form-select" required>
                            <option value="">Select Role</option>
                            <option value="admin">Administrator</option>
                            <option value="teacher">Teacher</option>
                            <option value="student">Student</option>
                            <option value="staff">Parent</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Add User</button>
            </div>
        </div>
    </div>
</div>

<?php include './layouts/footer.php' ?>