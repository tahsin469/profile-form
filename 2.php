<?php
include 'db_connect.php';
include 'sessioncheck.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Public profile</title>
  <link rel="stylesheet" href="css/profileedit.css" />
</head>

<body>
  <?php
  // define variables and set to empty values
  $public_emailErr = $githubErr = "";
  $public_email = $github = $bio = $twitter_username = $linkedIn_username = $facebook_username = $submited = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // if (empty($_POST["name"])) {
    //   $nameErr = "Name is required";
    // } else {
    //   $name = test_input($_POST["name"]);
    //   // check if name only contains letters and whitespace
    //   if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
    //     $nameErr = "Only letters and white space allowed";
    //   }
    // }

    if (empty($_POST["public_email"])) {
      $public_emailErr = "Email is required";
    } else {
      $public_email = test_input($_POST["public_email"]);
      // check if e-mail address is well-formed
      if (!filter_var($public_email, FILTER_VALIDATE_EMAIL)) {
        $public_emailErr = "Invalid email format";
      }
    }

    if (empty($_POST["github"])) {
      $github = "";
    } else {

      $github = test_input($_POST["github"]);
      // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
      if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $github)) {
        $githubErr = "Invalid URL";
      }
    }

    if (empty($_POST["bio"])) {
      $bio = "";
    } else {
      $bio = test_input($_POST["bio"]);
    }

    if (empty($_POST["twitter_username"])) {
      $twitter_username = "";
    } else {
      $twitter_username = test_input($_POST["twitter_username"]);
    }

    if (empty($_POST["linkedIn_username"])) {
      $linkedIn_username = "";
    } else {
      $linkedIn_username = test_input($_POST["linkedIn_username"]);
    }

    if (empty($_POST["facebook_username"])) {
      $facebook_username = "";
    } else {
      $facebook_username = test_input($_POST["facebook_username"]);
    }



    $submited = test_input($_POST["submited"]);
  }

  function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }



  

  // SQL query to inserting data in students table.







  if (isset($_POST['submit']) && !empty($_POST['public_email']) && !empty($_POST['github']) && !empty($_POST['bio'])) {





    $sessonuser = $_SESSION['username'];
    $sql = "INSERT INTO profileinfo (username,`publicemail`, github, bio, twitter, linkdin, facebbok)   VALUES ('$sessonuser','$public_email' , '$github' , '$bio' , '$twitter_username' , '$linkedIn_username' ,'$facebook_username' )";
    
$con->query($sql);

 
  header('Location:profile.php');
  }
 


  ?>


  <div class="main">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <h1>Public profile</h1>
      <br /><br />

      <div class="single-form">
        <label>Public email</label> <br />
        <input type="text" name="public_email" value="<?php echo $public_email; ?>" placeholder="Enter your Public email" />
        <span class="error">* <?php echo $public_emailErr; ?></span>
        <br /><br />
      </div>
      <div class="single-form">
        <label>Github Profile Link</label> <br />
        <input type="text" name="github" value="<?php echo $github; ?>" placeholder="Enter your github" />
        <span class="error"><?php echo $githubErr; ?></span>
        <br /><br />
      </div>
      <div class="single-form">
        <label>Bio</label>
        <br />
        <textarea name="bio" placeholder="Enter your bio" cols="30" rows="10"><?php echo $bio ?></textarea>
        <br /><br />
      </div>
      <div class="single-form">
        <label>Twitter Profile Link </label><br />
        <input type="text" name="twitter_username" value="<?php echo $twitter_username; ?>" placeholder="Twitter Profile Link" />
        <br /><br />
      </div>
      <div class="single-form">
        <label>LinkedIn Profile Link</label>
        <br />
        <input type="text" name="linkedIn_username" value="<?php echo $linkedIn_username; ?>" placeholder="LinkedIn profile Link" />
        <br /><br />
      </div>
      <div class="single-form">
        <label>Facebook Profile Link</label> <br />
        <input type="text" name="facebook_username" value="<?php echo $facebook_username; ?>" placeholder="Facebook Profile Link" />
        <br /><br />
      </div>
      <div class="single-form">
        <input type="hidden" name="submited" value="Public profile Update Successfully">
        <input type="submit" name="submit" value="Submit your Info">
      </div>
    </form>
  </div>
  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href)
    }
  </script>
</body>

</html>
