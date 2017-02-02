
                        <!--reapeat this four times-->
                        <div class="col-sm-3">
                            <div class="col-item">
                                <div class="photo">
                                    <?php    
                                    if (is_file(APP_IMG_PATH . $row['image']) && filesize(APP_IMG_PATH . $row['image']) > 0) {
                                            echo '<img class="card" src="' . APP_IMG_PATH . $row['image'] . '" alt="' . $row['app_name'] .
                                            '" />';
                                        }
                                        else {
                                            echo '<tr><td><img src="' . APP_IMG_PATH . 'nopic.jpg' . '" alt="' . $row['app_name'] .
                                            '" /></td>';
                                        }
                                       ?> 
                                </div>
                                <div class="info">
                                    <div class="row">
                                        <div class="price col-md-6">
                                            <h5>
                                                Rating</h5>
                                            <h5 class="price-text-color">
                                                <?php echo $row['rating']; ?></h5>
                                        </div>
                                        <div class="rating hidden-sm col-md-6">
                                            <i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                                            </i><i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                                            </i><i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="separator clear-left">
                                        <p class="btn-add">
                                            <i class="fa fa-shopping-cart"></i><a href="http://www.jquery2dotnet.com" class="hidden-sm">Add to cart</a></p>
                                        <p class="btn-details">
                                            <i class="fa fa-list"></i><a href="http://www.jquery2dotnet.com" class="hidden-sm">More details</a></p>
                                    </div>
                                    <div class="clearfix">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--repeat this four times ENDS-->
