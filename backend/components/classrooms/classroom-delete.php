<?php
include "../../database/db.php";
$id = $_GET['id']; 
//echo $id;
// Get ID from URL parameter
$qry = "DELETE FROM classrooms WHERE classroom_id = :id";
$stmt = $pdo->prepare($qry);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$res = $stmt->execute();

if ($res) {
    header("Location: ../../classrooms.php");
    
} else {
    header("Location: ../../classrooms.php");
    
}