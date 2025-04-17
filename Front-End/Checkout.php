<?php
session_start();
include '../Core/db_connect.php';

if (!isset($_SESSION['user'])) 
{
    header("Location: Login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['book_id'])) 
{
    $book_id = intval($_POST['book_id']);

    // Get the user ID from profiles based on the session username
    $stmt = $conn->prepare("SELECT id FROM profiles WHERE username = ?");
    $stmt->bind_param("s", $_SESSION['user']);
    $stmt->execute();
    $stmt->bind_result($user_id);
    $stmt->fetch();
    $stmt->close();

    if ($user_id) {
        // Insert into checkouts table
        $checkout_stmt = $conn->prepare("INSERT INTO checkouts (user_id, book_id, checkout_date, due_date) VALUES (?, ?, CURDATE(), DATE_ADD(CURDATE(), INTERVAL 14 DAY))");
        $checkout_stmt->bind_param("ii", $user_id, $book_id);
        if ($checkout_stmt->execute()) 
        {
            header("Location: Home.php?success=1");
        } else 
        {
            echo "Error: " . $checkout_stmt->error;
        }
        $checkout_stmt->close();
    } else 
    {
        echo "User not found.";
    }
}
?>
