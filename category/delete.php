<?php include('../autoload.php');
$id = $_GET['id'];
echo $sql = "DELETE FROM categories WHERE id = '$id'";
$result = $conn->query($sql);
header('Location: list.php');
