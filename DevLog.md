## This will be any comments, explanations, logging work completed, etc...

### 2.4.2025 - 5:55pm - Kyler
- This is an example log to showcase how we can log all our work done on this project. I started a tiny bit of documentation in our README today as well as am currently trying to set up this log. Things I want to get done today will be discussing the framework we plan to make with you guys as well as possibly using github Projects feature as its very neat and organized but would have a learning curve for all of us, therefore it could be unnecessary. ( You could just write general notes about what you did as another source of us all to be on the same page. Also acts as a timeline for us to follow... you would do this after your work is done and then push ur changes to github. )

### 2.7.2025 - 2:14am - Kyler
- I set up a general directory layout to keep our code clean (We can edit it or revise it however you guys want!), I also made a home/landing page... No current body content on the page wanted to see if you guys wanted to make this a main page or just an entry point... currently did it in a html not a php file as we won't need any database connection for this page in the foreseeable future. Also set up some of the css. Tried to comment super well on everything I could! 

### 2.12.2025 - 4:15 pm - Kyler
- I set up the other pages htmls, just copy and pasted the home for the main layout each page will maintain and now the nav is set up. I also drew up some wireframes that Shaima and I are going to work off for the Ui layouts. Did some more bootstrap formating like making the nav-link titles bold... Also set up a subpage off the Login page that has a register now page set up for users that aren't registered. Probably going to set up temp jsons over doing the SQL soon and get user authentication in place as we work on the UI and maybe a little back-end too. Main worry I have right now is how to manage login states across pages I forgot how it works. Will probably do some work tonight (2.12 Wednesday) I did this last night and never pushed it.. Committing it now.

### 2.20.2025 - 2:45 pm - Steven
- I have started to work onto the functionality of the html pages and the JavaScript necessary. I did some changes for the BookDirectory.html in order to implement a search bar and make sure the items appear as they should after the search. I have also done some changes in the style.css for the mentioned search bar, and will continue further into making sure that what is implemented and functional. Let me know if there exists any error of what is added or not necessary, and if something needs to be worked on as soon as possible.

### 2.27.2025 - 1:14 pm - Nick
- I began creating and uploaded a basic database consisting of 20 books. If we have more time for the project, we can add more books in the future. The database consists of the following: id (auto incremented), name, genre, author, published date. All there is left to do database wise is figure out a way to store jpg files so that books can appear more visibly on our website. I will continue to explore and do research in regards to this sometime this weekend. When that is finished, I'll make sure to polish the SQL file with comments so that it is easily readable as well.

### 3.2.2025 - 2:05 pm - Shaima and Kyler #1 
- We're finsihed the UI and Kyler is starting the Back-end with it, going to look through the sql file so we understand it better and how we will connect it. 

- Changes we added as we go or New Implements:
    - Fixed a small typo in the eventlisterner for the Book Directory search query (addeventListener -> addEventListener)... 
    - As well as in the <script> changed the If/Else block statement to an inLine style for if else...
          - (Its just a shortcut that basically does -> condition ? Do_This_if_Expression_is_True : Do_this_if_expression_is_false; -> title.includes(query) ? 'block' : 'none') so if the title is included in the query it will display the data in the block format and if it is not its null or 'none' in this example so nothing displayed...
    - Changed the htmls to php to start gettign ready to connect to the database..
    - Set up a php file that hold the connection code to the BookDB (books.sql) database for easy connections.
    - Set up the carousel with php to populate the carousel-items with the data ... we just need to link imgs whcih i explained easily how to connect them in the Home.php on line 61
          - I also spent about 3 hours getting this to work because the active slide wasn't setting properly b/c I populated it said carousel-itemactive instead of carousel-item active .... (didn't concate the space in correctly... )
    - Currently I also clearly have this working through connecting this through MariaDB in XAMPP, here is hwo for the groupmates who have not used XAMPP:
            - Download XAMPP from internet (if do not already have it)
            - Once Installed and ready open XAMPP and start Apache and MySQL (all the default settings should be fine)
            - Carry the Whole repository into htdocs in XAMPP -> You can search ur files with XAMPP on ur computer and XAMPP_home or something like that should bring you to the right directory..
            - Put the whole project in httdocs if on windows... I think it may be different for MacOS .. .just chatgbt it or look at documentation should be easy to figure out...
            - open -> http://localhost/phpmyadmin/ 
            - Go to export and export the BookDB database in the phpmyadmin dashboard and leave all the settings the same
            - now open the project -> http://localhost/Library-Management-System/Front-End/Home.php and it should be working as a WebServer with the Database connected !!! 
      - Going to push this code now and start working on the rest of the To-Do list with Shaima! (6:13pm)

