<div class="grad-gre nav-bg">
        <div class = "navbar-static-top ">    <!--navbar-fixed-bottom will place this as a footer -->
                <div class = "container  ">
                    <a href="index.php" class="navbar-brand" ><img src="css/images/penguin.png" class="logo" >  Trainee Apps</a>

             <?php
             require_once('php/appvariables.php');
                 if (!isset($_SESSION['username'])){
                  
              ?>

                <ul class="nav navbar-nav navbar-right navHeaderCollapse collapse navbar-collapse ">
                    <li id="nav-login-btn" class="">
                        <a  href = "#login-dialog" class = "btn btn-default btn3d navbar-btn" data-toggle = "modal"><strong>Login</strong></a>
                    </li>
                    <li id="nav-register-btn " >
                        <a class="btn btn-default btn3d navbar-btn" href="signup.php">
                            <strong>Sign up</strong>
                        </a>
                    </li>
                </ul>
                <?php 
            }

            ?>
                </div>
        </div>
        <br>
        <br>
        <br><br>
        
        <!--creating the navigation area -->
        <div class="navbar navbar-static-top grad-grey-dark " >
                <div class="container">
                    
                    <!--navbar toggle button-->
                    <button class="navbar-toggle" data-toggle="collapse"  data-target=".navHeaderCollapse">
                        <!--create three bars to create the toggle button-->
                        <span class = "icon-bar"></span>
                        <span class = "icon-bar"></span>
                        <span class = "icon-bar"></span>
                    </button>

                    <!--actual navigations  navHeaderCollpase is needed to refer in the collapse btn -->
                    <nav class="collapse navbar-collapse navHeaderCollapse">
                            <ul class ="nav navbar-nav navbar-left fancyNav">
                                <li class="active"> <a class="nav-tab " href="index.php" >Home</a></li>
                                <li> <!--drop down menu for top 100 apps -->
                                    <a href="" class="dropdown-toggle" data-toggle = "dropdown">Top 100 <b class = "caret"></b></a>
                                    <ul class = "dropdown-menu">
                                        <li><a href="" >Apps</a></li>
                                        <li><a href="" >Games</a></li>
                                        <li><a href="" >Mixed</a></li>  
                                    </ul>   
                                </li>
                                <li><a href="" >Developers</a></li>
                                <li><a href="" >Contact</a></li>
                            </ul>   
                    
                            <?php
                             if (isset($_SESSION['username']))
                                require_once('templates/navloginbar.php');
                             
                           ?>
                    </nav>  
                </div>  
        </div>  


</div>