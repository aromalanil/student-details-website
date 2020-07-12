<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About | Web Technology Assignment</title>
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
            session_start();
            $loginError =$_SESSION['login_error'];
            if($loginError){
                echo "<p>$loginError</p>";
            }
        ?>
        <form action="../server/login.php" id="login-form" autocomplete="off" method="POST">
            <div class="input-wrapper">
                <input type="text" name="email" id="email-input" placeholder="Email">
                <p class="error-msg" id="email-error">Invalid email</p>
            </div>
            <div class="input-wrapper">
                <input type="password" name="password" id="password-input" placeholder="Password">
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