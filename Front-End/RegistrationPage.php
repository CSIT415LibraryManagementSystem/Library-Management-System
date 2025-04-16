<!-- ----------------------------------------------------------------------------------------------------------------------------------
                    This is a subpage for the Login Page. This is going to be a registration page for new users.  
------------------------------------------------------------------------------------------------------------------------------------ -->
<?php
include "../Core/db_connect.php";

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Secure hashing

    // 1st check if email already exists (User is registered)
    $check = $conn->prepare("SELECT id FROM profiles WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) 
    {
        echo "This email is already registered. <a href='login.php'>Login instead</a>";
        $check->close();
    } else 
    {
        $check->close();

        // Insert a new user to the DB       
        $sql = "INSERT INTO profiles (username, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql); 
        $stmt->bind_param("sss", $username, $email, $password);

        if ($stmt->execute()) {
            $success = "Registration successful. <a href='login.php'>Login Here</a>";
        } else {
            $error = "Error: " . $stmt->error;
        }

        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang = "en">

<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
    <title>Montclair Library System - Registeration</title>
    <link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel = "stylesheet"> <!-- Bootstap -->
    <link rel = "stylesheet" href = "../css/style.css"> <!-- custom Css link -->
</head>

<body>
    <!-- Navigation Bar -->
    <nav class = "navbar navbar-expand-lg navbar-red" > 
        <div class = "container-fluid">
            <a class = "navbar-brand" href = "RegistrationPage.php"></a>
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

    <div class="image-container"> <!-- MSU Logo -->
        <img src="../Resources/MSULogoLongTransparent.jpg" alt="MSU Logo" class="MSU-image">
    </div>

    <!-- Registeration Form -->
    <div class = "container my-5">
        <h2 class = "text-center mb-4">Register</h2>

        <?php if ($error): ?>
            <div class = "alert alert-danger text-center"><?php echo $error; ?></div>
        <?php endif; ?>

        <?php if ($success): ?>
            <div class = "alert alert-success text-center"><?php echo $success; ?></div>
        <?php endif; ?>

        <form method = "POST" class = "mx-auto" style = "max-width: 500px;">
            <div class = "mb-4"> <!-- --> 
                <label class = "form-label">Username</label>
                <input type = "text" name = "username" class = "form-control" required>
            </div>

            <div class = "mb-4"> <!-- --> 
                <label class = "form-label">Email</label>
                <input type = "text" name = "email" class = "form-control" placeholder = "JohnSmith@gmail.com" required>
            </div>

            <div class = "mb-4"> <!-- --> 
                <label class = "form-label">Password</label>
                <input type = "text" name = "password" class = "form-control" placeholder = "Password123" required>
            </div>
            
            <button type = "submit" class = "btn btn-primary w-100 btn-red">Register</button>
        </form>
    </div>


    <!-- Footer -->
    <footer class="text-white text-center py-3 footer-red">
        <p>&copy; 2025 Montclair State University. All Rights Reserved.</p>
    </footer>
</body>


<!-- Bootstrap Bundle with Popper (for interactive components) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</html>
