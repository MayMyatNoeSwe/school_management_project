<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include './database/db.php';
                    
                    // Pagination settings
                    $records_per_page = 5;
                    $page = isset($_GET['page']) ? $_GET['page'] : 1;
                    $offset = ($page - 1) * $records_per_page;

                    // Get total records
                    $total_records_sql = "SELECT COUNT(*) FROM users";
                    $stmt = $pdo->prepare($total_records_sql);
                    $stmt->execute();
                    $total_records = $stmt->fetchColumn();
                    $total_pages = ceil($total_records / $records_per_page);

                    // Get records for current page
                    $sql = "SELECT * FROM users ORDER BY user_id ASC LIMIT :offset, :records_per_page";
                    $statement = $pdo->prepare($sql);
                    $statement->bindParam(':offset', $offset, PDO::PARAM_INT);
                    $statement->bindParam(':records_per_page', $records_per_page, PDO::PARAM_INT);
                    $statement->execute();
                    $users = $statement->fetchAll(PDO::FETCH_ASSOC);

                    foreach($users as $user): ?>
                    <tr>
                        <td><?= $user['user_id'] ?></td>
                        <td><?= $user['name'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td><?= $user['role'] ?? 'N/A' ?></td>
                        <td><?= $user['phone'] ?></td>
                        <td><?= $user['address'] ?></td>
                        <td><?= $user['created_at'] ?></td>
                        <td>
                            <a href="user-detail.php?id=<?= $user['user_id'] ?>" class="btn btn-sm btn-info me-2"
                                title="View Details">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="user-edit.php?id=<?= $user['user_id'] ?>" class="btn btn-sm btn-primary me-2"
                                title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <button class="btn btn-sm btn-warning me-2" title="Reset Password">
                                <i class="bi bi-key"></i>
                            </button>
                            <a href="user-delete.php?id=<?= $user['user_id'] ?>" class="btn btn-sm btn-danger delete"
                                title="Delete">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <nav class="mt-4">
            <ul class="pagination justify-content-end">
                <?php if($page > 1): ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?= $page-1 ?>">Previous</a>
                </li>
                <?php else: ?>
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                </li>
                <?php endif; ?>

                <?php for($i = 1; $i <= $total_pages; $i++): ?>
                <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                    <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                </li>
                <?php endfor; ?>

                <?php if($page < $total_pages): ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?= $page+1 ?>">Next</a>
                </li>
                <?php else: ?>
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">Next</a>
                </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</div>