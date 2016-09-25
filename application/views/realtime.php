<div class="col-sm-6">
    <div class="recommendation">
    
    </div>
    <div class="my-container">
        <h1>Realtime KW Consumption</h1>
        <div class="ct-chart ct-major-tenth">
                
        </div>
        <p class="realtime-text">Date: <strong>12/28/1995 12:30:32</strong> | Current KW: <strong>135</strong></p>
    </div>
</div>

<script src="http://code.jquery.com/jquery.js"></script>
<script src="<?php echo base_url() ?>chartist/chartist.min.js"></script>
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

        $(".ct-chart").click(function(){
          timeout(function(){
              data.labels.push(newLabels[i++]);
              data.series[0].push( (Math.random()* 3) + 1);
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

