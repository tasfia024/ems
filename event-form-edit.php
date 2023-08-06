<?php
	include 'layout/header.php';
    include 'lib/Event.php';
    Session:: checkSession();

 	$event = new Event();
 ?>


<?php
    if(!isset($_GET['id']) || $_GET['id'] == NULL){
        echo "<script>window.location = 'event-list.php'; </script>";
    }else{
        $id = $_GET['id'];
    }
?>


<?php 
 	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['event'])) {
        $eventMsg = $event->eventUpdate($id, $_POST);
 	}
 ?>


<?php
    if ($id) {
        $id = $_GET['id'];
        $result = $event->getEventDataById($id);
        $data = $result->fetch_object();
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
                <div class="col-md-12 order-md-1">
                    <h4 class="mb-3 w-75 float-left">Update Event</h4>
                    <a href="event-list.php" class="btn btn-warning btn-md px-3 float-right" type="button">Back</a>

                    <div class="card w-100">
                        <div class="card-body">
                            <form class="needs-validation" novalidate action="" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="firstName">Event Name</label>
                                            <input type="text" name="event_name" value="<?php echo $data->event_name; ?>" class="form-control" placeholder="Enter event name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="exampleFormControlFile1">Event Image</label>
                                            <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="form-group">
                                            <label for="firstName">Event Description</label>
                                            <textarea type="text" name="description" class="form-control" required><?php echo $data->description; ?></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="firstName">Event Date</label>
                                            <input type="date" value="<?php echo $data->date; ?>" name="date" class="form-control" placeholder="" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="lastName">Event Time</label>
                                            <input type="time" value="<?php echo $data->time; ?>" name="time" class="form-control" placeholder="" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="lastName">Event Location</label>
                                            <input type="text" value="<?php echo $data->location; ?>" name="location" class="form-control" placeholder="" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="lastName">Total Participant</label>
                                            <input type="number" value="<?php echo $data->total_participant; ?>" name="total_participant" class="form-control" placeholder="" required>
                                        </div>
                                    </div>
                                </div>
                        
            
                                <div class="float-right">
                                    <a href="event-list.php" class="btn btn-danger btn-md px-3" type="button">Cancel</a>
                                    <button name="event" class="btn btn-success btn-md px-3" type="submit">Update</button>
                                </div>
                                    

                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- /.content-wrapper -->
    <?php
		include 'layout/footer.php';
	?>
    


