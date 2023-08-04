<?php
	include 'layout/header.php';
    Session:: checkSession();
 ?>
        <!-- /.navbar -->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <br>
      
              <!-- Main content -->
              <div class="content">
                <div class="container">
                    <div class="card">
                        <div class="card-body row">
                            <div class="col-12">
                                <h2 class="brand-text text-muted font-weight-bold text-purple text-center" style="font-size: 25px;">Welcome To 
                                <?php
                                    $name = Session::get("name");
                                    if (isset($name)) {
                                        echo $name;
                                    }
                                ?>
                            
                            </h2> <br>
                                
                                <div class="row text-center">
                                    <div class="col-3">
                                        <a href="event-form.php" class="btn text-white" style="background: #e501b4;">Add Event</a>
                                    </div>
                                    <div class="col-3">
                                        <a href="event-list.php" class="btn text-white" style="background: #e501b4;">Event List</a>
                                    </div>
                                    <div class="col-3">
                                        <div class="btn text-white" style="background: #e501b4;">Booking List</div>
                                    </div>
                                    <div class="col-3">
                                    <div class="btn text-white" style="background: #e501b4;">User List</div>
                                    </div>

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