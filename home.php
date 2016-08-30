<!DOCTYPE html>
<html>
  <head>
    <title>EMR | Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
  </head>
  <body id="bgclr">
  <div class="menu">
    <ul class="mlist">
      <li><a id="emrlst" href="#">Electricity Meter Reader</a></li>
      <li><a href="home.php" id="active">HOME</a></li>
      <li><a href="realtime.php">REAL TIME</a></li>
      <li><a href="daily.php">DAILY</a></li>
      <li><a href="monthly.php">MONTHLY</a></li>
      <li><a href="kwh.php">KWH CALCULATOR</a></li>
      <li><a href="estimation.php">ESTIMATION</a></li>
    </ul>
  </div>

  <div class="tablediv">
  <br><br><br><br>
  <table class="tble">

    <tr>
      <th class="theader" colspan="3">Customer Information</th>
    </tr>

    <tr><td><br></td></tr>
    <tr>
      <td style="width: 200px;">
        <img src="img/user.png" alt="" style="width:150px;height:150px;">
      </td>
      <td>
        <table style="width: 100%;">
          <tr>
            <td class="collabels">Meter Number</td><td class="custinfo">Customer Info</td>
          </tr>
          <tr>
            <td class="collabels">Name</td><td class="custinfo">Customer Info</td>
          </tr>
          <tr>
            <td class="collabels">Address</td><td class="custinfo">Customer Info</td>
          <tr>
            <td class="collabels">Rate</td><td class="custinfo">Customer Info</td>
          </tr>  
          <tr>
            <td class="collabels">Date Started</td><td class="custinfo">Customer Info</td>
          </tr>
        </table>

      </td>
    </tr>
  </table>
 
  </div>



  <div class="tablediv">
  <table style="width: 90%; margin: 0 auto;">

    <tr>
      <th class="theader" colspan="3">Current Charge Rate/KWH</th>
    </tr>

    <tr><td><br></td></tr>
    <tr>

      <td>
        <table style="width: 100%;">
          <tr>
            <td class="collabels2">Generation Charge</td><td class="custinfo">P0.00</td>
          </tr>
          <tr>
            <td class="collabels2">Transmission Charge</td><td class="custinfo">P0.00</td>
          </tr>
          <tr>
            <td class="collabels2">Distribution Charge</td><td class="custinfo">P0.00</td>
          <tr>
            <td class="collabels2">System Loss Charge</td><td class="custinfo">P0.00</td>
          </tr>  
          <tr>
            <td class="collabels2">Universal Charges</td><td class="custinfo">P0.00</td>
          </tr>
          <tr>
            <td class="collabels2">Supply System Charge</td><td class="custinfo">P0.00</td>
          </tr>
        </table>

      </td>
    </tr>
  </table>
 
  </div>
 


    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>