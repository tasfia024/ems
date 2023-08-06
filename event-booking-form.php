<?php
	include 'layout/header.php';
 ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <br>
        <div class="content">
            <div class="container">
                <div class="col-md-12 order-md-1">
                    <h4 class="mb-3 w-75 float-left">Event Booking Form</h4>
                    <div class="card w-100">
                        <div class="card-body">
                            <form class="needs-validation" novalidate action="" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="firstName">Event Name</label>
                                            <input type="text" name="event_name" class="form-control" placeholder="Enter event name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="exampleFormControlFile1">Event Image</label>
                                            <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="form-group">
                                            <label for="firstName">Event Description</label>
                                            <textarea type="text" name="description" class="form-control" required></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="firstName">Event Date</label>
                                            <input type="date" name="date" class="form-control" placeholder="" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="lastName">Event Time</label>
                                            <input type="time" name="time" class="form-control" placeholder="" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="lastName">Event Location</label>
                                            <input type="text" name="location" class="form-control" placeholder="" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="lastName">Total Participant</label>
                                            <input type="number" name="total_participant" class="form-control" placeholder="" required>
                                        </div>
                                    </div>
                                </div>
                        
            
                                <div class="float-right">
                                    <a href="admin-dashboard.php" class="btn btn-danger btn-md px-3" type="button">Cancel</a>
                                    <button name="event" class="btn btn-success btn-md px-3" type="submit">Submit</button>
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
    