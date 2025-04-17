<!----------------------------------------------------------------------------> 
<!-- This is going to be a FrontEnd/BackEnd php script that will pull book  -->
<!-- details from the BookDB and format them to be displayed nicely with UI -->
<!----------------------------------------------------------------------------> 
<?php
session_start();
include '../Core/db_connect.php'; // Connection to the Database (BookDB)

// Guarentee an ID is provided and is a int
if (!isset($_GET['id']) || !is_numeric($_GET['id']))
{
    die("<h3 style = 'color:red; text-align:center;'>Invalid Book ID."); //Kills the session if the BookID doesnot exist or returns a !int
}

$book_id = intval($_GET['id']);

// Pull Book Details
$stmt = $conn->prepare("SELECT * FROM books WHERE id = ?");
$stmt->bind_param("i", $book_id);
$stmt->execute();
$result = $stmt->get_result();
$book = $result->fetch_assoc();
$stmt->close();

if (!$book) 
{
    die("Book Was Not Found.");
}

?>

<!DOCTYPE html>
<html lang = 'en'>
<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
    <title>Montclair Library System - BookDetails</title>
    <link href = "../css/bootstrap_css/bootstrap.min.css" rel = "stylesheet"> <!-- Bootstrap -> Loaded Locally (Was having blocking issues)-->
    <link rel = "stylesheet" href = "../css/style.css"> <!-- custom Css link -->
</head>

<body>
    <!-- Navigation Bar -->
    <nav class = "navbar navbar-expand-lg navbar-red" > 
        <div class = "container-fluid">
            <a class = "navbar-brand" href = "Home.php"></a>
            <button class = "navbar-toggler" type = "button" data-bs-toggle = "collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
    <div class = "container mt-4">
        <div class = "row">
            <div class = "col-md-4 text-center">
                <!-- Quartenary statement to connect img OR show default MSU logo... Same code as Carousel & BookDB -->
                <img src = "<?= !empty($book['image_url']) ? htmlspecialchars($book['image_url']) : '../Resources/SchoolShieldThingTransparent.png';?>"
                    class = "img-fluid rounded" alt = "Book Cover">
            </div>
            <div class = "col-md-8">
                <!-- Pulls 'title' for a Header -->
                <h2><?=htmlspecialchars($book['title']); ?></h2>
                <p><strong>Author:</strong> <?= htmlspecialchars($book['author']); ?></p>
                <p><strong>Genre:</strong> <?= htmlspecialchars($book['genre']); ?></p>
                <p><strong>Published:</strong> <?= htmlspecialchars($book['published']); ?></p>
                <p><strong>Synopsis:</strong> <?= htmlspecialchars($book['Synopsis']); ?></p>

                <!-- php code to insert bookID and userID to Checkout.php -> Into the Checkout table in the lmsDB -->
                <?php if (isset($_SESSION['user'])): ?>
                <form method="POST" action="Checkout.php">
                    <input type="hidden" name="book_id" value="<?= $book['id']; ?>">
                    <button type="submit" class="btn btn-primary btn-red mt-3">Checkout This Book</button>
                </form>
                <?php else: ?>
                    <p class="mt-3 text-danger">Please <a href="Login.php">login</a> to check out this book.</p>
                <?php endif; ?>

                <a href = "BookDirectory.php" class = "btn btn-secondary btn-red mt-3">Return to Directory</a>

            </div>
        </div>
    </div>

    <!--  Page content Ends here  --> 

    <!-- Footer -->
    <footer class="text-white text-center py-3 footer-red">
        <p>&copy; 2025 Montclair State University. All Rights Reserved.</p>
    </footer>

    <!-- Bootstrap JavaScript Bundle (Required for Carousel) -->
    <script src="../Back-End/bootstrap_js/bootstrap.bundle.min.js"></script>

</body>
</html>
