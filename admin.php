<?php
    $loggedin = 0;
    $myfile = fopen("token.conf", "r") or die("Uh oh");
    $token = fread($myfile,filesize("token.conf"));
    fclose($myfile);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $password = $_POST['password'];
      
        # get the admin password from the config file
        $myfile = fopen("config.txt", "r") or die("Unable to open file!");
        $adminPass = fread($myfile,filesize("config.txt"));
        fclose($myfile);

	if (strcmp($_POST['password'],$adminPass) == 0) {
	    setcookie("admin", $token, time() + (86400 * 30), "/"); // 30 days
	    $loggedin = 1;
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
        <div class="col-lg-12" style="margin-bottom: 2em">
          <h1 style="text-align:center">Welcome to Miyagi-do Admin</h1>
          <?php
            if (isset($_COOKIE['admin'])) {
	        if ($_COOKIE['admin'] === $token) {
		    include 'messages.txt';
                } else { ?>
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" style="max-width:200px; margin: 0 auto;">
                        <label for="password">Enter the password:</label><br>
                        <input type="text" id="password" name="password"><br>
                        <input type="submit" class="btn btn-lg btn-primary" style="margin-top:1em" value="Submit">
                    </form>
                <?php }
            } else { ?>
                <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" style="max-width:200px; margin: 0 auto;">
                    <label for="password">Enter the password:</label><br>
                    <input type="text" id="password" name="password"><br>
                    <input type="submit" class="btn btn-lg btn-primary" style="margin-top:1em" value="Submit">
                </form>
            <?php } ?>
        </div>

      <footer class="footer" style="clear: both">
        <p style="text-align:center; margin-top: 2em">&copy; 2022 Dojo Manager.</p>
        <!-- You can donate at https://github.com/dojo-manager155 -->
      </footer>

    </div> <!-- /container -->
  </body>
</html>
