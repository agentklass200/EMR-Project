<div class="col-sm-6">
    <div class="my-container">
        <h1>Estimation</h1>
        <div class="col-sm-6">
            <form class="estimate-form">
                <label>Price Limit in Peso</label>
                <input type="text" name="price" value="<?php echo $user['limit'];?>">
                <label>Start Date</label>
                <input type="date" name="start">
                <label>Date Before Current Date</label>
                <input type="text" name="before" readonly>
                <input type="button" value="Estimate" onclick="estimate()">
            </form>
        </div>
        <div class="col-sm-6">
            <p><strong>Average Daily Consumption</strong></p>
            <div class="large-text" id="daily">-</div>
            <p><strong>Estimate Number of Days</strong></p>
            <div class="large-text" id="estimate">-</div>
        </div>
    </div>
</div>

<script>
    function twoDigits(str){
        return str < 10 ? "0" + str : str;
    }

    var date = new Date();
    var before = new Date(date.getTime() - 24*60*60*1000);
    var dateVals = [before.getDate(), "/", twoDigits(before.getMonth() + 1), "/" , before.getFullYear()].join("");
    document.querySelector("input[name='before']").value = dateVals;

    function estimate() {
        var from = document.querySelector("input[name='start']").value;
        var to = document.querySelector("input[name='before']").value.replace(/\//gm,"-");
        var price = document.querySelector("input[name='price']").value;

        $.ajax({
            url: "<?php echo base_url();?>controller/get_reading_date/" + from + "/" + to + "/" + price,
            success: function(ret) {
                var date1 = new Date(to.substr(6,4), parseInt(to.substr(3,2)) - 1, to.substr(0, 2));
                var date2 = new Date(from.substr(0,4), parseInt(from.substr(6,2)) - 1, from.substr(8, 2));
                var diff = Math.floor((date1 - date2) / (1000*60*60*24)) + 1;
                if (diff <= 0) {ret = 0};

                var available = price - ret;
                var ave = ret/diff;
                var days = Math.ceil(available / (ave == 0 ? 1 : ave));

                document.querySelector("div#daily").textContent = ave.toFixed(2) + " KWH";
                document.querySelector("div#estimate").textContent = days;
            }
        });
    }
</script>