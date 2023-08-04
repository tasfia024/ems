<?php
	include 'layout/header.php';
  include 'lib/Event.php';
  Session:: checkSession();

  $event = new Event();
 ?>

<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $eventMsg = $event->deleteEventById($id);
    }
?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
          <!-- Main content -->
          <br>
          <div class="content">
              <div class="container">
                <?php
                    if (isset($eventMsg)) {
                      echo $eventMsg;
                    }
                  ?>
                  <div class="row">
                    <div class="col-12">
                        <h4 class="mb-3 w-75 float-left">Event List</h4>
                        <a href="admin-dashboard.php" class="btn btn-warning btn-md px-3 float-right" type="button">Back</a>

                        <div class="card w-100">
                          <div class="card-header">
                            <h3 class="card-title">Event List</h3>
            
                            <div class="card-tools">
                              <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
            
                                <div class="input-group-append">
                                  <button type="submit" class="btn btn-default">
                                    <i class="fa fa-search"></i>
                                  </button>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body table-responsive p-0">
                            <table class="table table-hover table-bordered text-nowrap">
                              <thead class="bg-success">
                                <tr>
                                  <th>SI No.</th>
                                  <th>Event Name</th>
                                  <th>Event Date & Time</th>
                                  <th>Event Location</th>
                                  <th>Total Participant</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                    $result = $event->getEventsData();
                                    if($result) {
                                      $i = 0;
                                      while ($item = $result->fetch_assoc()) {
                                      $i++;
                                  ?>
                                      <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $item['event_name']; ?></td>
                                        <td><?php echo $item['date'].' '.$item['time']; ?></td>
                                        <td><?php echo $item['location']; ?></td>
                                        <td><?php echo $item['total_participant']; ?></td>
                                        <td>
                                            <a href="event-form-edit.php?id=<?php echo $item['id']?>" class="btn btn-primary btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            <!-- <button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button> -->
                                            <a onclick="return confirm('Are you sure to Delete');" href="?id=<?php echo $item['id']?>" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        </td>
                                      </tr>
                                  <?php } } ?>
                              </tbody>
                            </table>
                          </div>
                          <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                      </div>
                    </div>
              </div>
          </div>
      </div>
      <!-- /.content-wrapper -->
  <?php
		include 'layout/footer.php';
	?>
    

    


