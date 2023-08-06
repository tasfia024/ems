<?php
	include 'layout/header.php';	
  include 'lib/Event.php';
  $event = new Event();
 ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <div class="content-header">
          <div class="container">
              <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  </ol>
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img class="d-block w-100" style="height: 400px;" src="https://wallpapercave.com/wp/wp7488447.jpg" alt="First slide">
                      <div class="carousel-caption d-none d-md-block">
                          <h2>Book your favourite event</h2>
                          <p> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aspernatur, amet molestias eius, mollitia nemo tenetur!</p>
                      </div>
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100" style="height: 400px;" src="https://housedesignbd.com/wp-content/uploads/2022/08/Brithday-set-01.jpg" alt="Second slide">
                      <div class="carousel-caption d-none d-md-block">
                          <h2>Book your favourite event</h2>
                          <p> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aspernatur, amet molestias eius, mollitia nemo tenetur!</p>
                      </div>
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100" style="height: 400px;" src="https://www.jayandievents.com/wp-content/uploads/2021/02/classical-reception-the-dorchester-02.jpg" alt="Third slide">
                      <div class="carousel-caption d-none d-md-block">
                          <h2>Book your favourite event</h2>
                          <p> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aspernatur, amet molestias eius, mollitia nemo tenetur!</p>
                      </div>
                    </div>
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
          </div><!-- /.container-fluid -->
      </div>
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="container">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1 class="m-0 font-weight-bold text-purple"> Upcoming Event</h1>
                  </div>
              </div><!-- /.row -->
          </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
          <div class="container">
              <div class="row">
                  <?php
                    $result = $event->getEventsData();
                    if($result) {
                      while ($item = $result->fetch_assoc()) {
                  ?>
                    <div class="col-md-4">
                      <div class="card mb-4 box-shadow">
                        <img class="card-img-top" src="uploads/<?php echo $item['image']; ?>" alt="Card image cap" style="height: 13rem">
                        <div class="card-body">
                          <h5><?php echo $item['event_name'] ?></h5>
                          <p class="card-text"><?php echo substr($item['description'], 0, 60); ?>...</p>
                          <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                              <a href="event-details.php?id=<?php echo $item['id']?>" class="btn btn-sm btn-outline-secondary">Details</a>
                            </div>
                            <small class="text-muted">Location: <?php echo $item['location']?></small>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php } } ?>

              </div>
          <!-- /.row -->
          </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

	<?php
		include 'layout/footer.php';
	?>