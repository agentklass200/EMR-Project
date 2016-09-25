<!DOCTYPE html>
<html>
    <head>
        <title>EMR</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="<?php echo base_url();?>css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url();?>chartist/chartist.min.css">
        <script src="http://code.jquery.com/jquery.js"></script>
        <script>
            $base_url = "<?php echo base_url() ?>";
        </script>
        <script src="<?php echo base_url();?>js/script.js"></script>
        
    </head>
    <body id="bgclr">
        <img src="<?php echo base_url();?>img/icon.svg" class="bg-lightning"/>
        <nav class="menu">
            <ul class="nav-links col">
                <li><a href="<?php echo base_url();?>controller/load_home">Electricity Meter Reader</a></li>
                <li><a href="<?php echo base_url();?>controller/load_home">HOME</a></li>
                <li><a href="<?php echo base_url();?>controller/load_realtime">REAL TIME</a></li>
                <li><a href="<?php echo base_url();?>controller/load_daily">DAILY</a></li>
                <li><a href="<?php echo base_url();?>controller/load_monthly">MONTHLY</a></li>
                <li><a href="<?php echo base_url();?>controller/load_calculator">KWH CALCULATOR</a></li>
                <li><a href="<?php echo base_url();?>controller/load_estimation">ESTIMATION</a></li>
            </ul>
        </nav>

        
        
        <div class="col-sm-3"></div>