<!DOCTYPE html>
<html lang="en">
<head>
  <title>JQuery Ajax Pagination with Bootstrap and php</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2 class="text-danger">JQuery Ajax Pagination with Bootstrap and php</h2>
  <table id="result" class="table table-striped"></table>
  <div id="loader-icon"><i class="fa fa-refresh fa-spin" style="font-size:20px"></i></div>
</div>

</body>
</html>
<script>
function getresult(offset,limit) { 
	$.ajax({
		url: 'ajax_page.php',
		type: "POST",
		data: {action:'show_list',offset:offset,limit:limit},
		beforeSend: function(){
			$('#loader-icon').show();
		},
		complete: function(){
			$('#loader-icon').hide();
		},
		success: function(data){
			$("#result").append(data);
			window.busy = false;
		},
		error: function (jqXHR, textStatus, errorThrown) {
		  if (jqXHR.status == 500) {
			  console.debug("Internal error: " + jqXHR.responseText)
		  } else {
			  console.debug("Unexpected error.")
		  }
		}        
	});
}
var busy = false;
var offset = 0;
var limit = 15;
$(window).scroll(function(){
	if($(window).scrollTop()==$(document).height()-$(window).height()){
		busy = true;
		offset = offset + limit;
		getresult(offset, limit)
	}
});
getresult(offset, limit);
</script>
