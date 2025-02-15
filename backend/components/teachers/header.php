<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">Teacher Management</h2>
    <div class="d-flex gap-3">
        <form action="teachers.php" method="POST">
            <div class="input-group" style="width: 300px;">
                <input type="text" class="form-control" placeholder="Search teachers..." name="search">
                <button class="btn btn-outline-secondary" type="submit" name="search_teacher">
                    <i class="bi bi-search"></i>
                </button>


            </div>
        </form>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTeacherModal">
            <i class="bi bi-plus-lg"></i> Add Teacher
        </button>
    </div>
</div>