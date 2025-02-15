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
            <div class="row mb-4">
                <div class="col-md-3">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <h5 class="card-title">Total Courses</h5>
                            <h2>48</h2>
                            <p class="mb-0">Active courses</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-success text-white">
                        <div class="card-body">
                            <h5 class="card-title">Enrollments</h5>
                            <h2>856</h2>
                            <p class="mb-0">Current semester</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-warning text-white">
                        <div class="card-body">
                            <h5 class="card-title">Departments</h5>
                            <h2>12</h2>
                            <p class="mb-0">Offering courses</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-info text-white">
                        <div class="card-body">
                            <h5 class="card-title">New Courses</h5>
                            <h2>5</h2>
                            <p class="mb-0">Added this month</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Filters -->
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-3">
                            <select class="form-select">
                                <option value="">All Departments</option>
                                <option>Mathematics</option>
                                <option>Science</option>
                                <option>English</option>
                                <option>Social Studies</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select class="form-select">
                                <option value="">Course Level</option>
                                <option>Beginner</option>
                                <option>Intermediate</option>
                                <option>Advanced</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select class="form-select">
                                <option value="">Status</option>
                                <option>Active</option>
                                <option>Inactive</option>
                                <option>Upcoming</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-secondary w-100">Apply Filters</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Courses Table -->
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Course ID</th>
                                    <th>Course Name</th>
                                    <th>Department</th>
                                    <th>Credits</th>
                                    <th>Level</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>MATH101</td>
                                    <td>Introduction to Calculus</td>
                                    <td>Mathematics</td>
                                    <td>3</td>
                                    <td>Intermediate</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-info me-2" title="View Details">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-primary me-2" title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger" title="Delete">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>PHY201</td>
                                    <td>Classical Mechanics</td>
                                    <td>Science</td>
                                    <td>4</td>
                                    <td>Advanced</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-info me-2" title="View Details">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-primary me-2" title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger" title="Delete">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>ENG102</td>
                                    <td>Creative Writing</td>
                                    <td>English</td>
                                    <td>3</td>
                                    <td>Beginner</td>
                                    <td><span class="badge bg-warning">Upcoming</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-info me-2" title="View Details">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-primary me-2" title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger" title="Delete">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <nav class="mt-4">
                        <ul class="pagination justify-content-end">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">Previous</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
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
                <form>
                    <div class="row g-3">
                        <!-- Basic Information -->
                        <div class="col-md-6">
                            <label class="form-label">Course Code</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Course Name</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Department</label>
                            <select class="form-select" required>
                                <option value="">Select Department</option>
                                <option>Mathematics</option>
                                <option>Science</option>
                                <option>English</option>
                                <option>Social Studies</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Credits</label>
                            <input type="number" class="form-control" min="1" max="6" required>
                        </div>

                        <!-- Course Details -->
                        <div class="col-md-6">
                            <label class="form-label">Level</label>
                            <select class="form-select" required>
                                <option value="">Select Level</option>
                                <option>Beginner</option>
                                <option>Intermediate</option>
                                <option>Advanced</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Maximum Students</label>
                            <input type="number" class="form-control" min="1" required>
                        </div>

                        <!-- Additional Information -->
                        <div class="col-12">
                            <label class="form-label">Course Description</label>
                            <textarea class="form-control" rows="3" required></textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Prerequisites</label>
                            <input type="text" class="form-control" placeholder="Enter prerequisites (comma-separated)">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Start Date</label>
                            <input type="date" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">End Date</label>
                            <input type="date" class="form-control" required>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Add Course</button>
            </div>
        </div>
    </div>
</div>


<?php include 'layouts/footer.php'; ?>