<?php
include '../database/db.php';
$id = $_GET['id'];
// echo $id;
$qry = "DELETE FROM users WHERE user_id= :id";
$stmt = $pdo->prepare($qry);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$res = $stmt->execute();
if ($res) {
   header("Location: users.php");
   exit();
} 