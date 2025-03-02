<!-- ----------------------------------------------------------------------------------------------------------------------------------
                         This is our Book Directory(Virtual Library). It will service as a serach function for 
                our library where uses can search by a name in a search bar(Will partially match search query to titles).
               It will have a small checkable table that acts as filters and will remove books that do not fall within the
            conditions. Will also be setup in a grid box and will have infinite scroll and not use pagination (Multiple pages).
------------------------------------------------------------------------------------------------------------------------------------ -->
<!-- <?php
    session_start();
?> --> 

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

    <div class="image-container"> <!-- MSU Logo -->
        <img src="../Resources/MSULogoLongTransparent.jpg" alt="MSU Logo" class="MSU-image">
    </div>

    <!-- Search Bar for the directory-->
    <div class="search-container">
      <input type="text" id="searchBar" placeholder="Search your books" class="search-input">
    </div>  

    

    <!-- Footer -->
    <footer class="text-white text-center py-3 footer-red">
        <p>&copy; 2025 Montclair State University. All Rights Reserved.</p>
    </footer>


<!-- Bootstrap Bundle with Popper (for interactive components) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- JavaScript for the search bar -->
  <script>
    document.getElementById('searchBar').addEventListener('input', function() 
    {
      let query = this.value.toLowerCase();
      let books = document.querySelectorAll('.book-item');

      books.forEach(function(book) 
      {
        let title = book.querySelector('.book-title').textContent.toLowerCase();
        books.style.display = title.includes(query) ? 'block' : 'none'; //Simplified the if/else statement to a to a inline if/else for better readability
        });
      });
    
  </script>

</body>
</html>
