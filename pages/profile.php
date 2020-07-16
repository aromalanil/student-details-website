<?php
session_start();
if (!isset($_SESSION['user-email'])) {
    header("Location: /pages/login.php");
}
$email = $_SESSION['user-email'];
$conn = mysqli_connect('localhost', 'admin', 'admin1234', 'web_technology');
if (!$conn) {
    $errorMessage = "Oops! Database Connection Failed";
}
$getDetailsQuery = "SELECT * FROM USER_DETAILS WHERE EMAIL = '$email'";

$result = mysqli_query($conn, $getDetailsQuery);
$user_array = mysqli_fetch_all($result, MYSQLI_ASSOC);
if (!empty($user_array)) {
    $subject1 = $user_array[0]['Subject_1'];
    $subject2 = $user_array[0]['Subject_2'];
    $subject3 = $user_array[0]['Subject_3'];
    $subject4 = $user_array[0]['Subject_4'];
    $subject5 = $user_array[0]['Subject_5'];
    $subject6 = $user_array[0]['Subject_6'];
    $totalMark = $user_array[0]['Total_mark'];
}

?>

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
            <div class="profile-btns">
                <button onclick="window.location.href = '/pages/edit-user-details.php'"  class="btn">Edit Details</button>
                <button onclick="window.location.href = '/server/logout.php'"  class="btn">Logout</button>
            </div>
            <?php
            echo "<h2>$email</h2>";
            ?>
            
            <ul class="profile-details">
                <?php
                if (!empty($user_array)) {
                    echo "
                    <li>Subject 1 : ${subject1}</li>
                    <li>Subject 2 : ${subject2}</li>
                    <li>Subject 3 : ${subject3}</li>
                    <li>Subject 4 : ${subject4}</li>
                    <li>Subject 5 : ${subject5}</li>
                    <li>Subject 6 : ${subject6}</li>
                    <li>Total Marks : ${totalMark}</li>
                    ";
                }
                else{
                    echo "
                    <li>Subject 1 : No Data</li>
                    <li>Subject 2 : No Data</li>
                    <li>Subject 3 : No Data</li>
                    <li>Subject 4 : No Data</li>
                    <li>Subject 5 : No Data</li>
                    <li>Subject 6 : No Data</li>
                    <li>Total Marks : No Data</li>
                    ";
                }
                ?>
            </ul>

        </div>
    </main>

    <?php include "../layout/footer.php" ?>

</body>

</html>