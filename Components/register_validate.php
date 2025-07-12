<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Generate random user details
function random_string($length = 8) {
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $str = '';
    for ($i = 0; $i < $length; $i++) {
        $str .= $chars[rand(0, strlen($chars) - 1)];
    }
    return $str;
}

$uname = "User_" . random_string(5);
$newemail = "user" . rand(1000,9999) . "@example.com";
$pwd_plain = random_string(10);
$hashedpwd = password_hash($pwd_plain, PASSWORD_DEFAULT);

$dbhost = 'localhost';
$dbUsername = 'root';
$dbpassword = '';
$dbname = 'Project_DB';

//Creating Database connection
$conn  = mysqli_connect($dbhost,$dbUsername,$dbpassword,$dbname);
if (!$conn) {
    die('Connection Failed: '.mysqli_connect_error());
}

// Check if email already exists (very unlikely with random)
$sql = "SELECT * FROM CUSTOMER WHERE Email = '$newemail'";
if($result = mysqli_query($conn, $sql)) { 
    if(mysqli_num_rows($result) == 0) { 
        $sql = 'INSERT INTO CUSTOMER (C_name, Email, Pass, Joined, DP_name) VALUES("'.$uname.'","'.$newemail.'","'.$hashedpwd.'","'.date("Y-m-d").'", "../Images/userdefault.png")';
        if(mysqli_query($conn, $sql)) {
            echo "<h2>Random user created!</h2>";
            echo "<b>Name:</b> $uname<br>";
            echo "<b>Email:</b> $newemail<br>";
            echo "<b>Password:</b> $pwd_plain<br>";
            echo "<a href='login.php'>Go to Login</a>";
        } else {
            echo "Error inserting user: " . mysqli_error($conn);
        }
    } else {
        echo "Randomly generated email already exists. Please refresh to try again.";
    }
} else {
    echo "Error checking email: " . mysqli_error($conn);
}
?>