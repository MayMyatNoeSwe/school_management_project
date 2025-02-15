<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <?php include "errors.php"; ?>
                <thead>
                    <tr>
                        <th>Classroom ID</th>
                        <th>Room Number</th>
                        <th>Capacity</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $limit = 5; // Set limit to 5 records per page
                    $page = isset($_GET['page']) ? $_GET['page'] : 1;
                    $offset = ($page - 1) * $limit;

                    $query = "SELECT * FROM classrooms LIMIT :limit OFFSET :offset";
                    $stmt = $pdo->prepare($query);
                    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
                    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
                    $stmt->execute();
                    $classrooms = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($classrooms as $classroom): ?>
                    <tr>
                        <td><?php echo $classroom['classroom_id']; ?></td>
                        <td><?php echo $classroom['room_number']; ?></td>
                        <td><?php echo $classroom['capacity']; ?></td>
                        <td>
                            <a href="./components/classrooms/classroom-detail.php?id=<?= $classroom['classroom_id']; ?>"
                                class="btn btn-sm btn-info me-2" title="View Details">
                                <i class="bi bi-eye"></i>
                            </a>

                            <a href="./components/classrooms/classroom-edit.php?id=<?= $classroom['classroom_id']; ?>"
                                class="btn btn-sm btn-primary me-2" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>

                            <a href="./components/classrooms/classroom-delete.php?id=<?= $classroom['classroom_id']; ?>"
                                class="btn btn-sm btn-danger" title="Delete" name="delete">
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
        $query = "SELECT COUNT(*) as total FROM classrooms";
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