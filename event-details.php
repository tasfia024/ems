<?php
	include 'layout/header.php';
    include 'lib/Event.php';

    $event = new Event();
 ?>

<?php
    if(!isset($_GET['id']) || $_GET['id'] == NULL){
        echo "<script>window.location = 'index.php'; </script>";
    }else{
        $id = $_GET['id'];
        $result = $event->getEventDataById($id);
        $data = $result->fetch_object();
    }
?>
      
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <h1 class="m-0 font-weight-bold text-purple text-center">Event Details</h1>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- Main content -->
            <div class="content">
                <div class="container">
                    <div class="card">
                    <div class="card-body row">
                        <div class="col-5">
                            <img class="d-block w-100" style="height: 280px;" src="uploads/<?php echo $data->image; ?>" alt="First slide">
                        </div>

                        <div class="col-7">
                            <h3><?php echo $data->event_name; ?></h3>
                            <!-- <h5>Event description</h5> -->
                            <br>
                            <p><?php echo $data->description; ?></p>
                            <br>
                            <div>Event Location: <?php echo $data->location; ?></div>
                            <div>Date & Time: <?php echo $data->date.' '.$data->time; ?></div> <br>
                            <a href="#" class="btn text-white" style="background: #e501b4;">Book Now</a>
                        </div>

                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    <?php
		include 'layout/footer.php';
	?>
    