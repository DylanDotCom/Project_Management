<!DOCTYPE html>
<html>

<head>
    <title>Database</title>
</head>

<body>
    <?php
    $servername = "ProjectManagement";
    $username = "root";
    $password = "";

    //Create Connection
    $conn = new mysqli($servername, $username, $password);
    //Check Connection
    if (!$conn) {
       die("MyNewDatabase Connection Failed: " . mysqli_connect_error());
    }

$dbname = "CartoonsInfo";

// Drop database if exists
$sql = "DROP DATABASE IF EXISTS $dbname;";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully<br>";
} else {
  echo "Error creating database: " . $conn->error;
}

// Create database
$sql = "CREATE DATABASE $dbname;";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully<br>";
} else {
  echo "Error creating database: " . $conn->error;
}

$conn->close();

$conn = new mysqli("ProjectManagement", "root", "", "CartoonsInfo");


//creating the cartoons table
$sql = "CREATE TABLE CartoonSearch (
    title VARCHAR(100) NOT NULL,
    id INT AUTO_INCREMENT PRIMARY KEY,
    year INT NOT NULL,
    image_path    VARCHAR(255)  NULL,
    creator VARCHAR(60) NOT NULL,
    genre VARCHAR(30) NOT NULL,
    rating VARCHAR(30) NOT NULL,
    runtime INT NOT NULL,
    episodes INT NOT NULL
) ENGINE=InnoDB;
";
if($conn->query(query: $sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

//creating users table
$sql = "CREATE TABLE Users (
  user_id   INT AUTO_INCREMENT PRIMARY KEY,
  username  VARCHAR(120) NOT NULL UNIQUE,
  email     VARCHAR(190) NOT NULL UNIQUE,
  password  VARCHAR(255) NOT NULL,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
  )ENGINE=InnoDB;";
  
  if($conn->query($sql) === TRUE){
    echo "Users table was created successfully<br>";
  }else{
    echo "There were some issues with creating a table: " . $conn->error;
  }

  //inserting data 
  $sql = "INSERT INTO CartoonSearch (title, year, creator, rating, genre, runtime, episodes, image_path) VALUES
  ('Spongebob Squarepants', '1999', 'Stephen Hillenburg', 'TV-PG', 'comedy', '23', '272', 'spongebob.jpg'),
  ('The Simpsons', '1999', 'Matt Groening', 'TV-Y', 'comedy', '22', '684', 'simpsons.jpg'),
  ('Gravity Falls', '2012', 'Alex Hirsch', 'TV-Y7', 'Action-Adventure', '23', '40', 'gravity_falls.jpg'),
  ('Steven Universe', '2013', 'Rebecca Sugar', 'TV-PG', 'Action' , '11', '175', 'steven_universe.jpg'),
  ('Foster\'s Home 'for Imaginary Friends', '2004', 'Craig McCracken', 'TV-Y7', 'comedy', '23', '79', 'fosters.jpg'),
  ('The Fairly OddParents', '2001', 'Butch Hartman', 'TV-Y7', 'comedy', '22', '172', 'fairly_oddparents.jpg'),
  ('Danny Phantom', '2004', 'Butch Hartman', 'TV-Y7', 'Action-Adventure', '23', '53', 'danny_phantom.jpg'),
  ('Avatar: The Last Airbender', '2005', 'Michael Dante DiMartino', 'TV-Y7', 'Action-Adventure', '23', '61', 'avatar.jpg'),
  ('Ben 10', '2005', 'Man of Action', 'TV-Y7', 'Action-Adventure', '22', '49', 'ben_10.jpg'),
  ('Kim Possible', '2002', 'Bob Schooley', 'TV-G', 'Action-Adventure', '22', '87', 'kim_possible.jpg'),
  ('Teen Titans', '2003', 'Glen Murakami', 'TV-Y7', 'Action', '22', '65', 'teen_titans.jpg'),
  ('The Grim Adventures of Billy & Mandy', '2001', 'Maxwell Atoms', 'TV-Y7', 'comedy', '22', '78', 'grim_adventures.jpg'),
  ('Ed, Edd n Eddy', '1999', 'Danny Antonucci', 'TV-Y7', 'comedy', '11', '131', 'ed_edd_eddy.jpg'),
  ('Codename: Kids Next Door', '2002', 'Mr. Warburton', 'TV-Y7', 'Action-Adventure', '22', '78', 'codename_kids.jpg'),
  ('The Adventures of Jimmy Neutron', '2002', 'John A. Davis', 'TV-Y7', 'comedy', '22', '61', 'jimmy_neutron.jpg'),
  ('Futurama', '1999', 'Matt Groening', 'TV-14', 'comedy', '22', '140', 'futurama.jpg'),
  ('Courage the Cowardly Dog', '1999', 'John R. Dilworth', 'TV-Y7', 'Horror-Comedy', '22', '52', 'courage.jpg'),
  ('Camp Lazlo', '2005', 'Joe Murray', 'TV-Y7', 'comedy', '22', '61', 'camp_lazlo.jpg'),
  ('The Proud Family', '2001', 'Bruce W. Smith', 'TV-Y7', 'comedy', '22', '52', 'proud_family.jpg'),
  ('Phineas and Ferb', '2007', 'Dan Povenmire', 'TV-G', 'comedy', '22', '222', 'phineas_ferb.jpg'),
  ('Chowder', '2007', 'C.H. Greenblatt', 'TV-Y7', 'comedy', '11', '49', 'chowder.jpg'),
  ('The Boondocks', '2005', 'Aaron McGruder', 'TV-MA', 'comedy', '22', '55', 'boondocks.jpg'),
  ('Invader Zim', '2001', 'Jhonen Vasquez', 'TV-Y7', 'comedy', '22', '27', 'invader_zim.jpg'),
  ('Totally Spies!', '2001', 'Vincent Chalvon-Demersay', 'TV-Y7', 'Action-Adventure', '22', '156', 'totally_spies.jpg')
  ;
  ";


if ($conn->query($sql) === TRUE) {
  echo "Table entries created successfully<br>";
} else {
  echo "Error creating table: " . $conn->error;
}


$sql = "CREATE TABLE Episodes (
        episode_id INT AUTO_INCREMENT PRIMARY KEY,
        cartoon_id INT NOT NULL,
        season INT NOT NULL DEFAULT 1,
        episode_number INT NOT NULL,
        title VARCHAR(150) NOT NULL,
        image_path  VARCHAR(255)  NULL,
        description TEXT NULL,
        UNIQUE (cartoon_id, season, episode_number),
        FOREIGN KEY (cartoon_id) REFERENCES CartoonSearch(id) ON DELETE CASCADE
      ) ENGINE=InnoDB;";

if ($conn->query($sql) === TRUE){
  echo "Episodes table creates successfully<br>";
}else{
  echo "Error creating table: " . $conn->error;
}

//inserting episodes
$sql = "INSERT INTO Episodes (cartoon_id, season, episode_number, title, image_path, description) VALUES
  (1, 1, 1, 'Help Wanted', 'spongebob_s1e1.jpg', 'SpongeBob applies for a job at the Krusty Krab and tries to prove he is the right fry cook.'),
  (1, 1, 2, 'Reef Blower', 'spongebob_s1e2.jpg', 'SpongeBob''s new reef blower causes chaos around Bikini Bottom.'),
  (1, 1, 3, 'Tea at the Treedome', 'spongebob_s1e3.jpg', 'Sandy invites SpongeBob to her air-filled treedome for tea.'),
  (1, 1, 4, 'Fake', 'spongebob_s1e3.jpg', 'Sandy invites SpongeBob to her air-filled treedome for tea.'),


  (3, 1, 1, 'Tourist Trapped', 'gravity_falls_s1e1.jpg', 'Dipper and Mabel arrive in Gravity Falls, and Dipper finds a mysterious journal.'),
  (3, 1, 2, 'The Legend of the Gobblewonker', 'gravity_falls_s1e2.jpg', 'The twins set out to find the monster rumored to live in the lake.'),
  (3, 1, 3, 'Headhunters', 'gravity_falls_s1e3.jpg', 'Wax figures at the Mystery Shack lose their heads, and Dipper investigates.'),

  (8, 1, 1, 'The Boy in the Iceberg', 'avatar_s1e1.jpg', 'Katara and Sokka find Aang frozen in an iceberg and free him.'),
  (8, 1, 2, 'The Avatar Returns', 'avatar_s1e2.jpg', 'Aang learns he is the Avatar and the group is chased by the Fire Nation.'),
  (8, 1, 3, 'The Southern Air Temple', 'avatar_s1e3.jpg', 'Aang returns to his old home and faces what happened to his people.'),

  (20, 1, 1, 'Rollercoaster', 'phineas_ferb_s1e1.jpg', 'The brothers build a huge rollercoaster in their backyard while Candace tries to bust them.'),
  (20, 1, 3, 'Journey to the Center of Candace', 'phineas_ferb_s1e3.jpg', 'Phineas and Ferb shrink down and travel inside their sister.')
  ;";

if ($conn->query($sql) === TRUE) {
  echo "Episodes entries created successfully<br>";
} else {
  echo "Error creating episodes: " . $conn->error;
}

$sql = "CREATE TABLE Comments (
    comment_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id    INT NOT NULL,
    cartoon_id INT NULL,
    episode_id INT NULL,
    body       TEXT NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id)    REFERENCES Users(user_id)          ON DELETE CASCADE,
    FOREIGN KEY (cartoon_id) REFERENCES CartoonSearch(id)       ON DELETE CASCADE,
    FOREIGN KEY (episode_id) REFERENCES Episodes(episode_id)    ON DELETE CASCADE
) ENGINE=InnoDB;";

if ($conn->query($sql) === TRUE) {
    echo "Comments table created successfully<br>";
} else {
    echo "Error creating Comments table: " . $conn->error . "<br>";
}


$conn->close();
    ?>
</body>

</html>
