<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | Web Technology Assignment</title>
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
        <div class="profile-div">
            <div class="hero">
                <img class="profile-image" src="../src/img/aromal_anil.webp" alt="Aromal Anil">
                <h2>Aromal Anil</h2>
            </div>

            <ul class="profile-details">
                <li>Class : S6 CS</li>
                <li>Phone : <a target="_blank" href="tel:+919207980389">9207980389</a></li>
                <li>E-mail : <a target="_blank" href="mailto:contact@aromalanil.me">contact@aromalanil.me</a></li>
                <li>Website : <a target="_blank" href="https://aromalanil.me">aromalanil.me</a></li>
                <li>Address : Thakidiveli&nbsp;House, Kalavoor&nbsp;P.O,&nbsp;Alappuzha</li>
            </ul>

        </div>
    </main>

    <?php include "../layout/footer.php" ?>

</body>

</html>