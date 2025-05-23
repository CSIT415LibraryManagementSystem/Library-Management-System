-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 27, 2025 at 07:03 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `published` int(11) DEFAULT NULL,
  `genre` varchar(255) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `Synopsis` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `published`, `genre`, `image_url`, `Synopsis`) VALUES
(1, 'And Then There Were None', 'Agatha Christie', 1939, 'Mystery', '../Resources/BookCovers/AndThenThereWereNone.jpg', 'In \"And Then There Were None,\" ten strangers are invited to a secluded island under different pretexts. Once there, they discover that their mysterious host is absent, and they are accused of past crimes. As they are systematically killed one by one according to a sinister nursery rhyme, the survivors must unravel the identity of the murderer among them. The novel explores themes of guilt, justice, and the psychological effects of fear and suspicion.'),
(2, 'The Alchemist', 'Paulo Coelho', 1988, 'Fantasy', '../Resources/BookCovers/TheAlchemist.jpg', '\"The Alchemist\" follows Santiago, a young shepherd in Andalusia, who dreams of finding a hidden treasure in Egypt. Driven by his desire to fulfill his personal legend, Santiago embarks on a journey across the desert, encountering various characters who guide him towards self-discovery and spiritual enlightenment. Through his adventures, Santiago learns about the importance of listening to his heart, recognizing opportunities, and pursuing his dreams, exploring themes of destiny, faith, and the interconnectedness of all things.'),
(3, 'The Hobbit', 'J.R.R Tolkien', 1937, 'Fantasy', '../Resources/BookCovers/TheHobbit.jpg', 'The book follows the journey of Bilbo Baggins, a reluctant hobbit who is swept into an epic quest by the wizard Gandalf and a group of dwarves. Their mission is to reclaim the lost Kingdom of Erebor from the fearsome dragon Smaug. Along the way, Bilbo encounters trolls, elves, giant spiders, and other fantastical creatures, discovering his own courage and resourcefulness. The novel explores themes of adventure and bravery.'),
(4, 'A Tale of Two Cities', 'Charles Dickens', 1859, 'Fiction', '../Resources/BookCovers/aTaleOfTwoCities.jpeg', 'The novel is set during the French Revolution and follows the lives of several characters in London and Paris. It explores themes of resurrection, sacrifice, and the impact of historical events on personal lives. The story revolves around Charles Darnay, a French aristocrat who moves to England, and Sydney Carton, an English lawyer. Both men are connected through their love for Lucie Manette, the daughter of Dr. Alexandre Manette, a former prisoner of the Bastille. As the revolution intensifies, the characters face various challenges and moral dilemmas, highlighting the contrasts between the two cities and the turbulent times they live in.'),
(5, 'The Great Gatsby', 'F. Scott Fitzgerald', 1925, 'Tragedy', '../Resources/BookCovers/TheGreatGatsby.jpg', '\"The Great Gatsby\" follows the enigmatic millionaire Jay Gatsby and his unrelenting love for the beautiful Daisy Buchanan. Narrated by Nick Carraway, Gatsby\'s neighbor and friend, the novel paints a vivid picture of the era\'s excesses and moral decay. Gatsby\'s lavish parties and mysterious past captivate those around him, but his dream of rekindling his romance with Daisy ultimately leads to tragedy. The novel explores themes of wealth, love, and the elusive American Dream.'),
(6, 'The Hunger Games', 'Suzanne Collins', 2008, 'Fiction', '../Resources/BookCovers/TheHungerGames.jpg', 'In a dystopian future, the oppressive Capitol of Panem forces each of its twelve districts to send one boy and one girl to participate in the annual Hunger Games, a televised fight to the death. Sixteen-year-old Katniss Everdeen volunteers to take her sister\'s place in the Games, where she must rely on her survival skills and instincts to navigate the deadly arena. As she faces harrowing challenges and forms alliances, Katniss becomes a symbol of hope and defiance against the Capitol\'s tyranny, exploring themes of survival, sacrifice, and resistance.'),
(7, 'The Godfather', 'Mario Puzo', 1969, 'Crime', '../Resources/BookCovers/TheGodfather.jpg', '\"The Godfather\" delves into the intricate world of the Corleone crime family, led by the formidable Vito Corleone. As Vito\'s youngest son, Michael, initially distances himself from the family\'s illicit activities, circumstances force him to take on a leadership role. Michael\'s transformation from a reluctant outsider to a ruthless mafia boss is central to the story. The novel examines themes of loyalty, power, and the complexities of family dynamics within the dangerous realm of organized crime.'),
(8, 'The Giver', 'Lois Lowry', 1993, 'Fiction', '../Resources/BookCovers/TheGiver.jpg', 'Twelve-year-old Jonas lives in a seemingly perfect society where everyone follows strict rules to maintain order and harmony. When Jonas is selected to be the Receiver of Memory, he begins training with the Giver, an elderly man who holds the community\'s memories. Through this training, Jonas discovers the dark truths behind his society\'s facade and learns about emotions, colors, and the complexities of life. The novel explores themes of individuality, freedom, and the importance of memory.\n'),
(9, 'Harry Potter and the Philosopher\'s Stone', 'J.K. Rowling', 1997, 'Fantasy', '../Resources/BookCovers/HarryPorterAndThePS.jpg', '\"Harry Potter and the Philosopher\'s Stone\" introduces readers to Harry Potter, an orphaned boy who discovers on his eleventh birthday that he is a wizard. He is invited to attend Hogwarts School of Witchcraft and Wizardry, where he makes friends, learns magic, and uncovers the truth about his parents\' mysterious deaths. As Harry navigates his first year at Hogwarts, he encounters challenges and uncovers secrets that set the stage for his epic battle against the dark wizard Voldemort. The novel explores themes of friendship, bravery, and the power of love.'),
(10, 'The Da Vinci Code', 'Dan Brown', 2003, 'Mystery', '../Resources/BookCovers/TheDaVinciCode.jpg', 'Symbologist Robert Langdon and cryptologist Sophie Neveu are thrust into a thrilling investigation following a murder at the Louvre Museum. Their quest uncovers a series of hidden clues and secrets embedded in the works of Leonardo da Vinci, leading them on a high-stakes chase across Europe. As they unravel the mystery, they confront ancient conspiracies and powerful organizations. The novel explores themes of religion, history, and the tension between science and faith, keeping readers on the edge of their seats.'),
(11, 'The Catcher in the Rye', 'J.D. Salinger', 1951, 'Coming-of-age', '../Resources/BookCovers/TheCatcherInTheRye.jpg', 'This novel follows the experiences of Holden Caulfield, a disenchanted teenager who has been expelled from his prestigious prep school. As he wanders the streets of New York City, Holden grapples with feelings of alienation and the phoniness he perceives in the adult world. His encounters with various characters reveal his deep-seated fears and desires. The novel explores themes of identity, loss, and the challenges of growing up, offering a poignant look at the struggles of adolescence.'),
(12, 'Charlotte\'s Web', 'E. B. White', 1952, 'Fiction', '../Resources/BookCovers/CharlottesWeb.jpg', '\"Charlotte\'s Web\" is a touching story of friendship and loyalty between a pig named Wilbur and a spider named Charlotte. When Wilbur\'s life is threatened, Charlotte devises a plan to save him by weaving words of praise into her web, which astonishes the humans and secures Wilbur\'s future. The novel beautifully captures the bond between the two animals and the farm\'s other inhabitants. Themes of friendship, loyalty, and the cycle of life are woven throughout the narrative, making it a cherished classic for readers of all ages.'),
(13, 'Gone with the Wind', 'Margaret Mitchell', 1936, 'Fiction', '../Resources/BookCovers/GoneWithTheWind.jpg', 'This novel is a sweeping historical romance set during the American Civil War and Reconstruction era. The story follows Scarlett O\'Hara, a strong-willed Southern belle, as she navigates love, loss, and survival in the changing South. Her unrequited love for Ashley Wilkes and tumultuous relationship with Rhett Butler drive the narrative, highlighting her resilience and determination. The novel explores themes of love, war, and the transformation of society.'),
(14, 'Harry Potter and the Chamber of Secrets', 'J.K. Rowling', 1998, 'Fantasy', '../Resources/BookCovers/HarryPoterAndTheCoS.jpg', 'Harry returns to Hogwarts for his second year, only to find the school plagued by mysterious attacks that leave students petrified. With the help of his friends Ron and Hermione, Harry uncovers clues about the legend of the Chamber of Secrets and the heir of Slytherin. As they delve deeper into the mystery, they face dangerous creatures and dark magic. The novel explores themes of bravery, friendship, and the importance of standing up against prejudice.'),
(15, 'The Exorcist', 'William Peter Blatty', 1971, 'Horror', '../Resources/BookCovers/TheExorcist.jpg', '\"The Exorcist\" is a chilling horror novel that tells the story of Regan MacNeil, a young girl who begins exhibiting disturbing behavior. Her mother, Chris, seeks help from various doctors, but when medical explanations fail, she turns to Father Damien Karras, a Jesuit priest. As Regan\'s condition worsens, Father Karras and Father Merrin, an experienced exorcist, confront a powerful demonic force. The novel explores themes of faith, evil, and the battle between good and evil.'),
(16, 'Jaws', 'Peter Benchley', 1974, 'Thriller', '../Resources/BookCovers/Jaws.jpg', '\"Jaws\" is a thrilling novel about a great white shark that terrorizes the small resort town of Amity Island. When the shark\'s attacks threaten the town\'s summer tourism, Police Chief Martin Brody, marine biologist Matt Hooper, and professional shark hunter Quint team up to hunt the deadly predator. The novel builds suspense as the trio faces the formidable creature, exploring themes of fear, survival, and the power of nature.'),
(17, 'Charlie and the Chocolate Factory', 'Roald Dahl', 1964, 'Fantasy', '../Resources/BookCovers/CharlieAndTheCF.jpg', 'Charlie Bucket\'s life changes when he finds one of the five golden tickets hidden in Wonka chocolate bars. These tickets grant him and four other children access to Willy Wonka\'s mysterious and fantastical chocolate factory. Inside, they encounter incredible inventions, whimsical rooms, and peculiar characters. As the tour progresses, each child\'s unique personality and behavior lead to unexpected consequences, while Charlie\'s kindness and humility shine through.\n\nThe novel explores themes of imagination, morality, and the rewards of good behavior, making it a timeless and enchanting story for readers of all age'),
(18, 'The Bridges of Madison Country', 'Robert James Waller', 1992, 'Romance', '../Resources/BookCovers/TheBridgesOfMC.jpg', 'The Bridges of Madison County\" is a poignant love story about Francesca Johnson, a lonely Italian-American housewife living in Iowa, and Robert Kincaid, a National Geographic photographer. When Robert arrives in Madison County to photograph its historic covered bridges, he and Francesca form an intense and brief romantic connection that changes their lives forever. The novel explores themes of love, choice, and the fleeting nature of life-changing moments.'),
(19, 'The Little Prince', 'Antoine de Saint Exupery', 1943, 'Fantasy', '../Resources/BookCovers/TheLittlePrince.jpg', '\"The Little Prince\" is a timeless fable about a young prince who travels from planet to planet, meeting various inhabitants and learning valuable life lessons. When he arrives on Earth, he befriends a stranded pilot and shares his adventures and observations. Through their conversations, the story delves into themes of innocence, love, and the importance of seeing with the heart rather than the eyes. The novel\'s whimsical narrative and profound insights make it a beloved classic for readers of all ages.'),
(20, 'Alice\'s Adventure in Wonderland', 'Lewis Carroll', 1865, 'Fantasy', '../Resources/BookCovers/AlicesAdventureInW.jpg', 'This book follows the curious and imaginative Alice as she falls down a rabbit hole into a fantastical world filled with peculiar creatures and whimsical adventures. As she navigates this strange land, Alice encounters characters like the Cheshire Cat, the Mad Hatter, and the Queen of Hearts. The novel explores themes of identity, logic, and the absurdity of the adult world through its playful and surreal narrative.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


/* ------------------- More Books ---------------- */
INSERT INTO `books` (`id`, `title`, `author`, `published`, `genre`, `image_url`, `Synopsis`) VALUES
(21, 'The Maze Runner'                                   , 'James Dashner'      , 2009, 'Dystopian'         , '../Resources/BookCovers/TheMazeRunner.jpg'                        , 'A teenage boy wakes up in a mysterious maze with no memory and must navigate deadly trials to escape.'),
(22, 'Divergent'                                         , 'Veronica Roth'      , 2011, 'Dystopian'         , '../Resources/BookCovers/Divergent.jpg'                            , 'In a divided society based on virtues, Tris discovers she is Divergent and must fight to survive.'),
(23, 'Percy Jackson & the Olympians: The Lightning Thief', 'Rick Riordan'       , 2005, 'Fantasy'           , '../Resources/BookCovers/PercyJackson&theOlympians.jpg'            , 'A boy discovers he is the son of Poseidon and embarks on a quest across modern America with Greek gods. The First book in the series follows Percy Jackson, Percy learns he is a demigod and is accused of stealing Zeus’s lightning bolt.'),
(25, 'City of Bones'                                     , 'Cassandra Clare'    , 2007, 'Urban Fantasy'     , '../Resources/BookCovers/CityofBones.jpg'                          , 'Clary Fray discovers she is part of a secret race of warriors tasked with ridding the world of demons.'),
(26, 'Eragon'                                            , 'Christopher Paolini', 2002, 'Fantasy'           , '../Resources/BookCovers/Eragon.jpg'                               , 'A young farm boy finds a mysterious stone that hatches a dragon, leading him to become a Dragon Rider.'),
(27, 'Inkheart'                                          , 'Cornelia Funke'     , 2003, 'Fantasy'           , '../Resources/BookCovers/Inkheart.jpg'                             , 'A girl discovers her father can bring characters from books to life by reading aloud.'),
(28, 'The Book Thief'                                    , 'Markus Zusak'       , 2005, 'Historical Fiction', '../Resources/BookCovers/TheBookThief.jpg'                         , 'A young girl steals books in Nazi Germany and shares them with her neighbors during bombing raids.'),
(29, 'Life of Pi'                                        , 'Yann Martel'        , 2001, 'Adventure'         , '../Resources/BookCovers/LifeofPi.jpg'                             , 'A young boy survives a shipwreck and shares a lifeboat with a Bengal tiger.'),
(30, 'Shatter Me'                                        , 'Tahereh Mafi'       , 2011, 'Dystopian'         , '../Resources/BookCovers/ShatterMe.jpg'                            , 'A girl with a lethal touch becomes a pawn in a war between rebellion and tyranny.'),
(31, 'The Outsiders'                                     , 'S. E. Hinton'       , 1967, 'Coming-of-age'     , '../Resources/BookCovers/TheOutsiders.jpg'                         , 'Teen boys navigate class conflict and gang rivalry in 1960s America.'),
(32, 'Looking for Alaska'                                , 'John Green'         , 2005, 'Young Adult'       , '../Resources/BookCovers/LookingforAlaska.jpg'                     , 'A boy enrolls in a boarding school and meets an enigmatic girl who changes his life.'),
(33, 'Paper Towns'                                       , 'John Green'         , 2008, 'Young Adult'       , '../Resources/BookCovers/PaperTowns.jpg'                           , 'A teenager searches for a missing girl who leaves behind mysterious clues.'),
(34, 'Thirteen Reasons Why'                              , 'Jay Asher'          , 2007, 'Young Adult'       , '../Resources/BookCovers/ThirteenReasonsWhy.jpg'                   , 'A boy listens to cassette tapes recorded by a classmate before her suicide.'),
(35, 'Miss Peregrine\'s Home for Peculiar Children'      , 'Ransom Riggs'       , 2011, 'Fantasy'           , '../Resources/BookCovers/MissPeregrinesHomeforPeculiarChildren.jpg', 'A boy discovers a mysterious orphanage filled with children who possess extraordinary abilities.'),
(36, 'Red Queen'                                         , 'Victoria Aveyard'   , 2015, 'Fantasy'           , '../Resources/BookCovers/RedQueen.jpg'                             , 'In a divided world by blood and power, a girl with red blood discovers she has a deadly ability.'),
(37, 'Legend'                                            , 'Marie Lu'           , 2011, 'Dystopian'         , '../Resources/BookCovers/Legend.jpg'                               , 'In a militarized future America, a prodigy and a criminal uncover the truth behind a corrupt government.'),
(38, 'Cinder'                                            , 'Marissa Meyer'      , 2012, 'Science Fiction'   , '../Resources/BookCovers/Cinder.jpg'                               , 'A cyborg mechanic must save her futuristic kingdom from plague and intergalactic war.'),
(39, 'The Selection'                                     , 'Kiera Cass'         , 2012, 'Romance'           , '../Resources/BookCovers/TheSelection.jpg'                         , 'In a caste-divided society, a girl enters a competition to win the prince\'s heart.'),
(40, 'An Ember in the Ashes'                             , 'Sabaa Tahir'        , 2015, 'Fantasy'           , '../Resources/BookCovers/AnEmberintheAshes.jpg'                    , 'A girl becomes a spy in a brutal military empire to save her brother.'),
(41, 'Children of Blood and Bone'                        , 'Tomi Adeyemi'       , 2018, 'Fantasy'           , '../Resources/BookCovers/ChildrenofBloodandBone.jpg'               , 'A girl fights to bring magic back to her oppressed people.'),
(42, 'The Cruel Prince'                                  , 'Holly Black'        , 2018, 'Fantasy'           , '../Resources/BookCovers/TheCruelPrince.jpeg'                       , 'A mortal girl lives among faeries and must outwit them to gain power.'),
(43, 'Shadow and Bone'                                   , 'Leigh Bardugo'      , 2012, 'Fantasy'           , '../Resources/BookCovers/ShadowandBone.jpg'                        , 'A girl discovers a hidden power and joins a magical elite in a divided land.'),
(44, 'The 5th Wave'                                      , 'Rick Yancey'        , 2013, 'Science Fiction'   , '../Resources/BookCovers/The5thWave.jpg'                           , 'After a series of alien attacks, a girl searches for her brother while fighting to survive.'),
(45, 'Scythe'                                            , 'Neal Shusterman'    , 2016, 'Science Fiction'   , '../Resources/BookCovers/Scythe.jpg'                               , 'In a future where death is obsolete, two teens train to be the ones who end lives.'),
(46, 'A Court of Thorns and Roses'                       , 'Sarah J. Maas'      , 2015, 'Fantasy'           , '../Resources/BookCovers/ACourtofThornsandRoses.jpg'               , 'A mortal girl is taken to a fae kingdom and finds herself entwined in deadly court politics.'),
(47, 'To All the Boys I\'ve Loved Before'                , 'Jenny Han'          , 2014, 'Romance'           , '../Resources/BookCovers/ToAlltheBoysIveLovedBefore.jpg'           , 'A girl\'s secret love letters are accidentally mailed, upending her high school life.'),
(48, 'Where the Crawdads Sing'                           , 'Delia Owens'        , 2018, 'Mystery'           , '../Resources/BookCovers/WheretheCrawdadsSing.jpg'                 , 'A girl grows up alone in a marsh and becomes a suspect in a murder investigation.'),
(49, 'The Night Circus'                                  , 'Erin Morgenstern'   , 2011, 'Fantasy'           , '../Resources/BookCovers/TheNightCircus.jpg'                       , 'Two magicians are bound in a magical duel that takes place in a mysterious black-and-white circus.'),
(50, 'Circe'                                             , 'Madeline Miller'    , 2018, 'Mythology'         , '../Resources/BookCovers/Circe.jpg'                                , 'A retelling of the life of the witch Circe, who must find her place among gods and mortals.');
