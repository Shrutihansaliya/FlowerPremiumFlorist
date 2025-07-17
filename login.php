
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->

  <?php
//session_start();
include 'headerindex.php';

$host = 'localhost';
$db = 'dbphpprojechflower';
$user = 'root';
$pass = '';

$error_message = '';
$login_delay = 25; // 15-second delay
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize session variables
if (!isset($_SESSION['login_attempts'])) {
    $_SESSION['login_attempts'] = 0;
    $_SESSION['last_attempt_time'] = 0;
}

$remaining_time = 0;

// Check if user is locked out
if ($_SESSION['login_attempts'] >= 2) {
    $current_time = time();
    if ($current_time - $_SESSION['last_attempt_time'] < $login_delay) {
        $remaining_time = $login_delay - ($current_time - $_SESSION['last_attempt_time']);
        
    } else {
        $_SESSION['login_attempts'] = 0;
    }
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $current_time = time();

    if ($_SESSION['login_attempts'] >= 2 && $current_time - $_SESSION['last_attempt_time'] < $login_delay) {
        $remaining_time = $login_delay - ($current_time - $_SESSION['last_attempt_time']);
        
    } else {
        if ($current_time - $_SESSION['last_attempt_time'] >= $login_delay) {
            $_SESSION['login_attempts'] = 0;
        }

        if ($username === "admin" && $password === "admin") {
            $_SESSION["adminuser"] = $username;
            echo "<script>window.location.href = 'http://localhost/PhpProjectflower/Admin/adminindex.php';</script>";
        } else {
            $sql = "SELECT UNAME, DUNAME, ROLL, Password FROM tbllogin WHERE UNAME = '$username' OR DUNAME = '$username'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $dbpass = $row["Password"];
                if (password_verify($password, $dbpass)) {
                    $_SESSION['UNAME'] = $row['UNAME'];
                    
                    $_SESSION['DUNAME'] = $row['DUNAME'];
                    if ($row['ROLL'] === "c") {
                        echo "<script>alert('Welcome!');</script>";
//                        echo $_SESSION['UNAME'];
                        echo "<script>window.location.href = 'http://localhost/PhpProjectflower/profile.php';</script>";
                    } else {
                        echo "<script>window.location.href = 'http://localhost/PhpProjectflower/DeliveryBoy/Ddindex.php';</script>";
                    }
                } else {
                    $error_message = 'Password is incorrect.';
                    $_SESSION['login_attempts']++;
                    $_SESSION['last_attempt_time'] = time();
                }
            } else {
                $error_message = 'Username is incorrect.';
                $_SESSION['login_attempts']++;
                $_SESSION['last_attempt_time'] = time();
            }
        }
    }
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
    .hover-link {
        color: blue;
        text-decoration: underline;
        text-decoration-color: blue;
        transition: color 0.3s;
    }
    .hover-link:hover {
        color: red;
    }
</style>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body style="font-family: Arial, sans-serif; margin: 0; padding: 0;">
    <div style="max-width: 700px; margin: 90px auto; padding: 50px; background: white; box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2); border-radius: 8px;">
        <h2 style="text-align: center; color: #333;">Login</h2>
        <?php if ($error_message): ?>
            <p id="errorMessage" style="color: red;"><?php echo $error_message; ?></p>
        <?php endif; ?>
        <form method="POST">
            <label for="username" style="display: block; margin: 40px 0 5px; color: #555;">Username:</label>
           <input type="text" id="username" name="username" required style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9;">

            <label for="password" style="display: block; margin: 40px 0 5px; color: #555;">Password:</label>
            <input type="password" id="password" name="password" required style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9;">
            
            <button type="submit" id="loginButton" style="margin-top: 30px; margin-bottom: 30px; width: 30%; padding: 10px; background: green; color: white; border: none; border-radius: 2px; font-size: 16px;">Log In</button>
            <p id="countdownTimer" style="color:red; font-weight: bold;"></p>
        </form>
        
    <div style="margin-top: 20px; display: flex; justify-content: space-between; align-items: center;">
    <a href="register.php" class="hover-link">Create Account</a>
    <a href="conformpw.php" class="hover-link">Forgot your password?</a>
</div>


    </div>
    <script>
    let remainingTime = <?php echo $remaining_time; ?>;

    function countdown() {
        const countdownTimer = document.getElementById('countdownTimer');
        const loginButton = document.getElementById('loginButton');
        const errorMessage = document.getElementById('errorMessage');

        // Update the DOM for the countdown timer
        if (remainingTime > 0) {
            loginButton.style.display = 'none'; // Hide the button
            loginButton.disabled = true; // Ensure button is disabled
            countdownTimer.innerText = `Too many failed attempts.  Try again in ${remainingTime} seconds.`;
            remainingTime--;

            // Call countdown again after 1 second
            setTimeout(countdown, 1000);
        } else {
            // When the countdown finishes
            loginButton.style.display = 'block'; // Show the button again
            loginButton.disabled = false; // Enable the button
            countdownTimer.innerText = ''; // Clear the countdown message
            if (errorMessage) {
                errorMessage.innerText = ''; // Clear error message if needed
            }
        }
    }

    // Initialize the countdown if there is remaining time
    if (remainingTime > 0) {
        countdown();
    }
</script>
<?php 
include 'aboutusfooter.php';
?>
</body>
</html>