<!DOCTYPE html>
<html>
  <head>
    <title>EMR | Daily</title>
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
      <li><a href="daily.php" id="active">DAILY</a></li>
      <li><a href="monthly.php">MONTHLY</a></li>
      <li><a href="kwh.php">KWH CALCULATOR</a></li>
      <li><a href="estimation.php">ESTIMATION</a></li>
    </ul>
  </div>

  <div class="tablediv2">
  <br><br><br><br>
  <table class="tble">

    <tr>
      <th class="theader2">Date</th><th class="theader2">kWh</th><th class="theader2">Estimated Price</th>
    </tr>
   
          <tr>
            <td class="collabels3">1-Aug-16</td><td class="collabels3">30</td><td class="collabels3">P0.00</td>
          </tr>
          <tr>
            <td class="collabels3">2-Aug-16</td><td class="collabels3">33</td><td class="collabels3">P0.00</td>
          </tr>
          <tr>
            <td class="collabels3">3-Aug-16</td><td class="collabels3">82</td><td class="collabels3">P0.00</td>
          <tr>
            <td class="collabels3">4-Aug-16</td><td class="collabels3">55</td><td class="collabels3">P0.00</td>
          </tr>  
          <tr>
            <td class="collabels3">5-Aug-16</td><td class="collabels3">44</td><td class="collabels3">P0.00</td>
          </tr>
          <tr>
            <td class="collabels3">6-Aug-16</td><td class="collabels3">32</td><td class="collabels3">P0.00</td>
          </tr>
          <tr>
            <td class="collabels3">7-Aug-16</td><td class="collabels3">25</td><td class="collabels3">P0.00</td>
          </tr>
          <tr>
            <td class="collabels3">8-Aug-16</td><td class="collabels3">17</td><td class="collabels3">P0.00</td>
          <tr>
            <td class="collabels3">9-Aug-16</td><td class="collabels3">10</td><td class="collabels3">P0.00</td>
          </tr>  
          <tr>
            <td class="collabels3">10-Aug-16</td><td class="collabels3">23</td><td class="collabels3">P0.00</td>
          </tr>
          <tr><td><br></td><td><br></td><td><br></td></tr>
          <tr>
            <td></td><td></td>
            <td style="float:right;"><input type="button" value="Back" id="lgnbtn">&nbsp;
            <input type="button" value="Next" id="lgnbtn"></td>
          </tr>
  </table>
    
 
  </div>



    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>