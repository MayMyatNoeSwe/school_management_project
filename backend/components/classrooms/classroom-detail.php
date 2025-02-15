<?php
include "../../database/db.php";

$id = $_GET['id'];

// Fetch classroom data
$query = "SELECT * FROM classrooms WHERE classroom_id = :id";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$classroom = $stmt->fetch(PDO::FETCH_ASSOC);

include "../../layouts/header.php";
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Classroom Details</h4>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Classroom ID:</label>
                        <p><?php echo $classroom['classroom_id']; ?></p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Room Number:</label>
                        <p><?php echo $classroom['room_number']; ?></p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Capacity:</label>
                        <p><?php echo $classroom['capacity']; ?></p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="../../classrooms.php" class="btn btn-secondary">Back</a>
                        <div>
                            <a href="./classroom-edit.php?id=<?= $classroom['classroom_id']; ?>"
                                class="btn btn-primary me-2">Edit</a>
                            <a href="./classroom-delete.php?id=<?= $classroom['classroom_id']; ?>"
                                class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "../../layouts/footer.php"; ?>