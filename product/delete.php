<?php include('../autoload.php');
$id = $_GET['id'];
$sql = "DELETE FROM products WHERE id = '$id'";
$result = $conn->query($sql);

header('Location: list.php');
