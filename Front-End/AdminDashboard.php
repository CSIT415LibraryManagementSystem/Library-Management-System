<?php
    include '../Core/db_connect.php'; // Connects to BookDB
    session_start();
    $username = $_SESSION['user'];

    // Ensures No one accesses this page through browser manipulation
    if (!isset($_SESSION['account_type']) || $_SESSION['account_type'] !== 'Librarian') 
    {
        header("Location: Login.php");
        exit();
    }
    
    if (!isset($_SESSION['user_id'])) 
    {
        // Fallback to fetch it from DB (Ensures Users CANNOT Delete themselves)
        header("Location: Login.php");
        exit();
    }

    // Handle Add User
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create_user'])) 
    {
        $new_username = $_POST['new_username'];
        $new_email = $_POST['new_email'];
        $new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
        $new_type = $_POST['account_type'];

        $stmt = $conn->prepare("INSERT INTO profiles (username, email, password, account_type) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $new_username, $new_email, $new_password, $new_type);
        $stmt->execute();

        header("Location: adminDashboard.php");
        exit();
    }

    // Handle Delete User
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_user'])) 
    {
        $delete_id = intval($_POST['delete_user_id']);
        if ($delete_id == $_SESSION['user_id']) 
        {
            echo "<div class='alert alert-warning text-center'>You cannot delete yourself.</div>";
        } 
        else 
        {
            $stmt = $conn->prepare("DELETE FROM profiles WHERE id = ?");
            $stmt->bind_param("i", $delete_id);
            $stmt->execute();
            header("Location: adminDashboard.php");
            exit();
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
        <title>Montclair Library System - Librarian Dashboard</title>
        <link href = "../css/bootstrap_css/bootstrap.min.css" rel = "stylesheet"> <!-- Bootstrap -> Loaded Locally (Was having blocking issues)-->
        <link rel = "stylesheet" href = "../css/style.css"> <!-- custom Css link -->
    </head>

    <body>
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

                        <li class = "nav-item ms-auto">
                            <span class = "nav-link fw-bold">Welcome, Librarian <?php echo htmlspecialchars($_SESSION['user']); ?></span>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Page content starts here -->

        <div class = "image-container"> <!-- MSU Logo -->
            <img src = "../Resources/MSULogoLongTransparent.jpg" alt = "MSU Logo" class = "MSU-image">
        </div>

        <div class = "container mt-5">
            <div class = "row">
                <!--  Book Management -->
                <div class = "col-md-6 mb-4">
                    <div class = "card card-montclair">
                        <div class = "card-header text-center">Book & Checkout Management</div>
                        <div class = "card-body d-flex flex-column align-items-center">
                            <button class = "btn btn-redDashb" onclick = "location.href = '#insertBook'">Add Book</button>
                            <button class = "btn btn-redDashb" onclick = "location.href = '#manageBooks'">Manage Books</button>
                            <button class = "btn btn-redDashb" onclick = "location.href = '#viewCheckouts'">View Checkouts</button>
                        </div>
                    </div>
                </div>

                <!-- 👤 User Management -->
                <div class = "col-md-6 mb-4">
                    <div class = "card card-montclair">
                        <div class = "card-header text-center">User Management</div>
                        <div class = "card-body d-flex flex-column align-items-center">
                            <button class = "btn btn-redDashb" onclick = "location.href = '#manageUsers'">Manage Users</button>
                            <button class = "btn btn-redDashb" onclick = "location.href = '#addUser'">Add User</button>
                            <button class = "btn btn-redDashb" onclick = "location.href = '#editUser'">Edit User</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Admin Tool Sections -->
        <div class="container-fluid px-4">

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_book'])) 
        {
            $title = $_POST['title'];
            $author = $_POST['author'];
            $published = $_POST['published']; 
            $genre = $_POST['genre'];
            $imagePath = NULL;
        
            // Check if file was uploaded
            if (isset($_FILES['book_image']) && $_FILES['book_image']['error'] === UPLOAD_ERR_OK) 
            {
                $fileTmpPath = $_FILES['book_image']['tmp_name'];
                $fileName = basename($_FILES['book_image']['name']);
                $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        
                $allowedExtensions = ['jpg', 'jpeg', 'png'];
                if (in_array($fileExtension, $allowedExtensions)) 
                {
                    $newFileName = uniqid('book_', true) . '.' . $fileExtension;
                    $uploadPath = '../Resources/BookCovers/' . $newFileName;
        
                    if (move_uploaded_file($fileTmpPath, $uploadPath)) 
                    {
                        $imagePath = $uploadPath;
                    }
                }
            }
        
            // Insert into database
            $stmt = $conn->prepare("INSERT INTO books (title, author, published, genre, image_url) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $title, $author, $published, $genre, $imagePath);
            $stmt->execute();
            echo "<div class = 'alert alert-success text-center'>Book added successfully.</div>";
        }

        ?>            
        <!-- Add Book Section -->
        <section id = "insertBook" class = "admin-block mb-4 p-4">
        <h3>Add Book</h3>
        <form method = "POST" enctype = "multipart/form-data">
            <input type = "text" name = "title" placeholder = "Title" class="form-control mb-2" required>
                <input type = "text" name = "author" placeholder = "Author" class="form-control mb-2" required>
                <input type = "text" name = "genre" placeholder = "Genre" class="form-control mb-2" required>
                <input type = "int" name = "published" placeholder = "Year Published" class="form-control mb-2" required>
                <input type = "file" name = "book_image" class = "form-control mb-2" accept = ".jpg, .jpeg, .png">
                <button type = "submit" name = "add_book" class = "btn btn-primary btn-gray">Add Book</button>
            </form>
        </section>

        <!-- Manage Books Section -->
        <section id = "manageBooks" class = "admin-block-alt mb-4 p-4">
            <h3>Manage Books</h3>
            <table class = "table table-striped">
                <thead><tr><th>Title</th><th>Author</th><th>Genre</th></tr></thead>
                <tbody>
                    <?php
                    $result = $conn->query("SELECT * FROM books");
                    while ($book = $result->fetch_assoc()) 
                    {
                        echo "<tr><td>{$book['title']}</td><td>{$book['author']}</td><td>{$book['genre']}</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>

        <!-- View Checkouts Section -->
        <section id = "viewCheckouts" class = "admin-block mb-4 p-4">
            <h3 class = "text-center">Current Checkouts</h3>
            <table class = "table table-bordered">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Book ID</th>
                        <th>Due Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "
                        SELECT c.user_id, p.username, p.email, c.book_id, c.due_date
                        FROM checkouts c
                        INNER JOIN profiles p ON c.user_id = p.id
                        WHERE c.return_date IS NULL
                        ORDER BY c.due_date ASC
                    ";

                    $result = $conn->query($query);

                    while ($row = $result->fetch_assoc()) 
                    {
                        echo "<tr>";
                        echo "<td>{$row['user_id']}</td>";
                        echo "<td>" . htmlspecialchars($row['username']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                        echo "<td>{$row['book_id']}</td>";
                        echo "<td>{$row['due_date']}</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>

        <!-- Manage Users Section -->
        <section id = "manageUsers" class = "admin-block-alt mb-4 p-4">
            <h3 class = "text-center">Manage Users</h3>
            <table class = "table table-striped">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Account Type</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $users = $conn->query("SELECT id, username, email, account_type FROM profiles");

                    while ($user = $users->fetch_assoc()) 
                    {
                        echo "<tr>";
                        echo "<td>{$user['id']}</td>";
                        echo "<td>" . htmlspecialchars($user['username']) . "</td>";
                        echo "<td>" . htmlspecialchars($user['email']) . "</td>";
                        echo "<td>{$user['account_type']}</td>";
                        echo "<td>
                                <form method = 'POST' onsubmit =\"return confirm('Are you sure you want to delete this user?');\">
                                    <input type = 'hidden' name = 'delete_user_id' value = '{$user['id']}'>
                                    <button type = 'submit' name = 'delete_user' class = 'btn btn-sm btn-danger'>Delete</button>
                                </form>
                                </td>";
                    }
                    ?>
                </tbody>
            </table>
        </section>

        <!-- Add User Section -->
        <section id = "addUser" class = "admin-block mb-4 p-4">
            <h3 class = "text-center">Add User</h3>
            <form method = "POST">
                <input type = "text" name = "new_username" class = "form-control mb-2" placeholder = "Username" required>
                <input type = "email" name = "new_email" class = "form-control mb-2" placeholder = "Email" required>
                <input type = "password" name = "new_password" class = "form-control mb-2" placeholder = "Password" required>

                <select name = "account_type" class = "form-select mb-3" required>
                    <option value = "Member">Member</option>
                    <option value = "Librarian">Librarian</option>
                </select>
                
                <button type = "submit" name = "create_user" class = "btn btn-primary btn-gray">Add User</button>
            </form>
        </section>

        <!-- Edit User Section -->
        <section id = "editUser" class = "admin-block-alt mb-4 p-4">
            <h3 class = "text-center">Edit User</h3>

            <?php
            $edit_user_data = null;

            // Load user data for editing
            if (isset($_POST['load_user'])) 
            {
                $edit_id = intval($_POST['edit_user_id']);
                $stmt = $conn->prepare("SELECT id, username, email, account_type FROM profiles WHERE id = ?");
                $stmt->bind_param("i", $edit_id);
                $stmt->execute();
                $result = $stmt->get_result();
                $edit_user_data = $result->fetch_assoc();
                $stmt->close();
            }

            // Save updated user data
            if (isset($_POST['update_user'])) 
            {
                $update_id = $_POST['update_id'];
                $updated_username = $_POST['updated_username'];
                $updated_email = $_POST['updated_email'];
                $updated_type = $_POST['updated_account_type'];

                $stmt = $conn->prepare("UPDATE profiles SET username = ?, email = ?, account_type = ? WHERE id = ?");
                $stmt->bind_param("sssi", $updated_username, $updated_email, $updated_type, $update_id);
                $stmt->execute();

                echo "<div class = 'alert alert-success text-center'>User updated successfully.</div>";
            }
            ?>

            <!-- Load Form -->
            <form method = "POST" class = "mb-4">
                <input type = "number" name = "edit_user_id" class = "form-control mb-2" placeholder = "Enter User ID to Edit" required>
                <button type = "submit" name = "load_user" class = "btn btn-primary btn-red">Load User</button>
            </form>

            <!-- Update Form -->
            <?php if ($edit_user_data): ?>
                <form method = "POST">
                    <input type = "hidden" name = "update_id" value = "<?= $edit_user_data['id'] ?>">
                    <input type = "text" name = "updated_username" value = "<?= htmlspecialchars($edit_user_data['username']) ?>" class = "form-control mb-2" required>
                    <input type = "email" name = "updated_email" value = "<?= htmlspecialchars($edit_user_data['email']) ?>" class = "form-control mb-2" required>

                    <select name = "updated_account_type" class = "form-select mb-3" required>
                        <option value = "Member" <?= $edit_user_data['account_type'] === 'Member' ? 'selected' : '' ?>>Member</option>
                        <option value = "Librarian" <?= $edit_user_data['account_type'] === 'Librarian' ? 'selected' : '' ?>>Librarian</option>
                    </select>

                    <button type = "submit" name = "update_user" class = "btn btn-success btn-red">Update User</button>
                </form>
            <?php endif; ?>
        </section>
    </div>

    <script src="../Back-End/bootstrap_js/bootstrap.bundle.min.js"></script>    
        
    <!-- Footer -->
    <footer class = "text-white text-center py-3 footer-red">
        <p>&copy; 2025 Montclair State University. All Rights Reserved.</p>
    </footer>

    </body>
</html>
