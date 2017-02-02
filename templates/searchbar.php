<?php
	/*
	this file is supposed to be 'required_once' from
	index.php.this file renders a search form
	a search button and an 'upload an app' button.
	also this   
	*/
?>

<div class="container" >
	<div class="row">
		<div class="col-sm-3">
			<a class="btn btn-warning btn3d" href="uploadapp.php">Upload app</a>
		</div>
		<div class="col-sm-5">
            <form method = "get" action="search.php">
	            <div class="input-group">
	              <input type="text" class="form-control textfield btn3d" placeholder="App name" name="search" value="<?php if (!empty($search)) echo $search; ?>">
	              <span class="input-group-btn">
	              <button class="btn btn-default btn3d" type="submit">
	              <span class="glyphicon glyphicon-search"></span>
	             </button>
	            </div><!-- /input-group -->
	       	</form>
        </div>
	</div>
	<br><br>
</div>

<!--
<form method = "get" action="search.php">
	<input type="text" placeholder="App name" name="search" value="<?php if (!empty($search)) echo $search; ?>">
	<button type="submit" >Search</button>
</form>-->


