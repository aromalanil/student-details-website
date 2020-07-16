<?php
session_start();
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

// Only executes for POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $subject1 = $_POST["sub-1"] + 0;
    $subject2 = $_POST["sub-2"] + 0;
    $subject3 = $_POST["sub-3"] + 0;
    $subject4 = $_POST["sub-4"] + 0;
    $subject5 = $_POST["sub-5"] + 0;
    $subject6 = $_POST["sub-6"] + 0;
    $totalMark = $subject1 + $subject2 + $subject3 + $subject4 + $subject5 + $subject6;

    if (!empty($user_array)) {
        $addMarksQuery = "UPDATE user_details SET Subject_1='${subject1}',Subject_2='${subject2}',Subject_3='${subject3}',Subject_4='${subject4}',Subject_5='${subject5}',Subject_6='${subject6}',Total_mark='${totalMark}'";
    } else {
        $addMarksQuery = "INSERT INTO user_details (email, Subject_1, Subject_2, Subject_3, Subject_4, Subject_5, Subject_6, Total_mark) VALUES ('${email}', '${subject1}', '${subject2}', '${subject3}', '${subject4}', '${subject5}', '${subject6}', '${totalMark}')";
    }

    if ($conn->query($addMarksQuery) === TRUE) {
        header("Location: /pages/profile.php");
    } else {
        $errorMessage = "Error: Occurred";
    }
} else if (!isset($_SESSION['user-email'])) {
    header("Location: /pages/login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information | Web Technology Assignment</title>
    <link rel="icon" href="../src/img/favicon.png" type="image/png">

    <!--------------- Linking CSS --------------->
    <link rel="stylesheet" href="../src/pages.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-------------- Linking Font --------------->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Noto+Sans:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <!--------------- Linking JS --------------->
    <script defer src="../src/script.js"></script>
    <script defer src="../src/user-info.js"></script>
</head>

<body>

    <?php include "../layout/header.php" ?>

    <main>
        <h2>Edit/Add Marks</h2>
        <form action="edit-user-details.php" id="user-info-form" class="form" autocomplete="off" method="POST">
            <div class="input-wrapper">
                <label for="sub-1">Subject 1</label>
                <?php
                if (isset($subject1)) {
                    echo "<input value=${subject1} class='mark-input' type='text' name='sub-1' id='sub-1' placeholder='Subject 1'>";
                } else {
                    echo '<input class="mark-input" type="text" name="sub-1" id="sub-1" placeholder="Subject 1">';
                }
                ?>
                <p class="error-msg" id="sub-1-error">Invalid Mark</p>
            </div>
            <div class="input-wrapper">
                <label for="sub-2">Subject 2</label>
                <?php
                if (isset($subject2)) {
                    echo "<input value=${subject2} class='mark-input' type='text' name='sub-2' id='sub-2' placeholder='Subject 2'>";
                } else {
                    echo '<input class="mark-input" type="text" name="sub-2" id="sub-2" placeholder="Subject 2">';
                }
                ?>
                 <p class="error-msg" id="sub-2-error">Invalid Mark</p>
            </div>
            <div class="input-wrapper">
                <label for="sub-3">Subject 3</label>
                <?php
                    if(isset($subject3)){
                        echo "<input value=${subject3} class='mark-input' type='text' name='sub-3' id='sub-3' placeholder='Subject 3'>";
                    }
                    else{
                        echo '<input class="mark-input" type="text" name="sub-3" id="sub-3" placeholder="Subject 3">';
                    }
                ?> 
                <p class="error-msg" id="sub-3-error">Invalid Mark</p>
            </div>
            <div class="input-wrapper">
                <label for="sub-4">Subject 4</label>
                <?php
                    if(isset($subject4)){
                        echo "<input value=${subject4} class='mark-input' type='text' name='sub-4' id='sub-4' placeholder='Subject 4'>";
                    }
                    else{
                        echo '<input class="mark-input" type="text" name="sub-4" id="sub-4" placeholder="Subject 4">';
                    }
                ?> 
                <p class="error-msg" id="sub-4-error">Invalid Mark</p>
            </div>
            <div class="input-wrapper">
                <label for="sub-5">Subject 5</label>
                <?php
                    if(isset($subject5)){
                        echo "<input value=${subject5} class='mark-input' type='text' name='sub-5' id='sub-5' placeholder='Subject 5'>";
                    }
                    else{
                        echo '<input class="mark-input" type="text" name="sub-5" id="sub-5" placeholder="Subject 5">';
                    }
                ?> 
                <p class="error-msg" id="sub-5-error">Invalid Mark</p>
            </div>
            <div class="input-wrapper">
                <label for="sub-6">Subject 6</label>
                <?php
                    if(isset($subject6)){
                        echo "<input value=${subject6} class='mark-input' type='text' name='sub-6' id='sub-6' placeholder='Subject 6'>";
                    }
                    else{
                        echo '<input class="mark-input" type="text" name="sub-6" id="sub-6" placeholder="Subject 6">';
                    }
                ?> 
                <p class="error-msg" id="sub-6-error">Invalid Mark</p>
            </div>
            <button class="btn form-btn" type="submit" id="mark-submit-btn">
                OK
            </button>
        </form>
    </main>

    <?php include "../layout/footer.php" ?>

</body>

</html>