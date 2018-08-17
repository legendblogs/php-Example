<!DOCTYPE html>
<html lang="en">
<head>
  <title>Show Placeholder Loading Image</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  	.image_placeholder{
	 background: url('loading.gif') no-repeat;
	 width:200px;
	 height:200px;
	}
  </style>
</head>
<body>

<div class="container"> 
	<h2 class="text-danger">Show Placeholder Loading Image </h2>
     <div class="col-md-12 text-center">    
        <img class="image_placeholder" src="images/my_image.png" />
     </div>
</div>
</body>
</html>
