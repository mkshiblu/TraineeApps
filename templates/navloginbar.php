 <ul class="nav navbar-nav navbar-right">
    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['username']; ?>
        <b class="caret"></b></a>
        <ul class="dropdown-menu" style="z-index:10;">
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
                                <a href="php/logout.php" class="btn btn-danger btn-sm pull-right">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </li>
</ul>
