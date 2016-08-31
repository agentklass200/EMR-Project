<!DOCTYPE html>
<html>
  <head>
    <title>EMR | KWH Calculator</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
  </head>
  <body id="bgclr">
  <div class="menu">
    <ul class="mlist clearfix">
      <li><a id="emrlst" href="#">Electricity Meter Reader</a></li>
      <li><a href="home.php">HOME</a></li>
      <li><a href="realtime.php">REAL TIME</a></li>
      <li><a href="daily.php">DAILY</a></li>
      <li><a href="monthly.php">MONTHLY</a></li>
      <li><a href="kwh.php" id="active">KWH CALCULATOR</a></li>
      <li><a href="estimation.php">ESTIMATION</a></li>
    </ul>
  </div>

  <div class="tablediv">
  <br><br><br>
  <table class="tble2">

          <tr>
            <td class="collabels">START</td><td><input class="custinfo" placeholder = "YYYY-MM-DD"></td></input><br>
            <td class="collabels">END</td><td><input class="custinfo" placeholder = "YYYY-MM-DD"></td></input><br>
          </tr>

          <tr><td><br><br></td></tr>
          <tr>
            <td></td><td></td><td class="collabels">TOTAL KWH</td><td><input class="custinfo" placeholder = "N/A"></td></input>
          <tr>
          


  </table>
 
  </div>
 


    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>