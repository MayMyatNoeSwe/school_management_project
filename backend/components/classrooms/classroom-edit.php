<?php
include "../../database/db.php";

$id = $_GET['id'];

// Fetch classroom data
$query = "SELECT * FROM classrooms WHERE classroom_id = :id";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$classroom = $stmt->fetch(PDO::FETCH_ASSOC);

// Handle form submission
if(isset($_POST['update_classroom'])) {
    $room_number = $_POST['room_number'];
    $capacity = $_POST['capacity'];
    
    $errors = [];

    // Validate room number uniqueness, excluding current classroom
    $qry = "SELECT * FROM classrooms WHERE room_number = :room_number AND classroom_id != :id";
    $stmt = $pdo->prepare($qry);
    $stmt->bindParam(':room_number', $room_number, PDO::PARAM_STR);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if(count($res) > 0) {
        $errors['room_number'] = "Room number already exists";
    }

    if(empty($errors)) {
        $query = "UPDATE classrooms SET room_number = :room_number, capacity = :capacity WHERE classroom_id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':room_number', $room_number, PDO::PARAM_STR);
        $stmt->bindParam(':capacity', $capacity, PDO::PARAM_INT);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        
        if($stmt->execute()) {
            header("Location: ../../classrooms.php");
            exit();
        }
    }
}

include "../../layouts/header.php";
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Edit Classroom</h4>
                </div>
                <?php include "../../errors.php"; ?>
                <div class="card-body">
                    <form method="POST">
                        <div class="mb-3">
                            <label class="form-label">Room Number</label>
                            <input type="text" name="room_number" class="form-control"
                                value="<?= htmlspecialchars($classroom['room_number']); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Capacity</label>
                            <input type="number" name="capacity" class="form-control"
                                value="<?= htmlspecialchars($classroom['capacity']); ?>" required>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="../../classrooms.php" class="btn btn-secondary">Cancel</a>
                            <button type="submit" name="update_classroom" class="btn btn-primary">Update
                                Classroom</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "../../layouts/footer.php"; ?>