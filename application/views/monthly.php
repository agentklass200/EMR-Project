<div class="col-sm-6">
  <div class="my-container">
      <h1>Monthly KW/H</h1>
      <table class="table table-condensed no-border">
          <tr>
              <th>Date</th>
              <th>kWh</th>
              <th>Estimated Price</th>
          </tr>
          <?php foreach ($reading as $item):?>
              <tr>
                  <td><?php echo $item["date"];?></td>
                  <td><?php echo $item["kwh"];?></td>
                  <td><strong><?php echo round($item["kwh"] * $total, 4);?></strong></td>
              </tr>
          <?php endforeach;?>
      </table>
  </div>
</div>