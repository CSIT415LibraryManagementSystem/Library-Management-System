<!-- ----------------------------------------------------------------------------------------------------------------------------------
                         This is our Book Directory(Virtual Library). It will service as a serach function for 
                our library where uses can search by a name in a search bar(Will partially match search query to titles).
               It will have a small checkable table that acts as filters and will remove books that do not fall within the
            conditions. Will also be setup in a grid box and will have infinite scroll and not use pagination (Multiple pages).
------------------------------------------------------------------------------------------------------------------------------------ -->
<?php
    session_start();
    include '../Core/db_connect.php'; 

    // Fetch all books from the database
    $sql = "SELECT * FROM books ORDER BY title ASC";
    $result = $conn->query($sql);

    // Start with the default query
    $sql = "SELECT * FROM books WHERE 1=1";

    // Check if there's a search query for Books
    if (!empty($_GET['search'])) 
    {
        // The search matches book titles, authors, and genres
        $search = $conn->real_escape_string($_GET['search']);
        $sql .= " AND (title LIKE '%$search%' OR author LIKE '%$search%' OR genre LIKE '%$search%')";
    }
    
    $sql .= " ORDER BY title ASC"; // Always order Books alphabetically by title
    $result = $conn->query($sql);
?> 

<!DOCTYPE html>
<html lang = "en">

<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
    <title>Montclair Library System - BookDirectory</title>
    <link href = "../css/bootstrap_css/bootstrap.min.css" rel = "stylesheet"> <!-- Bootstrap -> Loaded Locally (Was having blocking issues)-->
    <link rel = "stylesheet" href = "../css/style.css"> <!-- custom Css link -->
</head>

<body>
    <!-- Navigation Bar -->
    <nav class = "navbar navbar-expand-lg navbar-red" > 
        <div class = "container-fluid">
            <a class = "navbar-brand" href = "BookDirectory.php"></a>
            <button class = "navbar-toggler" type = "button" data-bs-toggle = "collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class = "navbar-toggler-icon"></span>
            </button>

            <div class = "collapse navbar-collapse" id = "navbarNav">
                <ul class = "navbar-nav">
                    <li class = "nav-item"><a class = "nav-link fw-bold" href = "Home.php">Home</a></li>
                    <li class = "nav-item"><a class = "nav-link fw-bold" href = "BookDirectory.php">Book Directory</a></li>
                    <li class = "nav-item"><a class = "nav-link fw-bold" href = "Login.php">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

 
 <!-- Page content can go here needs a main class possibly -->

    <div class = "image-container"> <!-- MSU Logo -->
        <img src = "../Resources/MSULogoLongTransparent.jpg" alt = "MSU Logo" class = "MSU-image">
    </div>

    <!-- Search Bar for the directory-->
    <div class = "container mt-3">
        <form method = "GET" action = "BookDirectory.php" class = "d-flex justify-content-center">
            <input type = "text" name = "search" class = "form-control me-2" placeholder = "Search for a Book..." style = "max-width: 400px;"
                value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
            <button type = "submit" class = "btn btn-red">Search</button>
        </form>
    </div>  

    <!-- Book Directory Layout -->
    <div class = "container mt-4">
        <h2 class = "text-center">📚 Book Directory</h2>
        <div class = "row">
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class = "col-md-4 mb-4">
                    <div class = "card shadow-sm">
                        <img src = "<?= !empty($row['image_url']) ? $row['image_url'] : '../Resources/SchoolShieldThingTransparent.png'; ?>" 
                            class = "card-img-top" 
                            alt = "Book Cover" 
                            style = "max-height: 250px; object-fit: contain; background-color: black;">
                        <div class = "card-body text-center">
                            <h5 class = "card-title"><?= htmlspecialchars($row['title']); ?></h5>
                            <p class = "card-text"><strong>Author:</strong> <?= htmlspecialchars($row['author']); ?></p>
                            <p class = "card-text"><strong>Genre:</strong> <?= htmlspecialchars($row['genre']); ?></p>
                            <p class = "card-text"><strong>Published:</strong> <?= $row['published']; ?></p>
                            <!-- Btn for future Dynamically loaded Book detail pages... -->
                            <a href="BookDetails.php?id=<?= $row['id']; ?>" class="btn btn-primary btn-sm">View Book Details</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
    

    <!-- Footer -->
    <footer class="text-white text-center py-3 footer-red">
        <p>&copy; 2025 Montclair State University. All Rights Reserved.</p>
    </footer>


<!-- Bootstrap Bundle with Popper (for interactive components) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
