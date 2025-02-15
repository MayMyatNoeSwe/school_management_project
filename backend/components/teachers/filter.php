<?php include 'data.php' ?>
<div class="card mb-4">
    <div class="card-body">
        <form method="POST" action="teachers.php">
            <div class="row g-3">
                <div class="col-md-3">
                    <select class="form-select" name="department">
                        <option value="">All Departments</option>
                        <?php foreach ($schoolDepartments as $key => $val) { ?>
                        <option value="<?= $val['name'] ?>"
                            <?= isset($_POST['department']) && $_POST['department'] == $val['name'] ? 'selected' : '' ?>>
                            <?= $val['name'] ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-select" name="employment_status">
                        <option value="">Employment Status</option>
                        <?php
                        $statuses = ['Full-time', 'Part-time', 'Contract'];
                        foreach($statuses as $status) { ?>
                        <option value="<?= $status ?>"
                            <?= isset($_POST['employment_status']) && $_POST['employment_status'] == $status ? 'selected' : '' ?>>
                            <?= $status ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-select" name="teaching_experience">
                        <option value="">Experience Level</option>
                        <?php
                        $experiences = ['0-2 years', '3-5 years', '5+ years'];
                        foreach($experiences as $exp) { ?>
                        <option value="<?= $exp ?>"
                            <?= isset($_POST['teaching_experience']) && $_POST['teaching_experience'] == $exp ? 'selected' : '' ?>>
                            <?= $exp ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <button type="submit" name="filter" class="btn btn-secondary w-100">Apply Filters</button>
                </div>
            </div>
        </form>
    </div>
</div>