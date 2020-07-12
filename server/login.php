<?php
// If not POST request redirecting to index
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: /index.php");
}
$email = $_POST["email"];
$password = $_POST["password"];

session_start();

if($email==='' || $password===''){
    $_SESSION["login_error"] = "Email & Password cannot be empty";
    header("Location: /pages/login.php");
}

$conn = mysqli_connect('localhost', 'admin', 'admin1234', 'web_technology');

if (!$conn) {
    $_SESSION["login_error"] = "Oops! Database Connection Failed";
    header("Location: /pages/login.php");
}

$query = "SELECT * FROM LOGIN WHERE EMAIL = '$email'";

$result = mysqli_query($conn, $query);

$user_array = mysqli_fetch_all($result, MYSQLI_ASSOC);

if(empty($user_array))
{
    $_SESSION["login_error"] = "Oops! Database Connection Failed";
    header("Location: /pages/login.php");
}

if($user_array[0]['password']===$password){
    echo "Logged in";
}
else{
    echo "in valid password";
}
?>