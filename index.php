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
   <div class="container-fluid">
      <div class="row" id="topSpacing"></div>
      <div class="row">
         <div class="col-xs-1 col-sm-2 col-md-3 col-lg-3"><!-- Spacer Column --></div>
         <div class="col-xs-10 col-sm-8 col-md-6 col-lg-6" id="theBusiness">
            <form action="upload.php" runat="server" method="post" enctype="multipart/form-data" >
               <div class="row">
                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" id="uploadCommands" >
                     <h3><span id="uploadMessage">Select image to upload:</span></h3>
                     <input type="file" name="fileToUpload" id="fileToUpload">
                  </div>
                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" id="imagePreview">
                     <img src="" id="preview" alt="" /><br>
                     <label>Preview</label>
                  </div>
               </div>
               <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="uploadSubmit" >
                     <?php
                        $messageCode = [ 0 => "File is not an image.",
                                         1 => "Sorry, that file already exists.",
                                         2 => "Sorry, your file is too large. Please keep the file size below 5MB.",
                                         3 => "Sorry, only JPG, JPEG, PNG & GIF files are allowed.",
                                         4 => "Sorry, your file was not uploaded.",
                                         5 => "Sorry, there was an error uploading your file." ];

                        echo $messageCode[htmlspecialchars($_GET['message'])] . "<br>";
                     ?>
                     <input type="submit" value="Upload Image" name="submit">
                  </div>
               </div>
            </form>      
         </div>
         <div class="col-xs-1 col-sm-2 col-md-3 col-lg-3"><!-- Spacer Column --></div>
      </div>
   </div>
</body>

</html>