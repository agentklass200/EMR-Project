<!DOCTYPE html>
<html>
  <head>
    <title>Electricity Meter Reader</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
  </head>
  <body id="bgclr">
    <div id="lgn">
        <h1 class="emr">Electricity Meter Reader</h1><br>
        <form action="home.php">
           

              <a class="lgnlbls">Username</a> <input type="text" name="uname" required>
              <br>
              <a class="lgnlbls">Password</a> <input type="password" name="pass" required>

               
            <br><br>
              <a href="#" id="fp">Forgot Password?</a>
            <br><br>  
            <button type="submit" id="lgnbtn">
              LOGIN
            </button>
          </form>
    </div>


    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>