<?php
session_start();
if (!isset($_SESSION['user-email'])) {
    header("Location: /pages/login.php");
}
// Only executes for POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = $_POST["email"];
    $password = $_POST["password"];

    if ($email === '' || $password === '') {
        $errorMessage = "Email & Password cannot be empty";
    }

    $conn = mysqli_connect('localhost', 'admin', 'admin1234', 'web_technology');

    if (!$conn) {
        $errorMessage = "Oops! Database Connection Failed";
    }

    $getUserQuery = "SELECT * FROM LOGIN WHERE EMAIL = '$email'";

    $result = mysqli_query($conn, $getUserQuery);

    $user_array = mysqli_fetch_all($result, MYSQLI_ASSOC);

    if (!empty($user_array)) {
        $updateQuery = "UPDATE LOGIN SET PASSWORD='$password'WHERE EMAIL = '$email'";
        if ($conn->query($updateQuery) === TRUE) {
            $success = true;
        } else {
            $errorMessage = "Error: Occurred";
        }
    } else {
        $errorMessage = "Email ID does not exist";
    }
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up | Web Technology Assignment</title>
    <link rel="icon" href="../src/img/favicon.png" type="image/png">

    <!--------------- Linking CSS --------------->
    <link rel="stylesheet" href="../src/pages.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-------------- Linking Font --------------->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Noto+Sans:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <!--------------- Linking JS --------------->
    <script defer src="../src/script.js"></script>
    <script defer src="../src/sign-up.js"></script>
    <?php
    if (isset($success)) {
        echo "<script>
        if(confirm('Password Changed. Go to Profile')){
            window.location = '/pages/profile.php';
        }
    </script>";
    }
    ?>
</head>

<body>

    <?php include "../layout/header.php" ?>

    <main>
        <h2>Change Password</h2>
        <?php
        if (isset($errorMessage)) {
            echo "<p>$errorMessage</p>";
        }
        ?>
        <form action="#" id="sign-up-form" class="form" autocomplete="off" method="POST">
            <div class="input-wrapper">
                <input type="text" name="email" id="email-input" placeholder="Email">
                <p class="error-msg" id="email-error">Invalid email</p>
            </div>
            <div class="input-wrapper">
                <input type="password" name="password" id="password-input" placeholder="Password">
                <p class="error-msg" id="password-error">Invalid Password</p>
            </div>
            <div class="input-wrapper">
                <input type="password" id="re-password-input" placeholder="Re-enter Password">
                <p class="error-msg" id="re-password-error">Password do not match</p>
            </div>
            <button class="btn form-btn" type="submit" id="sign-up-btn">
                Change Password
            </button>
        </form>
    </main>

    <?php include "../layout/footer.php" ?>

</body>

</html>