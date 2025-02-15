<?php include './database/db.php' ?>
<?php include './errors.php' ?>
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Contact</th>
                        <th>Salary</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>

                </thead>
                <tbody>
                    <?php
                    $limit = 5; // Set limit to 5 records per page
                    $page = isset($_GET['page']) ? $_GET['page'] : 1;
                    $offset = ($page - 1) * $limit;

                    if (isset($_POST['filter'])) {
                        $conditions = [];
                        $params = [];

                        if (!empty($_POST['department'])) {
                            $conditions[] = "department = :department";
                            $params[':department'] = $_POST['department'];
                        }
                        if (!empty($_POST['employment_status'])) {
                            $conditions[] = "employment_status = :employment_status";
                            $params[':employment_status'] = $_POST['employment_status'];
                        }
                        if (!empty($_POST['teaching_experience'])) {
                            $conditions[] = "teaching_experience = :teaching_experience";
                            $params[':teaching_experience'] = $_POST['teaching_experience'];
                        }

                        $where = !empty($conditions) ? " WHERE " . implode(" AND ", $conditions) : "";
                        $query = "SELECT * FROM teachers" . $where . " LIMIT :limit OFFSET :offset";
                        
                        $stmt = $pdo->prepare($query);
                        foreach($params as $key => $value) {
                            $stmt->bindValue($key, $value);
                        }
                        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
                        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);

                    } else if (isset($_POST['search_teacher']) && !empty($_POST['search'])) {
                        $search = "%" . $_POST['search'] . "%";
                        $query = "SELECT * FROM teachers WHERE name LIKE :search LIMIT :limit OFFSET :offset";
                        $stmt = $pdo->prepare($query);
                        $stmt->bindParam(":search", $search, PDO::PARAM_STR);
                        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
                        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
                    } else {
                        $query = "SELECT * FROM teachers LIMIT :limit OFFSET :offset";
                        $stmt = $pdo->prepare($query);
                        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
                        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
                    }

                    $stmt->execute();
                    $teachers = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    //echo "<pre>";
                    //print_r($teachers);

                    foreach ($teachers as $teacher): ?>
                    <tr>
                        <td><?php echo $teacher['teacher_license']; ?></td>
                        <td><?php echo $teacher['name']; ?></td>
                        <td><?php echo $teacher['department']; ?></td>
                        <td><?php echo $teacher['phone']; ?></td>
                        <td><?php echo $teacher['salary']; ?></td>
                        <td>
                            <span class="badge <?php
                                                    $status = $teacher['employment_status'];
                                                    if ($status == 'Full-time') {
                                                        echo 'bg-success';
                                                    } else if ($status == 'Part-time') {
                                                        echo 'bg-warning';
                                                    } else {
                                                        echo 'bg-danger';
                                                    }
                                                    ?>">
                                <?php echo $teacher['employment_status']; ?>
                            </span>
                        </td>
                        <td>
                            <a href="./components/teachers/teachers-detail.php?id=<?= $teacher['id']; ?>"
                                class="btn btn-sm btn-info me-2" title="View Details">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="./components/teachers/teachers-edit.php?id=<?= $teacher['id']; ?>"
                                class="btn btn-sm btn-primary me-2" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <a href="./components/teachers/teachers-delete.php?id=<?= $teacher['id']; ?>"
                                class="btn btn-sm btn-danger delete" title="Delete" name="delete">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>

                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <?php
        $query = "SELECT COUNT(*) as total FROM teachers";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $total = $stmt->fetch(PDO::FETCH_ASSOC)['total'];

        $pages = ceil($total / $limit);
        ?>
        <nav class="mt-4">
            <ul class="pagination justify-content-end">
                <li class="page-item <?php echo $page <= 1 ? 'disabled' : ''; ?>">
                    <a class="page-link" href="?page=<?php echo $page - 1; ?>" tabindex="-1">Previous</a>
                </li>
                <?php for ($i = 1; $i <= $pages; $i++): ?>
                <li class="page-item <?php echo $page == $i ? 'active' : ''; ?>">
                    <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
                <?php endfor; ?>
                <li class="page-item <?php echo $page >= $pages ? 'disabled' : ''; ?>">
                    <a class="page-link" href="?page=<?php echo $page + 1; ?>">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</div>