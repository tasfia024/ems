<?php
	include 'layout/header.php';	
  include 'lib/User.php';
  Session:: checkLogin();
 ?>


<?php 
 	$user = new User();
 	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $loginMsg = $user->userLogin($_POST);
 	}
 ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          <br>
            <!-- Main content -->
            <div class="content">
              <div class="container">
              <?php
                  if (isset($loginMsg)) {
                    echo $loginMsg;
                  }
                ?>
                  <div class="card">
                    <div class="card-body row">
                      <div class="col-5 text-center d-flex align-items-center justify-content-center">
                        <div class="">
                          <h2>Login</h2>
                          <!-- <p class="lead mb-5">123 Testing Ave, Testtown, 9876 NA<br>
                            Phone: +1 234 56789012
                          </p> -->
                        </div>
                      </div>
                      <div class="col-7">
                        <form action="" method="post">
                            <div class="form-group">
                              <label for="inputEmail">Username</label>
                              <input type="text" name="username" id="inputEmail" class="form-control" required/>
                            </div>
                            <div class="form-group">
                              <label for="inputEmail">Password</label>
                              <input type="password" name="password" id="inputEmail" class="form-control" required/>
                            </div>
                            <div class="form-group">
                              <button type="submit" name="login" class="btn btn-primary">Sign In</button>
                              <span class="ml-3">
                                Don't have account? <a href="register.php">Sign Up</a>
                              </span>
                            </div>
                        </form>
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