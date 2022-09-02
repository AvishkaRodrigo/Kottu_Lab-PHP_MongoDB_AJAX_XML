  <?php
    // connect to mongodb
    include 'connection.php';
  ?>

  <div class="display-menu  me-5">

      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Type</th>
            <th scope="col">Description</th>
          </tr>
        </thead>
        <tbody>
          
        <?php
          foreach($table->find() as $item){ 
        ?>
            <tr>
              <th><?php echo $item->_id ?></th>
              <td><?php echo $item->price ?></td>
              <td><?php echo $item->type  ?></td>
              <td><?php echo $item->description ?></td>
            </tr>      
        <?php
          }
        ?>
        </tbody>
      </table>
  </div>
