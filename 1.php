<?php
include 'db_connect.php';
include 'sessioncheck.php';
include 'menu.php';
?>
<?php
$sessionusr = $_SESSION['username'];
$profilequary = "SELECT * FROM profileinfo WHERE username='$sessionusr'";
$profilerun = $con->query($profilequary);
$displayprofile = $profilerun->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/profile.css">
    <title>Document</title>
</head>
<body>
    <div class="total">
        <div class="innertotal">
            <div class="innerleft">
                <div class="innerlefttop">
                    <div class="outerimg">
                        <div class="imginner">
                            <img class="profileimg" src="https://cdn-icons-png.flaticon.com/512/3048/3048122.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="innerleftbotton">
                    <div class="infotitle">
                        <h2 class="department">Departmen of <?php
                                                            if ($_SESSION['Department'] = "SWE") {
                                                                echo "Software Engineer";
                                                            } else if ($_SESSION['Department'] = "CSE") {
                                                                echo "Computer Science Engineering";
                                                            } else if ($_SESSION['Department'] = "MIS") {
                                                                echo "Management Information System";
                                                            } else if ($_SESSION['Department'] = "BBA") {
                                                                echo "Bachelor of Business Administration";
                                                            }
                                                            ?></h2>
                        <div>
                            <h1 class="personname"><?php echo $_SESSION['fullname'] ?></h1>
                            <p class=""><?php
                                        echo $_SESSION['username'] ?></p>
                        </div>
                    </div>
                    <div class="socialmedia">
                        <p class="socailap"> <img class="socialimg" src="https://cdn-icons-png.flaticon.com/512/732/732200.png" alt="">
                        <p><?php
                            echo $displayprofile['publicemail'];
                            ?></p>
                        </p>
                        <a class="socaila" target="_black" href=" <p><?php
                                                                        echo $displayprofile['facebook'];
                                                                        ?></p>">
                            <img class="socialimg" src="https://cdn-icons-png.flaticon.com/512/1384/1384053.png" alt="">
                            Facebook
                        </a>
                        <a class="socaila" target="_black" href="<?php
                                                                    echo $displayprofile['linkdin'];
                                                                    ?>">
                            <img class="socialimg" src="https://cdn-icons-png.flaticon.com/512/174/174857.png" alt="">
                            linkdin
                        </a>
                        <a class="socaila" target="_black" href="<?php
                                                                    echo $displayprofile['twitter'];
                                                                    ?>">
                            <img class="socialimg" src="https://cdn-icons-png.flaticon.com/512/124/124021.png" alt="">
                            Twitter
                        </a>
                        <a class="socaila" target="_black" href="<?php
                                                                    echo $displayprofile['github'];
                                                                    ?>">
                            <img class="socialimg" src="https://cdn-icons-png.flaticon.com/512/5968/5968866.png" alt="">
                            Github
                        </a>
                    </div>
                </div>
            </div>
            <div class="inneright">
                <a class="buttona" href="profileedit.php">
                    <button class="button">edit profile</button>
                </a>
                <script src="https://unpkg.com/.../lottie-player.../dist/lottie-player.js"></script>
                <lottie-player src="https://assets10.lottiefiles.com/.../i1uFIojbGt.../data.json" background="transparent" speed="1" style="width: 33%; height: 33%;" loop autoplay></lottie-player>
                <div class="innerrighttop">
                    <a class="buttona" href="question.php">
                        <button class="button">Question</button>
                    </a>
                    <a class="buttona" href="answer.php">
                        <button class="button">Answer</button>
                    </a>
                </div>
                <div class="bio">
                    <p><?php
                        echo $displayprofile['bio'];
                        ?></p>
                </div>
                <script src="https://unpkg.com/.../lottie-player.../dist/lottie-player.js"></script>
                <lottie-player src="https://assets5.lottiefiles.com/packages/lf20_ekv4q3tl.json" background="transparent" speed="1" style="width: 33%; height: 20%;" loop autoplay></lottie-player>
            </div>
        </div>
    </div>
</body>
</html>
