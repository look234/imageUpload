<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
   <title>Image Gallery</title>
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1" />
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" />
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css" />
   <link rel="stylesheet" href="main.css" />
   <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
   <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
   <script type="text/javascript" src="main.js"></script>
</head>

<body id="mainBody">
   <div class="container">
      <div class="row" id="topSpacing"></div>
            <?php
               //this function is made by rommel and was found at http://php.net/manual/en/function.filesize.php
               function human_filesize($bytes, $decimals = 2) {
                  $sz = 'BKMGTP';
                  $factor = floor((strlen($bytes) - 1) / 3);
                  return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$sz[$factor];
               }

               $dir    = 'uploads/';
               $ignored = array('.', '..', '.svn', '.htaccess');

               $files = array();    
               foreach (scandir($dir) as $file) {
                  if (in_array($file, $ignored)) continue;
                  $files[$file] = filemtime($dir . '/' . $file);
               }
               arsort($files);
               $files = array_keys($files);
            ?>
      <div class="row" id="mainView">
         <div class="col-xs-3 col-sm-4 col-md-4 col-lg-4" id="infoPanel" >
            <?php
               if($files[0] != "" && htmlspecialchars($_GET['message']) == "6"){
                  echo '<span id="message" >The file ' . $files[0] . ' has been uploaded successfully.</span>';
               }
               $filename = "uploads/" . $files[0];
               $info = getimagesize($filename);
               $size = filesize($filename);

               echo '<div class="caption"><h3><span id="mainImageName" >' . $files[0] . '</span></h3>';
               echo '<p><strong>Type:</strong><span id="mainImageType"> ' . $info['mime'] . '</span><br/>';
               echo '<strong>Size:</strong><span id="mainImageSize"> ' . human_filesize($size) . '</span><br/>';
               echo '<strong>Width:</strong><span id="mainImageWidth"> ' . $info['0'] . 'px</span><br/>';
               echo '<strong>Height:</strong><span id="mainImageHeight"> ' . $info['1'] . 'px</span><br/>';
               echo '<strong>Uploaded:</strong><span id="mainImageDate"> ' . date ("F d Y H:i:s", filemtime($filename)) . '</span></p></div>';
            ?>
            <button id="backToHome" >Back to Upload Page</button>
         </div>
         <div class="col-xs-9 col-sm-8 col-md-8 col-lg-8" id="mainImageHolder">
            <?php
               echo '<img src="uploads/' . $files[0] . '" alt="" id="mainImage" /><br/>';
            ?>
         </div>
      </div>
      <div class="row" id="sideBar">
         <?php
            foreach($files as $key => $value){
               $filename = "uploads/" . $value;
               $info = getimagesize($filename);
               $size = filesize($filename);
               echo '<div class="col-xs-6 col-sm-4 col-md-2 col-lg-2 thumbHolder" ><div class="thumbnail">';
               echo '<a href="#" class="thumbnail"><img src="uploads/' . $value . '" alt="" class="thumbs" /></a>';
               echo ' <div class="caption"><h5><span class="imageName" >' . $value . '</span></h5>';
               echo '<p class="fileInfo"><strong>Type:</strong><span class="imageType"> ' . $info['mime'] . '</span><br/>';
               echo '<strong>Size:</strong><span class="imageSize"> ' . human_filesize($size) . '</span><br/>';
               echo '<strong>Width:</strong><span class="imageWidth"> ' . $info['0'] . 'px</span><br/>';
               echo '<strong>Height:</strong><span class="imageHeight"> ' . $info['1'] . 'px</span><br/>';
               echo '<strong>Uploaded:</strong><span class="imageDate"> ' . date ("F d Y H:i:s", filemtime($filename)) . '</span></p></div>';
               echo '</div></div>';
            }
         ?>
      </div>
   </div>
</body>

</html>