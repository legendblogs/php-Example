<!DOCTYPE html>
<html lang="en">
<head>
  <title>Send form data to ajax page with additional parameter</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container"> 
	<h2 class="text-info">Send form data to ajax page with additional parameter</h2>
     <div class="col-md-6">    
         <form id="sendFormData">
           	  <div class="form-group">
                <label for="Name">Name</label>
                <input type="text" placeholder="Name" class="form-control" name="name" required="">
              </div>
           	  <div class="form-group">
                <label for="Email">Email address</label>
                <input type="email" placeholder="Email" class="form-control" name="email" required="">
              </div>
              <div class="form-check">
                <input type="checkbox" class="form-check-input" name="check" required="">
                <label class="form-check-label" for="exampleCheck1">Check me</label>
              </div>
            <div class="statusMsg"></div>
            <input type="submit" name="submit" class="btn btn-danger" value="Submit"/>
        </form>
     </div>
</div>
</body>
</html>
<script>
$(document).ready(function(e){
    $("#sendFormData").on('submit', function(e){
        e.preventDefault();
		var formData = new FormData(this);
		formData.append('action', 'savadata');
        $.ajax({
            type: 'POST',
            url: 'ajax_page.php',
            data: formData,
            contentType: false,
            cache: false,
            processData:false,
            success: function(data){
				alert(data);
            },
			complete: function(){
				alert("Data uploaded successfully.");
			},
			error: function (jqXHR, textStatus, errorThrown) {
				alert("Some problem occurred, please try again.");
			} 
        });
    });
});
</script>
