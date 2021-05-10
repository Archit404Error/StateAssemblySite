<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['recaptcha_response'])) {

    // Build POST request:
    $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
    $recaptcha_secret = '6Lft67MZAAAAAOCaKLCAbQnYJU3_xxH6PHgRxQwE';
    $recaptcha_response = $_POST['recaptcha_response'];

    // Make and decode POST request:
    $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
    $recaptcha = json_decode($recaptcha);

    // Take action based on the score returned:
    if ($recaptcha->score >= 0.5) {

    } else {
        throw new Exception("Are you a robot?");
    }

}

$name = htmlspecialchars($_POST["name"]);
$chapter = htmlspecialchars($_POST["chapter"]);
$problem = htmlspecialchars($_POST["problem"]);

if(isset($_POST["public"])){
  $public = true;
} else {
  $public = false;
}

$servername = "localhost";
$username = "id14244501_sweet";
$password = "T?cxLkv9lk-p5^eT";
$database = "id14244501_sarof";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO `Submissions`(`ID`, `name`, `chapter`, `problem`, `public`) VALUES ('0', '$name','$chapter','$problem','$public')";
    // use exec()because no results are returned
    $conn->exec($sql);


    } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    }

?>

<html>

    <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="wow.min.js"></script>
    <script>new WOW().init();</script>
    <link type = "text/css" rel = "stylesheet" href = "animate.css">
    <link type = "text/css" rel = "stylesheet" href = "style.css">
    <script>
      $(document).ready(function(){
        $("a").on('click', function(event) {
          if (this.hash !== "") {
            event.preventDefault();
            var hash = this.hash;
            $('html, body').animate({
              scrollTop: $(hash).offset().top
            }, 800, function(){
              window.location.hash = hash;
            });
          }
        });
      });
    </script>
  </head>

    <nav class="navbar main-navigation">
      <a style = "color: white;" class="navbar-brand" href="#">MAS State Assembly</a>
      <ul class="nav navbar-nav">
        <li><a href="index.html">Home</a></li>
      </ul>
    </nav>
    <div style = "height: 5vh;">
        </div>
     <h1 class="animated wow fadeInUp justify-content-center">This is the information we received:</h3>
          <br/>
        <div class="animated wow fadeInUp text-center" style="color:black;">
        <h4>Name: <?=$name?></h4>
        <h4>Chapter: <?=$chapter?></h4>
        <br/>
        <h4>Problem: <?=$problem?></h4>
        <br/>
        <?php
        if($public){
          echo "<h4>Your submission <b>WILL</b> be shared.</h4>";
        } else {
          echo "<h4>Your submission will <b>NOT</b> be shared.</h4>";
        }
        ?>
      </div>

      </div>

    </div>

</html>
