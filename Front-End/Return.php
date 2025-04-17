<?php
session_start();
include '../Core/db_connect.php';

if (!isset($_SESSION['user']) || !isset($_POST['checkout_id'])) 
{
    header("Location: BookBorrowed.php?error=unauthorized");
    exit();
}

$checkout_id = intval($_POST['checkout_id']);

// Prepare and execute the update statement
$stmt = $conn->prepare("UPDATE checkouts SET return_date = CURDATE() WHERE checkout_id = ?");
$stmt->bind_param("i", $checkout_id);

if ($stmt->execute() && $stmt->affected_rows > 0) 
{
    header("Location: BookBorrowed.php?return=success");
} else 
{
    header("Location: BookBorrowed.php?return=fail");
}
exit();
?>
