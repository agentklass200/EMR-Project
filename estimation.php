<!DOCTYPE html>
<html>
  <head>
    <title>EMR | Estimation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
  </head>
  <body id="bgclr">
  <div class="menu">
    <ul class="mlist">
      <li><a id="emrlst" href="#">Electricity Meter Reader</a></li>
      <li><a href="home.php">HOME</a></li>
      <li><a href="realtime.php">REAL TIME</a></li>
      <li><a href="daily.php">DAILY</a></li>
      <li><a href="monthly.php">MONTHLY</a></li>
      <li><a href="kwh.php">KWH CALCULATOR</a></li>
      <li><a href="estimation.php" id="active">ESTIMATION</a></li>
    </ul>
  </div>

  <br><br>
 
<div class="tablediv">
  <table class="tble2">

    <tr>
      <th class="theader" colspan="3">*Computation will be based from the average daily consumption<br>from the indicated start date up to the recent date*</th>
    </tr>

    <tr><td><br></td></tr>

          <tr>
            <td class="collabels2">PRICE LIMIT IN PESO</td><td class="custinfo">P0.00</td>
          </tr>
          <tr>
            <td class="collabels2">START DATE</td><td class="custinfo">YYYY-MM-DD</td>
          </tr>
          <tr>
            <td class="collabels2">AVERAGE DAILY CONSUMPTION</td><td class="custinfo">N/A</td>
          <tr>
            <td class="collabels2">ESTIMATED NUMBER OF DAYS</td><td class="custinfo">N/A</td>
          </tr>  

    

  </table>
 
  </div>

    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>