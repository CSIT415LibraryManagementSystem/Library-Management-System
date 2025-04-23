<!-- ----------------------------------------------------------------------------------------------------------------------------------
                         This is our landing page (Home page). It will service as a basic entry to our website
                    with just aesthetics and a main nav bar, we can add more after we discuss what we want on it. 
------------------------------------------------------------------------------------------------------------------------------------ -->
<?php
    session_start();
    include '../Core/db_connect.php'; // Connects to BookDB

    //Init Vars
    $borrowedCount = 0;
    $dueSoonCount = 0;
    $hasOverdue = false;
    $AccountType = 'Member'; // Default AccountType = Member
    
    if (isset($_SESSION['user'])) 
    {
        // Get the user's ID
        $stmt = $conn->prepare("SELECT id FROM profiles WHERE username = ?");
        $stmt->bind_param("s", $_SESSION['user']);
        $stmt->execute();
        $stmt->bind_result($user_id);
        $stmt->fetch();
        $stmt->close();

        // Get the user's Account Type
        $stmt = $conn->prepare("SELECT account_type FROM profiles WHERE username = ?");
        $stmt->bind_param("s", $_SESSION['user']);
        $stmt->execute();
        $stmt->bind_result($AccountType);
        $stmt->fetch();
        $stmt->close();

        $_SESSION['account_type'] = $AccountType; // Store the fetched User account_type in $AccountType

        if ($user_id) 
        {
            // Total books currently borrowed
            $stmt = $conn->prepare("SELECT COUNT(*) FROM checkouts WHERE user_id = ? AND return_date IS NULL");
            $stmt->bind_param("i", $user_id);
            $stmt->execute();
            $stmt->bind_result($borrowedCount);
            $stmt->fetch();
            $stmt->close();
    
            // Books due in the next 7 days
            $stmt = $conn->prepare("
                SELECT COUNT(*) 
                FROM checkouts 
                WHERE user_id = ? 
                AND return_date IS NULL 
                AND due_date BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 7 DAY)
            ");
            $stmt->bind_param("i", $user_id);
            $stmt->execute();
            $stmt->bind_result($dueSoonCount);
            $stmt->fetch();
            $stmt->close();
    
            // Check for overdue books
            $stmt = $conn->prepare("
                SELECT COUNT(*) 
                FROM checkouts 
                WHERE user_id = ? 
                AND return_date IS NULL 
                AND due_date < CURDATE()
            ");
            $stmt->bind_param("i", $user_id);
            $stmt->execute();
            $stmt->bind_result($overdueCount);
            $stmt->fetch();
            $stmt->close();
    
            $hasOverdue = $overdueCount > 0;
        }
    }
?>

<!DOCTYPE html>
<html lang = "en">

<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
    <title>Montclair Library System - Home</title>
    <link href = "../css/bootstrap_css/bootstrap.min.css" rel = "stylesheet"> <!-- Bootstrap -> Loaded Locally (Was having blocking issues)-->
    <link rel = "stylesheet" href = "../css/style.css"> <!-- custom Css link -->
</head>

<body>
    <!-- Navigation Bar -->
    <nav class = "navbar navbar-expand-lg navbar-red" > 
        <div class = "container-fluid">
            <a class = "navbar-brand" href = "Home.php"></a>
            <button class = "navbar-toggler" type = "button" data-bs-toggle = "collapse" data-bs-target = "#navbarNav"
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

                    <?php if (isset($_SESSION['user']) && $AccountType === 'Librarian'): ?>
                        <li class = "nav-item">
                            <a class = "fw-bold admin-link" href = "AdminDashboard.php">Librarian Dashboard</a>
                        </li>
                     <?php endif; ?>

                    <?php if (isset($_SESSION['user'])): ?>
                        <li class = "nav-item">
                            <a class = "nav-link fw-bold" href = "BookBorrowed.php">Books Checked Out</a>
                        </li>
                    <?php else: ?>
                        <!-- Empty if not logged in -->
                    <?php endif; ?>  
                    
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

    <!-- Library Welcome Section-->
    <div class = "container mt-4 welcome-bubble">
        <div class = "text-center">
            <h2>Welcome to Montclair Library!</h2>
            <p class = "lead">
                Explore a vast collection of books, research materials, and digital resources. 
                Borrow books, track your reading history, and discover staff recommendations.
            </p>
        </div>
    </div>


    <!-- Staff Picks Carousel -->
    <div class = "container mt-4">
        <h2 class = "text-center"> Staff Picks </h2> <!--Header for Carousel--> 
        <div id = "staffCarousel" class = "carousel slide" data-bs-ride = "carousel" data-bs-interval = "5000"> <!-- Rotates every 5 secs -> data bs interval = 5000 --> 
            <div class = "carousel-inner">
                <?php 
                    $books = $conn -> query("SELECT * from books ORDER BY RAND() LIMIT 4")-> fetch_all(MYSQLI_ASSOC); // Picks 4 random books from BookDB currently
                    for ($i = 0; $i < count($books); $i++) 
                    {
                        $active = ($i === 0) ? " active" : ""; // Assign "active" only to the first slide
                        echo '<div class = "carousel-item' . ' active' . '">';
                        echo '<div class = "d-flex justify-content-center">';
                        echo '<div class = "card" style = "width :24rem;">';

                        // Possible Display book Images (Default if no img is set...) 
                        // ^^^ **** Nick this is the line If we add the image_url to the database it should be able to locate it if we keep it in resources folder 
                        // so an example would be if we did like ../resources/TheLittlePrince_BookCover or something like that.. 
                        $imagePath = !empty($books[$i]['image_url']) ? $books[$i]['image_url'] : '../Resources/SchoolShieldThingTransparent.png';
                        echo '<img src = "' .$imagePath . '" class = "card-img-top" alt = "Book Cover" style = "max-height: 300px; object-fit: cover;">';
                        
                        echo '<div class = "card-body text-center">';
                        echo '<h5 class = "card-title">' . htmlspecialchars($books[$i]['title']) . '</h5>';
                        echo '<p class = "card-text"><strong>Author:</strong> ' . htmlspecialchars($books[$i]['author']) . '</p>';
                        echo '<p class = "card-text"><strong>Genre:</strong> ' . htmlspecialchars($books[$i]['genre']) . '</p>';
                        echo '</div></div></div></div>'; //div close for card-body, card, d-flex, and carousel item
                    }
                ?>
            </div>

            <!-- These are buttons on the left and right of the carousel that move to the item of the carousel. --> 

            <!-- Left Button --> 
            <button class = "carousel-control-prev" type = "button" data-bs-target = "#staffCarousel" data-bs-slide = "prev">
                <span class = "carousel-control-prev-icon" aria-hidden = "true"  style = "background-color: rgba(0,0,0, 0.5); border-radius: 50%; padding: 10px;"></span>
                <span class = "visually-hidden">Previous</span>
            </button>
            
            <!-- Right Button --> 
            <button class = "carousel-control-next" type = "button" data-bs-target = "#staffCarousel" data-bs-slide = "next">
                <span class = "carousel-control-next-icon" aria-hidden = "true" style = "background-color: rgba(0,0,0, 0.5); border-radius: 50%; padding: 10px;" ></span>
                <span class = "visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <?php if (isset($_SESSION['user'])): ?>
    <!-- User Dashboard Section -->
    <div class = "container mt-4">
        <div class = "card shadow-sm p-3 card-outer">
            <h3 class = "text-center mb-3">Welcome back, <?php echo htmlspecialchars($_SESSION['user']); ?>!</h3>
            <div class = "row">
                
                <!-- Borrowed Books Section -->
                <div class = "col-md-4">
                    <div class = "card bg-light mb-3">
                        <div class = "card-body text-center">
                            <h5 class = "card-title">Books Borrowed</h5>
                            <p class = "card-text"><strong><?= $borrowedCount ?></strong> book<?= $borrowedCount !== 1 ? 's' : '' ?> currently borrowed.</p>
                            <a href = "BookBorrowed.php" class = "btn btn-primary btn-sm mt-2">View Borrowed Books</a>
                        </div>
                    </div>
                </div>

                <!-- Due Books Section -->
                <div class = "col-md-4">
                    <div class = "card bg-light mb-3">
                        <div class = "card-body text-center">
                            <h5 class = "card-title">Books Due Soon</h5>
                            <p class = "card-text"><strong><?= $dueSoonCount ?></strong> book<?= $dueSoonCount !== 1 ? 's' : '' ?> due within the next week.</p>
                        </div>
                    </div>
                </div>

                <!-- Account Status Section -->
                <div class = "col-md-4">
                    <div class = "card bg-light mb-3">
                        <div class = "card-body text-center">
                            <h5 class = "card-title">Account Status</h5>
                            <?php if ($hasOverdue): ?>
                                <p class = "card-text text-danger"> You have overdue books!</p>
                            <?php else: ?>
                                <p class = "card-text text-success">No overdue books. You're all set! </p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <!-- Button Outside of Nav To BookDirectory.php -->
    <div class = "text-center mt-4">
        <a href = "BookDirectory.php" class = "btn btn-primary btn-lg btn-red">
            Browse Library
        </a>
    </div>

    <!-- Footer -->
    <footer class = "text-white text-center py-3 footer-red">
        <p>&copy; 2025 Montclair State University. All Rights Reserved.</p>
    </footer>

<!-- Bootstrap JavaScript Bundle (Required for Carousel) -->
<script src = "../Back-End/bootstrap_js/bootstrap.bundle.min.js"></script>


</body>
</html>
