<!-- ----------------------------------------------------------------------------------------------------------------------------------


------------------------------------------------------------------------------------------------------------------------------------ -->
<?php
    session_start();
    include '../Core/db_connect.php';
    
    if (!isset($_SESSION['user'])) 
    {
        header("Location: Login.php");
        exit();
    }

    // Alert for return result
    $returnAlert = '';
    if (isset($_GET['return'])) 
    {
        $returnAlert = $_GET['return'] === 'success'
            ? '<div class="alert alert-success text-center">Book return confirmed!</div>'
            : '<div class="alert alert-danger text-center">Failed to return the book. Please try again.</div>';
    }
    
    // Get user ID
    $stmt = $conn->prepare("SELECT id FROM profiles WHERE username = ?");
    $stmt->bind_param("s", $_SESSION['user']);
    $stmt->execute();
    $stmt->bind_result($user_id);
    $stmt->fetch();
    $stmt->close();
    
    // Get borrowed books
    $sql = "
    SELECT c.checkout_id, b.id, b.title, b.author, b.genre, b.image_url, c.checkout_date, c.due_date
    FROM checkouts c
    JOIN books b ON c.book_id = b.id
    WHERE c.user_id = ? AND c.return_date IS NULL
    ";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $borrowedBooks = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
?>

<!DOCTYPE html>
<html lang = "en">

<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
    <title>Montclair Library System - Home</title>
    <link href = "../css/bootstrap_css/bootstrap.min.css" rel = "stylesheet"> <!-- Bootstrap -> Loaded Locally (Was having blocking issues)-->
    <link rel = "stylesheet" href = "../css/style.css"> <!-- custom Css link -->
</head>

<body>
    <!-- Navigation Bar -->
    <nav class = "navbar navbar-expand-lg navbar-red" > 
        <div class = "container-fluid">
            <a class = "navbar-brand" href = "Home.php"></a>
            <button class = "navbar-toggler" type = "button" data-bs-toggle = "collapse" data-bs-target="#navbarNav"
                aria-controls = "navbarNav" aria-expanded = "false" aria-label = "Toggle navigation">
                <span class = "navbar-toggler-icon"></span>
            </button>

            <div class = "collapse navbar-collapse" id = "navbarNav">
                <ul class = "navbar-nav w-100 d-flex align-items-center">
                    <li class = "nav-item">
                        <a class = "nav-link fw-bold" href = "Home.php">Home</a>
                    </li>
                    <li class = "nav-item">
                        <a class = "nav-link fw-bold" href = "BookDirectory.php">Book Directory</a>
                    </li>
                    
                    <?php if (isset($_SESSION['user'])): ?>
                        <li class = "nav-item ms-auto">
                            <span class = "nav-link fw-bold">Hello, <?php echo htmlspecialchars($_SESSION['user']); ?></span>
                        </li>
                        <li class = "nav-item">
                            <a class = "nav-link fw-bold" href = "Logout.php">Logout</a>
                        </li>
                    <?php else: ?>
                        <li class = "nav-item"><a class = "nav-link fw-bold" href = "Login.php">Login</a></li>
                    <?php endif; ?>        
                </ul>
            </div>
        </div>
    </nav>

 <!-- Page content starts here -->

    <div class = "image-container"> <!-- MSU Logo -->
        <img src = "../Resources/MSULogoLongTransparent.jpg" alt = "MSU Logo" class = "MSU-image">
    </div>
    <?php if (!empty($returnAlert)) echo $returnAlert; ?>

    <!-- Borrowed Books Grid -->
    <div class = "container mt-4">
        <h2 class = "text-center mb-4"> Books You've Checked Out</h2>

        <?php if (empty($borrowedBooks)): ?>
            <div class = "alert alert-info text-center">You have not checked out any books yet.</div>
        <?php else: ?>
            <div class = "row">
                <?php foreach ($borrowedBooks as $book): ?>
                    <div class = "col-md-4 mb-4">
                        <div class = "card h-100 shadow-sm">
                            <img src = "<?= !empty($book['image_url']) ? htmlspecialchars($book['image_url']) : '../Resources/SchoolShieldThingTransparent.png' ?>"
                                class = "card-img-top" alt = "Book Cover" style = "height: 300px; object-fit: cover;">
                            <div class = "card-body text-center">
                                <h5 class = "card-title"><?= htmlspecialchars($book['title']) ?></h5>
                                <p class = "card-text"><strong>Author:</strong> <?= htmlspecialchars($book['author']) ?></p>
                                <p class = "card-text"><strong>Genre:</strong> <?= htmlspecialchars($book['genre']) ?></p>
                                <p class = "card-text"><strong>Checked Out:</strong> <?= $book['checkout_date'] ?></p>
                                <p class = "card-text"><strong>Due:</strong> <?= $book['due_date'] ?></p>
                                
                                <!-- Return Book Btn -->
                                <form method = "POST" action = "Return.php" onsubmit = "return confirm('Confirm return?');">
                                    <input type = "hidden" name = "checkout_id" value = "<?= $book['checkout_id']; ?>">
                                    <button type = "submit" class = "btn btn-danger btn-red">Return Book</button>
                                </form>

                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <!-- Footer -->
    <footer class = "text-white text-center py-3 footer-red">
        <p>&copy; 2025 Montclair State University. All Rights Reserved.</p>
    </footer>

<!-- Bootstrap JavaScript Bundle (Required for Carousel) -->
<script src = "../Back-End/bootstrap_js/bootstrap.bundle.min.js"></script>

</body>
</html>
