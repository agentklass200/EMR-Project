<!DOCTYPE html>
<html>
  <head>
    <title>EMR | Real Time</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">

    <link rel="stylesheet" href="./chartist/chartist.min.css">

    <style>
      .ct-series-a .ct-line {
        /* Set the colour of this series line */
        stroke: white;
      }

      .ct-series-a .ct-point {
        /* Set the colour of this series line */
        stroke: white;
      }
    </style>


  </head>
  <body id="bgclr">
  <div class="menu">
    <ul class="mlist">
      <li><a id="emrlst" href="#">Electricity Meter Reader</a></li>
      <li><a href="home.php">HOME</a></li>
      <li><a href="realtime.php" id="active">REAL TIME</a></li>
      <li><a href="daily.php">DAILY</a></li>
      <li><a href="monthly.php">MONTHLY</a></li>
      <li><a href="kwh.php">KWH CALCULATOR</a></li>
      <li><a href="estimation.php">ESTIMATION</a></li>
    </ul>
  </div>

  <br><br>

  <div class="tablediv">
  <table style="width: 20%; margin-left:10%;">

          <tr>
            <td class="collabels">TIME</td><td class="custinfo" style="text-align: center;">13:30:50</td><br>
          </tr>
          <tr><td><br></td></tr>
          <tr>
            <td class="collabels">kW</td><td class="custinfo" style="text-align: center;">15</td><br>
          </tr>
          <tr><td><br></td></tr>
          




  </table>

  </div>
  <div style="width: 90%; margin: 50px auto;">
  <table style="width: 80%; margin-left:10%;">
          <tr>
            <td class="custinfo graph-container" style="text-align: center;">
                <div class="ct-chart ct-major-tenth">
                
                </div>
            </td>
          </tr>
  </table>
 
  </div>
  
 


    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="./chartist/chartist.min.js"></script>
    <script>
        var data = {
          labels: ['a', 'b', 'c', 'd'],
          series: [
            [1 , 2 , 3 , 1.5]
          ]
        }

        var chart = new Chartist.Line('.ct-chart', data);
        var newLabels = ['e','f','g','h','i','j'];
        var i = 0;

        $(".graph-container").click(function(){
          timeout(function(){
              data.labels.push(newLabels[i++]);
              data.series[0].push( Math.floor((Math.random()* 3) + 1));
              chart.update();
          }, 20) 
        });

        function timeout(funct, x){
            setTimeout(function(){
                funct();
                if(x <= 0){
                  return
                }
                else{
                  timeout(funct, x - 1);
                }
            }, 1000);
        }
        
    </script>
  </body>
</html>