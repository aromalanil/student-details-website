<?php
// Only executes for POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = $_POST["email"];
    $password = $_POST["password"];

    session_start();

    if ($email === '' || $password === '') {
        $errorMessage = "Email & Password cannot be empty";
    }

    $conn = mysqli_connect('localhost', 'admin', 'admin1234', 'web_technology');

    if (!$conn) {
        $errorMessage = "Oops! Database Connection Failed";
    }

    $query = "SELECT * FROM LOGIN WHERE EMAIL = '$email'";

    $result = mysqli_query($conn, $query);

    $user_array = mysqli_fetch_all($result, MYSQLI_ASSOC);

    if (empty($user_array)) {
        $errorMessage = "User not found";
    } else if ($user_array[0]['password'] === $password) {
        $_SESSION['user-email'] = $email;
        header("Location: /pages/profile.php");
    }
    else {
        $errorMessage = "Invalid Password";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Web Technology Assignment</title>
    <link rel="icon" href="../src/img/favicon.png" type="image/png">

    <!--------------- Linking CSS --------------->
    <link rel="stylesheet" href="../src/pages.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-------------- Linking Font --------------->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Noto+Sans:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <!--------------- Linking JS --------------->
    <script defer src="../src/script.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script defer src="../src/login.js"></script>
</head>

<body>

    <?php include "../layout/header.php" ?>

    <main>
        <h2>Login</h2>
        <?php
        if (isset($errorMessage)) {
            echo "<p>$errorMessage</p>";
        }
        ?>
        <form action="login.php" id="login-form" autocomplete="off" method="POST">
            <div class="input-wrapper">
                <input required type="text" name="email" id="email-input" placeholder="Email">
                <p class="error-msg" id="email-error">Invalid email</p>
            </div>
            <div class="input-wrapper">
                <input required type="password" name="password" id="password-input" placeholder="Password">
                <p class="error-msg" id="password-error">Invalid Password</p>
            </div>
            <button type="submit" id="login-btn" class="btn">
                Login
            </button>
        </form>
        <p>Don't have an account?&nbsp;<a href="./sign-up.php">Sign Up</a></p>
    </main>

    <?php include "../layout/footer.php" ?>

</body>

</html>