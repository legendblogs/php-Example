<?php 
require_once('../config.php');

if(isset($_POST['action'])){
	$action = $_POST['action'];
	
	if($action == 'show_list'){
		$offset = $_POST['offset'];
		$limit = $_POST['limit'];
		
		$mysql_query = mysqli_query($connection, "Select * from country Limit $offset, $limit");
		if($offset == 0){
			echo "<thead>
					<tr class='text-info'>";
				while($mysql_query_fields = mysqli_fetch_field($mysql_query)){
					$mysql_fields[] = $mysql_query_fields->name;
					echo "<th align='left'>".ucfirst($mysql_query_fields->name)."</th>";
				}
			echo "</tr>
				</thead>";
		}
		else{
			while($mysql_query_fields = mysqli_fetch_field($mysql_query)){
				$mysql_fields[] = $mysql_query_fields->name;
			}
		}
		while($mysql_rows = mysqli_fetch_array($mysql_query)){
		echo "<tr>";
			foreach($mysql_fields as $fields){
				echo "<td>".$mysql_rows[$fields]."</td>";
			}
		echo "</tr>";
		}
	}
	else{
		 echo "Invalid Method!";
	}
}
else{
	echo "Invalid Calling Method!";
}
close_db();
?> 