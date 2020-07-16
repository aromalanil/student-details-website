<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Web Technology Assignment</title>
    <link rel="icon" href="./src/img/favicon.png" type="image/png">

    <!--------------- Linking CSS --------------->
    <link rel="stylesheet" href="./src/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-------------- Linking Font --------------->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Noto+Sans:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">

    <!--------------- Linking JS --------------->
    <script defer src="./src/script.js"></script>

</head>

<body>

    <?php include "./layout/header.php" ?>

    <main>
        <h2>Students Details Management</h2>
        <p>This is a simple web app made using PHP, MySQL, HTML and CSS</p>
        <br>
        <h3>How it Works?</h3>
        <p>A student can register to this service using <a href="/pages/sign-up.php">Sign Up</a>. An existing user can always <a href="/pages/login.php">Login</a> to the service. Every user have the access to their profile through <a href="/pages/profile.php">My Profile</a>. The loggedin user have also acces to edit their information through <a href="/pages/edit-user-details.php">Edit Details</a> page.</p>

    </main>

    <?php include "./layout/footer.php" ?>

</body>

</html>