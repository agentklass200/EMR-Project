<div class="col-sm-6">
    <div class="r"></div>
    <div class="my-container">
        <h1>Realtime KW Consumption</h1>
        <div class="ct-chart ct-major-tenth">
                
        </div>
        <p class="realtime-text">Date: <strong class="latest-date"></strong> | Current KW: <strong class="latest-kwh"></strong></p>
    </div>
</div>

<script src="http://code.jquery.com/jquery.js"></script>
<script src="<?php echo base_url() ?>chartist/chartist.min.js"></script>
<script src="<?php echo base_url() ?>chartist/chartist-plugin-tooltip.min.js"></script>
<script>

        var graph;
        var latestDate;
        var latestKwh;
        

        $.ajax({
            url : "get_latest_reading/15",
            success: function(data){
                var i;
                var labels = [], series = [];
                for(i = data.readings.length - 1 ; i >= 0; i--){
                    
                   labels.push(data.readings[i].date);
                   series.push({
                       meta: data.readings[i].date,
                       value: parseInt(data.readings[i].kwh)
                   });
                   if ( i ==  data.readings.length - 1){
                     
                   }
                }

                graph = new Chartist.Line('.ct-chart', {
                    labels: labels,
                    series: [series],
                },{
                    low: 0,
                    plugins: [
                        Chartist.plugins.tooltip()
                    ]
                });

                latestDate = new S("latest-date", data.current[0].date);
                latestKwh = new S("latest-kwh", data.current[0].kwh);

                latestDate.write();
                latestKwh.write();

            }
        });


        setInterval(function(){
            $.ajax({
                url: "get_latest_reading/15",
                success: function(data){
                    var labels = [], series = [];
                    for(i = data.readings.length - 1 ; i >= 0; i--){
                        labels.push(data.readings[i].date);
                        series.push({
                            meta: data.readings[i].date,
                            value: parseInt(data.readings[i].kwh)
                        });
                    }
                    graph.update({
                        labels : labels,
                        series : [series]
                    });
                    latestDate.write(data.current[0].date);
                    latestKwh.write(data.current[0].kwh);
                }
            });
        },2000);

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

