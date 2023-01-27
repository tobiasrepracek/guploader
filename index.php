<!DOCTYPE html>
<html>
<head>
  <title>Upload your files</title>
</head>
<body>
  <form enctype="multipart/form-data" action="." method="POST">
    <p>Upload your file</p>
    <input type="file" name="uploaded_file"></input><br />
    <input type="submit" value="Upload"></input>
  </form>
</body>
</html>
<?PHP
  // Modified from https://gist.github.com/taterbase/2688850#file-upload-php
  if(!empty($_FILES['uploaded_file']))
  {
    $path = "/tmp/";
    $basename = $_FILES['uploaded_file']['name'];
    list($filename, $extension) = explode('.', $basename);
    $ts = str_replace('.', '', strval(microtime(true)));
    $path .= "{$filename}_{$ts}.{$extension}";

    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
      echo "The file {$basename} has been uploaded";
    } else{
        echo "There was an error uploading the file, please try again!";
    }   
  }
?>
