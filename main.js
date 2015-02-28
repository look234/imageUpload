$(document).ready(function(){

   $(".thumbs").click(function(){
      $("span#message").hide(); //Hide the old message
      //Grab the new info
      var $src = $(this).attr( "src" );
      var $name = $(this).parent().parent().find("span.imageName").text();
      var $type = $(this).parent().parent().find("span.imageType").text();
      var $size = $(this).parent().parent().find("span.imageSize").text();
      var $width = $(this).parent().parent().find("span.imageWidth").text();
      var $height = $(this).parent().parent().find("span.imageHeight").text();
      var $date = $(this).parent().parent().find("span.imageDate").text();
      //Place the new info
      $("#mainImage").attr( { src: $src } );
      $("span#mainImageName").text($name);
      $("span#mainImageType").text($type);
      $("span#mainImageSize").text($size);
      $("span#mainImageWidth").text($width);
      $("span#mainImageHeight").text($height);
      $("span#mainImageDate").text($date);
   });

   $("#backToHome").click(function(){
      window.location.href='index.php';
   });

   //Original function by Ivan Baev, http://stackoverflow.com/questions/4459379/preview-an-image-before-it-is-uploaded
   //Modified by Vincent Leith
   function readURL(input){
      if(input.files && input.files[0]){
         var reader = new FileReader();
         reader.onload = function (event) {
            $('#preview').attr('src', event.target.result);
         }
         reader.readAsDataURL(input.files[0]);
      }
   }

   $("#fileToUpload").change(function(){
      readURL(this);
   });

});