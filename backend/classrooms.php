<?php
include './database/db.php';
include './layouts/header.php';
include 'data.php';
include 'errors.php';
$errors = [];
// Add classroom
if(isset($_POST['add_classroom'])) {
    $room_number = $_POST['room_number'];
    $capacity = $_POST['capacity'];
    
    empty($room_number) ? $errors['room_number'] = "room number required":"";
    empty($capacity) ? $errors['capacity'] = "capacity required":"";

    $qry = "SELECT * FROM classrooms WHERE room_number = :room_number";
    $stmt = $pdo->prepare($qry);
    $stmt->bindParam(':room_number', $room_number, PDO::PARAM_STR);
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if(count($res) > 0){
        $errors['room_number'] = "room number already exists";
    }
    if(count($errors) === 0){
    $qry = "INSERT INTO classrooms (room_number, capacity) VALUES (:room_number, :capacity)";
    $stmt = $pdo->prepare($qry);
    $stmt->bindParam(':room_number', $room_number, PDO::PARAM_STR);
    $stmt->bindParam(':capacity', $capacity, PDO::PARAM_STR);
    $res = $stmt->execute();
    print_r($res);
    }
}






?>


<div class="wrapper">
    <!-- Sidebar starts-->
    <?php include './components/sidebar.php'?>
    <!-- Sidebar Ends -->

    <!-- Page Content -->
    <div id="content">
        <!-- Navbar Starts -->
        <?php include './components/classrooms/info-card.php'?>
        <!-- Navbar Ends -->

        <!-- Main Content -->
        <div class="container-fluid p-4">
            <!-- Header with Search and Add Classroom Button -->
            <?php include './components/classrooms/header.php'?>

            <!-- Classrooms Table Starts-->
            <?php include './components/classrooms/classroom-table.php'?>
        </div>
    </div>
</div>

<!-- Add Classroom Modal -->
<div class="modal fade" id="addClassroomModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Classroom</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="">
                    <div class="mb-3">
                        <label class="form-label">Room Number</label>
                        <input type="text" name="room_number" class="form-control" maxlength="10" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Capacity</label>
                        <input type="number" name="capacity" class="form-control" min="1" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" name="add_classroom" class="btn btn-primary">Add Classroom</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<?php include 'errors.php'?>
<?php include './layouts/footer.php' ?>