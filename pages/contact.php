<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact US | Web Technology Assignment</title>
    <link rel="icon" href="../src/img/favicon.png" type="image/png">

    <!--------------- Linking CSS --------------->
    <link rel="stylesheet" href="../src/pages.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-------------- Linking Font --------------->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Noto+Sans:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <!--------------- Linking JS --------------->
    <script defer src="../src/script.js"></script>
</head>

<body>

    <?php include "../layout/header.php" ?>

    <main>
        <h2>Contact Us</h2>
        <div class="contact-div">
            <p><i class="fa fa-envelope"></i>&nbsp;&nbsp;E-mail : </p><a target="_blank" href="mailto:office@cectl.ac.in">office@cectl.ac.in</a>
            <p><i class="fa fa-phone"></i>&nbsp;&nbsp;Phone : </p>
            <div class="phone-no"><a target="_blank" href="tel:+914782552714">+91 478 2552714</a><a target="_blank" href="tel:+914782553416">+91 478 2553416</a></div>
            <p><i class="fa fa-map-marker"></i>&nbsp;&nbsp;Address : </p>
            <p>College of Engineering Cherthala <br>Pallippuram P.O, Alappuzha, <br>Kerala,India <br>PIN-688541</p>
        </div>
    </main>

    <?php include "../layout/footer.php" ?>

</body>

</html>