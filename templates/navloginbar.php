 <?php
                 if (isset($_SESSION['username'])){
                  
              
?>


<ul class="nav navbar-nav navbar-right">
    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Account
        <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li>
                <div class="navbar-content">
                    <div class="row">
                        <div class="col-md-5">
                            <img src="css/images/unverified.png"
                                alt="No image" class="img-responsive" />
                            <p class="text-center small">
                                <a href="#">Change Photo</a></p>
                        </div>
                        <div class="col-md-7">
                        	<span>
                        		<a href="" class=""><?php echo $_SESSION['username']; ?> </a>
                            </span>
                            <p class="text-muted small">
                                mail@gmail.com</p>
                            <div class="divider">
                            </div>
                            <a href="#" class="btn btn-primary btn-sm active">View Profile</a>
                        </div>
                    </div>
                </div>
                <div class="navbar-footer">
                    <div class="navbar-footer-content">
                        <div class="row">
                            <div class="col-md-6">
                                <a href="#" class="btn btn-default btn-sm">Change Passowrd</a>
                            </div>
                            <div class="col-md-6">
                                <a href="php/logout.php" class="btn btn-default btn-sm pull-right">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </li>
</ul>
<?php
  }//if 
                else{
            ?>

                
                <ul class="nav navbar-nav navbar-right">
                    <li id="nav-register-btn" class="">
                        <a  href = "#login-dialog" class = "" data-toggle = "modal">Login</a>
                    </li>
                    <li id="nav-login-btn" class="">
                        <a href="signup.php">
                            <i class="icon-login"></i>
                            <strong>Sign up</strong>
                        </a>
                    </li>
                </ul>
                <?php 

                    }//close the else tag
                ?>