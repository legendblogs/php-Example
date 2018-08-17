<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
require_once('../config.php');

function create_pagination($request_url, $limit, $total_page, $current_page){
	if($total_page > 1 && $current_page <= $total_page){ 
		if($current_page <= $total_page && $current_page > 1)
			$prv_page = $current_page-1;
		else
			$prv_page = 1;
			
		$url = setURL($request_url,'page',$prv_page);
		$pagination .= '<a href="'.$url.'">&lsaquo;</a>';
		
		
		if($current_page<=4)
			$from = 1;
		if($current_page>=4){
			$from = $current_page-2;
			$url = setURL($request_url,'page',1);
			$pagination .= '<a href="'.$url.'">1</a>';
		if($from >= 3)
			$pagination .= '... ';
		}
		
		if($current_page == $total_page || $total_page <= 4)
			$to = $total_page;
		else{
			$to = $from+4;
			if($current_page==$total_page-1)
			$to--;
		}

		for($i = $from; $i <= $to; $i++){
			$url = setURL($request_url,'page',$i);
			$pagination .= '<a href="'.$url.'"';
			if($i==$current_page) 
				$pagination .= ' class="current">';
			else
				$pagination .= ' >';
			$pagination .= $i.'</a>';
		}
		
		if($to < $total_page-1)
			$pagination .= '... ';
	
		if($to != $total_page){
			$url = setURL($request_url,'page',$total_page);
			$pagination .= '<a href="'.$url.'">'.$total_page.'</a>';
		}
		
		if($current_page < $total_page && $current_page >= 0)
			$next_page = $current_page+1;
		else
			$next_page = $total_page;
		$url = setURL($request_url,'page',$next_page);
		$pagination .= '<a href="'.$url.'">&rsaquo;</a>'; 
	}
	return $pagination;
}
function setURL($url, $key, $value) {
	$url = removeqsvar($url, $key);
    $separator = (parse_url($url, PHP_URL_QUERY) == NULL) ? '' : '&';
    $query = $key."=".$value;
    $url .= $separator . $query;
    return $url;
}
function removeqsvar($url, $varname) {
    list($urlpart, $qspart) = array_pad(explode('?', $url), 2, '');
    parse_str($qspart, $qsvars);
    unset($qsvars[$varname]);
    $newqs = http_build_query($qsvars);
    return $urlpart . '?' . $newqs;
}	

$mysql_query = mysqli_query($connection, "Select id from country");
$total_rows = mysqli_num_rows($mysql_query);
$limit = 10;
$total_page = ceil($total_rows/$limit);
if( isset($_GET{'page'} ) ) {
	$current_page = $_GET['page'];
	if($current_page <=0)
		$current_page = 1;
	else if($current_page > $total_page)
		$current_page = $total_page;
	$offset = $limit * ($current_page-1);
}
else{
	$current_page = 1;
	$offset = 0;
}

$request_url = basename($_SERVER['REQUEST_URI']);
$pagination = create_pagination($request_url, $limit, $total_page, $current_page);


?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Pagination Demo</title>
<link rel="stylesheet" href="lb_css.css" type="text/css" />
</head>

<body>
    <div class="navigation" style="color:#333333; text-align:right; width:85%"><?php echo $pagination; ?></div>
    <table width="75%" align="center" style="background-color:#F8F8F8" cellpadding="7" cellspacing="3">
    <?php
    $mysql_query = mysqli_query($connection, "Select * from country Limit $offset, $limit");
    echo "<tr style='background-color:#999999'>";
    while($mysql_query_fields = mysqli_fetch_field($mysql_query)){
        $mysql_fields[] = $mysql_query_fields->name;
        echo "<th align='left'>".ucfirst($mysql_query_fields->name)."</th>";
    }
    echo "</tr>";
    
    while($mysql_rows = mysqli_fetch_array($mysql_query)){
    echo "<tr>";
        foreach($mysql_fields as $fields){
            echo "<td>".$mysql_rows[$fields]."</td>";
        }
    echo "</tr>";
    }
    ?>
    </table>
    <div class="navigation" style="color:#333333; text-align:right; width:85%"><?php echo $pagination; ?></div>
    </body>
<?php
close_db();
?> 
</html>
