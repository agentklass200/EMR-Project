<!DOCTYPE html>
<html>
  <head>
    <title>Electricity Meter Reader</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo base_url();?>css/style.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet" media="screen">
  </head>
    <img src="<?php echo base_url();?>img/icon.svg" class="bg-lightning"/>
    <div class="login-panel">
        <h1>Electricity Meter Reader</h1>
        <form action="<?php echo base_url();?>index.php/controller/login" method="POST">
            <?php if (isset($message)): ?>
                <span class="error"><?php echo $message;?></span>
            <?php endif;?>

            <div class="form-group">
                <label class="lgnlbls">Username</label>
                <input type="text" name="uname" required>
            </div>
            <div class="form-group">
                <label class="lgnlbls">Password</label>
                <input type="password" name="pass" required>
            </div>

            <button type="submit" id="lgnbtn">LOGIN</button>
            <a href="#" class="footnote">Forgot Password?</a>
        </form>
    </div>

    <script src="<?php echo base_url();?>js/jquery.js"></script>
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
  </body>
</html>