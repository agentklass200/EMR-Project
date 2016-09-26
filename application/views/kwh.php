<div class="col-sm-6">
    <div class="r"></div>
    <div class="my-container">
        <h1>KW Calculator</h1>
        <div class="col-sm-6">
            <p><strong>Select Days</strong></p>
            <select class="kwh-select" onchange="kwh_interval()" id="days">
                <option>-</option>
                <option value="1">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>
            </select>
            <span style="margin: 13px 0; display: block; text-align: center;">OR</span>
            <form class="kwh-form" method="POST">
                <label>Start Date</label>
                <input type="date" name="start_date" required>
                <label>End Date</label>
                <input type="date" name="end_date" required>
                <input type="button" value="Calculate" onclick="kwh_date()">
            </form>
        </div>
        <div class="col-sm-6">
            <h2>Total KWH</h2>
            <div class="total-kwh">-</div>
        </div>
    </div>
</div>

<script>
    function kwh_interval(){
        var days = document.querySelector("select#days").value;

        $.ajax({
            url: "<?php echo base_url();?>controller/get_reading_days/" + days,
            success: function(ret) {
                document.querySelector("div.total-kwh").textContent = parseFloat(ret).toFixed(2);
            }
        });

        return false;
    }

    function kwh_date(){
        var from = document.querySelector("input[name='start_date']").value;
        var to = document.querySelector("input[name='end_date']").value;

        if(!from || !to) {
            $("form.kwh-form").submit();
        }

        $.ajax({
            url: "<?php echo base_url();?>controller/get_reading_date/" + from + "/" + to,
            success: function(ret) {
                document.querySelector("div.total-kwh").textContent = parseFloat(ret).toFixed(2);
            }
        });
    }
</script>