<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Connect to the MySQL database
    $conn = new mysqli("localhost", "root", "", "user_data");

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve the stored password from the database
    $sql = "SELECT password FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($storedPassword);
    $stmt->fetch();
    $stmt->close();

    // Verify the plain text password (not recommended)
    if ($password === $storedPassword) {
        echo "Login successful. Welcome, $username!";
    } else {
        echo "Invalid username or password. Please try again.";
    }

    // Close the database connection
    $conn->close();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login page</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>
    
    <div class="top">
        <div class="navbar">
          <img src="logo.png.jpg" class="logo" alt="logo" >
          <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="#">news</a></li>
                <li><a href="#">Contact us</a></li>
                <li><a href="#">feedback</a></li>
            </ul>
        </div>
   
    <div class="login">
        <div class="container1">
            <h2>Login</h2>
             <form method="post" action="login.php"> 
                <div class="form-group">
                <label for="username">Username:</label>
<input type="text" name="username" id="username" required><br>

            
                    <label for="password">Password:</label>
        <input type="password" name="password" required><br>
                </div>
                <div class="form-group">
                    <input type="submit" value="Login">
                </div>
                <div class="REGISTER">
                    <ul>
                  <P><li>not having an account : <a href="Register.php"> REGISTER </a></li></P>
                </ul>
                </div>
            </form>
        </div>
    </div>
</div>
<section class="footer">

    <div class="box-container">
        <div class="box">
            <h3>quick links</h3>
            <a href="#">Home</a>
            <a href="#">about</a>
            <a href="#">news</a>
        </div>
        <div class="box">
            <h3>More links</h3>
            <a href="#">My account</a>
            <a href="#">my safe</a>
            <a href="#">my favourite</a>
        </div>
        <div class="box">
            <h3>Locations</h3>
            <a href="#">Andhrapradesh</a>
            <a href="#">Telangana</a>
            <a href="#">Bangalore</a>
            <a href="#">chennai</a>
        </div>
        <div class="box">
            <h3>contact info</h3>
            <a href="#">9392362679 <br> 9666854916</a>
            <a href="#">vtu19706@veltech.edu.in <br>vtu19676@veltech.edu.in </a>
            <a href="#">tenali-andhra pradesh , </a>
            
        </div>

        <div class="credit"></div>
    </div>

</section>
</body>
</html>