### 3.2.2025 - 9:58 pm - Shaima and Kyler #2
- Setup the Home.php <--- Mostly finished
- Features to be added to Home.php
      - Populate the dashboard with user data when the userDB is set up..
      - Make functionality for Admins like user management on Home.php if a User has credentials
      - Possibly make the Staff Picks be able to be set if a user has admin credentials <- Currently it just selects 4 random books from the BookDB

### 3.2.2025 - 10:58pm - Kyler #3
- Setup the Bookdirectory 3-block grid where php fills all the books and their info into a infite scroll on BookDirectory.php
- Setup the search bar query and edited the js search from objects to php search function that $_GET to search the vault by author, title, or genre.. so a filter bar is no longer useful.. I think we need to add books.. thinking about making a script to populate the database to save time in the future.. would only need to get the jpgs then.. Think I am done for today. 

### 3.19.2025 - 2:14pm - Kyler
- I wrote the script (BookDetails.php) that loads in BookDB data and populates UI for the page. It is dynamically based of the 'id' of the book so it works for all books. Has essential error checking to deal with incorrectly returned 'id' attributes for the entity it pulls from. 
- Things we need to focus on next:
      - UserDB *****
      - Admin and User logins and auth
      - AdminDashboard (Make a whole seperate page?)
      - Populate the User Dashboard on the Home.php with User data
      - Scripts for checkouts and managing user data
      - Admin BackEnd Scripts to give them functionality over User and Book Management
      - Add a Btn to the BookDetails Data for a User to checkout that book (As well as the BackEnd Script to accomapny the UI)
      - That's all that comes to my mind right now to be accomplished.. ^^ (Once the UserDB is in place we can get the rest done decently quick)

### 3.20.2025 - 2:00pm - Steven
- I added a new table for the book database, in which the synopsis is added. The idea is to fill up more the book details page. This is in regard so the user can have more of a better experience, so to know what the book is about in case they are not familiar with it. As well as adding this change to the php page so it displays the mentioned synopsis, I resized the book covers as it was something mentioned in the Milestone 1 conversation, since the past version would cut off the cover and therefore not display it properly. The change was from an "object-fit: cover" to "object-fit: contain", and added a black background for the blank space surrounding said cover. I am not sure if it is the best way to display it, but if there is any way to make it look better I'll be sure to implement it.

### 3.30.2025 - 10:00pm - Nick
- I created multiple files for the signing in / registration portion of our project. I first created the profiles table in SQL, to store any inputted data from our website. It has a name, email, password, and id as a primary key. After finishing that, I began working on some php files to create functionality between the database and our website. I slightly changed the db_connect.php file which added our second database. Following that, I created four php files as a general basis. register.php handles when a user is creating a new account for the first time. login.php will search our current database for the email and password inputted. logout.php is a small, brief code that logs a given user out. Lastly, the dashboard.php deals with all cookies involved with the process of logging in. I will try and polish more of the program tomorrow if I have time with Kyler.

