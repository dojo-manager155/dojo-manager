<?php
$error = "";
$success = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $message = $_POST['message'];
  if (empty($message)) {
    $error = "Invalid message";
  }
  $email = $_POST['email'];
  if (empty($email)) {
    $error = "Invalid email";
  }
  $name = $_POST['name'];
  if (empty($name)) {
    $error = "Invalid name";
  }
  
  if ($error == "") {
    $fp = fopen('messages.txt', 'a');
    fwrite($fp, $name . " ");  
    fwrite($fp, $email . " ");
    fwrite($fp, $message);
    fwrite($fp, "\n");
    fclose($fp);
    $success = "Message received!";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <link rel="canonical" href="https://getbootstrap.com/docs/3.3/examples/jumbotron-narrow/">

    <title>Miyagi-Do Karate</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/jumbotron-narrow.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://cdn.jsdelivr.net/npm/html5shiv@3.7.3/dist/html5shiv.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/respond.js@1.4.2/dest/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <div class="container">
      <div class="header clearfix">
        <!--<nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation" class="active"><a href="#">Home</a></li>
            <li role="presentation"><a href="#">About</a></li>
            <li role="presentation"><a href="#">Contact</a></li>
          </ul>
        </nav>-->
        <h3 class="text-muted" style="text-align:center" id="miyagi-quote">"If Come From Inside You, Always Right One."</h3>
        <script>
          switch(Math.floor(Math.random() * 3)) {
            case 0:
              document.getElementById("miyagi-quote").innerHTML = "If Come From Inside You, Always Right One.";
              break;
            case 1:
              document.getElementById("miyagi-quote").innerHTML = "Inside You Have Strong Root. No Need Nothing Except What Inside You To Grow.";
              break;
            case 2:
              document.getElementById("miyagi-quote").innerHTML = "Lesson Not Just Karate Only. Lesson For Whole Life! Whole Life Have A Balance, Everything Be Better.";
              break;
            default:
              document.getElementById("miyagi-quote").innerHTML = "For Man With No Forgiveness In Heart, Life Worse Punishment Than Death.";
          }
        </script>
      </div>

      <div class="jumbotron">
        <img src="images/miyagi-do.jpg" style="width:100%">
      </div>

      <div class="row marketing">
        <div class="col-lg-6">
          <h1>Welcome to Miyagi-do Karate</h1>
          <p class="lead">Some text.</p>
        </div>

        <div class="col-lg-6">
          <h1>Book your first class</h1>
          <p class="lead">Want to join the best Karate Dojo in the valley? Sign up here...</p>
          <?php
            if ($error != "") {
              echo "<p style='color:red'>" . $error . "</p>";
            }
            if ($success != "") {
              echo "<p style='color:green'>" . $success . "</p>";
            }
          ?>
          <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name"><br>
            <label for="email">Email:</label><br>
            <input type="text" id="email" name="email"><br>
            <label for="message">Message:</label><br>
            <input type="text" id="message" name="message"><br>
            <input type="submit" class="btn btn-lg btn-primary" style="margin-top:1em" value="Submit">
          </form>
        </div>
      </div>

      <footer class="footer">
        <p style="text-align:center; margin-top: 2em">&copy; 2022 Dojo Manager.</p>
        <!-- You can donate at https://github.com/dojo-manager155 -->
      </footer>

    </div> <!-- /container -->
  </body>
</html>
