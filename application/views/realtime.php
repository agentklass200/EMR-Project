<div class="col-sm-6">
    
    <div class="my-container">
        <h1>Realtime KW Consumption</h1>
        <div class="ct-chart ct-major-tenth">
                
        </div>
        <p class="realtime-text">Date: <strong class="latest-date">12/28/1995 12:30:32</strong> | Current KW: <strong class="latest-kwh">135</strong></p>
    </div>
</div>

<script src="http://code.jquery.com/jquery.js"></script>
<script src="<?php echo base_url() ?>chartist/chartist.min.js"></script>
<script>
        $.ajax({
            url : "get_latest_reading",
            success: function(data){
                var i;
                var labels = [], series = [];
                for(i = 0; i < data.readings.length; i++){
                   labels.push(data.readings[i].date);
                   series.push(parseInt(data.readings[i].kwh));
                   if ( i ==  data.readings.length - 1){
                      var latestDate = new S("latest-date", data.readings[i].date);
                      var latestKwh = new S("latest-kwh", data.readings[i].kwh);

                      // latestDate.write();
                      // latestKwh.write();
                   }
                }

                var graph = new Chartist.Line('.ct-chart', {
                    labels: labels,
                    series: [series]
                });

            }
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

