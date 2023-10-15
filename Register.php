<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Connect to the MySQL database
    $conn = new mysqli("localhost", "root", "", "user_data");

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert user data into the database (without hashing the password)
    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $email, $password);

    if ($stmt->execute()) {
        echo "Thank you for signing up, $username!<br>";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTER </title>
    <link rel="stylesheet" href="register.css">
    <style>
        .error-message {
            color: red;
        }
    </style>
    <script>
        function displayErrorMessage(message) {
            var errorDiv = document.getElementById("error-message");
            errorDiv.innerText = message;
            errorDiv.style.display = "block";
        }

        function validateForm() {
            var email = document.getElementById("email").value;
            var password = document.getElementById("password").value;

            // Email validation using a regular expression
            var emailRegex = /^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/;
            if (!email.match(emailRegex)) {
                displayErrorMessage("Invalid email address");
                return false;
            }

            // Password validation (you can add more rules)
            if (password.length < 8) {
                displayErrorMessage("Password must be at least 8 characters long");
                return false;
            }

            return true; // Form is valid
        }
    </script>
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
        <div class="container1">
            <h2>Registration</h2>
            <form method="POST" action="register.php" onclick="return validateForm()">
                <div class="form-group"> 
                <label for="username">Username:</label>
<input type="text" name="username" id="username" required><br>


        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="password">Password:</label>
        <input type="text" name="password" required><br>
                </div>
                <div class="form-group">
                    <label>Gender:</label>
                    <input type="radio" id="male" name="gender" value="male" required>
                    <label for="male">Male</label>
                    <input type="radio" id="female" name="gender" value="female" required>
                    <label for="female">Female</label>
                    <input type="radio" id="other" name="gender" value="other" required>
                    <label for="other">Other</label>
                </div>
                <div class="form-group">
                    <label for="country">Country:</label>
                    <select id="country" name="country">
                        <option value="usa">USA</option>
                        <option value="canada">Canada</option>
                        <option value="uk">UK</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" value="Register" onclick="return validateForm()">
                    <div id="error-message" class="error-message"></div>
                </div>
                <div class="reg"><ul>
                <P><li> having an account : <a href="login.php"> login </a></li></P>
                </ul>
                </div>
                
            </form>
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