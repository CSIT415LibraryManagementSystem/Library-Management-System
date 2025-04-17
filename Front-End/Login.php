<!-- ----------------------------------------------------------------------------------------------------------------------------------
                 This is our Login page. It will handle user authentication and connect users to their accounts. 
------------------------------------------------------------------------------------------------------------------------------------ -->
<?php
    session_start();
    include '../Core/db_connect.php';

    $error = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM profiles WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) 
        {
            if (password_verify($password, $row['password'])) 
            {
                $_SESSION['user'] = $row['username'];
                header("Location: Home.php");
                exit();
            } else 
            {
                $error = "Invalid password.";
            }
        } else 
        {
            $error = "No account found with this email, Please Register in the top right.";
        }

        $stmt->close();
    }
?>

<!DOCTYPE html>
<html lang = "en">

<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
    <title>Montclair Library System - Home</title>
    <link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel = "stylesheet"> <!-- Bootstap -->
    <link rel = "stylesheet" href = "../css/style.css"> <!-- custom Css link -->
</head>

<body>
    <!-- Navigation Bar -->
    <nav class = "navbar navbar-expand-lg navbar-red" > 
        <div class = "container-fluid">
            <a class = "navbar-brand" href = "Login.php"></a>
            <button class = "navbar-toggler" type = "button" data-bs-toggle = "collapse" data-bs-target="#navbarNav"
                aria-controls = "navbarNav" aria-expanded = "false" aria-label = "Toggle navigation">
                <span class = "navbar-toggler-icon"></span>
            </button>

            <div class = "collapse navbar-collapse" id = "navbarNav">
                <ul class = "navbar-nav d-flex w-100">
                    <li class = "nav-item"><a class = "nav-link fw-bold" href = "Home.php">Home</a></li>
                    <li class = "nav-item"><a class = "nav-link fw-bold" href = "BookDirectory.php">Book Directory</a></li>
                    <li class = "nav-item"><a class = "nav-link fw-bold" href = "Login.php">Login</a></li>
                    <li class = "nav-item ms-auto"><a class = "nav-link fw-bold" href = "RegistrationPage.php">Register Now</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page content can go here needs a main class possibly -->

    <div class = "image-container"> <!-- MSU Logo -->
        <img src = "../Resources/MSULogoLongTransparent.jpg" alt = "MSU Logo" class = "MSU-image">
    </div>

    <!-- Login Form -->
    <div class = "container my-5">
        <h2 class = "text-center mb-4">Login</h2>

        <?php if ($error): ?>
            <div class = "alert alert-danger text-center"><?php echo $error; ?></div>
        <?php endif; ?>

        <form method = "POST" class = "mx-auto" style = "max-width: 500px;">
            <div class = "mb-4">
                <label class = "form-label">Email</label>
                <input type = "email" name = "email" class = "form-control" placeholder = "example@email.com" required>
            </div>

            <div class = "mb-4">
                <label class = "form-label">Password</label>
                <input type = "password" name = "password" class = "form-control" placeholder = "Password" required>
            </div>

            <button type = "submit" class = "btn btn-primary w-100 btn-red">Login</button>
        </form>
    </div>

    <!-- Footer -->
    <footer class = "text-white text-center py-3 footer-red">
        <p>&copy; 2025 Montclair State University. All Rights Reserved.</p>
    </footer>

    <!-- Bootstrap Bundle -->
    <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>