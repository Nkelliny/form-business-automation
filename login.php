<?php
//include config
require_once('includes/config.php');

//check if already logged in move to home page
if( $user->is_logged_in() ){ header('Location: index.php'); } 

//process login form if submitted
if(isset($_POST['submit'])){

	$username = $_POST['username'];
	$password = $_POST['password'];
	
	if($user->login($username,$password)){ 
		$_SESSION['username'] = $username;
		header('Location: memberpage.php');
		exit;
	
	} else {
		$error[] = 'Wrong username or password or your account has not been activated.';
	}

}//end if submit

//define page title
$title = 'Otto';

//include header template
require('layout/header.php'); 
?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Otto</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home<span class="sr-only">(current)</span></a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact</a></li>
        <li><a href="start.php" data-toggle="modal" data-target="#myModal">Register</a></li>
        <!-- Trigger the modal with a button -->
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div id="myModal" class="modal-content" style="height:400px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>      
      </div>
      <iframe src="../start.php" style="height:100%; width:100%;"></iframe>
    </div>
  </div>
</div>
<!-- Modal -->
<div id="myModal1" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" style="height:400px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>      
      </div>
      <iframe src="../reset.php" style="height:100%; width:100%;"></iframe>
    </div>
  </div>
</div>
      </ul>
      <form role="form" method="post" action="" autocomplete="off" class="navbar-form navbar-right">
<?php
				//check for any errors
				if(isset($error)){
					foreach($error as $error){
						echo '<p class="bg-danger">'.$error.'</p>';
					}
				}

				if(isset($_GET['action'])){

					//check the action
					switch ($_GET['action']) {
						case 'active':
							echo "<h2 class='bg-success'>Your account is now active you may now log in.</h2>";
							break;
						case 'reset':
							echo "<h2 class='bg-success'>Please check your inbox for a reset link.</h2>";
							break;
						case 'resetAccount':
							echo "<h2 class='bg-success'>Password changed, you may now login.</h2>";
							break;
					}

				}

				
				?>
        <div class="form-group">
          <input type="text" name="username" id="username" class="form-control" placeholder="User Name" value="<?php if(isset($error)){ echo $_POST['username']; } ?>" tabindex="1">
        </div>
        <div class="form-group">
          <input type="password" name="password" id="password" class="form-control" placeholder="Password" tabindex="3">
        </div>
        <button type="submit" class="btn btn-default" name="submit" value="Login" tabindex="5">Login</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="reset.php" data-toggle="modal" data-target="#myModal1">Forgot Password?</a></li>
      </ul>
    </div>
  </div>
</nav>
<div id="thumbnail-preview-indicators" class="carousel slide" data-ride="carousel" style="margin-top:-1.5%;">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#thumbnail-preview-indicators" data-slide-to="0" class="active">
              <div class="thumbnail">
                <img class="img-responsive" src="img/bg.jpg">
              </div>
            </li>
            <li data-target="#thumbnail-preview-indicators" data-slide-to="1">
            <div class="thumbnail">
                <img class="img-responsive" src="img/bg1.jpg">
              </div>
            </li>
            <li data-target="#thumbnail-preview-indicators" data-slide-to="2">
            <div class="thumbnail">
                <img class="img-responsive" src="https://s3.amazonaws.com/ooomf-com-files/mtNrf7oxS4uSxTzMBWfQ_DSC_0043.jpg">
              </div>
            </li>
          </ol>
          <div class="carousel-inner">
            <div class="item slides active">
              <div class="slide-1"></div>
              <div class="container">
                <div class="carousel-caption">
                  <h1>A new way of looking at code</h1>
                  <p>Time for developers to socialize.</p>
                  <p><a class="btn btn-default" href="#" role="button">Get Started for FREE</a></p>
                </div>
              </div>
            </div>
            <!--<div class="item slides">
              <div class="slide-2"></div>
              <div class="container">
                <div class="carousel-caption">
                  <h1>Learn and make at the same time.</h1>
                  <p>Multi-tasking at it's best.</p>
                  <p><a class="btn btn-default" href="#" role="button">Get Started for FREE</a></p>
                </div>
              </div>
            </div>
            <div class="item slides">
              <div class="slide-3"></div>
              <div class="container">
                <div class="carousel-caption">
                  <h1>It's more then education.</h1>
                  <p>It's a new outlook on life.</p>
                  <p><a class="btn btn-default" href="#" role="button">Get Started for FREE</a></p>
                </div>
              </div>
            </div>-->
          </div>
          <!--<a class="left carousel-control" href="#thumbnail-preview-indicators" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
          <a class="right carousel-control" href="#thumbnail-preview-indicators" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>-->
      </div> 
<?php 
//include header template
require('layout/footer.php'); 
?>