### 04.02.2025 - 11:47pm - Kyler #1 
- I reviewed some of the php files Nick made. (They were great @Nick ! ). I merged the register.php into the registrationPage.php. I set up the Form and the php code using POST to get the credentials and add a user to the database. I modified the PHP code with establishing the connection and adding a new user into the database to use a if/else statement to run a check to see if users had already been registered (Works off of Email). I modifed the db_connect.php to run off a single database with tables for books (Same as before) and now also includes (Profiles which is for users (Again thank u Nick). So The only change is we have one database instead of 2 so later on we can have data communicate across the database). And just some other small minor changes and implements that I cannot rememeber. SO now when u guys pull the codebase next time just make sure you either add the profiles table (users.sql) into the current database you have with PhpMyAdmin or make a new one and add them both. (Only if you care that your current DB b/c it is proabably named BookDB or something, doesn't matter from a functional standpoint if you just add the new table into the current DB.)
     
      - The registration Page is fully functional now, go check it out! Also the only thing I need to change about it is better error messages and success messages. maybe successful registration redirects you to the home page ? IDK not sure yet... Defintely the error messages needs to be like a pop up card or something, its currently just text at the top of the screen.

- Things that need to be implemented :
      - The login.php script needs to be merged and added with the Login.php Page script.
      - We should probably modify the Profile table in the DB to handle roles (Admin, user, etc... Maybe only those two?) and also also modify the php script to assign roles based off credentials for logins which will control a redirect to an Admin Dashboard 
      - The Admin Dashboard view and functionality (This is probably our biggest hurdle tbh the rest should go quick when I get past this 379 test on Monday I'll finish a lot up.)
      - We still need to do the merge for the User Dashboard on the homepage.. This might be a little difficult because we probably need to add a Checkout table and connect it to users Profiles Table and Books Table.
      - Still need the btn for Book checkout on the BookDetails page... Look up for more info...
      - I think that is generally the larger changes we need to add.

### 04.03.2025 - 12:45pm - Nick

- I decided to create an employees table for our website. There needs to be some more adjusting that I will do at some point next week. This includes the incorporation of log in info which is something I need to research. I also inserted a few sample employees as well to give everyone an idea of how the employees structure will look. This whole database is subject to change, I just wanted to give everyone a general basis of what it is and should look like. As I previously said, I will work on the rest next week once Kyler completes the login / registration portion so that the database can properly connect. 

### 04.16.2025 - 5:08 pm - Kyler
- I implemented a few minor things and polished some errors I had noticed with alert messages and such.
- So I finished the Login.php, the logout.php, and the session handling persistance across pages. So now Registration -> Login -> Logout are all fully complete.
- Things we need to implement still :
      - Admin View -> Just a new page that populates with data from the DBs and sets up admin credentials, etc..
      - I need to populate the user dashboard with the user's data (Checkouts, Returns due, etc...) (SHOULDN'T BE HARD)
      - Add a checkout button to the BookDetails page and the php to go with it.
      - Make a Checkout Table that is associated with a user through a PK to FK
      - Make a return button or have books auto return when they are overdue (Simulate returns?)
      - That should be about everything we have to do in total! 

### 04.16.2025 - 10:52 pm - Kyler #2
- I built the `BookBorrowed.php` page which shows all currently checked-out books for the logged-in user. It uses a SQL join between `checkouts` and `books` and filters by `return_date IS NULL`. The UI mimics the grid layout used on the BookDetails page with a responsive Bootstrap card grid.
- I created a `Return.php` script that updates the `return_date` for a specific checkout ID (instead of deleting it), and redirects the user back to BookBorrowed.php with a success or failure alert.
- I added a "Return Book" button to each card in BookBorrowed.php. The button is wrapped in a `<form>` that posts the `checkout_id`.
- On BookBorrowed.php, I added Bootstrap alerts to confirm whether the return succeeded or failed (green success or red failure banner above the grid).
- I updated the Home.php dashboard logic:
      - `borrowedCount`: now only counts books where `return_date IS NULL`
      - `dueSoonCount`: only includes active loans due within 7 days
      - `hasOverdue`: only flags books with `return_date IS NULL AND due_date < CURDATE()`
      - These values now accurately reflect the user’s current checkout status.
- I added a navbar link and dashboard card button to take the user to their BookBorrowed.php page.
- I also added **30 new books to the database** (IDs 21–50) using an `INSERT INTO books` SQL statement. I updated genres, fixed incorrect publication years, ensured image paths were correct, and chatgbt'd synopsis for each one.
- All data was checked and cleaned, so these are ready to use in any UI displays like carousels, staff picks, or search listings.
- Everything tested successfully. The return system now works end-to-end, and user dashboard values are synced in real time.

