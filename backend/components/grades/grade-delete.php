<?php
include "../../database/db.php";
$id = $_GET['id'];


// echo $id;
$qry = "DELETE FROM grades WHERE grade_id= :id";
$stmt = $pdo->prepare($qry);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$res = $stmt->execute();

if ($res) {
    header("Location: ../../grades.php");
} else {
    echo "Error deleting grade";
    header("Location: ../../grades.php");
}