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
    title VARCHAR(30) NOT NULL,
    id INT AUTO_INCREMENT PRIMARY KEY,
    year INT NOT NULL,
    image_path    VARCHAR(255)  NULL,
    creator VARCHAR(30) NOT NULL,
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
  $sql = "INSERT INTO CartoonSearch (title, year, creator, genre, rating, runtime, episodes, image_path) VALUES
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

$conn->close();
    ?>
</body>

</html>