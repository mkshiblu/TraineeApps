
  <hr />
  <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MAX_UPLOAD_SIZE; ?>" />
    
    <label for="image">App image:</label>
    <input type="file"  name="appimage" /><br>

    <label for="appname">App name:</label>
    <input type="text" name="appname" value="<?php if (!empty($appname)) echo $appname; ?>" /><br />
    
    <label for="description">Description:</label>
    <input type="textarea" id="score" name="description" value="<?php if (!empty($description)) echo $description; ?>" /><br />
    
   <hr />
    <input type="submit" value="Upload" name="submit" />
  </form>
