<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Grade ID</th>
                        <th>Enrollment ID</th>
                        <th>Grade</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $limit = 5; // Set limit to 5 records per page
                    $page = isset($_GET['page']) ? $_GET['page'] : 1;
                    $offset = ($page - 1) * $limit;

                    $query = "SELECT * FROM grades LIMIT :limit OFFSET :offset";
                    $stmt = $pdo->prepare($query);
                    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
                    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
                    $stmt->execute();
                    $grades = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($grades as $grade): ?>
                    <tr>
                        <td><?php echo $grade['grade_id']; ?></td>
                        <td><?php echo $grade['enrollment_id']; ?></td>
                        <td><?php echo $grade['grade']; ?></td>
                        <td>
                            <a href="./components/grades/grade-detail.php?id=<?= $grade['grade_id']; ?>"
                                class="btn btn-sm btn-info me-2" title="View Details" name="view_grade">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="./components/grades/grade-edit.php?id=<?= $grade['grade_id']; ?>"
                                class="btn btn-sm btn-primary me-2 " title="Edit" name="edit_grade">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <a href="./components/grades/grade-delete.php?id=<?= $grade['grade_id']; ?>"
                                class="btn btn-sm btn-danger delete" title="Delete" name="delete_grade">
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
        $query = "SELECT COUNT(*) as total FROM grades";
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