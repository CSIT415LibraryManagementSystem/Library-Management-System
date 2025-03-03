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

### 3.2.2025 - 9:58 pm - Shaima and Kyler
- Setup the Home.php <--- Mostly finished
- Features to be added to Home.php
      - Populate the dashboard with user data when the userDB is set up..
      - Make functionality for Admins like user management on Home.php if a User has credentials
      - Possibly make the Staff Picks be able to be set if a user has admin credentials <- Currently it just selects 4 random books from the BookDB

### 3.2.2025 - 10:58pm - Kyler
- Setup the Bookdirectory 3-block grid where php fills all the books and their info into a infite scroll on BookDirectory.php
- Setup the search bar query and edited the js search from objects to php search function that $_GET to search the vault by author, title, or genre.. so a filter bar is no longer useful.. I think we need to add books.. thinking about making a script to populate the database to save time in the future.. would only need to get the jpgs then.. Think I am done for today. 