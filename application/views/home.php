<div class="col-sm-6">
  <div class="r"></div>
  <div class="my-container">
    <h1>Customer Information</h1>
    <div class="col-sm-3 cust-img">
      <img src="<?php echo base_url();?>img/user.png">
    </div>
    <div class="col-sm-9 cust-info">
      <p>Meter Number: <strong><?php echo $user['meter'];?></strong></p>
      <p>Name: <strong><?php echo $user['name'];?></strong></p>
      <p>Address: <strong><?php echo $user['address'];?></strong></p>
      <p>Rate: <strong><?php echo $user['rate'];?></strong></p>
      <p>Date Started: <strong><?php echo $user['date_started'];?></strong></p>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="my-container">
      <h1>Current Charge Rate / KWH</h1>
      <table class="my-table">
        <?php foreach($charges as $charge):?>
          <tr>
            <td><?php echo $charge["description"];?></td>
            <td>P <?php echo $charge["amount"];?></td>
          </tr>
        <?php endforeach;?>
        <tr>
          <td>Total Charge</td>
          <td><strong><u>P <?php echo round($total, 4);?></u></strong></td>
        </tr>

      </table>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="my-container">
      <h1>Appliances</h1>
      <form class="appliances" action="<?php echo base_url();?>controller/update_appliance" method="POST">
        <?php foreach ($appliances as $item): ?>
          <input type="checkbox" name="<?php echo $item["id"];?>" <?php if (in_array($item["id"], $user_appliances)){ echo "checked"; }?>>
            <?php echo $item["description"];?><br>
        <?php endforeach;?>
        <input type="submit" value="UPDATE">
      </form>
    </div>
  </div>
</div>
