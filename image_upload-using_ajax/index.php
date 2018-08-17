<!DOCTYPE html>
<html lang="en">
<head>
  <title>Upload Image without page Re-load</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container"> 
	<h2 class="text-danger">Upload Image without page Reload using ajax</h2>
     <div class="col-md-6 text-center">    
         <form enctype="multipart/form-data" id="uploadImage" >
            <div class="form-group">
            	 <img src="images/dummy_avatar_legend-blogs.png" id="targetImage" class="icon-choose-image" />
                 <input type="file" class="form-control" id="file" name="file" required />
            </div>
            <div class="statusMsg"></div>
            <input type="submit" name="submit" class="btn btn-danger" value="Upload"/>
        </form>
     </div>
</div>
</body>
</html>
<script>
$(document).ready(function(e){
	$("#file").change(function(){
		var objFileInput = this;
		if (objFileInput.files[0]) {
			var fileReader = new FileReader();
			fileReader.onload = function (e) {
				$('#blah').attr('src', e.target.result);
				$("#targetImage").attr("src",e.target.result);
				$("#targetImage").css('opacity','0.7');
			}
			fileReader.readAsDataURL(objFileInput.files[0]);
		}
	});
    $("#uploadImage").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'ajax_page.php',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $('.btn').attr("disabled","disabled");
            },
            success: function(data){
                 $('.statusMsg').html('<span style="font-size:18px;color:#34A853">Your Image uploaded successfully.</span>');
				 $('#file').val("");
            },
			complete: function(){
				$('#targetImage').css("opacity","");
                $(".btn").removeAttr("disabled");
			},
			error: function (jqXHR, textStatus, errorThrown) {
			  $('.statusMsg').html('<span style="font-size:18px;color:#EA4335">Some problem occurred, please try again.</span>');
			} 
        });
    });
    
    $("#file").change(function() {
        var file = this.files[0];
        var imagefile = file.type;
        var match= ["image/jpeg","image/png","image/jpg"];
        if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
            alert('Please select a valid image like JPEG/JPG/PNG.');
            $("#file").val('');
            return false;
        }
    });
});
</script>
