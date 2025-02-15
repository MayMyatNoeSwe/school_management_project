<?php
include "../../database/db.php";
$id = $_GET['id'];


// echo $id;
$qry = "DELETE FROM teachers WHERE id= :id";
$stmt = $pdo->prepare($qry);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$res = $stmt->execute();
if ($res) {
    header("Location: ../../teachers.php");
} else {
    echo "Error deleting teacher";
    header("Location: ../../teachers.php");
}